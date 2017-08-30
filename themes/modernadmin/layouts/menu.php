
<div class="page-sidebar sidebar horizontal-bar">
    <div class="page-sidebar-inner">

      <?= \app\components\modernadmin\Menu::widget(
        [
            'options' => ['class' => 'menu accordion-menu'],
            'items' => Yii::$app->listmenu->items(),
        ]) ?>

    </div>
</div>
