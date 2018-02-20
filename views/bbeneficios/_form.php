<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bbeneficios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bbeneficios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bNombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bDescripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bTipoBeneficio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bValorBeneficio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bvalorhora')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bvezporanio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bvezpormes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bimagen')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
