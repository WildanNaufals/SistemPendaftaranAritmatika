<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataUser_Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_peserta') ?>

    <?= $form->field($model, 'nisn') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'hp') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'nama_sekolah') ?>

    <?php // echo $form->field($model, 'alamat_peserta') ?>

    <?php // echo $form->field($model, 'tingkat') ?>

    <?php // echo $form->field($model, 'panlok') ?>

    <?php // echo $form->field($model, 'jenis_pendaftaran') ?>

    <?php // echo $form->field($model, 'guru_pendamping') ?>

    <?php // echo $form->field($model, 'nip') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'pengumuman') ?>

    <?php // echo $form->field($model, 'validasi') ?>

    <?php // echo $form->field($model, 'menu') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
