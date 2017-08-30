<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-15 10:27:08
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-17 14:08:34
 */

use yii\helpers\Html;

$this->title = $model->pertanyaan;
$this->params['breadcrumbs'][] = ucwords($this->title);

?>

<div class="square">
    <h4 class="page--header" style="line-height: 24px;">
      <?= $this->title ?><br>
      <span style="font-size: 12px; font-weight: 300;"><?= date('d M Y', $model->created_at) ?> | Dilihat: <?= $model->view ?> kali</span>
    </h4>

    <div class="row">
      <div class="col-sm-8">
        <div class="alert alert-info" style="font-size: 120%;">
            <?= $model->jawaban ?>
        </div>

        <hr style="margin: 40px 0 20px">

        <div class="alert alert-danger">
            Info selengkapnya dapat menghubungi CP di halaman <?= Html::a('Kontak Kami', ['/site/kontak'], ['class' => 'alert-link']) ?>.
        </div>
      </div>

      <div class="col-sm-4">
        <?php foreach ($faq as $ask) { ?>
          <div class="faq">
            <h4 style="margin-top: 0;">
              <?= Html::a($ask->pertanyaan, ['/site/faq', 'id' => $ask->id]) ?>
              <span><?= date('d M Y', $ask->created_at) ?> | Dilihat: <?= $ask->view ?> kali</span>
            </h4>
          </div>
        <?php } ?>
      </div>
    </div>
</div>
