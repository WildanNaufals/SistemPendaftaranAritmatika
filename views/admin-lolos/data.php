<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 23:57:26
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 04:24:38
 */

use yii\helpers\Html;

$this->title = $label[$a];
$this->params['breadcrumbs'][] = ['label' => 'Admin Lolos', 'url' => ['/admin-lolos']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4 class="page--header">
        <?= Html::encode($this->title) ?>
    </h4>

    <?php if ($a <= 1) {
        echo $this->render('_table1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    } elseif ($a >= 2) {
        echo $this->render('_table2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    } ?>
</div>