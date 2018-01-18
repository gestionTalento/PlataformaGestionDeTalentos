<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ControllerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="colaborador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rutColaborador') ?>

    <?= $form->field($model, 'dvColaborador') ?>

    <?= $form->field($model, 'pass') ?>

    <?= $form->field($model, 'nombreColaborador') ?>

    <?= $form->field($model, 'apellidosColaborador') ?>

    <?php // echo $form->field($model, 'idSucursal') ?>

    <?php // echo $form->field($model, 'idArea') ?>

    <?php // echo $form->field($model, 'idCargo') ?>

    <?php // echo $form->field($model, 'idRol') ?>

    <?php // echo $form->field($model, 'idGerencia') ?>

    <?php // echo $form->field($model, 'westadoJefe') ?>

    <?php // echo $form->field($model, 'idperfil') ?>

    <?php // echo $form->field($model, 'idperfilRed') ?>

    <?php // echo $form->field($model, 'idestadisticas') ?>

    <?php // echo $form->field($model, 'idestado') ?>

    <?php // echo $form->field($model, 'idCC') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
