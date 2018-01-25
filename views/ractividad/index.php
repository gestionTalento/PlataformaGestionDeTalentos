<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RActividadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ractividads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ractividad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ractividad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idactividad',
            'rutColaborador1',
            'rutColaborador2',
            'ridpost',
            'ridtipo_post',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
