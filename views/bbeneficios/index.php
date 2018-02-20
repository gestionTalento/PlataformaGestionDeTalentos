<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BeneficiosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bbeneficios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bbeneficios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bbeneficios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bId_Beneficio',
            'bNombre',
            'bDescripcion',
            'bTipoBeneficio',
            'bValorBeneficio',
            //'bvalorhora',
            //'bvezporanio',
            //'bvezpormes',
            //'bimagen',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
