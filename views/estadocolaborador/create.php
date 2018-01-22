<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Estadocolaborador */

$this->title = 'Create Estadocolaborador';
$this->params['breadcrumbs'][] = ['label' => 'Estadocolaboradors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadocolaborador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
