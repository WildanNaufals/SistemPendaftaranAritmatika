<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 19:40:20
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = ucwords(strtolower($model->nama));
$this->params['breadcrumbs'][] = ['label' => 'Profil', 'url' => ['/profil/saya']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
	<div class="col-md-4 col-xs-12">
		<?= $this->render('_saya', [
	        'model' => $model,
	    ]) ?>
	</div>
	<div class="col-md-8 col-xs-12">
		<div class="square">
			<div class="btn-group">
				<?= Html::a('<i class="fa fa-trophy"></i> Download Pembahasan Penyisihan',
					['/profil/download-pembahasan', 'no_peserta' => $model->no_peserta, 'tingkat' => $model->tingkat],
					['class' => 'btn btn-primary btn-sm']
				) ?>
			</div>
			<hr />
			<div class="table-responsive">
	        <?= (Yii::$app->controller->action->id == 'saya') ?
	        '
			<h4>IDENTITAS SAYA</h4>
			<hr>
	        ' .
	        DetailView::widget([
		        'model' => $model,
		        'attributes' => [
		        	['label'  => 'NOMOR PESERTA', 'value' => $model->no_peserta],
		        	['label'  => 'NISN', 'value' => $model->nisn],
		        	[
		        		'label'  => 'TEMPAT, TANGGAL LAHIR',
		        		'value' => $model->tempat_lahir . ', ' . date('d M Y', strtotime($model->tanggal_lahir))
		        	],
		        	['label'  => 'NOMOR HP', 'value' => $model->hp],
		        	['label'  => 'ALAMAT', 'value' => $model->alamat_peserta],
		        	['label'  => 'JENIS PENDAFTARAN', 'value' => $model->jenis_pendaftaran],
		        	['label'  => 'NAMA GURU PENDAMPING', 'value' => $model->guru_pendamping],
		        	['label'  => 'NIP GURU PENDAMPING', 'value' => $model->nip],
		        	['label'  => 'PANLOK', 'value' => $model->panlok],
		        ],
		    ]) :
		    '
			<h4>IDENTITAS PESERTA</h4>
			<hr>
	        ' .
	        DetailView::widget([
                'model' => $model,
                'attributes' => [
                	'no_peserta',
                    'nisn',
                    'nama',
                    'hp:ntext',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'alamat_peserta',
                    'tingkat',
                    'panlok',
                    [
                    	'label' => 'Jenis Pendaftaran',
                    	'value' => str_replace('_', '', $model->jenis_pendaftaran)
                    ],
                    'guru_pendamping',
                    'nip',
                    [
                    	'label' => 'Kode Akses',
                    	'value' => substr($model->no_peserta, -4).substr($model->nisn, 1, 3).substr($model->nisn, 2, 3),
                    ]
                ],
            ]) ?>
		</div></div>
	</div>
</div>
