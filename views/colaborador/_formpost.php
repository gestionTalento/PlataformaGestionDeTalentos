<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rdescripcionPost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rfoto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rlike')->textInput() ?>

    <?= $form->field($model, 'rfecha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rtipoPost')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
