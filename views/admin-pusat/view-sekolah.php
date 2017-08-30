<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-17 13:18:29
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 23:07:05
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Rincian Data Sekolah';
$this->params['breadcrumbs'][] = ['label' => 'Admin Pusat', 'url' => ['/admin-pusat']];
$this->params['breadcrumbs'][] = ['label' => 'Data Sekolah', 'url' => ['/admin-pusat/sekolah']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4>
        <?= Html::encode($this->title) ?>
    </h4>

    <p>
        <?= Html::a('Perbarui', ['update-sekolah', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete-sekolah', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Yakin?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class="table-responsive">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'npsn',
            'tingkat',
            'nama_sekolah',
            'alamat_sekolah',
            'panlok',
        ],
    ]) ?>
    </div>
</div>
