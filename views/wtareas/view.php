<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\wtarea */

$this->title = $model->widtarea;
$this->params['breadcrumbs'][] = ['label' => 'Wtareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wtarea-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'widtarea' => $model->widtarea, 'idDependencias' => $model->idDependencias], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'widtarea' => $model->widtarea, 'idDependencias' => $model->idDependencias], [
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
            'widtarea',
            'wnombreTarea',
            'wdescripcion',
            'wfechainicio',
            'wfechafin',
            'westado',
            'wfeedback',
            'idDependencias',
            'westadofeed',
        ],
    ]) ?>

</div>
