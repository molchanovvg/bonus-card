<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Generate bonus card';
?>
<strong>Generate a series of bonus cards</strong>


<?= Html::beginForm(['/bonus-cards/generate'], 'post', ['class' => 'form-inline form__search"']); ?>
<?= Html::textInput('series','', ['placeholder' => 'series', 'class' => 'form-control form__input' ]);  echo '<br>';?>
<?= Html::textInput('count','', ['placeholder' => 'count', 'class' => 'form-control form__input' ]); echo '<br>';?>
<?= Html::dropDownList('limit', '', ['--change period--', '1 year', 'half-year', '1 mount'], ['class' => 'form-control form__dropdown']); echo '<br>';?>
<?= Html::submitButton('Generate', ['class' => 'form__button btn btn-default']) ?>
<?= Html::endForm()?>


<strong>Generated cards:</strong>
<?= Html::encode($count); echo '<br>';?>
<strong>Serial cards:</strong>
<?= Html::encode($series); echo '<br>'?>
<strong>Period cards:</strong>
<?= Html::encode($limit) ?>

