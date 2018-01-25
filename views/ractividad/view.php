<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ractividad */

$this->title = $model->idactividad;
$this->params['breadcrumbs'][] = ['label' => 'Ractividads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ractividad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idactividad' => $model->idactividad, 'rutColaborador1' => $model->rutColaborador1, 'rutColaborador2' => $model->rutColaborador2, 'ridpost' => $model->ridpost, 'ridtipo_post' => $model->ridtipo_post], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idactividad' => $model->idactividad, 'rutColaborador1' => $model->rutColaborador1, 'rutColaborador2' => $model->rutColaborador2, 'ridpost' => $model->ridpost, 'ridtipo_post' => $model->ridtipo_post], [
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
            'idactividad',
            'rutColaborador1',
            'rutColaborador2',
            'ridpost',
            'ridtipo_post',
        ],
    ]) ?>

</div>
