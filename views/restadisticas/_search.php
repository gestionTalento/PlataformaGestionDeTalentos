<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RestadisticasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restadisticas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idestadisticas') ?>

    <?= $form->field($model, 'rlikes') ?>

    <?= $form->field($model, 'rcomentarios') ?>

    <?= $form->field($model, 'rlikesr') ?>

    <?= $form->field($model, 'rcomentariosr') ?>

    <?php // echo $form->field($model, 'rcontadorP') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
