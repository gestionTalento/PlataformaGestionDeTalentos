<?php

use yii\helpers\Html;

?>
<div class="colaborador-solicitar">

    <h1>Solicitar Beneficio</h1>

    <?= $this->render('_beneficios', [
        'model' => $model,
        'beneficio' => $beneficio,
        'puntaje' => $puntaje,
        'canje' => $canje,
    ]) ?>

</div>
