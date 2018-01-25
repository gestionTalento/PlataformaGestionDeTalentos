<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="cargos-create">


    
<div class="cargos-form">
   
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'rbio') ?>
    <input type="hidden" name="idDependencia"  value="<?php echo $model->rutColaborador; ?>"/>  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingrese un plan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>