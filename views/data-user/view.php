<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataUser */
?>
<div class="data-user-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'status',
            'created_at',
            'updated_at',
            'foto',
            'pengumuman',
            'validasi:ntext',
            'menu',
        ],
    ]) ?>

</div>
