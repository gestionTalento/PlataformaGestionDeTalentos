<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rperfilredsocial */

$this->title = 'Update Rperfilredsocial: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Rperfilredsocials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idperfilRed, 'url' => ['view', 'id' => $model->idperfilRed]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rperfilredsocial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
