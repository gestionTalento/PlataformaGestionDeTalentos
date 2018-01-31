<?php 
use yii\helpers\Html;


?><div class="panel panel-white post panel-shadow">        

                                            <div class="media activity-item">
                                                <a href="#" class="pull-left">
                                                    <?php
                                                    $posteador = encuentraColaborador($post["rut1"]);
                                                    ?>
                                                    <img src="web/img/perfil/<?php echo $perfil[0]["rfoto"]; ?>" alt="Avatar" class="media-object avatar">
                                                </a>
                                                <div class="media-body">
                                                    <p class="activity-title"><a id="tituloPublicador" href="#"><?php echo $posteador[0]['nombreColaborador'] . " " . $posteador[0]['apellidosColaborador']; ?></a> </p>
                                                    <small class="text-muted">fecha de publicacion</small>
                                                    <div class="activity-attachment">
                                                        
                                                            <?php
                                                            $mystring = $post['rdescripcionPost'];
                                                            $findme = ".mp4";
                                                            $pos = strpos($mystring, $findme);
                                                            //var_dump($pos);
                                                            if ($pos == true) {
                                                               ?>
                                                               	<div class="bookStage">
                                                                 <p style="text-align: center;">
                                                                    <iframe id="viewer" src="/app/web/AA/index.html" seamless="seamless" scrolling="no" frameborder="no" allowTranspararency="true"></iframe>
                                                                </p>
                                                                </div>
                                                             

                                                                <?php
                                                            } else {
                                                                ?>

                                                                    <p style="text-align: center;">
                                                                    <iframe src="/app/web/AA/index.html" seamless="seamless" scrolling="no" frameborder="no" allowTranspararency="true"></iframe>
                                                                </p>


                                                                <?php
                                                            }
                                                            ?>                                             
                                                            
                                                    </div>
                                                </div>
                                                <div class="post-description">

                                                    <p>                                                </p>

                                                    <div class="stats">

                                                         <?php
                                                            $connection = Yii::$app->db;
                                                            $jefe = "select rlikes as cuenta from rpost where ridPost=" . $post["ridPost"] . "";
                                                            $command = $connection->createCommand($jefe);
                                                            $dataReader = $command->query();
                                                            $modela = $dataReader->readAll();
                                                            ?>
                                                            <button id="like-<?php echo $post["ridPost"]; ?>" onclick="like(<?php echo $post["ridPost"]; ?>,<?php echo $model[0]['rutColaborador']; ?>);" class="stat-item btn">
                                                                Me Gusta
                                                                <i class="fa fa-thumbs-up icon"></i><?php echo $modela[0]["cuenta"]; ?>

                                                            </button>



                                                        <?php
                                                        $connection = Yii::$app->db;
                                                        $jefe = "select count(*) as cuenta from rcomentarios where ridPost=" . $post["ridPost"] . "";
                                                        $command = $connection->createCommand($jefe);
                                                        $dataReader = $command->query();
                                                        $modela = $dataReader->readAll();
                                                        ?>
                                                        <button  onclick="reveal(<?php echo $post["ridPost"]; ?>);" class="stat-item btn">
                                                            Comentarios
                                                            <i  class="fa fa-comments-o icon"></i><?php echo $modela[0]["cuenta"]; ?>

                                                        </button>

                                                    </div>

                                                </div>
                                                <div style="display:none;" id="post-<?php echo $post["ridPost"]; ?>" class="post-footer">
                                                    <div class="input-group"> 
                                                        <input id="comentario-<?php echo $post["ridPost"]; ?>" name="comentario-<?php echo $post["ridPost"]; ?>" class="form-control" placeholder="Agrega un comentario" type="text" onkeydown = "if (event.keyCode == 13) {
                                                                enviar(<?php echo $post["ridPost"]; ?>,<?php echo $model[0]['rutColaborador']; ?>);
                                                            }">
                                                        <span class="input-group-addon">
                                                            <button  onclick="enviar(<?php echo $post["ridPost"]; ?>,<?php echo $model[0]['rutColaborador']; ?>);"><i class="fa fa-edit"></i></button>  
                                                        </span>
                                                    </div>
                                                    <ul class="comments-list">
                                                      <?php
                                                        $comentarios = encuentraComentarios($post["ridPost"]);
                                                        foreach ($comentarios as $c) {
                                                            ?>
                                                        <li class="comment">
                                                            <a class="pull-left" href="#">
                                                                 <?= Html::img('/app/web/img/perfil/' . $c["rfoto"], ['alt' => 'Avatar', 'class' => 'avatar']); ?>
                                                            </a>
                                                            <div class="comment-body">
                                                                <div class="comment-heading">
                                                                    <h4 class="user"><?php echo $c["nombreColaborador"] . " " . $c["apellidosColaborador"]; ?></h4>
                                                                    <h5 class="time">5 minutes ago</h5>
                                                                </div>
                                                                <br>
                                                                <p id="elComentario"><?php echo $c["rcontenido"]; ?></p>
                                                            </div>
                                                           
                                                        </li>

                                                        <?php } ?>
                                                        <li id="<?php echo $post["ridPost"]; ?>" class="comment"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>