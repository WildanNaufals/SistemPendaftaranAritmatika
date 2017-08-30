<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-18 02:18:49
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-19 23:51:33
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
<?php Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no_peserta',
            'nama',
            'pengumuman',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fa fa-circle"></span> Default', $url, [
                        'class' => 'btn btn-warning btn-xs', 'data-toggle' => 'tooltip',  'title' => 'Default ' . $model->nama,
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-heartbeat"></span> Tidak Lolos', $url, [
                        'class' => 'btn btn-danger btn-xs', 'data-toggle' => 'tooltip',  'title' => 'Tidak Lolos ' . $model->nama,
                        ]);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = ['aksi', 'a' => $model->id, 'b' => $model->auth_key, 'c' => 'sma', 'd' => '-'];
                        return $url;
                    }
                    if ($action === 'update') {
                        $url = ['aksi', 'a' => $model->id, 'b' => $model->auth_key, 'c' => 'sma', 'd' => 'TIDAK LOLOS'];
                        return $url;
                    }
                }
            ],
        ],
    ]);

Pjax::end(); ?>
</div>
</div>
