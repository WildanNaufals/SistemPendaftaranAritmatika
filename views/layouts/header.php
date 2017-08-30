<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-10 10:26:24
 */

use yii\helpers\Html;

$hariH = Yii::$app->akses->getPengaturan('Waktu Lomba', '1');

?>
<div class="header--top navbar-fixed-top">
    <div class="container">
        <div class="date--countdown pull-left hidden-xs">
            <span id="countdown">
                <?php if ($hariH !== null && strtotime($hariH->konten . ' 06:00:00') >= strtotime(date('Y/m/d H:i:s'))) { ?>
                    <span id="hariH"><?= $hariH->konten ?></span>
                <?php } else { ?>
                    Aritmatika 2017 <span>Jilid VI</span>
                <?php } ?>
            </span>
        </div>
        <div class="navbar--top">
            <ul class="nav nav-pills">
                <li>
                    <a class="btn--modal" data-toggle="modal" data-target="#juknisModal">
                        <i class="fa fa-bullseye"></i> KLIK
                    </a>
                </li>
                <?php if (Yii::$app->user->isGuest) { ?>
                    <li>
                        <?= Html::a(
                            '<i class="fa fa-id-badge"></i> DAFTAR',
                            ['site/daftar'])
                        ?>
                    </li>
                    <li>
                        <?= Html::a(
                            '<i class="fa fa-sign-in"></i> MASUK',
                            ['site/login'])
                        ?>
                    </li>
                <?php } else { ?>
                    <li>
                        <?= Html::a(
                            '<i class="fa fa-user"></i> PROFIL',
                            ['profil/saya']
                        )?>
                    </li>
                    <li>
                        <?= Html::a(
                            '<i class="fa fa-sign-out"></i> KELUAR',
                            ['site/logout'],
                            ['style' => 'background-color: #b71c1c', 'data-method' => 'post']
                        )?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<div class="header--main">
    <div class="container">
        <div class="row items--center">
            <div class="logo1">
                <?= Html::a(
                    Html::img('@web/img/logo.png', ['alt' => Yii::$app->homeUrl]),
                    Yii::$app->homeUrl,
                    ['data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => Yii::$app->name]
                ) ?>
            </div>
            <div class="logo2 hidden-xs">
                <div class="pull-right">
                    <?= Html::a(
                        Html::img('@web/img/logo_uns_header.png', ['alt' => 'Logo UNS']),
                        'http://uns.ac.id', ['data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Universitas Sebelas Maret', 'target' => '_blank']
                    ) ?>
                    <?= Html::a(
                        Html::img('@web/img/logo_himmadika_header.png', ['alt' => 'Logo Himmadika']),
                        'http://himmadika.fkip.uns.ac.id', ['data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Himmadika FKIP UNS', 'target' => '_blank']
                    ) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Juknis Modal -->
<div class="modal fade" id="juknisModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">KLIK UNTUK MENGUNDUHNYA</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-6 col-xs-12" style="margin-top: 10px">
                <?= Html::a('Form Pendaftaran Offline', ['/download/FORM PENDAFTARAN OFFLINE UKURAN KERTAS A4.pdf'], ['class' => 'btn btn-lg btn-danger btn-block', 'download' => 'FORM PENDAFTARAN OFFLINE UKURAN KERTAS A4.pdf']) ?>
            </div>
            <div class="col-sm-6 col-xs-12" style="margin-top: 10px">
                <?= Html::a('Petunjuk Teknis Aritmatika', ['/download/PETUNJUK TEKNIS ARITMATIKA 2017.pdf'], ['class' => 'btn btn-lg btn-success btn-block', 'download' => 'PETUNJUK TEKNIS ARITMATIKA 2017.pdf']) ?>

            </div>
            <div class="col-sm-6 col-xs-12" style="margin-top: 10px">
                <?= Html::a('Kartu Peserta', ['/profil/cetak-kartu'], ['class' => 'btn btn-block btn-lg btn-warning']) ?>
            </div>
            <div class="col-sm-6 col-xs-12" style="margin-top: 10px">
                <?= Html::a('Materi Belajar', ['/site/download-materi'], ['class' => 'btn btn-block btn-lg btn-primary']) ?>
            </div>

        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
