<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:13:52
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-10 22:37:34
 */

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\Sekolah;
use app\models\Post;
use app\models\Content;
use app\models\User;
use app\models\Faq;

class SiteController extends Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'testLimit' => 1,
                'foreColor' => 0x1565C0,
                'transparent' => true,
                'minLength' => 4,
                'maxLength' => 6,
                'offset' => 0,
                'fontFile' => '@webroot/true-crimes.ttf',
            ],
        ];
    }

    public function actionIndex() {
        $content = new Content();
        $faq1    = Faq::find()->orderBy('created_at DESC')->limit(7)->all();
        $faq2    = Faq::find()->orderBy('view DESC')->limit(7)->all();

        return $this->render('index', [
            'content' => $content,
            'faq1'     => $faq1,
            'faq2'     => $faq2,
        ]);
    }

    public function actionFaq($id)
    {
        if (($model = Faq::findOne($id)) !== null) {
            $model  = Faq::findOne($id);
        } else {
            return $this->goHome();
        }

        $model->view = $model->view + 1;
        $model->save();

        $faq  = Faq::find()->orderBy('view DESC')->all();
        return $this->render('faq', [
            'model' => $model,
            'faq'   => $faq
        ]);
    }

    public function actionView($url, $link = '') {

        return $this->render('view', [
            'url'  => $url,
            'link' => $link
        ]);
    }

    public function actionDaftar() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if (Yii::$app->akses->getPengaturan('Pendaftaran Ditutup', '0') !== null) {
            return $this->render('daftar2');
        }

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->foto = UploadedFile::getInstance($model, 'foto');
            if ($user = $model->signup()) {
                return $this->redirect(['/site/after-daftar',
                  'nisn' => $model->nisn,
                  'nama' => $model->nama,
                  'tanggal' => date('d-m-Y'),
                  'tingkat' => $model->nama_sekolah,
                ]);
            } else {
                Yii::$app->session->setFlash('warning', 'Maaf, mohon teliti kembali form pendaftaran anda.');
            }
        }

        return $this->render('daftar', [
            'model'   => $model,
        ]);
    }

    public function actionAfterDaftar($nisn, $nama, $tanggal, $tingkat) {
      $rek = '';
      $hp = '';

      $model = Sekolah::findOne($tingkat);
      if ($model->tingkat === 'MENENGAH PERTAMA') {
        $rek = 'no. rek. 3237-01-018269-53-3 (BRI) a.n. ISNAINI RAHMAWATI';
        $hp = '0858 4268 9587';
      } elseif ($model->tingkat === 'MENENGAH ATAS') {
        $rek = 'no. rek. 6830-01-007793-53-2 (BRI) a.n. AKHYANA NURUL BAITI';
        $hp = '0878 3685 3336';
      }

      return $this->render('after-daftar', [
        'nisn' => $nisn,
        'nama' => $nama,
        'tanggal' => $tanggal,
        'rek' => $rek,
        'hp' => $hp
      ]);
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goBack();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', 'Anda berhasil masuk ke sistem Aritmatika 2017.');
            if (Yii::$app->user->identity->menu == 1) {
                return $this->redirect(['/admin-pusat']);
            } elseif (Yii::$app->user->identity->menu == 2) {
                return $this->redirect(['/validasi-data']);
            } elseif (Yii::$app->user->identity->menu == 3) {
                return $this->redirect(['/input-data']);
            } elseif (Yii::$app->user->identity->menu == 4) {
                return $this->redirect(['/admin-lolos']);
            } else {
                return $this->redirect(['/profil/saya']);
            }
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();
        Yii::$app->session->setFlash('success', 'Anda berhasil keluar dari sistem Aritmatika 2017 dan menghapus semua Sesi Anda.');
        return $this->redirect(['login']);
    }

    public function actionBerita() {
        $post1 = Post::find()
            ->where(['status' => 1])
            ->orderBy('date DESC')
            ->all();
        $post2 = Post::find()
            ->where(['status' => 2])
            ->orderBy('date DESC')
            ->all();
        return $this->render('berita', [
            'post1' => $post1,
            'post2' => $post2
        ]);
    }

    public function actionCekStatus($value) {

        if ($value == '') {
            Yii::$app->session->setFlash('error', 'Mohon isi form terlebih dahulu.');
            return $this->goHome();
        }
        if (strlen($value) < 6) {
            Yii::$app->session->setFlash('warning', 'Minimal gunakan 6 karakter.');
            return $this->goHome();
        }

        $dataAktif = User::find()->select(['nisn', 'status'])->where(['nisn' => $value])
            ->andWhere(['status' => 10])
            ->count();

        $dataWait   = User::find()->select(['nisn', 'status'])->where(['nisn' => $value])
            ->andWhere(['status' => 0])
            ->count();

        $nisnOffline      = User::find()->select(['nisn'])->where(['nisn' => $value])->count();
        $noPesertaOffline = User::find()->select(['no_peserta'])->where(['no_peserta' => $value])->count();

        if ($nisnOffline === $noPesertaOffline) {
            Yii::$app->session->setFlash('error', 'Data Tidak Ditemukan. Mohon melakukan pendaftaran terlebih dahulu');
        } elseif ($dataAktif > 0) {
            Yii::$app->session->setFlash('success', 'Selamat, NISN tersebut sudah berhasil terdaftar pada database Peserta Aritmatika 2017.');
        } elseif ($dataWait > 0) {
            Yii::$app->session->setFlash('warning', 'NISN tersebut menunggu Validasi Panitia Pusat, segera lakukan pembayaran & konfirmasi Kepada Kami.');
        } else {
            Yii::$app->session->setFlash('error', 'Data Tidak Ditemukan. Mohon melakukan pendaftaran terlebih dahulu');
        }

        return $this->goHome();
    }

    public function actionRayon() {
        $data   = new Content;

        return $this->render('rayon', [
            'data' => $data,
        ]);
    }

    public function actionMaps($id) {
        $data   = new Content;

        return $this->render('maps', [
            'panlok' => $data->panlok($id),
            'maps'   => $data->maps($id),
        ]);
    }

    // MENU
    public function actionInformasi() {return $this->render('informasi');}
    public function actionTataCaraPendaftaran() {return $this->render('tata-cara-pendaftaran');}
    public function actionKontak() {return $this->render('kontak');}
    public function actionGaleri() {return $this->render('galeri');}
    public function actionDownload() {
        return $this->render('download');
    }

    public function actionDownloadMateri() {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/profil/download']);
        }

        return $this->render('download-materi');
    }

    public function actionDownMateri() {
          Yii::$app->session->setFlash('error', 'Maaf, anda harus Mendaftar terlebih dahulu.');
          return $this->redirect(['/site/download-materi']);
    }

    // LAIN
    public function actionCaraCropImage() {
      return $this->render('cara-crop-image');
    }

    public function actionChildSekolah() {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
                $list = Sekolah::find()->select(['id', 'tingkat'])->where(['id' => $id])->asArray()->all();

            $selected  = null;
            if ($id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $account) {
                    $out[] = ['id' => $account['id'], 'name' => $account['tingkat']];
                    if ($i == 0) {
                        $selected = $account['id'];
                    }
                }
                // Shows how you can preselect a value
                echo Json::encode(['output' => $out, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionChildJenjang() {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = Sekolah::find()->select(['id', 'panlok'])->where(['id' => $id])->asArray()->all();
            $selected  = null;
            if ($id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $account) {
                    $out[] = ['id' => $account['id'], 'name' => $account['panlok']];
                    if ($i == 0) {
                        $selected = $account['id'];
                    }
                }
                // Shows how you can preselect a value
                echo Json::encode(['output' => $out, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionListSekolah($q = null, $id = null, $t = null) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = Sekolah::find();
            $query->select(['id', 'tingkat', 'nama_sekolah AS text'])
                ->where(['like', 'nama_sekolah', $q])
                ->limit(10);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Sekolah::find($id)->nama_sekolah];
        }
        return $out;
    }
}
