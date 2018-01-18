<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ControllerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colaboradors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colaborador-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Colaborador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rutColaborador',
            'dvColaborador',
            'pass',
            'nombreColaborador',
            'apellidosColaborador',
            //'idSucursal',
            //'idArea',
            //'idCargo',
            //'idRol',
            //'idGerencia',
            //'westadoJefe',
            //'idperfil',
            //'idperfilRed',
            //'idestadisticas',
            //'idestado',
            //'idCC',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
