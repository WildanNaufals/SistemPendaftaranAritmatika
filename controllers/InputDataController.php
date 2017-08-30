<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:13:52
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-09 00:33:46
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\InputForm;
use app\models\Sekolah;
use app\models\User;
use app\models\InputPeserta_Search;
use kartik\mpdf\Pdf;

class InputDataController extends Controller
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        // Yii::$app->session->setFlash('danger', [        //
        //     'type' => 'danger',        //
        //     'title' => 'Akses Diblokir !',        //
        //     'icon' => 'fa fa-ban',        //
        //     'body' => 'Maaf, akses sementara <a class="alert-link">kami blokir</a>.'        //
        // ]);        //
        // return $this->goBack();
        return $this->redirect(['/admin-pusat/peserta']);
        // return $this->render('index');
    }

    public function actionInput($a, $b) {

        Yii::$app->session->setFlash('error', 'Maaf, akses sementara kami blokir.');
        return $this->goBack();

        $panlok  = $a;
        $tingkat = $b;

        $user    = $this->findModel(Yii::$app->user->identity->id);
        if ($user->panlok == strtoupper($panlok) || $user->menu == 1) {

            if (Sekolah::find()->select('panlok')->where(['panlok' => $panlok])->count() == 0) {
                return $this->redirect('index');
            }
            if (Sekolah::find()->select('tingkat')->where(['tingkat' => $tingkat])->count() == 0) {
                return $this->redirect('index');
            }

            $searchModel = new InputPeserta_Search();
            $dataProvider = $searchModel->input(Yii::$app->request->queryParams, $panlok, $tingkat);

            $dataTingkat = ArrayHelper::map(Sekolah::find()
                ->select(['tingkat'])
                ->andWhere(['tingkat' => $tingkat])
                ->groupBy(['tingkat'])
                ->asArray()
                ->all(),
                'tingkat', 'tingkat'
            );
            $dataSekolah = ArrayHelper::map(Sekolah::find()
                ->select(['tingkat', 'panlok', 'npsn', 'nama_sekolah'])
                ->where(['panlok' => $panlok])
                ->andWhere(['tingkat' => $tingkat])
                ->orderBy('npsn DESC')
                ->asArray()
                ->all(),
                'nama_sekolah', 'nama_sekolah', 'npsn'
            );
            $dataPanlok = ArrayHelper::map(Sekolah::find()
                ->select(['panlok', 'tingkat'])
                ->where(['panlok' => $panlok])
                ->andWhere(['tingkat' => $tingkat])
                ->groupBy(['panlok'])
                ->asArray()
                ->all(),
                'panlok', 'panlok'
            );
            $model = new InputForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->signup()) {
                   Yii::$app->session->setFlash('success', 'Data peserta berhasil didaftarkan.<br>KODE AKSES: '.
                            substr($user->no_peserta, -4).substr($user->nisn, 1, 3).substr($user->nisn, 2, 3).'.'
                    );
                    return $this->redirect(['view', 'a' => $user->id, 'b' => $user->auth_key]);
                } else {
                    Yii::$app->session->setFlash('warning', 'Maaf, mohon teliti kembali.');
                }
            }
            return $this->render('input', [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
                'model'        => $model,
                'tingkat'      => $dataTingkat,
                'sekolah'      => $dataSekolah,
                'panlok'       => $dataPanlok,
                'title'        => 'DATA PESERTA '. strtoupper($tingkat . ' ' . $panlok),
                'lokasi'       => strtoupper($panlok)
            ]);
        } else {
            Yii::$app->session->setFlash('warning', 'Maaf, anda tidak memiliki akses.');
            return $this->redirect('index');
        }
    }

    public function actionView($a, $b) {

        Yii::$app->session->setFlash('error', 'Maaf, akses sementara kami blokir.');
        return $this->goBack();

        $id       = $a;
        $auth_key = $b;

        $model    = $this->findModel($id);
        $user     = $this->findModel(Yii::$app->user->identity->id);
        if ($user->panlok == strtoupper($model->panlok) || $user->menu == 1) {

            if ($model->auth_key != $auth_key) {
                return $this->redirect('index');
            }

            return $this->render('../profil/saya', [
                'model' => $model,
            ]);

        } else {
            Yii::$app->session->setFlash('warning', 'Maaf, anda tidak memiliki akses.');
            return $this->redirect('index');
        }
    }

    public function actionUpdate($a, $b) {

        Yii::$app->session->setFlash('error', 'Maaf, akses sementara kami blokir.');
        return $this->goBack();

        $id       = $a;
        $auth_key = $b;
        $model    = $this->findModel($id);
        $user     = $this->findModel(Yii::$app->user->identity->id);
        if ($user->panlok == strtoupper($model->panlok) || $user->menu == 1) {

            if ($model->auth_key != $auth_key) {
                return $this->redirect('index');
            }

            $dataTingkat = ArrayHelper::map(Sekolah::find()
                ->select(['tingkat'])
                ->andWhere(['tingkat' => $model->tingkat])
                ->groupBy(['tingkat'])
                ->asArray()
                ->all(),
                'tingkat', 'tingkat'
            );
            $dataSekolah = ArrayHelper::map(Sekolah::find()
                ->select(['tingkat', 'panlok', 'npsn', 'nama_sekolah'])
                ->where(['panlok' => $model->panlok])
                ->andWhere(['tingkat' => $model->tingkat])
                ->orderBy('npsn DESC')
                ->asArray()
                ->all(),
                'nama_sekolah', 'nama_sekolah', 'npsn'
            );
            $dataPanlok = ArrayHelper::map(Sekolah::find()
                ->select(['panlok', 'tingkat'])
                ->where(['panlok' => $model->panlok])
                ->andWhere(['tingkat' => $model->tingkat])
                ->groupBy(['panlok'])
                ->asArray()
                ->all(),
                'panlok', 'panlok'
            );

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'a' => $model->id, 'b' => $model->auth_key]);
            } else {
                return $this->render('update', [
                    'model'   => $model,
                    'tingkat' => $dataTingkat,
                    'sekolah' => $dataSekolah,
                    'panlok'  => $dataPanlok,
                ]);
            }
        } else {
            Yii::$app->session->setFlash('warning', 'Maaf, anda tidak memiliki akses.');
            return $this->redirect('index');
        }
    }

    public function actionDelete($a, $b) {

        Yii::$app->session->setFlash('warning', 'Maaf, anda tidak memiliki akses.');
        return $this->goBack();

        $id       = $a;
        $auth_key = $b;
        $model    = $this->findModel($id);
        $user     = $this->findModel(Yii::$app->user->identity->id);
        if ($user->panlok == strtoupper($model->panlok) || $user->menu == 1) {

            if ($this->findModel(Yii::$app->user->identity->id)->menu == 3) {
                Yii::$app->session->setFlash('warning', 'Maaf, anda tidak memiliki akses.');
                return $this->redirect(['view', 'a' => $a, 'b' => $b]);
            }

            if ($model->auth_key != $auth_key) {
                return $this->redirect('index');
            }

            if ($model->foto != 'null.png') {
                unlink('img/user/' . $model->foto);
            }

            $model->delete();
            if ($model->foto != 'null.png') {
                unlink('img/user/' . $model->foto);
            }
            return $this->redirect(['input-data/input', 'a' => $model->panlok, 'b' => $model->tingkat]);

        } else {
            Yii::$app->session->setFlash('warning', 'Maaf, anda tidak memiliki akses.');
            return $this->redirect('index');
        }
    }

    public function actionCetakKartu($a, $b) {

        Yii::$app->session->setFlash('warning', 'Maaf, anda tidak memiliki akses.');
        return $this->goBack();

        $id       = $a;
        $auth_key = $b;
        $model    = $this->findModel($id);
        $user     = $this->findModel(Yii::$app->user->identity->id);
        if ($user->panlok == strtoupper($model->panlok) || $user->menu == 1) {

            if ($model->auth_key != $auth_key) {
                return $this->redirect('index');
            }

            $bar = $model->nisn . substr($model->no_peserta, -3);

            // Update database
            $model->validasi = $bar;
            $model->save();

            $content = $this->renderPartial('../profil/_cetak_kartu', [
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
        } else {
            Yii::$app->session->setFlash('warning', 'Maaf, anda tidak memiliki akses.');
            return $this->redirect('index');
        }
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
