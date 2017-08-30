<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-20 21:52:45
 */

use yii\helpers\Html;
use yii\helpers\FileHelper;

$this->title = 'Download Materi Belajar';
$this->params['breadcrumbs'][] = ['label' => 'Profil', 'url' => ['/profil/saya']];
$this->params['breadcrumbs'][] = $this->title;

$akses = Yii::$app->akses;

?>

<div class="square">
    <h4 class="page--header text-uppercase">
        <?= $this->title ?>
    </h4>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>NAMA FILE</th>
          <th class="hidden-xs">JENIS</th>
          <th>UKURAN</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i = 1;
          $files1 = FileHelper::findFiles('download_Materi2017/', ['except' => ['*.php']]);
          $files2 = FileHelper::findFiles('download_bukuMateriLengkap/', ['except' => ['*.php']]);
          if (isset($files1[0])  || isset($files2[0])) {
            foreach ($files2 as $file) {
              $path = pathinfo($file);
              $namaFile = $path['filename'];
              echo '
              <tr>
                <td>' . $i++ . '</td>
                <td><strong>' . strtoupper($namaFile) . '</strong></td>
                <td class="hidden-xs">' . strtoupper($path['extension']) . '</td>
                <td>' . $akses->ukuran(filesize($file), 0) . '</td>
                <td>' . Html::a('<i class="fa fa-download"></i>',
                  ['/site/down-materi'],
                  ['class' => 'btn btn-primary btn-sm']
                  ) . '
                </td>
              </tr>
            ';}
            foreach ($files1 as $file) {
              $path = pathinfo($file);
              $namaFile = $path['filename'];
              echo '
              <tr>
                <td>' . $i++ . '</td>
                <td>' . strtoupper($namaFile) . '</td>
                <td class="hidden-xs">' . strtoupper($path['extension']) . '</td>
                <td>' . $akses->ukuran(filesize($file), 0) . '</td>
                <td>' . Html::a('<i class="fa fa-download"></i>',
                  ['/site/down-materi'],
                  ['class' => 'btn btn-primary btn-sm']
                  ) . '
                </td>
              </tr>
            ';}
          } else {
            echo "<tr><td>BELUM ADA MATERI UNTUK DIUNDUH.</td><td></td><td></td><td></td><tr>";
          }
        ?>
      </tbody>
    </table>
</div>
