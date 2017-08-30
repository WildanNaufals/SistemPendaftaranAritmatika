<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-17 13:18:29
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-17 14:10:01
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Data Sertifikat';
$this->params['breadcrumbs'][] = ['label' => 'Admin Pusat', 'url' => ['/admin-pusat']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4>
        <i class="fa fa-certificate"></i> <?= Html::encode($this->title) ?>
    </h4>

    <div class="table-responsive">
    <?php Pjax::begin(); ?>    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                  'attribute' => 'nama',
                  'format' => 'raw',
                  'value' => function($model) {
                    return $model->jenis_pendaftaran === 'OFFLINE' ? '<span style="color:#b71c1c">'.strtoupper($model->nama).'</span>' : strtoupper($model->nama);
                  }
                ],
                'nama_sekolah',
                'jenis_pendaftaran',
                [
                  'attribute' => 'guru_pendamping',
                  'format' => 'raw',
                  'value' => function($model) {
                    return $model->guru_pendamping;
                  }
                ],
                [
                  'attribute' => 'tingkat',
                  'value' => function($model) {
                    return $model->tingkat === 'MENENGAH ATAS' ? 'SMA' : 'SMP';
                  }
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
</div>
