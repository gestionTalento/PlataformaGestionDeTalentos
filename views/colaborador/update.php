<?php

use yii\helpers\Html;

?>
<div class="colaborador-update">

    <h1>Actualiza tu perfil</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'perfil' => $perfil,
    ]) ?>

</div>
