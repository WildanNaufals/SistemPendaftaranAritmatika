<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:13:52
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-09 23:19:13
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\User;
use app\models\ValidasiData_Search;
use yii\helpers\Html;

class ValidasiDataController extends Controller
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

        if (Yii::$app->akses->getPengaturan('Pendaftaran Ditutup', '0') !== null) {
            return $this->goHome();
        }

        $tingkat = ['MENENGAH ATAS', 'MENENGAH PERTAMA'];
        $value   = [];

        for ($i=0; $i < 2 ; $i++) {
            $value[$i] = User::find()->select(['tingkat', 'status'])->where(['tingkat' => $tingkat[$i]])->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])
                ->andWhere(['status' => 10])
                ->count();
            $value[$i+2] = User::find()->select(['tingkat', 'status'])->where(['tingkat' => $tingkat[$i]])->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])
                ->andWhere(['status' => 0])
                ->count();
            $value[$i+4] = User::find()->select(['tingkat', 'status', 'created_at'])->where(['tingkat' => $tingkat[$i]])->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])
                ->andWhere(['status' => 0])->andWhere(['<=', 'created_at', strtotime('-36 HOURS')])
                ->count();
            $value[$i+6] = User::find()->select(['tingkat', 'created_at'])->where(['tingkat' => $tingkat[$i]])->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])
                ->andWhere(['between', 'created_at', strtotime(date('Y-m-d 00:00:00')), strtotime(date('Y-m-d 23:59:59'))])
                ->count();
        }

        return $this->render('index', [
            'value'   => $value,
            'tingkat' => $tingkat
        ]);
    }

    public function actionValid($a, $b)
    {
        if (Yii::$app->akses->getPengaturan('Pendaftaran Ditutup', '0') !== null) {
            return $this->goHome();
        }

        $model = $this->findModel(Yii::$app->user->identity->id);
        $tingkat = ['MENENGAH ATAS', 'MENENGAH PERTAMA'];

        if ($model->menu > 2 || $model->menu < 1 || $a < 0 || $a > 7 || $b != $tingkat[$a%2] ) {
            return $this->goHome();
        }

        $searchModel = new ValidasiData_Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $a, $b);

        $label = ['SMA Sudah Divalidasi', 'SMP Sudah Divalidasi', 'SMA Menunggu Divalidasi', 'SMP Menunggu Divalidasi', 'SMA Sudah Kadaluarsa', 'SMP Sudah Kadaluarsa', 'SMA Hari Ini', 'SMP Hari Ini'];

        return $this->render('valid', [
            'label'        => $label,
            'a'            => $a,
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBatal($a, $b)
    {
        if (Yii::$app->akses->getPengaturan('Pendaftaran Ditutup', '0') !== null) {
            return $this->goHome();
        }

        $model = $this->findModel($a);
        if ($model->auth_key != $b) {
            return $this->goHome();
        }

        if ($model->tingkat == 'MENENGAH ATAS') {
            $c = 0;
        } elseif ($model->tingkat == 'MENENGAH PERTAMA') {
            $c = 1;
        }

        $model->status = 0;
        $model->save();
        return $this->redirect(['valid', 'a' => $c, 'b' => $model->tingkat]);
    }

    public function actionValidasi($a, $b)
    {
        if (Yii::$app->akses->getPengaturan('Pendaftaran Ditutup', '0') !== null) {
            return $this->goHome();
        }

        $model = $this->findModel($a);
        if ($model->auth_key != $b) {
            return $this->goHome();
        }

        if ($model->tingkat == 'MENENGAH ATAS') {
            $c = 2;
        } elseif ($model->tingkat == 'MENENGAH PERTAMA') {
            $c = 3;
        }

        $model->status = 10;
        $model->save();

        Yii::$app->session->setFlash('success', 'Halo ' . $model->nama . ', selamat kamu sudah menjadi calon pemenang Aritmatika 2017. Segera masuk ke sistem Aritmatika di www.aritmatika.xyz karena akun kamu sudah berhasil kami aktifkan. #');

        return $this->redirect(['valid', 'a' => $c, 'b' => $model->tingkat]);
    }

    public function actionView($a, $b) {
        if (Yii::$app->akses->getPengaturan('Pendaftaran Ditutup', '0') !== null) {
            return $this->goHome();
        }

        $model    = $this->findModel($a);

        if ($model->auth_key != $b) {
            return $this->goHome();
        }

        return $this->render('../profil/saya', [
            'model' => $model,
        ]);
    }

    public function actionDelete($a, $b) {
        if (Yii::$app->akses->getPengaturan('Pendaftaran Ditutup', '0') !== null) {
            return $this->goHome();
        }
        
        $model  = $this->findModel($a);

        if ($model->auth_key != $b) {
            return $this->goHome();
        }

        if ($model->tingkat == 'MENENGAH ATAS') {
            $c = 4;
        } elseif ($model->tingkat == 'MENENGAH PERTAMA') {
            $c = 5;
        }

        if ($model->foto != 'null.png') {
            unlink('img/user/' . $model->foto);
        }

        $model->delete();
        return $this->redirect(['valid', 'a' => $c, 'b' => $model->tingkat]);
    }

    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
    }
}
