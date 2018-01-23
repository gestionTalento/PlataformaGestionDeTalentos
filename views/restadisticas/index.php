<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RestadisticasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Restadisticas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restadisticas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Restadisticas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idestadisticas',
            'rlikes',
            'rcomentarios',
            'rlikesr',
            'rcomentariosr',
            //'rcontadorP',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
