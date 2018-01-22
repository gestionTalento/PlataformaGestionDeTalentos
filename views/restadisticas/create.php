<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Restadisticas */

$this->title = 'Create Restadisticas';
$this->params['breadcrumbs'][] = ['label' => 'Restadisticas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restadisticas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
