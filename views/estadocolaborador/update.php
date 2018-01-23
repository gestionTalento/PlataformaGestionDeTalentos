<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estadocolaborador */

$this->title = 'Update Estadocolaborador: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Estadocolaboradors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idestado, 'url' => ['view', 'id' => $model->idestado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estadocolaborador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
