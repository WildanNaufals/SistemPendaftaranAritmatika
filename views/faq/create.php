<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Faq */

$this->title = 'Tambah Faq';
$this->params['breadcrumbs'][] = ['label' => 'FAQ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="square">
    <h4>
        <?= Html::encode($this->title) ?>
    </h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
