<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 19:04:00
 */

use yii\helpers\Html;

$this->title = 'PORTAL INPUT';

?>

<div class="content">
	<div class="row">
		<div class="col-sm-6">
			<?= Html::a('SMA KEDU', ['input-data/input', 'a' => 'kedu', 'b' => 'menengah atas'], ['class' => 'btn btn-lg btn-danger btn-block']); ?>
			<?= Html::a('SMA PATI', ['input-data/input', 'a' => 'pati', 'b' => 'menengah atas'], ['class' => 'btn btn-lg btn-default btn-block']); ?>
			<?= Html::a('SMA PEKALONGAN', ['input-data/input', 'a' => 'pekalongan', 'b' => 'menengah atas'], ['class' => 'btn btn-lg btn-success btn-block']); ?>
			<?= Html::a('SMA PURWOKERTO', ['input-data/input', 'a' => 'purwokerto', 'b' => 'menengah atas'], ['class' => 'btn btn-lg btn-warning btn-block']); ?>
			<?= Html::a('SMA SEMARANG', ['input-data/input', 'a' => 'semarang', 'b' => 'menengah atas'], ['class' => 'btn btn-lg btn-primary btn-block']); ?>
			<?= Html::a('SMA SURAKARTA', ['input-data/input', 'a' => 'surakarta', 'b' => 'menengah atas'], ['class' => 'btn btn-lg btn-info btn-block']); ?>
			<?= Html::a('SMA YOGYAKARTA', ['input-data/input', 'a' => 'yogyakarta', 'b' => 'menengah atas'], ['class' => 'btn btn-lg btn-danger btn-block']); ?>
		</div>
		<div class="clearfix visible-xs-block" style="margin-top: 5px"></div>
		<div class="col-sm-6">
			<?= Html::a('SMP KEDU', ['input-data/input', 'a' => 'kedu', 'b' => 'menengah pertama'], ['class' => 'btn btn-lg btn-danger btn-block']); ?>
			<?= Html::a('SMP PATI', ['input-data/input', 'a' => 'pati', 'b' => 'menengah pertama'], ['class' => 'btn btn-lg btn-default btn-block']); ?>
			<?= Html::a('SMP PEKALONGAN', ['input-data/input', 'a' => 'pekalongan', 'b' => 'menengah pertama'], ['class' => 'btn btn-lg btn-success btn-block']); ?>
			<?= Html::a('SMP PURWOKERTO', ['input-data/input', 'a' => 'purwokerto', 'b' => 'menengah pertama'], ['class' => 'btn btn-lg btn-warning btn-block']); ?>
			<?= Html::a('SMP SEMARANG', ['input-data/input', 'a' => 'semarang', 'b' => 'menengah pertama'], ['class' => 'btn btn-lg btn-primary btn-block']); ?>
			<?= Html::a('SMP SURAKARTA', ['input-data/input', 'a' => 'surakarta', 'b' => 'menengah pertama'], ['class' => 'btn btn-lg btn-info btn-block']); ?>
			<?= Html::a('SMP YOGYAKARTA', ['input-data/input', 'a' => 'yogyakarta', 'b' => 'menengah pertama'], ['class' => 'btn btn-lg btn-danger btn-block']); ?>
		</div>
	</div>
</div>