<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 20:12:26
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<h4>Ubah Kata Sandi Saya</h4>
<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => false,
    'validateOnChange' => false,
    'validateOnBlur' => false,
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-3 control-label',
            'offset' => 'col-sm-offset-2',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
]); ?>

	<?= $form->field($ubah, 'old')->passwordInput() ?>
	<?= $form->field($ubah, 'new')->passwordInput() ?>
	<?= $form->field($ubah, 'repeat')->passwordInput() ?>

	<div style="padding: 24px 0"></div>
	<?= Html::submitButton('Ubah Kata Sandi', ['class' => 'btn btn-primary btn-block']) ?>

<?php ActiveForm::end(); ?>