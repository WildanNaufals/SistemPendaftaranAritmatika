<?php

/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-17 19:26:25
 */

$this->title = 'Ubah Data';
$this->params['breadcrumbs'][] = ['label' => 'Profil', 'url' => ['/profil/saya']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
	<div class="col-md-8 col-xs-12">
		<div class="square">
	        <?= (Yii::$app->controller->action->id == 'ubah-foto') ? 
	        	$this->render('_formFoto', [
			        'ubah' => $ubah,
			    ]) :
		        $this->render('_formKataSandi', [
			        'ubah' => $ubah,
			    ]) 
		    ?>
		</div>
	</div>

	<div class="col-md-4 col-xs-12">
		<?= $this->render('_saya', [
	        'model' => $model,
	    ]) ?>
	</div>	
</div>