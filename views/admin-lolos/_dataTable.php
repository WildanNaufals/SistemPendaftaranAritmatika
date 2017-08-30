<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-18 02:18:49
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-09 23:14:34
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

?>

<div class="alert alert-danger visible--mobile" role="alert">
    Maaf, mohon ubah tampilan anda ke tampilan <strong>landscape</strong> atau berpindah ke Dekstop, karena ukuran layar anda kurang dari batas minimum ukuran tampilan yang kami sediakan.
</div>
<div class="hidden--mobile">
<div class="table-responsive">
<?php Pjax::begin(); ?>    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'no_peserta',
        'nama',
        'pengumuman',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a('<span class="fa fa-circle"></span> Default', $url, [
                    'class' => 'btn btn-warning btn-xs', 'data-toggle' => 'tooltip',  'title' => 'Default ' . $model->nama,
                    ]);
                },
                'update' => function ($url, $model) {
                    return Html::a('<span class="fa fa-trophy"></span> Lolos', $url, [
                    'class' => 'btn btn-success btn-xs', 'data-toggle' => 'tooltip',  'title' => 'Lolos ' . $model->nama,
                    ]);
                },
                'delete' => function ($url, $model) {
                    return Html::a('<span class="fa fa-heartbeat"></span> Tidak Lolos', $url, [
                    'class' => 'btn btn-danger btn-xs', 'data-toggle' => 'tooltip',  'title' => 'Tidak Lolos ' . $model->nama,
                    ]);
                },
            ],
            'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                	if ($model->tingkat == 'MENENGAH ATAS') {
                    	$url = ['aksi', 'a' => $model->id, 'b' => $model->auth_key, 'c' => 'sma', 'd' => '-'];
                    } else {
                    	$url = ['aksi', 'a' => $model->id, 'b' => $model->auth_key, 'c' => 'smp', 'd' => '-'];
                    }
                    return $url;
                }
                if ($action === 'update') {
                	if ($model->tingkat == 'MENENGAH ATAS') {
                    	$url = ['aksi', 'a' => $model->id, 'b' => $model->auth_key, 'c' => 'sma', 'd' => 'LOLOS'];
                    } else {
                    	$url = ['aksi', 'a' => $model->id, 'b' => $model->auth_key, 'c' => 'smp', 'd' => 'LOLOS'];
                    }
                    return $url;
                }
                if ($action === 'delete') {
                	if ($model->tingkat == 'MENENGAH ATAS') {
                    	$url = ['aksi', 'a' => $model->id, 'b' => $model->auth_key, 'c' => 'sma', 'd' => 'TIDAK LOLOS'];
                    } else {
                    	$url = ['aksi', 'a' => $model->id, 'b' => $model->auth_key, 'c' => 'smp', 'd' => 'TIDAK LOLOS'];
                    }
                    return $url;
                }
            }
        ],
    ],
]); ?>
<?php Pjax::end(); ?>
</div></div>
