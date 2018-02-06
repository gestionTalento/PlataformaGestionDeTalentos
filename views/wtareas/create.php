<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\wtarea */

$this->title = 'Create Wtarea';
$this->params['breadcrumbs'][] = ['label' => 'Wtareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wtarea-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
