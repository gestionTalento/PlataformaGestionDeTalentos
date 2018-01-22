<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilRedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rperfilredsocial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idperfilRed') ?>

    <?= $form->field($model, 'rfoto') ?>

    <?= $form->field($model, 'rportada') ?>

    <?= $form->field($model, 'rbio') ?>

    <?= $form->field($model, 'rrotador') ?>

    <?php // echo $form->field($model, 'restado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
