<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 12:55:37
 */

use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = 'Cara Crop Image';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4 class="page--header">
        <?= $this->title ?>
    </h4>

    <ol>
        <li>Kunjungi <a href="http://imagesplitter.net/" target="_blank">http://imagesplitter.net/</a></li>
        <li>Ikuti tutorial bergambar di bawah ini:
    </ol>
    <div class="row text-center">
        <div class="col-md-4" style="margin-bottom: 40px;">
            LANGKAH 1
            <?= Html::img('@web/img/CaraCropImage1.gif', ['class' => 'img-thumbnail', 'alt' => 'CaraCropImage1.gif']); ?>
            <p style="margin-top: 20px;">
                Persiapkan gambar/foto yang akan diubah ukuran atau resolusinya terlebih dahulu.
            </p>
            <?php Modal::begin([
                'header' => '<h4>' .
                    Html::a('<i class="fa fa-download"></i> Unduh Gambar',
                        ['/img/CaraCropImage1.gif'],
                        ['download' => 'CaraCropImage1.gif']
                    ) . '</h4>',
                'size' => 'modal-lg',
                'toggleButton' => [
                    'label' => '<i class="fa fa-arrows-alt"></i> Tampilkan Penuh',
                    'class' => 'btn btn-primary btn-flat',
                    'style' => 'margin-top: 20px;'
                ],
            ]);

            echo Html::img('@web/img/CaraCropImage1.gif', ['class' => 'img-thumbnail', 'alt' => 'CaraCropImage1.gif']);

            Modal::end(); ?>
        </div>

        <div class="col-md-4" style="margin-bottom: 40px;">
            LANGKAH 2
            <?= Html::img('@web/img/CaraCropImage2.gif', ['class' => 'img-thumbnail', 'alt' => 'CaraCropImage2.gif']); ?>
            <p style="margin-top: 20px;">
                Jika ukuran gambar/foto lebih dari <code>500px*500px</code> dan daerah <em>crop</em> tidak dapat dijangkau lakukan cara ini sebelum ke langkah selanjutnya, jika tidak (daerah <em>crop</em> masih dijangkau) lanjutkan ke langkah ke 3.
            </p>
            <?php Modal::begin([
                'header' => '<h4>' .
                    Html::a('<i class="fa fa-download"></i> Unduh Gambar',
                        ['/img/CaraCropImage2.gif'],
                        ['download' => 'CaraCropImage2.gif']
                    ) . '</h4>',
                'size' => 'modal-lg',
                'toggleButton' => [
                    'label' => '<i class="fa fa-arrows-alt"></i> Tampilkan Penuh',
                    'class' => 'btn btn-primary btn-flat',
                    'style' => 'margin-top: 20px;'
                ],
            ]);

            echo Html::img('@web/img/CaraCropImage2.gif', ['class' => 'img-thumbnail', 'alt' => 'CaraCropImage2.gif']);

            Modal::end(); ?>
        </div>

        <div class="col-md-4" style="margin-bottom: 40px;">
            LANGKAH 3
            <?= Html::img('@web/img/CaraCropImage3.gif', ['class' => 'img-thumbnail', 'alt' => 'CaraCropImage1.gif']); ?>
            <p style="margin-top: 20px;">
                Proses pengubahan resolusi gambar, usahakan daerah yang akan di<em>crop</em> masih di dalam jangkauan <code>500px*500px</code>.
            </p>
            <?php Modal::begin([
                'header' => '<h4>' .
                    Html::a('<i class="fa fa-download"></i> Unduh Gambar',
                        ['/img/CaraCropImage3.gif'],
                        ['download' => 'CaraCropImage3.gif']
                    ) . '</h4>',
                'size' => 'modal-lg',
                'toggleButton' => [
                    'label' => '<i class="fa fa-arrows-alt"></i> Tampilkan Penuh',
                    'class' => 'btn btn-primary btn-flat',
                    'style' => 'margin-top: 20px;'
                ],
            ]);

            echo Html::img('@web/img/CaraCropImage3.gif', ['class' => 'img-thumbnail', 'alt' => 'CaraCropImage3.gif']);

            Modal::end(); ?>
        </div>
    </div>
</div>