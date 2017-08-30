<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-17 13:18:29
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 22:59:23
 */

use yii\helpers\Html;

$this->title = 'Tambah Pengaturan';
$this->params['breadcrumbs'][] = ['label' => 'Admin Pusat', 'url' => ['/admin-pusat']];
$this->params['breadcrumbs'][] = ['label' => 'Pengaturan Sistem', 'url' => ['/admin-pusat/pengaturan']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4>
        <?= Html::encode($this->title) ?>
    </h4>

    <?= $this->render('_formPengaturan', [
        'model' => $model,
    ]) ?>
</div>