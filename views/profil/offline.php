<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-12 20:20:00
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-08 16:13:59
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;
use yii\bootstrap\Modal;

$this->title = 'Update Data Offline';
$this->params['breadcrumbs'][] = $this->title;

$script = '
$("body").on("beforeSubmit", "form#signup-form", function(){
  var form = $(this);
  // if (form.find(".has-error").length) {
  //   return false;
  // } else {
    if ($("#confirm-submit").hasClass("in")) {
      return true;
    } else {
      $("#confirm-submit").modal("show");
    }
  // }
  return false;
});
$("#submit").click(function() {
  $("#signup-form").submit();
});
';

$this->registerJs($script);

$button = Html::button('Batal', ['class' => 'btn btn-default', 'data' => ['dismiss' => 'modal']]);
$button .= Html::button('Simpan', ['class' => 'btn btn-primary', 'id' => 'submit']);
Modal::begin([
  'header' => '<h4>Konfirmasi</h4>',
  'toggleButton' => false,
  'id' => 'confirm-submit',
  'footer' => $button,
]);
  echo '
  <div class="alert alert-danger">
      Saya telah membaca dan memahami segala syarat dan ketentuan yang berlaku di dalam Aritmatika 2017 serta saya menyatakan bahwa data yang saya masukkan pada Form Pendaftaran Online di atas adalah benar. Apabila di kemudian hari diketahui bahwa data diri tersebut tidak benar, maka saya siap menerima konsekuensi pembatalan sebagai peserta Aritmatika 2017 atau didiskualifikasi dari acara Aritmatika 2017.
  </div>';
Modal::end();

?>

<div class="square">
    <h4 class="text-center">
        <i class="fa fa-id-card"></i> FORM UPDATE BIODATA OFFLINE ARITMATIKA 2017
    </h4>

      <?php $form = ActiveForm::begin([
          'id' => 'signup-form',
          'enableClientValidation' => false,
          'enableAjaxValidation' => false,
          'validateOnChange' => false,
          'validateOnBlur' => false,
          'options' => [
              'method' => 'post',
              'enctype' => 'multipart/form-data',
          ],
          'layout' => 'horizontal',
          'fieldConfig' => [
              'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
              'horizontalCssClasses' => [
                  'label' => 'col-sm-3 control-label',
                  'offset' => '',
                  'wrapper' => 'col-sm-9',
                  'error' => '',
                  'hint' => '',
              ],
          ],
      ]); ?>

        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Mohon isi dengan <a class="alert-link">benar</a> dan <a class="alert-link">teliti</a>.
        </div>

        <?=

                        $form->field($model, 'nisn')->textInput([

                            'placeholder' => 'Nomor Induk Siswa Nasional',

                        ]) .
                            $form->field($model, 'nama')->textInput([
                                'autofocus' => true,
                                'placeholder' => 'Nama Lengkap Anda',
                            ]) .
                            $form->field($model, 'hp')->textInput([
                                'placeholder' => '08***',
                            ]) .
                            $form->field($model, 'tempat_lahir')->textInput([
                                'placeholder' => 'Kota/Kab. Tempat Lahir',
                            ]) .
                            $form->field($model, 'tanggal_lahir')->widget(DatePicker::className(), [
                                'language' => 'id',
                                'options' => [
                                    'placeholder' => 'TTTT/BB/HH'
                                ],
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy/mm/dd'
                                ]
                            ]) .
                            $form->field($model, 'alamat_peserta')->textArea([
                                'placeholder' => 'Alamat Rumah Anda',
                            ]) .
                            $form->field($model, 'nama_sekolah')->widget(Select2::classname(), [
                                'data' => $sekolah,
                                'theme' => 'default',
                                'options' => [
                                    'placeholder' => '-- Pilih Sekolah --'
                                ],
                            ]) .
                            $form->field($model, 'guru_pendamping')->textInput([
                                'placeholder' => 'Tidak Wajib diisi, Cantumkan Gelar Jika Memiliki',
                            ]) .
                            $form->field($model, 'nip')->textInput([
                                'placeholder' => 'Gunakan Angka Saja',
                            ])
        ?>

        <div align="right">
            <?= Html::submitButton('Perbarui', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
</div>
