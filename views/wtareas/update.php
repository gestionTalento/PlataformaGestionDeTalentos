<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\wtarea */

$this->title = 'Update Wtarea: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Wtareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->widtarea, 'url' => ['view', 'widtarea' => $model->widtarea, 'idDependencias' => $model->idDependencias]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wtarea-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
