<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-06 09:46:23
 */

use yii\helpers\Html;

?>

<div class="square text-center">
	<div class="foto--profil">
		<?= (Yii::$app->controller->action->id == 'saya') ?
			'<div class="foto--utama">'.
				Html::a('
					<img src="' . Yii::$app->request->baseUrl . '/img/user/' . $model->foto . '"
						class="img-thumbnail foto--aktif"
			            alt="' . strtoupper($model->nama) . '">
					<div class="tombol--ganti">
						<span><i class="fa fa-camera"></i></span><br>
						UBAH FOTO
					</div>',
					['/profil/ubah-foto']
				) : '
			<div class="foto--utama no--hover">
				<img src="' . Yii::$app->request->baseUrl . '/img/user/' . $model->foto . '"
					class="img-thumbnail foto--aktif"
		            alt="' . strtoupper($model->nama) . '">
				<div class="tombol--ganti">
					<span><i class="fa fa-camera"></i></span><br>
					UBAH FOTO
				</div>'
			?>
		</div>
	</div>

    <h3 style="margin: 15px 0 0"><?= strtoupper($model->nama) ?></h3>        
    <span style="margin: 10px 0"><?= strtoupper($model->nama_sekolah) ?></span>
	<p>
		<small>Terdaftar sejak <?= date('d M Y', $model->created_at) ?></small>
	</p>
    <hr>
	
	<?php if (Yii::$app->user->identity->menu == 0) { ?>
		<?= Html::a('<i class="fa fa-id-card"></i> Cetak Kartu Peserta',
			['/profil/cetak-kartu'],
			['class' => 'btn btn-danger btn-sm btn-block']
		) ?>
		<?= Html::a('<i class="fa fa-download"></i> Download Materi Belajar',
			['/profil/download'],
			['class' => 'btn btn-primary btn-sm btn-block']
		) ?>
		<?= Html::a('<i class="fa fa-line-chart"></i> Cek Jumlah Pendaftar',
			['/profil/cek-jumlah-pendaftar'],
			['class' => 'btn btn-warning btn-sm btn-block']
		) ?>
	<?php } ?>

	<?php if (Yii::$app->controller->id === 'input-data') {
		echo Html::a('<i class="fa fa-id-card"></i> Cetak Kartu Peserta',
            ['cetak-kartu', 'a' => $model->id, 'b' => $model->auth_key],
            ['class' => 'btn btn-default btn-sm btn-block']
        );
        echo Html::a('<i class="fa fa-pencil"></i> Perbarui Data',
            ['update', 'a' => $model->id, 'b' => $model->auth_key],
            ['class' => 'btn btn-primary btn-sm btn-block']
        );
        echo Html::a('<i class="fa fa-trash"></i> Hapus Data',
            ['delete', 'a' => $model->id, 'b' => $model->auth_key], [
                'class' => 'btn btn-danger btn-sm btn-block',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]
        );
    } elseif (Yii::$app->controller->id === 'profil') {
    	echo Html::a('<i class="fa fa-lock"></i> Ubah Kata Sandi',
			['/profil/ubah-kata-sandi'],
			['class' => 'btn btn-default btn-sm btn-block']
		);
    } ?>
</div>