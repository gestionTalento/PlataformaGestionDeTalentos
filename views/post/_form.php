<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RPost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rpost-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rfoto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rfecha')->textInput() ?>

    <?= $form->field($model, 'rtipoPost')->textInput() ?>

    <?= $form->field($model, 'rlikes')->textInput() ?>

    <?= $form->field($model, 'rcomentarios')->textInput() ?>

    <?= $form->field($model, 'rrotador')->textInput() ?>

    <?= $form->field($model, 'rnombreArchivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rut1')->textInput() ?>

    <?= $form->field($model, 'rut2')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
