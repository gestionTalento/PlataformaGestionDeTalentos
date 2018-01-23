<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Empresas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rutEmpresa')->textInput() ?>

    <?= $form->field($model, 'nombreEmpresa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idescripcionEmpresa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iestadoEmpesa')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
