<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rpublicidad */

$this->title = 'Create Rpublicidad';
$this->params['breadcrumbs'][] = ['label' => 'Rpublicidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rpublicidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
