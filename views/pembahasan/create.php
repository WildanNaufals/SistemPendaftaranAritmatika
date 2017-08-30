<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RefPembahasan */

?>
<div class="ref-pembahasan-create">
    <?= $this->render('_form', [
        'model' => $model,
        'no_peserta' => $no_peserta
    ]) ?>
</div>
