<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Icentrocosto */

$this->title = 'Create Icentrocosto';
$this->params['breadcrumbs'][] = ['label' => 'Icentrocostos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="icentrocosto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
