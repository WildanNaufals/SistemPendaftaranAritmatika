<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 17:06:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 22:12:48
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sekolah */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'tingkat')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'npsn')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'nama_sekolah')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'alamat_sekolah')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'panlok')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Perbarui', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?> 
