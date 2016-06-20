<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BonusCards */

$this->title = 'Create Bonus Cards';
$this->params['breadcrumbs'][] = ['label' => 'Bonus Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bonus-cards-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
