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

$this->title = 'Update Data Offline';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4 class="text-center">
        <i class="fa fa-id-card"></i> FORM UPDATE BIODATA OFFLINE ARITMATIKA 2017 VERSI MOBILE
    </h4>

    <div class="info--daftar text-center hidden-xs">
        MOHON MAAF ATAS KETIDAKNYAMANANNYA, KARENA ANDA MENGGUNAKAN TAMPILAN NON MOBILE, MAKA MOHON GUNAKAN FORM UPDATE BIODATA OFFLINE ARITMATIKA 2017 <?= Html::a('DI SINI', ['offline', 'id' => 0]) ?>
    </div>

    <div class="visible-xs">
        <?php $form = ActiveForm::begin([
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

        <?php
            $wizard_config = [
                'id' => 'daftar',
                'steps' => [
                    1 => [
                        'title' => 'Petunjuk Pengisian Formulir',
                        'icon' => 'fa fa-file-text',
                        'content' => '
                            <div class="alert alert-info info--daftar" role="alert">
        <p>
            Sebelum lanjut, Pastikan <strong>semua form</strong> telah terisi dengan benar.
        </p>
        <p>
            Untuk mempermudah pencarian Nama Sekolah, gunakan kata kunci NPSN Sekolah Anda. Jika <strong>Nama Sekolah Asal</strong> tidak tersedia. Mohon langsung menghubungi Admin Web <strong>0816658056 (WA / Telegram)</strong>.
        </p>
        <p>
            <strong>Nama & NIP guru pendamping</strong> tidak harus terisi. Jika ingin mencantumkan <strong>Nama Guru Pendamping</strong>, gunakan gelar yang beliau miliki serta gunakan EYD yang sesuai.
        </p>
        <p>
            Foto wajib berupa foto persegi ( <strong>lebar = tinggi</strong> ) serta berukuran maksimal <strong>200 KB</strong>. Sangat <strong>DISARANKAN</strong> menggunakan foto berukuran <strong>500 px * 500 px</strong>.
        </p>
        <p>
            Jika mengalami kesulitan mengubah ukuran dan resolusi gambar, ikuti panduan cara mengubah ukuran gambar ' .
            Html::a('DI SINI', ['/site/cara-crop-image'], ['class' => 'alert-link', 'target' => '_blank']) . '.
        </p>
        <p>
            <strong>NISN</strong> hanya dapat didaftarkan <strong>SEKALI</strong> dan berlaku untuk <strong>SATU PENDAFTAR</strong>.
        </p>
        <p>
            Gunakan <strong>Kata Sandi</strong> yang menurut anda aman, bila perlu catat kata sandi anda dan simpan di tempat yang anda anggap aman. Kata sandi dapat anda gunakan untuk masuk ke sistem Aritmatika 2017 dan menggunakan semua fasilitas yang telah kami sediakan.
        </p>
                            </div>
                            ' 
                        ,
                        'buttons' => [
                            'next' => [
                                'title' => 'Lanjut <i class="fa fa-arrow-right"></i>', 
                                'options' => [
                                    'class' => 'btn btn-primary btn-sm'
                                ],
                            ],
                        ],
                    ],
                    2 => [
                        'title' => 'Form Pendaftaran',
                        'icon' => 'fa fa-id-card',
                        'content' => 
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
                                'placeholder' => 'Cantumkan Gelar Jika Memiliki',
                            ]) .
                            $form->field($model, 'nip')->textInput([
                                'placeholder' => 'Gunakan Angka Saja',
                            ]) .
                            $form->field($model, 'nisn')->textInput([
                                'placeholder' => 'NISN hanya dapat didaftarkan sekali',
                            ]) .
                            $form->field($model, 'password')->passwordInput() .
                            $form->field($model, 'ulangi_password')->passwordInput()
                        ,
                        'buttons' => [
                            'prev' => [
                                'title' => '<i class="fa fa-arrow-left"></i> Kembali', 
                                'options' => [
                                    'class' => 'btn btn-danger btn-sm'
                                ],
                            ],
                            'save' => [
                                'title' => ' <i class="fa fa-save"></i> Simpan', 
                                'options' => [
                                    'class' => 'btn btn-primary btn-sm'
                                ],
                            ],
                        ],
                    ],
                ],
                'complete_content' => '
                    <div class="alert alert-warning" role="alert">
                        Saya telah membaca dan memahami segala syarat dan ketentuan yang berlaku di dalam Aritmatika 2017 serta saya menyatakan bahwa data yang saya masukkan pada Form di atas adalah benar. Apabila di kemudian hari diketahui bahwa data diri tersebut tidak benar, maka saya siap menerima konsekuensi pembatalan sebagai peserta Aritmatika 2017 atau didiskualifikasi dari acara Aritmatika 2017.
                    </div>' .

                    Html::submitButton('Perbarui Sekarang', ['class' => 'btn btn-primary btn-block'])
            ];
        ?>

        <?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>