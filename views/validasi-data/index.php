<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 21:53:58
 */

use yii\helpers\Html;

$label = ['SMA Sudah Divalidasi', 'SMP Sudah Divalidasi', 'SMA Menunggu Divalidasi', 'SMP Menunggu Divalidasi', 'SMA Sudah Kadaluarsa', 'SMP Sudah Kadaluarsa', 'SMA Hari Ini', 'SMP Hari Ini'];
$color = ['success', 'warning', 'danger', 'info'];

$this->title = 'PORTAL VALIDASI';

?>

<div style="font-size: 150%">
	<div class="row">
		<?php for ($i=0; $i < 8 ; $i++) { ?>
			<div class="col-sm-6 col-xs-12">
				<div class="alert alert-<?= $color[$i/2] ?>" role="alert">
					<strong><?= $value[$i] ?> DATA</strong> - <?= $label[$i] ?>
					<?= Html::a('Selengkapnya <i class="fa fa-arrow-circle-right"></i>',
						['/validasi-data/valid', 'a' => $i, 'b' => $tingkat[$i%2], ['class' => 'alert-link']]) ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>