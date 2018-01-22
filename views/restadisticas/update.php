<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Restadisticas */

$this->title = 'Update Restadisticas: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Restadisticas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idestadisticas, 'url' => ['view', 'id' => $model->idestadisticas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="restadisticas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
