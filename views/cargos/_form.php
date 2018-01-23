<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cargos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombreCargo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
