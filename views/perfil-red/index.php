<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PerfilRedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rperfilredsocials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rperfilredsocial-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rperfilredsocial', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idperfilRed',
            'rfoto',
            'rportada',
            'rbio',
            'rrotador',
            //'restado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
