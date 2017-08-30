<?php

use yii\helpers\Html;

\app\assets\ModernAdminAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/themes/modernadmin/assets');

$this->registerJsFile(
    '@web/js/replace-yii2-dynamic-form.min.js',
    [
      'depends' => [\yii\web\JqueryAsset::className()],
      'position' => 3
    ]
);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode(Yii::$app->name) ?></title>
    <?php $this->head() ?>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="page-header-fixed compact-menu page-horizontal-bar">
<?php $this->beginBody() ?>
  <div class="overlay"></div>

  <form class="search-form" action="#" method="GET">
      <div class="input-group">
          <input type="text" name="search" class="form-control search-input" placeholder="Cari...">
          <span class="input-group-btn">
              <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
          </span>
      </div><!-- Input Group -->
  </form><!-- Search Form -->
  <main class="page-content content-wrap">

      <?= Yii::$app->user->isGuest ?
        $this->render('header-not-login.php', ['directoryAsset' => $directoryAsset]) :
        $this->render('header-login.php', ['directoryAsset' => $directoryAsset])
      ?>

      <?= $this->render('menu.php') ?>

      <?= \lavrentiev\widgets\toastr\NotificationFlash::widget([
          'options' => [
              "closeButton" => true,
              "debug" => false,
              "newestOnTop" => true,
              "progressBar" => true,
              "positionClass" => "toast-top-right",
              "preventDuplicates" => false,
              "onclick" => null,
              "showDuration" => "300",
              "hideDuration" => "1000",
              "timeOut" => "5000",
              "extendedTimeOut" => "1000",
              "showEasing" => "swing",
              "hideEasing" => "linear",
              "showMethod" => "fadeIn",
              "hideMethod" => "fadeOut"
          ]
      ]) ?>

      <div class="page-inner">
          <div class="page-breadcrumb">
              <?= \yii\widgets\Breadcrumbs::widget([
                  'tag' => 'ol',
                  'options' => [
                    'class' => 'breadcrumb container'
                  ],
                  'homeLink' => [
                      'label' => '<i class="fa fa-home"></i>',
                      'url' => ['/'],
                  ],
                  'encodeLabels' => false,
                  'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [Yii::$app->name],
              ]) ?>
          </div>
          <div class="page-title">
              <div class="container">
                  <h3><?= isset($this->title) ? Html::encode($this->title) : Yii::$app->name ?></h3>
              </div>
          </div>

          <?= $this->render('content.php', ['content' => $content]) ?>

          <div class="page-footer">
              <div class="container">
                  <p class="no-s"><?= date('Y') ?> © <?= Html::a(Yii::$app->name, ['/']) ?>.</p>
              </div>
          </div>
      </div><!-- Page Inner -->
  </main><!-- Page Content -->

  <div class="cd-overlay"></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
