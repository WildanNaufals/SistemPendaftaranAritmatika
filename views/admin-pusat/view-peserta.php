<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-17 13:18:29
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 23:06:55
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Rincian Data Peserta';
$this->params['breadcrumbs'][] = ['label' => 'Admin Pusat', 'url' => ['/admin-pusat']];
$this->params['breadcrumbs'][] = ['label' => 'Data Semua Peserta', 'url' => ['/admin-pusat/peserta']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4>
        <?= Html::encode($this->title) ?>
    </h4>
<div class="table-responsive">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'no_peserta',
            'nisn',
            'nama',
            'hp:ntext',
            'tempat_lahir',
            'tanggal_lahir',
            'nama_sekolah',
            'alamat_peserta',
            'tingkat',
            'panlok',
            'jenis_pendaftaran',
            'guru_pendamping',
            'nip',
            'foto',
            'pengumuman',
            [
                'label' => 'Status Pendaftaran',
                'value' => ($model->status == 10) ? 'Sudah Divalidasi' : 'Menunggu Validasi'
            ],
            [
                'label' => 'Terdaftar Sejak',
                'value' => date('l, d M Y', $model->created_at)
            ],
            [
                'label' => 'Kode Kartu',
                'value' => ($model->validasi == '') ? 'Belum Mencetak Kartu' : $model->validasi
            ],
        ],
    ]) ?>
</div></div>
