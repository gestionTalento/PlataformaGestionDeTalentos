<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Colaborador */

$this->title = 'Update Colaborador: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Colaboradors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rutColaborador, 'url' => ['view', 'rutColaborador' => $model->rutColaborador, 'idSucursal' => $model->idSucursal, 'idArea' => $model->idArea, 'idCargo' => $model->idCargo, 'idRol' => $model->idRol, 'idGerencia' => $model->idGerencia, 'idperfil' => $model->idperfil, 'idperfilRed' => $model->idperfilRed, 'idestadisticas' => $model->idestadisticas, 'idestado' => $model->idestado, 'idCC' => $model->idCC]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="colaborador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
