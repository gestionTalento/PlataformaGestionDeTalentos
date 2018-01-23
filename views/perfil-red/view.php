<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rperfilredsocial */

$this->title = $model->idperfilRed;
$this->params['breadcrumbs'][] = ['label' => 'Rperfilredsocials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rperfilredsocial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idperfilRed], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idperfilRed], [
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
            'idperfilRed',
            'rfoto',
            'rportada',
            'rbio',
            'rrotador',
            'restado',
        ],
    ]) ?>

</div>
