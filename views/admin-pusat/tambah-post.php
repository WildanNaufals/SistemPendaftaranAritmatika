<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-17 13:18:29
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 23:00:16
 */

use yii\helpers\Html;

$this->title = 'Tambah Berita';
$this->params['breadcrumbs'][] = ['label' => 'Admin Pusat', 'url' => ['/admin-pusat']];
$this->params['breadcrumbs'][] = ['label' => 'Posting Berita', 'url' => ['/admin-pusat/post']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4>
        <?= Html::encode($this->title) ?>
    </h4>

    <?= $this->render('_formPost', [
        'model' => $model,
    ]) ?>
</div>