<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\wtarea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wtarea-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'wnombreTarea')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wdescripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wfechainicio')->textInput() ?>

    <?= $form->field($model, 'wfechafin')->textInput() ?>

    <?= $form->field($model, 'westado')->textInput() ?>

    <?= $form->field($model, 'wfeedback')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idDependencias')->textInput() ?>

    <?= $form->field($model, 'westadofeed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
