<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RPost */

$this->title = $model->ridPost;
$this->params['breadcrumbs'][] = ['label' => 'Rposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rpost-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ridPost' => $model->ridPost, 'rtipoPost' => $model->rtipoPost, 'rut1' => $model->rut1, 'rut2' => $model->rut2], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ridPost' => $model->ridPost, 'rtipoPost' => $model->rtipoPost, 'rut1' => $model->rut1, 'rut2' => $model->rut2], [
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
            'ridPost',
            'rdescripcionPost',
            'rfoto',
            'rfecha',
            'rtipoPost',
            'rlikes',
            'rcomentarios',
            'rrotador',
            'rnombreArchivo',
            'rut1',
            'rut2',
            'grupo',
        ],
    ]) ?>

</div>
