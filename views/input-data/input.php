<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-21 04:38:11
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Pjax;
use app\models\Akses;

$this->title = ucwords(strtolower($title));
$this->params['breadcrumbs'][] = ['label' => 'Admin Input', 'url' => ['/input-data']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $pendaftaran   = new Akses;
if ($pendaftaran->pengaturan(2)->status != 1) {
    echo $this->render('../site/daftar3');
} else { ?>

<div class="square">
    <h4 class="text-center">
        <i class="fa fa-id-card"></i> FORM PENDAFTARAN OFFLINE <code>PANLOK <?= $lokasi ?></code> ARITMATIKA 2017
    </h4>
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
                    'title' => 'Biodata Diri',
                    'icon' => 'fa fa-user',
                    'content' => '
                        <div class="alert alert-info" role="alert">
                            Sebelum lanjut, Pastikan <strong>semua form</strong> telah terisi dengan benar.
                        </div>
                        <br><br>
                        ' .
                        $form->field($model, 'nisn')->textInput([
                                'autofocus' => true,
                                'placeholder' => 'NISN hanya dapat didaftarkan sekali',
                            ]) .
                        $form->field($model, 'nama')->textInput([
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
                        ])
                    ,
                    'buttons' => [
                        'next' => [
                            'title' => 'Lanjut <i class="fa fa-arrow-right"></i>', 
                            'options' => [
                                'class' => 'btn btn-primary btn-flat'
                            ],
                        ],
                    ],
                ],
                2 => [
                    'title' => 'Data Sekolah',
                    'icon' => 'fa fa-university',
                    'content' => '
                        <div class="alert alert-info" role="alert">
                            Untuk mempermudah pencarian Nama Sekolah, gunakan kata kunci NPSN Sekolah Anda. Jika <strong>Nama Sekolah Asal</strong> tidak tersedia. Mohon langsung menghubungi Admin Web <strong>0816658056 (WA / Telegram)</strong>.<br><br>
                            <strong>Nama & NIP guru pendamping</strong> tidak harus terisi. Jika ingin mencantumkan <strong>Nama Guru Pendamping</strong>, gunakan gelar yang beliau miliki serta gunakan EYD yang sesuai.
                        </div>
                        <br><br>' .
                        $form->field($model, 'tingkat')->widget(Select2::classname(), [
                            'data' => $tingkat,
                            'theme' => 'default',
                            'options' => [
                                'placeholder' => '-- Pilih Jenjang --'
                            ],                            
                        ]) .
                        $form->field($model, 'nama_sekolah')->widget(Select2::classname(), [
                            'data' => $sekolah,
                            'theme' => 'default',
                            'options' => [
                                'placeholder' => '-- Pilih Sekolah --'
                            ],
                        ]) .
                        $form->field($model, 'panlok')->widget(Select2::classname(), [
                            'data' => $panlok,
                            'theme' => 'default',
                            'options' => [
                                'placeholder' => '-- Pilih Panlok --'
                            ],
                        ]) .
                        $form->field($model, 'guru_pendamping')->textInput([
                                'placeholder' => 'Cantumkan Gelar Jika Memiliki',
                            ]) .
                        $form->field($model, 'nip')->textInput([
                                'placeholder' => 'Gunakan Angka Saja',
                            ])
                    ,
                    'buttons' => [
                        'prev' => [
                            'title' => '<i class="fa fa-arrow-left"></i> Kembali', 
                            'options' => [
                                'class' => 'btn btn-danger btn-flat'
                            ],
                        ],
                        'save' => [
                            'title' => ' <i class="fa fa-save"></i> Simpan', 
                            'options' => [
                                'class' => 'btn btn-primary btn-flat'
                            ],
                        ],
                    ],
                ],
            ],
            'complete_content' => '
                <div class="alert alert-warning" role="alert">
                    Saya telah membaca dan memahami segala syarat dan ketentuan yang berlaku di dalam Aritmatika 2017 serta saya menyatakan bahwa data yang saya masukkan pada Form Pendaftaran Online di atas adalah benar.
                </div>' .

                Html::submitButton('Daftar Sekarang', ['class' => 'btn btn-primary btn-block'])
        ];
    ?>

    <?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>

    <?php ActiveForm::end(); ?>
</div>

<?php } ?>

<div class="square">
    <h4>
        <?= Html::encode($this->title) ?>
    </h4>

    <?php Pjax::begin(); ?>    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'no_peserta',
                'nisn',
                'nama',
                'nama_sekolah',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span> Lihat', $url, [
                                        'class' => 'btn btn-xs btn-warning', 'title' => 'Lihat Data',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span> Perbarui', $url, [
                                        'class' => 'btn btn-xs btn-primary', 'title' => 'Perbarui Data',
                            ]);
                        },
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url ='view?a='.$model->id.'&b='.$model->auth_key;
                            return $url;
                        }
                        if ($action === 'update') {
                            $url ='update?a='.$model->id.'&b='.$model->auth_key;
                            return $url;
                        }
                    }
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>