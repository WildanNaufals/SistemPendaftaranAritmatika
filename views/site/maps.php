<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-15 10:27:08
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-17 14:08:34
 */

$this->title = 'MAPS PANLOK ' . $panlok;
$this->params['breadcrumbs'][] = ucwords($this->title);

?>

<div class="square">
    <h4 class="page--header">
        <i class="fa fa-map"></i> <?= $this->title ?>
    </h4>
	
	<?= ($maps == '') ? '
		LOKASI BELUM TERSEDIA
	' : '
    	<iframe src="'. $maps .'" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
    ' ?>
</div>

