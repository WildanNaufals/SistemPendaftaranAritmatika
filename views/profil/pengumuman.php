<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-10 09:51:56
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Pengumuman Babak Penyisihan Tingkat ' . ucwords(strtolower(Yii::$app->user->identity->tingkat));
$this->params['breadcrumbs'][] = ['label' => 'Profil', 'url' => ['/profil/saya']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
	<h4>
		<?= Html::encode($this->title); ?>
	</h4>
	<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p>Selamat, kepada para peserta yang <a class="alert-link">lolos ke babak semi final !!!</a> Ingat ya, <a class="alert-link">masih ada</a> babak semi final dan final menantimu. Semangatt...</p>

		<p>Bagi yang <a class="alert-link">belum lolos</a>, kalian jangan berkecil hati. Asah dan gali terus kemampuan kalian sehingga bakat dan kemampuan yang sudah kalian miliki menjadi semakin baik.</p>
    </div>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p>Untuk kamu yang <a class="alert-link">LOLOS</a></p>
				<?= (Yii::$app->akses->getPengaturan('Info Lolos Penyisihan', '1') !== null) ? Yii::$app->akses->getPengaturan('Info Lolos Penyisihan', '1')->konten : '' ?>
    </div>
<div class="table-responsive">
	<?php Pjax::begin(); ?>
		<?= GridView::widget([
	    	'dataProvider' => $dataProvider,
	    	'filterModel' => $searchModel,
	    	'columns' => [
	        	['class' => 'yii\grid\SerialColumn'],

		        'no_peserta',
		        'nama',

		        [
		        	'attribute' => 'nama_sekolah',
		        	'label' => 'Asal Sekolah',
		        ],
		        [
		        	'attribute' => 'pengumuman',
		        	'label' => 'Keterangan',
		        ]
	    	]
	    ]); ?>
	<?php Pjax::end(); ?>
</div>
<hr />
<?= Html::a('<i class="fa fa-download"></i> Unduh Pengumuman Lengkap', ['/PENGUMUMAN '.Yii::$app->user->identity->tingkat.'.pdf'], ['class' => 'btn btn-success', 'download' =>  'PENGUMUMAN '.Yii::$app->user->identity->tingkat.'.pdf']) ?>

</div>
