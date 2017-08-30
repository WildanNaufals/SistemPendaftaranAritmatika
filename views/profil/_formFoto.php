<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-17 19:22:02
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 20:12:30
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\FileInput;

?>

<h4>Ganti Foto Saya</h4>
<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => false,
    'validateOnChange' => false,
    'validateOnBlur' => false,
    'options' => [
        'enctype' => 'multipart/form-data',
    ],
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

<div class="alert alert-info" role="alert">
    Foto wajib berupa foto persegi ( <strong>lebar = tinggi</strong> ) serta berukuran maksimal <strong>200 KB</strong>. Sangat <strong>DISARANKAN</strong> menggunakan foto berukuran <strong>500 px * 500 px</strong>.<br><br>
    Jika mengalami kesulitan mengubah ukuran dan resolusi gambar, ikuti panduan cara mengubah ukuran gambar 
    <?= Html::a('DI SINI', ['/site/cara-crop-image'], ['class' => 'alert-link', 'target' => '_blank']) ?>.
</div>
<br><br>

<?= $form->field($ubah, 'foto')->widget(FileInput::classname(), [
    'language' => 'id',
    'pluginOptions' => [
        'showCaption' => true,
        'showRemove' => true,
        'showUpload' => false,
        'browseLabel' => 'Pilih Foto',
        'browseClass' => 'btn btn-primary btn-flat',
        'browseIcon' => '<i class="fa fa-image"></i> ',
        'removeClass' => 'btn btn-default btn-flat',
    ]
]) ?>

<div style="padding: 24px 0"></div>
<?= Html::submitButton('Ubah Foto', ['class' => 'btn btn-primary btn-block']) ?>

<?php ActiveForm::end(); ?>