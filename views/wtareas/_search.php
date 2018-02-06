<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TareasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wtarea-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'widtarea') ?>

    <?= $form->field($model, 'wnombreTarea') ?>

    <?= $form->field($model, 'wdescripcion') ?>

    <?= $form->field($model, 'wfechainicio') ?>

    <?= $form->field($model, 'wfechafin') ?>

    <?php // echo $form->field($model, 'westado') ?>

    <?php // echo $form->field($model, 'wfeedback') ?>

    <?php // echo $form->field($model, 'idDependencias') ?>

    <?php // echo $form->field($model, 'westadofeed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
