<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rpost-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ridPost') ?>

    <?= $form->field($model, 'rdescripcionPost') ?>

    <?= $form->field($model, 'rfoto') ?>

    <?= $form->field($model, 'rfecha') ?>

    <?= $form->field($model, 'rtipoPost') ?>

    <?php // echo $form->field($model, 'rlikes') ?>

    <?php // echo $form->field($model, 'rcomentarios') ?>

    <?php // echo $form->field($model, 'rrotador') ?>

    <?php // echo $form->field($model, 'rnombreArchivo') ?>

    <?php // echo $form->field($model, 'rut1') ?>

    <?php // echo $form->field($model, 'rut2') ?>

    <?php // echo $form->field($model, 'grupo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
