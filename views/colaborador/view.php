<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Colaborador */

$this->title = $model->rutColaborador;
$this->params['breadcrumbs'][] = ['label' => 'Colaboradors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colaborador-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'rutColaborador' => $model->rutColaborador, 'idSucursal' => $model->idSucursal, 'idArea' => $model->idArea, 'idCargo' => $model->idCargo, 'idRol' => $model->idRol, 'idGerencia' => $model->idGerencia, 'idperfil' => $model->idperfil, 'idperfilRed' => $model->idperfilRed, 'idestadisticas' => $model->idestadisticas, 'idestado' => $model->idestado, 'idCC' => $model->idCC], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'rutColaborador' => $model->rutColaborador, 'idSucursal' => $model->idSucursal, 'idArea' => $model->idArea, 'idCargo' => $model->idCargo, 'idRol' => $model->idRol, 'idGerencia' => $model->idGerencia, 'idperfil' => $model->idperfil, 'idperfilRed' => $model->idperfilRed, 'idestadisticas' => $model->idestadisticas, 'idestado' => $model->idestado, 'idCC' => $model->idCC], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'rutColaborador',
            'dvColaborador',
            'pass',
            'nombreColaborador',
            'apellidosColaborador',
            'idSucursal',
            'idArea',
            'idCargo',
            'idRol',
            'idGerencia',
            'westadoJefe',
            'idperfil',
            'idperfilRed',
            'idestadisticas',
            'idestado',
            'idCC',
        ],
    ]) ?>

</div>
