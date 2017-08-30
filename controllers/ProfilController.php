<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:13:52
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-10 09:53:21
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\User;
use app\models\UbahPasswordForm;
use app\models\UbahFotoForm;
use app\models\OfflineForm;
use app\models\Sekolah;
use kartik\mpdf\Pdf;
use app\models\AdminLolos_Search;
use app\models\RefPembahasan;

class ProfilController extends Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionSaya() {
        if ($this->findModel()->jenis_pendaftaran === '_OFFLINE') {
            Yii::$app->session->setFlash('warning', 'Maaf, karena anda mendaftar OFFLINE, mohon perbarui biodata Anda terlebih dahulu.');
            return $this->redirect(['/profil/offline']);
        }

        return $this->render('saya', [
            'model' => $this->findModel(),
            'hariH' => Yii::$app->akses->getPengaturan('Waktu Lomba', '1'),
        ]);
    }

    public function actionOffline(){
        $data = $this->findModel();
        if ($data->jenis_pendaftaran !== '_OFFLINE') {
            return $this->redirect(['/profil/saya']);
        }

        $sekolah = ArrayHelper::map(Sekolah::find()
            ->select(['nama_sekolah'])
            ->where(['tingkat' => $data->tingkat, 'panlok' => $data->panlok])
            ->asArray()
            ->orderBy('nama_sekolah ASC')
            ->all(),
            'nama_sekolah', 'nama_sekolah'
        );

        $model = new OfflineForm;
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->update()) {
                Yii::$app->session->setFlash('success', 'Data Berhasil diperbarui.');
                return $this->redirect(['/profil/saya']);
            } else {
                Yii::$app->session->setFlash('error', 'Data Gagal diperbarui.');
            }
        }

        return $this->render('offline', [
            'model'    => $model,
            'sekolah'  => $sekolah
        ]);
    }

    public function actionUbahKataSandi(){
        if ($this->findModel()->jenis_pendaftaran == '_OFFLINE') {
            Yii::$app->session->setFlash('warning', 'Maaf, karena anda mendaftar OFFLINE, mohon perbarui biodata Anda terlebih dahulu.');
            return $this->redirect(['/profil/offline']);
        }

        $ubah = new UbahPasswordForm;

        if ($ubah->load(Yii::$app->request->post())) {
            if ($user = $ubah->change()) {
                Yii::$app->session->setFlash('success', 'Kata sandi anda Berhasil diubah.');
                return $this->redirect(['/profil/saya']);
            } else {
                Yii::$app->session->setFlash('error', 'Kata sandi anda Gagal diubah.');
            }
        }

        return $this->render('ubah',[
            'ubah'  => $ubah,
            'model' => $this->findModel(),
        ]);
    }

    public function actionUbahFoto() {
        if ($this->findModel()->jenis_pendaftaran == '_OFFLINE') {
            Yii::$app->session->setFlash('warning', 'Maaf, karena anda mendaftar OFFLINE, mohon perbarui biodata Anda terlebih dahulu.');
            return $this->redirect(['/profil/offline']);
        }

        $model = $this->findModel();
        $ubah  = new UbahFotoForm();

        if ($ubah->load(Yii::$app->request->post())) {
            $ubah->foto = UploadedFile::getInstance($ubah, 'foto');
            if ($user = $ubah->foto($model->id)) {
                Yii::$app->session->setFlash('success', 'Foto berhasil diubah. Jika Foto belum berubah mohon reload halaman ini.');
                return $this->redirect(['/profil/saya']);
            }
        }
        return $this->render('ubah', [
            'model' => $model,
            'ubah'  => $ubah
        ]);
    }

    public function actionCetakKartu() {
        if ($this->findModel()->jenis_pendaftaran == '_OFFLINE') {
            Yii::$app->session->setFlash('warning', 'Maaf, karena anda mendaftar OFFLINE, mohon perbarui biodata Anda terlebih dahulu.');
            return $this->redirect(['/profil/offline']);
        }

        if ($this->findModel()->jenis_pendaftaran == 'OFFLINE') {
            Yii::$app->session->setFlash('error', 'Maaf, karena anda mendaftar OFFLINE, anda tidak diwajibkan mencetak kartu peserta.');
            return $this->redirect(['/profil/saya']);
        }

        $model = $this->findModel();
        $bar = $model->nisn . substr($model->no_peserta, -3);

        // Update database
        $model->validasi = $bar;
        $model->save();

        $content = $this->renderPartial('_cetak_kartu', [
            'bar' => $bar,
            'model' => $model
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'defaultFont' => 'monospace',
            'defaultFontSize' => '10px',
            'content' => $content,
            'cssFile' => '@webroot/css/cetak/kartu-peserta.css',
            'methods' => [
                'SetHeader'=>['KARTU TANDA PESERTA ARITMATIKA 2017 |' .
                    $model->no_peserta .
                    '| DIBUAT PADA: '
                    . date('d-m-Y H:i:s')
                ],
                'SetFooter'=>[$model->panlok . '|' .
                    $model->no_peserta . '|' .
                    strtoupper($model->nama)
                ],
            ],
            'options' => [
                'title' => 'KARTU TANDA PESERTA ' . $bar,
                'subject' => 'KARTU TANDA PESERTA ARITMATIKA 2017'
            ],
            'filename' => 'KARTU_TANDA_PESERTA_' . $bar . '.pdf',
        ]);

        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');
        return $pdf->render();
    }

    public function actionMateri($a, $b) {
        if ($this->findModel()->jenis_pendaftaran == '_OFFLINE') {
            Yii::$app->session->setFlash('warning', 'Maaf, karena anda mendaftar OFFLINE, mohon perbarui biodata Anda terlebih dahulu.');
            return $this->redirect(['/profil/offline']);
        }

        $namaFile    = $a;
        $no_peserta  = $b;

        $files = Yii::getAlias('download_Materi2017/' . $namaFile);
        if (!is_file($files) || $this->findModel()->no_peserta != $no_peserta) {
            return $this->goHome();
        }

        return Yii::$app->response->sendFile('download_Materi2017/' . $namaFile);
    }

    public function actionMateriVip($a, $b) {
        if ($this->findModel()->jenis_pendaftaran == '_OFFLINE') {
            Yii::$app->session->setFlash('warning', 'Maaf, karena anda mendaftar OFFLINE, mohon perbarui biodata Anda terlebih dahulu.');
            return $this->redirect(['/profil/offline']);
        }

        $namaFile    = $a;
        $no_peserta  = $b;

       $sekolah = User::find()->where(['nama_sekolah' => $this->findModel()->nama_sekolah, 'status' => 10])->count();

       if ($sekolah < 6) {
         Yii::$app->session->setFlash('error', 'Maaf, Minimal terdapat 6 Pendaftar dari Sekolah kamu dan masih terdapat ' . $sekolah .
                       ' data dari sekolah ' .  $this->findModel()->nama_sekolah
         );
         return $this->redirect(['/profil/download']);
       }

        $files = Yii::getAlias('download_bukuMateriLengkap/' . $namaFile);
        if (!is_file($files) || $this->findModel()->no_peserta != $no_peserta) {
            return $this->goHome();
        }

        return Yii::$app->response->sendFile('download_bukuMateriLengkap/' . $namaFile);
    }

    public function actionDownload() {
        if ($this->findModel()->jenis_pendaftaran == '_OFFLINE') {
            Yii::$app->session->setFlash('warning', 'Maaf, karena anda mendaftar OFFLINE, mohon perbarui biodata Anda terlebih dahulu.');
            return $this->redirect(['/profil/offline']);
        }

        return $this->render('download');
    }

    public function actionDownloadPembahasan($no_peserta, $tingkat) {
        if ($this->findModel()->jenis_pendaftaran == '_OFFLINE') {
            Yii::$app->session->setFlash('warning', 'Maaf, karena anda mendaftar OFFLINE, mohon perbarui biodata Anda terlebih dahulu.');
            return $this->redirect(['/profil/offline']);
        }

        if ($this->findModel()->no_peserta !== $no_peserta) {
            return $this->goHome();
        }

        $model = RefPembahasan::findOne(['no_peserta' => $no_peserta]);

        if ($model === null) {
            Yii::$app->session->setFlash('error', 'Maaf, Anda belum membeli / mengaktifkan akses unduh pembahasan. Info lengkap hubungi Menu Kontak Kami.');
            return $this->redirect(['/profil/saya']);
        }

        $model->downloaded = $model->downloaded + 1;
        $model->save();

        return Yii::$app->response->sendFile('download_pembahasanPenyisihan2017/PEMBAHASAN BABAK PENYISIHAN ' . $tingkat . '.pdf');
    }

    public function actionPengumuman() {

        if (Yii::$app->akses->getPengaturan('Aktifkan Pengumuman', '0') !== null) {
            return $this->goHome();
        }

        $searchModel  = new AdminLolos_Search();
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams, 'LOLOS', Yii::$app->user->identity->tingkat);

        return $this->render('pengumuman', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCekJumlahPendaftar() {
        if ($this->findModel()->jenis_pendaftaran == '_OFFLINE') {
            Yii::$app->session->setFlash('warning', 'Maaf, karena anda mendaftar OFFLINE, mohon perbarui biodata Anda terlebih dahulu.');
            return $this->redirect(['/profil/offline']);
        }

        $tingkat = ['MENENGAH ATAS', 'MENENGAH PERTAMA'];
        $model   = $this->dataAll();
        $label   = ['KEDU', 'PATI', 'PEKALONGAN', 'PURWOKERTO', 'SEMARANG', 'SURAKARTA', 'YOGYAKARTA', 'KESELURUHAN', 'HARI INI'];

        $jumlah  = [];
        for ($i=0; $i < 7; $i++) {
            $jumlah[$i]   = $model->where(['tingkat' => $tingkat[0], 'status' => 10, 'panlok' => $label[$i]])
                ->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])->count();
            $jumlah[$i+7] = $model->where(['tingkat' => $tingkat[1], 'status' => 10, 'panlok' => $label[$i]])
                ->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])->count();
        }
        for ($i=0; $i < 2; $i++) {
            $jumlah[$i+14] = $model->where(['tingkat' => $tingkat[$i], 'status' => 10])
                ->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])->count();
            // $jumlah[$i+16] = $model->where(['tingkat' => $tingkat[$i]])->andWhere(['between', 'created_at', strtotime(date('Y-m-d 00:00:00')), strtotime(date('Y-m-d 23:59:59'))])
                // ->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])->count();
			$jumlah[$i+16] = 0;
        }

        return $this->render('statistik', [
            'label'  => $label,
            'jumlah' => $jumlah
        ]);
    }

    protected function findModel() {
        if (($model = User::findOne(Yii::$app->user->identity->id)) !== null) {
            return $model;
        }
    }

    protected function dataAll() {
        if (($model = User::find()->where(['!=', 'tingkat', 'ADMIN'])) !== null) {
            return $model;
        }
    }
}
