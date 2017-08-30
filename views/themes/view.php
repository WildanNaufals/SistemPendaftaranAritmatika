<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Themes */
?>
<div class="themes-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'app_name',
            'theme_name',
            'theme_path',
            'is_active',
        ],
    ]) ?>

</div>
