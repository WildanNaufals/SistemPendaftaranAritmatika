<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 22:25:41
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Posting Berita';
$this->params['breadcrumbs'][] = ['label' => 'Admin Pusat', 'url' => ['/admin-pusat']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4>
        <i class="fa fa-bullhorn"></i> <?= Html::encode($this->title) ?>
    </h4>

    <p>
        <?= Html::a('Tambah Berita', ['tambah-post'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="table-responsive">
    <?php Pjax::begin(); ?>    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                // 'author',
                'date',
                'title',
                'content:ntext',
                // 'status',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                        'title' => 'Lihat Berita',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                        'title' => 'Perbarui Berita',
                            ]);
                        },
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url ='view-post?id='.$model->id;
                            return $url;
                        }
                        if ($action === 'update') {
                            $url ='update-post?id='.$model->id;
                            return $url;
                        }
                    }
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
</div>
