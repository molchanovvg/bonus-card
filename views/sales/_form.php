<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sales */
/* @var $form yii\widgets\ActiveForm */


var_export($bonus_cards);
$bonus_cards_Items = \yii\helpers\ArrayHelper::map($bonus_cards, 'id', 'id');

?>

<div class="sales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_purchase')->textInput(['value' => date('Y-m-d H:i')]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'bonus_cards_id')->dropDownList($bonus_cards_Items) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
