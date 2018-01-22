<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Colaborador */
/* @var $form yii\widgets\ActiveForm */ 
?>

<div class="colaborador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rutColaborador')->textInput() ?>

    <?= $form->field($model, 'dvColaborador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pass')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombreColaborador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidosColaborador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idSucursal')->textInput() ?>

    <?= $form->field($model, 'idArea')->textInput() ?>

    <?= $form->field($model, 'idCargo')->textInput() ?>

    <?= $form->field($model, 'idRol')->textInput() ?>

    <?= $form->field($model, 'idGerencia')->textInput() ?>

    <?= $form->field($model, 'westadoJefe')->textInput() ?>

    <?= $form->field($model, 'idperfil')->textInput() ?>

    <?= $form->field($model, 'idperfilRed')->textInput() ?>

    <?= $form->field($model, 'idestadisticas')->textInput() ?>

    <?= $form->field($model, 'idestado')->textInput() ?>

    <?= $form->field($model, 'idCC')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
