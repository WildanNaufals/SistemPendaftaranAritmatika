<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-17 13:16:27
 */

use yii\helpers\Html;

$this->title = 'Admin Pusat';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="square">
    <h4>
        <i class="fa fa-line-chart"></i> STATISTIK JUMLAH PENDAFTAR
    </h4>
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th></th>
				<th>SMA</th>
				<th>SMP</th>
				<th class="hidden-xs">TOTAL</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>PENDAFTAR <?= $label[9] ?></td>
				<td><?= $jumlah[18] ?></td>
				<td><?= $jumlah[19] ?></td>
				<td class="hidden-xs"><?= $jumlah[18] + $jumlah[19] ?></td>
				<td>
					<?= Html::a('<i class="fa fa-file-text"></i> Detail', ['statistik', 'lokasi' => $label[9]], ['class' => 'btn btn-xs btn-primary']) ?>
				</td>
			</tr>
			<tr>
				<td>PESERTA <?= $label[8] ?></td>
				<td><?= $jumlah[16] ?></td>
				<td><?= $jumlah[17] ?></td>
				<td class="hidden-xs"><?= $jumlah[16] + $jumlah[17] ?></td>
				<td><?= Html::a('<i class="fa fa-file-text"></i> Detail', ['statistik', 'lokasi' => $label[8]], ['class' => 'btn btn-xs btn-primary']) ?></td>
			</tr>
			<tr>
				<td>PESERTA <?= $label[7] ?></td>
				<td><?= $jumlah[14] ?></td>
				<td><?= $jumlah[15] ?></td>
				<td class="hidden-xs"><?= $jumlah[14] + $jumlah[15] ?></td>
				<td><?= Html::a('<i class="fa fa-file-text"></i> Detail', ['statistik', 'lokasi' => $label[7]], ['class' => 'btn btn-xs btn-primary']) ?>
				</td>
			</tr>
			<?php for ($i=0; $i < 7; $i++) { ?>
			<tr>
				<td>PANLOK <?= $label[$i] ?></td>
				<td><?= $jumlah[$i] ?></td>
				<td><?= $jumlah[$i+7] ?></td>
				<td class="hidden-xs"><?= $jumlah[$i] + $jumlah[$i+7] ?></td>
				<td><?= Html::a('<i class="fa fa-file-text"></i> Detail', ['statistik', 'lokasi' => $label[$i]], ['class' => 'btn btn-xs btn-primary']) ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
</div>
