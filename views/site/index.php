<?php
/**
* @Author: SSimg
* @Date:   2017-06-16 18:03:11
* @Last Modified by:   SSimg
* @Last Modified time: 2017-06-16 19:47:33
*/

use yii\helpers\Html;
use yii\helpers\FileHelper;

$bgColor = ['blue', 'red', 'yellow', 'green', 'purple', 'pink', 'grey'];

?>

<?= (Yii::$app->akses->getPengaturan('Headline', '1') !== null) ? Yii::$app->akses->getPengaturan('Headline', '1')->konten : '' ?>

<!-- <div class="square">
	<h4><i class="fa fa-search"></i> Cek Data Peserta</h4>
	<form method="get" class="hidden-xs" action="<?= Yii::$app->homeUrl ?>site/cek-status" autocomplete="off">
		<div class="row">
			<div class="input-group col-sm-8 col-sm-offset-2">
			    <input type="text" class="form-control" placeholder="Masukkan NISN ..." name="value">
			    <span class="input-group-btn">
					<button class="btn btn-primary" type="submit">CEK DATA</button>
				</span>
			</div>
			<div class="clearfix"></div>
		</div>
	</form>
	<form method="get" class="visible-xs" action="<?= Yii::$app->homeUrl ?>site/cek-status">
		<div class="row">
			<div class="input-group col-xs-10 col-xs-offset-1">
			    <input type="text" class="form-control" placeholder="Masukkan NISN >> ENTER" name="value">
			</div>
			<div class="clearfix"></div>
		</div>
	</form>
</div> -->

<!-- <div class="square">
    <a class="btn--modal" data-toggle="modal" data-target="#posterModal">
        <img src="img/POSTER_ARITMATIKA_DESAIN_1.png">
    </a>
</div> -->

<!-- Poster Modal -->
<!-- <div class="modal fade" id="posterModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalLabel">UNDUH PAMFLET</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-info">
                    Silakan unduh Pamflet Aritmatika tahun 2017.
                </div>
            </div>
            <div class="col-sm-6 col-xs-12" style="margin-top: 10px">
                <?= Html::a('Format PDF (Dokumen)', ['/download/PAMFLET ARITMATIKA 2017.pdf'], ['class' => 'btn btn-lg btn-danger btn-block', 'download' => 'PAMFLET ARITMATIKA 2017.pdf']) ?>
            </div>
            <div class="col-sm-6 col-xs-12" style="margin-top: 10px">
                <?= Html::a('Format PNG (Gambar)', ['/img/POSTER_ARITMATIKA_DESAIN_1_HD.png'], ['class' => 'btn btn-lg btn-success btn-block', 'download' => 'POSTER_ARITMATIKA_DESAIN_1_HD.png']) ?>

            </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div class="square">
    <h4><i class="fa fa-random"></i> Alur Pendaftaran</h4>
   <?= dosamigos\gallery\Gallery::widget([
        'items' => [
            'url' => Yii::$app->request->baseUrl . '/img/alur.png',
            'options' => [
                'title' => 'Alur',
            ]
        ]
    ]); ?>
</div> -->


<!-- <div id="panlok" class="row gambar--menu">
    <?php for ($i=0; $i < 7; $i++) { ?>
        <?php if ($i < 3) { ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center box">
                <?= Html::img('@web/img/bg.panlok ('.$i.').png', ['alt' => $content->panlok($i), 'class' => 'img-rounded', 'style' => 'width: 80%']) ?>
                <?= Html::a('
                    <div class="tagline bg--'.$bgColor[$i].'">
                        <span class="nama">'.$content->panlok($i).'</span>
                    </div>',
                    ['/site/maps', 'id' => $i],
                    ['class' => 'no--link']
                ) ?>
                <p><?= $content->lokasi($i) ?></p>
            </div>
        </div>
        <?php } else { ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="text-center box">
                <?= Html::img('@web/img/bg.panlok ('.$i.').png', ['alt' => $content->panlok($i), 'class' => 'img-rounded', 'style' => 'width: 80%']) ?>
                <?= Html::a('
                    <div class="tagline bg--'.$bgColor[$i].'">
                        <span class="nama">'.$content->panlok($i).'</span>
                    </div>',
                    ['/site/maps', 'id' => $i],
                    ['class' => 'no--link']
                ) ?>
                <p><?= $content->lokasi($i) ?></p>
            </div>
        </div>
        <?php } ?>
    <?php } ?>

    <div class="clearfix"></div>
</div>

<div id="jadwal-penting" class="link--id"></div>

<div class="square">
	<div class="text-center">
	    <h4>JADWAL PENTING ARITMATIKA 2017</h4>
	</div>
    <div class="alert alert-danger visible--mobile" role="alert">
        Maaf, mohon ubah tampilan anda ke tampilan <strong>landscape</strong> atau berpindah ke Dekstop, karena ukuran layar anda kurang dari batas minimum ukuran tampilan yang kami sediakan.
    </div>
    <div class="hidden--mobile">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAMA KEGIATAN</th>
                    <th>TANGGAL MULAI</th>
                    <th>TANGGAL BERAKHR</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><?= Html::a('PENDAFTARAN ONLINE', ['/site/tata-cara-pendaftaran']) ?></td>
                    <td><del>SENIN, 17 JULI 2017</del></td>
                    <td><del>MINGGU, 20 AGUSTUS 2017</del></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><?= Html::a('PENDAFTARAN OFFLINE', ['/site/tata-cara-pendaftaran']) ?></td>
                    <td><del>RABU, 02 AGUSTUS 2017</del></td>
                    <td><del>KAMIS, 03 AGUSTUS 2017</del></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><?= Html::a('PENDAFTARAN OTS', ['/site/tata-cara-pendaftaran']) ?></td>
                    <td>MINGGU, 27 AGUSTUS 2017</td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
        <p class="text-left">
            <small>Keterangan:</small><br>
            <small>Khusus Pendaftar OTS, mohon membawa FOTO 3x4 2 Lembar dan membawa kartu pelajar aktif. Detail hubungi <a href="/site/kontak">Kontak Kami</a></small>
        </p>
    </div>
</div> -->

<div class="square">
  	<div class="text-center">
  	    <h4>PERTANYAAN UMUM SEPUTAR ARITMATIKA</h4>
  	</div>

    <div class="row">
      <div class="col-sm-6">
        <div class="subtitle">Pertanyaan Terbaru</div>
        <?php foreach ($faq1 as $faq) { ?>
          <div class="faq">
            <h4>
              <?= Html::a($faq->pertanyaan, ['/site/faq', 'id' => $faq->id]) ?> <br />
              <span><?= date('d M Y', $faq->created_at) ?> | Dilihat: <?= $faq->view ?> kali</span>
            </h4>
          </div>
        <?php } ?>
      </div>
      <div class="col-sm-6">
        <div class="subtitle">Pertanyaan Populer</div>
        <?php foreach ($faq2 as $faq) { ?>
          <div class="faq">
            <h4>
              <?= Html::a($faq->pertanyaan, ['/site/faq', 'id' => $faq->id]) ?> <br />
              <span><?= date('d M Y', $faq->created_at) ?> | Dilihat: <?= $faq->view ?> kali</span>
            </h4>
          </div>
        <?php } ?>
      </div>
    </div>
</div>

<!-- <div class="square text-center">
    <h4 class="page--header">TOP INSTAGRAM</h4>
    <div class="row">
      <?php
        $files = FileHelper::findFiles('img/', ['only' => ['instagram.*']]);
        if (isset($files[0])) {
          foreach ($files as $file) {
            $path  = pathinfo($file);
            $url   = substr($path['filename'], strpos($path['filename'], '_')+1);
            $title = substr(substr($path['filename'], 0, strpos($path['filename'], '_')), strpos($path['filename'], '.')+1);
            echo '
            <div class="col-sm-4" style="margin: 10px auto">
            <a href="https://www.instagram.com/p/' . $url . '/?taken-by=aritmatika2017" target="_blank">' .
              Html::img('@web/img/' . $path['basename'], ['class' => 'img-thumbnail', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $title]) .
            '</a></div>'
          ;}
        }
      ?>
    </div>
</div> -->

<div class="square text-center">
    <h4 class="page--header">
        SUPPORTED BY <br>
        <small style="font-weight: 300">Mirror Link Website: <a href="https://ssimg.id/aritmatika" target="_blank" style="font-weight: 500">https://ssimg.id/aritmatika</a></small>
    </h4>
    <?php
      $files = FileHelper::findFiles('img/', ['only' => ['sponsor.*']]);
      if (isset($files[0])) {
        foreach ($files as $file) {
          $path  = pathinfo($file);
          $url   = substr($path['filename'], strpos($path['filename'], '_')+1);
          $title = substr(substr($path['filename'], 0, strpos($path['filename'], '_')), strpos($path['filename'], '.')+1);
          echo '
          <a href="https://' . $url . '" target="_blank">' .
            Html::img('@web/img/' . $path['basename'], ['class' => 'iklan', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $title]) .
          '</a>'
        ;}
      }
        ?>
</div>
