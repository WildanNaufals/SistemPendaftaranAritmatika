<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RefPembahasan */
?>
<div class="ref-pembahasan-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'no_peserta',
            'downloaded',
        ],
    ]) ?>

</div>
