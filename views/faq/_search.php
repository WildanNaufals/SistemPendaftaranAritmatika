<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Faq_Search */
/* @var $form yii\widgets\ActiveForm */
?>

<h4><i class="fa fa-search"></i> Cari Pertanyaan</h4>
<form method="get" class="hidden-xs" action="<?= Yii::$app->homeUrl ?>faq/index" autocomplete="off">
	<div class="row">
		<div class="input-group col-sm-8 col-sm-offset-2">
		    <input type="text" class="form-control" placeholder="Masukkan Pertanyaan" name="value">
		    <span class="input-group-btn">
				<button class="btn btn-primary" type="submit">CARI</button>
			</span>
		</div>
		<div class="clearfix"></div>
	</div>
</form>
<form method="get" class="visible-xs" action="<?= Yii::$app->homeUrl ?>faq/index">
	<div class="row">
		<div class="input-group col-xs-10 col-xs-offset-1">
		    <input type="text" class="form-control" placeholder="Masukkan Pertanyaan >> ENTER" name="value">
		</div>
		<div class="clearfix"></div>
	</div>
</form>
