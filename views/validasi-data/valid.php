<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 21:57:41
 */

use yii\helpers\Html;

$this->title = $label[$a] ;
$this->params['breadcrumbs'][] = ['label' => 'Admin Validasi', 'url' => ['/validasi-data']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4 class="page--header">
        <?= Html::encode($this->title) ?>
    </h4>
<div class="table-responsive">

    <?php if ($a < 2 || $a >= 6) {
        echo $this->render('_table1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } elseif ($a >= 2 && $a < 4) {
        echo $this->render('_table2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } elseif ($a >= 4 && $a < 6) {
        echo $this->render('_table3', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } ?>
</div>
</div>
