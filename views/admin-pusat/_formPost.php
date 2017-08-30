<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 17:06:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 22:12:30
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'author')
	->textInput([
		'value' => Yii::$app->user->identity->nama,
		'disabled' => true,
	]) ?>

<?= $form->field($model, 'date')
	->textInput([
		'value' => date('d M Y H:i:s'),
		'disabled' => true,
	]) ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
<?= $form->field($model, 'status')->textInput() ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Perbarui', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

