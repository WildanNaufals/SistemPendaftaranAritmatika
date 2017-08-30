<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-17 13:18:29
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-06 09:47:46
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Cek Jumlah Pendaftar';
$this->params['breadcrumbs'][] = ['label' => 'Profil', 'url' => ['/profil/saya']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4>
        <i class="fa fa-id-badge"></i> <?= Html::encode($this->title) ?>
    </h4>
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>SMA</th>
                <th>SMP</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>PENDAFTAR <?= $label[8] ?></td>
                <td><?= $jumlah[16] ?></td>
                <td><?= $jumlah[17] ?></td>
                <td><?= $jumlah[16] + $jumlah[17] ?></td>
            </tr>
            <tr>
                <td>PESERTA <?= $label[7] ?></td>
                <td><?= $jumlah[14] ?></td>
                <td><?= $jumlah[15] ?></td>
                <td><?= $jumlah[14] + $jumlah[15] ?></td>
            </tr>
            <?php for ($i=0; $i < 7; $i++) { ?>
            <tr>
                <td>PANLOK <?= $label[$i] ?></td>
                <td><?= $jumlah[$i] ?></td>
                <td><?= $jumlah[$i+7] ?></td>
                <td><?= $jumlah[$i] + $jumlah[$i+7] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div></div>
