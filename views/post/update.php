<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RPost */

$this->title = 'Update Rpost: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Rposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ridPost, 'url' => ['view', 'ridPost' => $model->ridPost, 'rtipoPost' => $model->rtipoPost, 'rut1' => $model->rut1, 'rut2' => $model->rut2]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rpost-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
