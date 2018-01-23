<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gerencia */

$this->title = 'Update Gerencia: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Gerencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idGerencia, 'url' => ['view', 'id' => $model->idGerencia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gerencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
