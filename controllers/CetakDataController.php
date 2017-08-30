<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:13:52
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-08 23:53:45
 */

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use app\models\User;
use kartik\mpdf\Pdf;
use app\models\Sekolah;
use app\models\Sekolah_Search;
use app\models\Peserta_Search;

class CetakDataController extends Controller 
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

    public function actionAbsensi($lokasi, $tingkat) {
        $model = User::find()->where(['!=', 'tingkat', 'ADMIN'])->andWhere(['status' => 10, 'panlok' => $lokasi, 'tingkat' => $tingkat])
            ->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])->orderBy('nama ASC')->all();
 
        $content = $this->renderPartial('absensi', [
            'model' => $model,
            'lokasi' => $lokasi,
            'tingkat' => $tingkat
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'defaultFont' => 'monospace',
            'defaultFontSize' => '10px',
            'content' => $content,
            'cssFile' => '@webroot/css/cetak/absensi.css',
            'methods' => [
                'SetHeader'=>[' '],
                'SetFooter'=>['ARITMATIKA 2017 |' . 
                    'JILID VI |' . 
                    '{PAGENO}'
                ],
            ],
            'options' => [
                'title' => 'DAFTAR PRESENSI ' . strtoupper($lokasi) . ' ' . strtoupper($tingkat),
                'subject' => 'DAFTAR PRESENSI ARITMATIKA 2017'
            ],
            'filename' => 'DAFTAR_PRESENSI_' . strtoupper($lokasi) . '_' . strtoupper($tingkat) . '.pdf',
        ]);
 
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');
        return $pdf->render();
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelSekolah($id)
    {
        if (($model = Sekolah::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
