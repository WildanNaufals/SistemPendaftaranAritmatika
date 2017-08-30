<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-08 15:15:24
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Masuk';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="square">
            <h4 class="text-center">
                MASUK KE SISTEM ARITMATIKA 2017
            </h4>
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Gunakan <a class="alert-link">NISN</a> dan <a class="alert-link">Kata Sandi</a> yang telah Anda daftarkan pada saat Pendaftaran, <a class="alert-link">Khusus Pendaftar Offline</a> untuk pertama kali Login gunakan <a class="alert-link">NO. PESERTA</a> sebagai NISN yang didapatkan pada saat melakukan pendaftaran.
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'enableClientValidation' => false,
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-3 control-label',
                        'offset' => 'col-sm-offset-2',
                        'wrapper' => 'col-sm-9',
                        'error' => '',
                        'hint' => '',
                    ],
                ],
            ]); ?>

            <?= $form
                ->field($model, 'username')
                ->textInput()
            ?>

            <?= $form
                ->field($model, 'password')
                ->passwordInput()
            ?>

            <?= $form->field($model, 'verifyCode')
                ->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-sm-3">{image}</div><div class="col-sm-8 col-sm-offset-1 col-xs-12">{input}</div></div>',
                ]
            ) ?>

            <div align="right">
                <?= Html::submitButton('Masuk Sekarang', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

        <div style="margin-top: 40px">
            <h4><i class="fa fa-question"></i> MENGALAMI MASALAH</h4>
            <p>Jika mengalami masalah mengenai akun login anda, langsung hubungi Admin Web <a href="tel:0816658056">0816658056</a> (WA / Telegram).
            </p>
        </div>
    </div>

    <div class="clearfix"></div>
</div>
