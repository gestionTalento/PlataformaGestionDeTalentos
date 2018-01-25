<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RActividadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ractividad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idactividad') ?>

    <?= $form->field($model, 'rutColaborador1') ?>

    <?= $form->field($model, 'rutColaborador2') ?>

    <?= $form->field($model, 'ridpost') ?>

    <?= $form->field($model, 'ridtipo_post') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
