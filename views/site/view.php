<div class="square">
    <h4 class="page--header">
    <?= ($link !== '') ? yii\helpers\Html::a('<i class="fa fa-arrow-left"></i> Kembali', [$link], ['class' => 'btn btn-danger'])  : '' ?>
        <a href="http://www.aritmatika.xyz/<?= $url ?>" class="btn btn-primary" download="<?= substr($url, strpos($url, '/')+1) ?>"><i class="fa fa-download"></i> Download</a>
    </h4>

    <div class="docs">
      <iframe src="https://drive.google.com/viewerng/viewer?url=https://www.aritmatika.xyz/<?= $url ?>&embedded=true" frameborder="0" allowfullscreen>Browser Tidak Mendukung</iframe>
    </div>
</div>
