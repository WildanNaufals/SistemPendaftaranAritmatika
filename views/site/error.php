<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 12:06:58
 */

use yii\helpers\Html;

$this->title = '#404';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <div class="text-center">
        <div class="img--404">
            <?= Html::img('@web/img/pac-404.png'); ?>
        </div>
        <div class="head--404">
            Error <span>(#404)</span>
        </div>
        <div class="body--404">
            Maaf, halaman yang anda cari belum tersedia. Kesalahan ini mungkin terjadi karena anda salah dalam memasukkan alamat url. Mohon coba kembali atau kembali ke <a href="<?= Yii::$app->homeUrl ?>"><strong>Beranda</strong></a>.
        </div>
    </div>
</div>
