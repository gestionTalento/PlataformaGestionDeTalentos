<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ractividad */

$this->title = 'Update Ractividad: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Ractividads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idactividad, 'url' => ['view', 'idactividad' => $model->idactividad, 'rutColaborador1' => $model->rutColaborador1, 'rutColaborador2' => $model->rutColaborador2, 'ridpost' => $model->ridpost, 'ridtipo_post' => $model->ridtipo_post]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ractividad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
