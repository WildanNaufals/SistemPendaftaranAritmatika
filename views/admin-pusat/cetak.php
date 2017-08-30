<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 17:06:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 23:11:01
 */

use yii\helpers\Html;

$this->title = 'Cetak Data';
$this->params['breadcrumbs'][] = ['label' => 'Admin Pusat', 'url' => ['/admin-pusat']];
$this->params['breadcrumbs'][] = $this->title;

$color = ['default', 'primary', 'warning', 'danger', 'success', 'primary', 'danger']

?>

<div class="square">
	<h4><i class="fa fa-print"></i> Cetak Absensi</h4>
	<div class="row">
		<?php for ($i=0; $i < 2; $i++) { ?>
			<div class="col-sm-6">
			<?php for ($j=0; $j < 7; $j++) { ?>
				<?= Html::a('ABSENSI ' . $tingkat[$i] . ' ' . $lokasi[$j], [
					'/cetak-data/absensi',
					'lokasi' => $lokasi[$j],
					'tingkat' => $tingkat[$i]
				], ['class' => 'btn btn-'.$color[$j], 'style' => 'margin: 4px']); ?>
			<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>