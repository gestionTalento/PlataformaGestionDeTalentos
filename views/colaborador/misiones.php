<h2><p class="misiones">Misiones de la Semana</p></h2>
                        <div class="col-md-12 miss">                                 
                            <div class="bs-example">
                                
                                <div class="panel-group" id="accordion">
                                <?php
                                $i=0;
                                 foreach ($mision as $m) {
                                                        ?> 
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                            <?php echo $m["wiconografia"]; ?>



                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $m["widMision"]; ?>"><?php echo $m["wnombre"]; ?></a>
                                            
                                            </h4>   
                                        </div>
                                        <div id="collapse<?php echo $m["widMision"]; ?>" class=" panel-collapse collapse <?php if($i==0){echo "in"; $i++;}else{} ?>">
                                            <div class="panel-body">
                                                <img style="margin-right:10px" class="imgmision" src="../web/img/mision/<?php echo $m["wfoto"]; ?>" align="left"> 
                                                <br><p class="misiontext"><?php echo $m["wdescripcion"] ?> <a href="https://www.tutorialrepublic.com/html-tutorial/" target="_blank">Leer Más</a><br>  </p><p class="misiontextestado" > <i class="fas fa-check-circle"></i> Completada <button class="button-mision btn-lg btn-raised misiones">
                                        Publicar </button></p>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>

                                      <?php
                                        } ?>

                                    </div>
                                </div>          
                            </div>   
                                <br>