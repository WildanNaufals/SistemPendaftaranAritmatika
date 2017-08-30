<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:17:24
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-24 20:45:54
 */

use yii\helpers\Html;
use yii\helpers\FileHelper;

$this->title = 'Download';
$this->params['breadcrumbs'][] = $this->title;

$akses = Yii::$app->akses;

?>

<div class="square">
    <h4 class="page--header text-uppercase">
        <?= $this->title ?>
    </h4>
<div class="table-responsive">
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
          $files = FileHelper::findFiles('download/', ['except' => ['*.php']]);
          if (isset($files[0])) {
            foreach ($files as $file) {
              $path = pathinfo($file);
              $namaFile = $path['filename'];
              echo '
              <tr>
                <td>' . $i++ . '</td>
                <td>' . strtoupper($namaFile) . '</td>
                <td class="hidden-xs">' . strtoupper($path['extension']) . '</td>
                <td>' . $akses->ukuran(filesize($file), 0) . '</td>
                <td>' . Html::a('<i class="fa fa-download"></i>',
                  ['/download/' . $path['basename']],
                  ['class' => 'btn btn-primary btn-sm', 'download' => $path['basename'], 'title' => 'Download', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom']
                  ) .
                  Html::a('<i class="fa fa-eye"></i>',
                  ['/site/view', 'url' => 'download/' . $path['basename'], 'link' => '/site/download'],
                  ['class' => 'btn btn-danger btn-sm', 'title' => 'Lihat', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom']
                  ) . '
                </td>
              </tr>
            ';}
          } else {
            echo "<tr><td>BELUM ADA FILE UNTUK DIUNDUH.</td><td></td><td></td><td></td><tr>";
          }
        ?>
      </tbody>
    </table>
</div></div>
