<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bbeneficios */

$this->title = $model->bId_Beneficio;
$this->params['breadcrumbs'][] = ['label' => 'Bbeneficios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bbeneficios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bId_Beneficio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bId_Beneficio], [
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
            'bId_Beneficio',
            'bNombre',
            'bDescripcion',
            'bTipoBeneficio',
            'bValorBeneficio',
            'bvalorhora',
            'bvezporanio',
            'bvezpormes',
            'bimagen',
        ],
    ]) ?>

</div>
