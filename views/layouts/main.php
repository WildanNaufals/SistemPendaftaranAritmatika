<?php

use yii\helpers\Html;

if (Yii::$app->theme->isActive()) {
  echo $this->render(
      Yii::$app->theme->isActive(),
      ['content' => $content]
  );
} else {

app\assets\AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <link id="favicon" rel="shortcut icon" href="/img/favicon.png" type="image/png" />
    <link rel="apple-touch-icon" sizes="194x194" href="/img/apple.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="FIND YOUR SELF IN LOGIC">
    <meta name="robots" content="noodp">
    <meta name="keywords" content="aritmatika, lomba aritmatika, aritmatika jilid vi, aritmatika himmadika, aritmatika uns, himmadika, uns">
    <link rel="canonical" href="https://aritmatika.xyz">
    <meta property="og:locale" content="id">
    <meta property="og:type" content="website">
    <meta property="og:title" content="ARITMATIKA 2017 - FIND YOUR SELF IN LOGIC">
    <meta property="og:description" content="FIND YOUR SELF IN LOGIC">
    <meta property="og:url" content="https://aritmatika.xyz">
    <meta property="og:site_name" content="ARITMATIKA 2017 - FIND YOUR SELF IN LOGIC">
    <meta property="og:image" content="/img/favicon.png">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="FIND YOUR SELF IN LOGIC">
    <meta name="twitter:title" content="ARITMATIKA 2017 - FIND YOUR SELF IN LOGIC">
    <meta name="twitter:site" content="@aritmatika2017">
    <meta name="twitter:image" content="/img/favicon.png">
    <meta name="twitter:creator" content="@aritmatika2017">
    <script type='application/ld+json'>
        {
           "@context":"http:\/\/schema.org",
           "@type":"WebSite",
           "@id":"#website",
           "url":"https:\/\/aritmatika.xyz\/",
           "name":"ARITMATIKA 2017",
           "alternateName":"ARITMATIKA 2017 - FIND YOUR SELF IN LOGIC",
           "potentialAction": {
               "@type":"SearchAction",
               "target":"https:\/\/aritmatika.xyz\/?s={search_term_string}",
               "query-input":"required name=search_term_string"
            }

        }

    </script>
    <script type='application/ld+json'>
        {
           "@context":"http:\/\/schema.org",
           "@type":"Organization",
           "url":"https:\/\/aritmatika.xyz\/",
           "sameAs": ["https:\/\/www.facebook.com\/aritmatika2017","https:\/\/www.twitter.com\/aritmatika2017","https:\/\/www.instagram.com\/aritmatika2017"],
           "@id":"#organization",
           "name":"ARITMATIKA 2017",
           "logo":"https:\/\/aritmatika.xyz\/img\/favicon.png"
        }

    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-102750015-1', 'auto');
        ga('send', 'pageview');
    </script>

    <?= Html::csrfMetaTags() ?>
    <title>
        <?= isset($this->title) ? Html::encode(strtoupper($this->title)) . ' - ARITMATIKA 2017' : 'ARITMATIKA 2017 - FIND YOUR SELF IN LOGIC' ?>
    </title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?= $this->render('header.php') ?>
    <?= $this->render('menu.php') ?>

    <div class="main--content">
        <div class="container">

            <?= \yii\widgets\Breadcrumbs::widget([
                'homeLink' => [
                    'label' => '<i class="fa fa-home"></i>',
                    'url' => Yii::$app->homeUrl,
                ],
                'encodeLabels' => false,
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

            <?php
                echo \lavrentiev\widgets\toastr\NotificationFlash::widget([
                  'options' => [
                      "closeButton" => true,
                      "debug" => false,
                      "newestOnTop" => true,
                      "progressBar" => false,
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
              ])
            ?>

            <?php if (!Yii::$app->user->isGuest && Yii::$app->akses->getPengaturan('Aktifkan Pengumuman', '1') !== null) { ?>
                <?php if (Yii::$app->user->identity->pengumuman == 'LOLOS') { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Selamat, Kamu <strong>LOLOS</strong> ke babak SEMI FINAL Aritmatika 2017.
                        <?= Html::a('Selengkapnya', ['/profil/pengumuman'], ['class' => 'alert-link']); ?>
                    </div>
                <?php } ?>

                <?php if (Yii::$app->user->identity->pengumuman == 'TIDAK LOLOS') { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Maaf, Kamu <strong>TIDAK LOLOS</strong> ke babak SEMI FINAL Aritmatika 2017.
                        <?= Html::a('Selengkapnya', ['/profil/pengumuman'], ['class' => 'alert-link']); ?>
                    </div>
                <?php } ?>
            <?php } ?>

            <?= $content ?>
        </div>
    </div>
</div>

<footer class="footer">
    <?= $this->render('footer.php') ?>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<?php } ?>
