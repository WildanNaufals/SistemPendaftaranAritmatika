<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Faq_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'FAQ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="square">
    <?= $this->render('_search', ['model' => $searchModel]); ?>
</div>

<div class="square">
    <h4>
        <?= Html::encode($this->title) ?>
    </h4>

    <p>
        <?= Html::a('Tambah FAQ', ['create'], ['class' => 'btn btn-success']) ?>
    </p><div class="table-responsive">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pertanyaan',
            'jawaban:ntext',
            'created_at:datetime',
            'view',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div></div>
