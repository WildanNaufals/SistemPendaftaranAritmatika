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
use yii\web\NotFoundHttpException;
use app\models\OtsForm;

class OtsController extends Controller
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

    public function actionDaftar() {

        $model = new OtsForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                Yii::$app->session->setFlash('success', 'Berhasil !');
                return $this->redirect('daftar');
            } else {
                Yii::$app->session->setFlash('warning', 'Maaf, mohon teliti kembali form pendaftaran anda.');
            }
        }

        return $this->render('daftar', [
            'model'   => $model,
        ]);
    }
}
