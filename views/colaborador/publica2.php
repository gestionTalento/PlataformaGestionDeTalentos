<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\widgets\FileInput;
?>                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => ['rpost/video']]); ?>
                                <?=
                                            $form->field($model3, 'rfoto')->widget(FileInput::classname(), [
                                                'pluginOptions' => [
                                                            'browseClass' => 'btn btn-success',
                                                            'uploadClass' => 'btn btn-info',
                                                            'removeClass' => 'btn btn-danger',
                                                            'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> ',
                                                            'browseLabel' => 'Seleccione un video para publicar'
                                                            ],
                                                            'options' => [
                                                                'multiple' => true,
                                                            ],
                                            ])->label(false);
                                ?>
                                <textarea name="rdescripcionPost"  placeholder="Asocia un mensaje al video!!!" rows="2" class="form-control input-lg p-text-area"></textarea>


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