<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-15 11:09:46
 */

use yii\helpers\Html;

$this->title = 'PANLOK';
?>

<div class="box box-danger content">
    <h2 class="page-header">
        <?= $this->title ?>
    </h2>

    <div class="invoice-info informasi">
    	<table class="table table-striped">
			<thead>
				<tr>
					<th>NAMA</th>
					<th>LOKASI</th>
					<th>MAPS</th>
				</tr>
			</thead>
			<tbody>
                <?php for ($i=0; $i < 7; $i++) { ?>
				<tr>
                    <td><?= $data->panlok($i) ?></td>
                    <td><?= $data->lokasi($i) ?></td>
                    <td><?= Html::a('<i class="fa fa-map"></i> Lihat Peta', ['maps', 'id' => $i], ['class' => 'btn btn-primary btn-sm']) ?></td>
				</tr>
                <?php } ?>
			</tbody>
		</table>
	</div>
</div>