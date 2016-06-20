<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BonusCardsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bonus Cards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bonus-cards-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Bonus Cards', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'serial',
            'number',
            'date_release:datetime',
            'date_expiration:datetime',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
