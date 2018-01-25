<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ractividad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ractividad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rutColaborador1')->textInput() ?>

    <?= $form->field($model, 'rutColaborador2')->textInput() ?>

    <?= $form->field($model, 'ridpost')->textInput() ?>

    <?= $form->field($model, 'ridtipo_post')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
