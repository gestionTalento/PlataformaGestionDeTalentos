<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TareasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wtareas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wtarea-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Wtarea', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'widtarea',
            'wnombreTarea',
            'wdescripcion',
            'wfechainicio',
            'wfechafin',
            //'westado',
            //'wfeedback',
            //'idDependencias',
            //'westadofeed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
