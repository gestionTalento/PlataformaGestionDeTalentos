<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bbeneficios */

$this->title = 'Create Bbeneficios';
$this->params['breadcrumbs'][] = ['label' => 'Bbeneficios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bbeneficios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
