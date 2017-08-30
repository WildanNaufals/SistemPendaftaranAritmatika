<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-09 12:53:02
 */

use yii\helpers\Html;

?>
<div class="footer--outline"></div>
<div class="footer--atas">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-12">
                <h5>Sosial Media</h5>
                <table>
                    <tr><td><strong>Instagram</strong></td><td><a href="https://instagram.com/aritmatika2017" target="_blank">aritmatika2017</a></td></tr>
                    <tr><td><strong>Facebook</strong></td><td><a href="https://www.facebook.com/aritmatika2017" target="_blank">Aritmatika Jilid VI</a></td></tr>
                    <tr><td><strong>Twitter</strong></td><td><a href="https://twitter.com/aritmatika2017" target="_blank">aritmatika2017</a></td></tr>
                    <tr><td><strong>Line</strong></td><td><a href="http://line.me/ti/p/~yyc8713c" target="_blank">@yyc8713c</a></td></tr>
                </table>
            </div>
            <div class="col-sm-3 col-xs-12">
                <h5>Download</h5>
                <ul>
                    <li>
                        <?= Html::a('Materi', ['/site/download-materi']); ?>
                    </li>
                    <li>
                        <?= Html::a('Berkas', ['/site/download']); ?>
                    </li>
                    <li>
                        <?= Html::a('Form Pendaftaran Offline', ['/download/FORM PENDAFTARAN OFFLINE UKURAN KERTAS A4.pdf'], ['download' => 'FORM PENDAFTARAN OFFLINE UKURAN KERTAS A4.pdf']); ?>
                    </li>
                    <li>
                        <?= Html::a('Kartu Peserta', ['/profil/cetak-kartu']); ?>
                    </li>
                </ul>
            </div>
            <div class="col-sm-3 col-xs-12">
                <h5>Bantuan</h5>
                <ul>
                    <li>
                        <?= Html::a('Kontak Kami', ['/site/kontak']); ?>
                    </li>
                    <li>
                        <?= Html::a('Cara Crop Image', ['/site/cara-crop-image']); ?>
                    </li>
                    <li>
                        <?= Html::a('Berita Terbaru', ['/site/berita']); ?>
                    </li>
                    <li>
                        <?= Html::a('Galeri', ['/site/galeri']); ?>
                    </li>
                </ul>
            </div>
            <div class="col-sm-3 col-xs-12">
                <h5>Kontak Kami</h5>
                <p>
                    Ruang 5307, Lantai 3 Gedung D FKIP UNS Jl. Ir Sutami 36 A Kentingan, Surakarta 57126
                </p>
                <table>
                    <tr><td><strong>Email</strong></td><td><a href="mailto:aritmatika2017@gmail.com">aritmatika2017@gmail.com</a></td></tr>
                    <tr><td><strong>Website</strong></td><td><a href="http://aritmatika.xyz" target="_blank">aritmatika.xyz</a></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="footer--bawah">
    <div class="container">
        &copy; Copyright <?=
            Html::a(
                Yii::$app->name,
                Yii::$app->homeUrl
            )
        ?> | Version <?= Yii::$app->theme->version() ?>
        <p class="footer--tik">
        Dipublikasikan oleh <?= Html::a('SS IMG',
            'https://ssimg.id/',
            ['target' => '_blank'])
        ?>
        </p>
    </div>
</div>
