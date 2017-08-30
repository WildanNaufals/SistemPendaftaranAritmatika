<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 18:23:32
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-06 08:52:36
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'no_peserta',
            [
                'attribute' => 'nisn',
                'label' => 'NISN',
                'value' => 'nisn',
            ],
            [
                'attribute' => 'nama',
                'label' => 'NAMA LENGKAP',
                'value' => 'nama',
            ],            [                'attribute' => 'nama_sekolah',                'label' => 'SEKOLAH',                'value' => 'nama_sekolah',            ],
            // 'hp:ntext',
            // 'tanggal_lahir',
            // 'nama_sekolah',
            // 'panlok',
            // 'jenis_pendaftaran',

            [
                'attribute' => 'created_at',
                'label' => 'TANGGAL DAFTAR',
                'format' => 'datetime',
                'value' => 'created_at',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fa fa-id-card"></span> Lihat', $url, [
                                    'class' => 'btn btn-primary btn-xs', 'data-toggle' => 'tooltip',  'title' => 'Lihat Rincian ' . $model->nama,
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-close"></span> Batalkan', $url, [
                                    'class' => 'btn btn-danger btn-xs', 'data-toggle' => 'tooltip',  'title' => 'Batalkan ' . $model->nama,
                        ]);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = ['view', 'a' => $model->id, 'b' => $model->auth_key];
                        return $url;
                    }
                    if ($action === 'update') {
                        $url = ['batal', 'a' => $model->id, 'b' => $model->auth_key];
                        return $url;
                    }
                }
            ],
        ],
    ]);

Pjax::end(); ?>
