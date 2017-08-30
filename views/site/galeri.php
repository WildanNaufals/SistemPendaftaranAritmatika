<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-06 10:12:12
 */

use yii\helpers\Html;

$this->title = 'Galeri';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4 class="page--header">
        GALERI TAHUN LALU
    </h4>

    <div class="text-center">
        <?php
        $items = [];

        for ($i=0; $i < 10; $i++) { 
            $items[$i] = [
                'url' => Yii::$app->request->baseUrl . '/img/galeri/galeri'.($i+1).'.png',
                'src' => Yii::$app->request->baseUrl . '/img/galeri/_galeri'.($i+1).'.png',
                'options' => [
                    'title' => 'Galeri Aritmatika '.($i+1)
                ]
            ];
        } ?>

        <?= dosamigos\gallery\Gallery::widget([
            'items' => $items,
        ]); ?>
    </div>
</div>