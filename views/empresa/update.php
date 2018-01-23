<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Empresas */

$this->title = 'Update Empresas: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rutEmpresa, 'url' => ['view', 'id' => $model->rutEmpresa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empresas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
