<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\User;

NavBar::begin([
    'options' => [
        'class' => 'navbar navbar-default',
    ],
]);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => Yii::$app->listmenu->items()
]);

echo '
<form method="get" class="navbar-form navbar-right" action="' . Yii::$app->homeUrl . 'site/cek-status">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="NISN &raquo; Enter" name="value">
  </div>
</form>';

NavBar::end();
