<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Restadisticas */

$this->title = $model->idestadisticas;
$this->params['breadcrumbs'][] = ['label' => 'Restadisticas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restadisticas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idestadisticas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idestadisticas], [
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
            'idestadisticas',
            'rlikes',
            'rcomentarios',
            'rlikesr',
            'rcomentariosr',
            'rcontadorP',
        ],
    ]) ?>

</div>
