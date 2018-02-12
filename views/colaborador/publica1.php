<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\widgets\FileInput;
?>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => ['colaborador/post']]); ?>

                                <textarea name="rdescripcionPost"  placeholder="Que estas pensando hoy???" rows="2" class="form-control input-lg p-text-area"></textarea>


                                <div class="panel-footer">

                                    <button class="btn btn-danger pull-right">Publicar</button>

                                    <ul class="nav nav-pills">



                                        <li>


                                
                                            <input type="hidden" name="rutColaborador" value="<?php echo $rutColaborador; ?>">
                                            <input type="hidden" name="rut2" value="<?php echo $rut2; ?>">
                                            <input type="hidden" name="lugar" value="<?php echo $lugar; ?>">
                                        </li>
                                        

                                    </ul>

                                </div>
                                <?php ActiveForm::end(); ?>