<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RPost */

$this->title = 'Create Rpost';
$this->params['breadcrumbs'][] = ['label' => 'Rposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rpost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
