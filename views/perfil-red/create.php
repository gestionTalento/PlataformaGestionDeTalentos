<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rperfilredsocial */

$this->title = 'Create Rperfilredsocial';
$this->params['breadcrumbs'][] = ['label' => 'Rperfilredsocials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rperfilredsocial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
