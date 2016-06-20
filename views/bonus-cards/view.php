<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\BonusCards */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bonus Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bonus-cards-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'serial',
            'number',
            'date_release',
            'date_expiration',
            'sum',
            'status',
        ],
    ]) ?>

    <h1>List sales</h1>

    <?= GridView::widget([
        'dataProvider' => $sales_list,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'date_purchase',
            'cost',
        ],
    ]); ?>



</div>
