<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 23:50:40
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-20 21:29:10
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\User;
use app\models\Pengaturan;
use app\models\AdminLolos_Search;

class AdminLolosController extends Controller 
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
            ]
        ];
    }

    public function actionIndex($id = 'all') {
        if ($id == 'all') {
            $id = 0;
        } elseif ($id == 'sma') {
            $id = 1;
        } elseif ($id == 'smp') {
            $id = 2;
        } else {
            return $this->goHome();
        }

        $tingkat = ['MENENGAH ATAS', 'MENENGAH PERTAMA'];
        $lolos   = [];
        $tidak   = [];
        
        for ($i=0; $i < 2 ; $i++) {
            $lolos[$i]   = User::find()->select(['tingkat', 'status', 'pengumuman'])->where(['tingkat' => $tingkat[$i]])
                ->andWhere(['status' => 10])->andWhere(['pengumuman' => 'LOLOS'])
                ->count();
            $tidak[$i]   = User::find()->select(['tingkat', 'status', 'pengumuman'])->where(['tingkat' => $tingkat[$i]])
                ->andWhere(['status' => 10])->andWhere(['pengumuman' => 'TIDAK LOLOS'])
                ->count();
        }

        $searchModel     = new AdminLolos_Search();
        $dataProvider = [
            $searchModel->search(Yii::$app->request->queryParams, 'all', 'ADMIN'),
            $searchModel->search(Yii::$app->request->queryParams, '-', 'MENENGAH ATAS'),
            $searchModel->search(Yii::$app->request->queryParams, '-', 'MENENGAH PERTAMA')
        ];

        return $this->render('index', [
            'lolos'   => $lolos,
            'tidak'   => $tidak,
            'tingkat' => $tingkat,
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider[$id],
        ]);
    }

    public function actionPengaturan() {
        return $this->render('pengaturan', [
            'pengumuman' => $this->findModelPengaturan(12)->status,
            'pendaftaran' => $this->findModelPengaturan(2)->status,
        ]);
    }

    public function actionData($a, $b)
    {
        $model = $this->findModel(Yii::$app->user->identity->id);
        $tingkat = ['MENENGAH ATAS', 'MENENGAH PERTAMA'];

        if ($a < 0 || $a > 3 || $b != $tingkat[$a%2] ) {
            return $this->goHome();
        }

        $searchModel = new AdminLolos_Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $a, $b);

        $label = ['SMA Lolos', 'SMP Lolos', 'SMA Tidak Lolos', 'SMP Tidak Lolos'];

        return $this->render('data', [
            'label'        => $label,
            'a'            => $a,
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTutup($a, $b, $c) {
        $model = $this->findModel($a);
        if ($model->auth_key != $b) {
            return $this->goHome();
        }
        if ($c == 'off') {
            $c = '0';
        } elseif ($c == 'on') {
            $c = '1';
        } else {
            return $this->goHome();
        }

        $pengumuman = $this->findModelPengaturan(2);
        $pengumuman->status = $c;
        $pengumuman->save();
        return $this->redirect(['pengaturan']);
    }

    public function actionAktifkan($a, $b, $c) {
        $model = $this->findModel($a);
        if ($model->auth_key != $b) {
            return $this->goHome();
        }
        if ($c == 'off') {
            $c = '0';
        } elseif ($c == 'on') {
            $c = '1';
        } else {
            return $this->goHome();
        }

        $pengumuman = $this->findModelPengaturan(12);
        $pengumuman->status = $c;
        $pengumuman->save();
        return $this->redirect(['pengaturan']);
    }

    public function actionAksi($a, $b, $c, $d) {
        $model = $this->findModel($a);
        if ($model->auth_key != $b) {
            return $this->goHome();
        }

        $model->pengumuman = $d;
        $model->save();
        return $this->redirect(['index', 'id' => $c]);
    }

    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
    }

    protected function findModelPengaturan($id) {
        if (($model = Pengaturan::findOne($id)) !== null) {
            return $model;
        }
    }
}
