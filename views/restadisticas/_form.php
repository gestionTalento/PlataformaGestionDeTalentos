<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Restadisticas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restadisticas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rlikes')->textInput() ?>

    <?= $form->field($model, 'rcomentarios')->textInput() ?>

    <?= $form->field($model, 'rlikesr')->textInput() ?>

    <?= $form->field($model, 'rcomentariosr')->textInput() ?>

    <?= $form->field($model, 'rcontadorP')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
