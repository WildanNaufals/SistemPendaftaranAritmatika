<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Faq */

$this->title = 'Perbarui: ' . $model->pertanyaan;
$this->params['breadcrumbs'][] = ['label' => 'FAQ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Perbarui';
?>

<div class="square">
    <h4>
        <?= Html::encode($this->title) ?>
    </h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
