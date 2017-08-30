<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 23:57:26
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 03:21:30
 */

use yii\helpers\Html;

$label = ['SMA LOLOS', 'SMP LOLOS', 'SMA TIDAK LOLOS', 'SMP TIDAK LOLOS'];

$this->title = 'Admin Lolos - Tidak';

?>

<div class="square">
	<div class="row">
		<?php for ($i=0; $i < 2 ; $i++) { ?>
			<div class="col-sm-6 col-md-3 col-xs-12">
				<blockquote>
					<p><?= $lolos[$i] ?></p>
					<footer><?= $label[$i] ?>
						<cite>
							<?= Html::a('Selengkapnya <i class="fa fa-arrow-circle-right"></i>',
						['/admin-lolos/data', 'a' => $i, 'b' => $tingkat[$i]]) ?>
						</cite>
					</footer>
				</blockquote>
			</div>
			<div class="col-sm-6 col-md-3 col-xs-12">
				<blockquote>
					<p><?= $tidak[$i] ?></p>
					<footer><?= $label[$i+2] ?>
						<cite>
							<?= Html::a('Selengkapnya <i class="fa fa-arrow-circle-right"></i>',
						['/admin-lolos/data', 'a' => $i+2, 'b' => $tingkat[$i]]) ?>
						</cite>
					</footer>
				</blockquote>
			</div>
		<?php } ?>
	</div>

	<div ></div>

	<div class="btn-group" role="group" aria-label="..." style="margin: 32px 0;">
		<?= Html::a('Semua Data', ['index', 'id' => 'all'], ['class' => 'btn btn-default']); ?>
		<?= Html::a('Data SMA', ['index', 'id' => 'sma'], ['class' => 'btn btn-default']); ?>
		<?= Html::a('Data SMP', ['index', 'id' => 'smp'], ['class' => 'btn btn-default']); ?>
	</div>
	
	<?= $this->render('_dataTable', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]); ?>
</div>