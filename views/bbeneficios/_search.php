<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BeneficiosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bbeneficios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bId_Beneficio') ?>

    <?= $form->field($model, 'bNombre') ?>

    <?= $form->field($model, 'bDescripcion') ?>

    <?= $form->field($model, 'bTipoBeneficio') ?>

    <?= $form->field($model, 'bValorBeneficio') ?>

    <?php // echo $form->field($model, 'bvalorhora') ?>

    <?php // echo $form->field($model, 'bvezporanio') ?>

    <?php // echo $form->field($model, 'bvezpormes') ?>

    <?php // echo $form->field($model, 'bimagen') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
