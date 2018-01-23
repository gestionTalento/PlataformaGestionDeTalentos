<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Icentrocosto */

$this->title = 'Update Icentrocosto: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Icentrocostos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCC, 'url' => ['view', 'id' => $model->idCC]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="icentrocosto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
