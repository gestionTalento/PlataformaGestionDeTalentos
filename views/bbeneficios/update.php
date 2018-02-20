<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bbeneficios */

$this->title = 'Update Bbeneficios: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Bbeneficios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bId_Beneficio, 'url' => ['view', 'id' => $model->bId_Beneficio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bbeneficios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
