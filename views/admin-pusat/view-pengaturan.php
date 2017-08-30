<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-17 13:18:29
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 23:06:51
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Rincian Pengaturan Sistem';
$this->params['breadcrumbs'][] = ['label' => 'Admin Pusat', 'url' => ['/admin-pusat']];
$this->params['breadcrumbs'][] = ['label' => 'Pengaturan Sistem', 'url' => ['/admin-pusat/pengaturan']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4>
        <?= Html::encode($this->title) ?>
    </h4>
    <p>
        <?= Html::a('Perbarui', ['update-pengaturan', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete-pengaturan', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Yakin?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'judul',
            'konten:ntext',
            'status',
            'bantuan:ntext',
        ],
    ]) ?>
</div>