<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\RefPembahasan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-pembahasan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_peserta')->widget(Select2::classname(), [
        'data' => $no_peserta,
        'theme' => 'default',
        'options' => [
            'placeholder' => ''
        ],
    ]) ?>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>

</div>
