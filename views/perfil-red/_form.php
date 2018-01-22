<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rperfilredsocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rperfilredsocial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rfoto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rportada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rbio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rrotador')->textInput() ?>

    <?= $form->field($model, 'restado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
