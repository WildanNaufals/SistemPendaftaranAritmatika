<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-17 13:18:29
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 23:02:02
 */

use yii\helpers\Html;

$this->title = 'Perbarui Sekolah';
$this->params['breadcrumbs'][] = ['label' => 'Admin Pusat', 'url' => ['/admin-pusat']];
$this->params['breadcrumbs'][] = ['label' => 'Data Sekolah', 'url' => ['/admin-pusat/sekolah']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4>
        <?= Html::encode($this->title) ?>
    </h4>

    <?= $this->render('_formSekolah', [
        'model' => $model,
    ]) ?>
</div>