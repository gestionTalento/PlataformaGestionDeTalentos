<?php

use yii\helpers\Html;
?>


<div class="panel panel-white post panel-shadow">        
    <div style="height: 100%" class="media activity-item">
    <div class="row">
          <a  class="pull-left">
          <a href="<?php echo "index.php?r=colaborador/compadre&rutAmigo=".$posteador[0]["rutColaborador"]; ?>" class="pull-left">
            <img src="../web/img/perfil/t/<?php echo $perfil['rfoto']; ?>" alt="Avatar" style="

                         -ms-transform: rotate(<?php echo $perfil['rrotador']; ?>deg);
                         -webkit-transform: rotate(<?php echo $perfil['rrotador']; ?>deg);
                         transform: rotate(<?php echo $perfil['rrotador']; ?>deg);

            " class="media-object avatar <?php echo $post["rutColaborador1"]; ?>">
        </a>
        <p class="activity-title"><a id="tituloPublicador" href="<?php echo "compadre&rutAmigo=".$posteador[0]["rutColaborador"]; ?>"><?php echo $posteador[0]['nombreColaborador'] . " " . $posteador[0]['apellidosColaborador']; ?></a> </p>
            <small class="text-muted">fecha de publicacion <?php echo $post["rfecha"]; ?></small>
    </div>
      
        <div class="media-body">
            
            <div class="activity-attachment">
             



                    <?php if($post['rfoto']=="pdf.png"){ ?>
                    <a target="_blank" href="../web/img/archivos/<?php echo $post['rdescripcionPost']; ?>"><img id="rotate-<?php echo $post["ridPost"]; ?>" src="../web/img/pdf.png" alt="Uploaded photo"></a>
                    <?php } ?>
                    <?php if($post['rfoto']=="word.png"){ ?>
                    <a target="_blank" href="../web/img/archivos/<?php echo $post['rdescripcionPost']; ?>"><img id="rotate-<?php echo $post["ridPost"]; ?>" src="../web/img/word.png" alt="Uploaded photo"></a>
                    <?php } ?>
                    <?php if($post['rfoto']=="excel.png"){ ?>
                    <a target="_blank" href="../web/img/archivos/<?php echo $post['rdescripcionPost']; ?>"><img id="rotate-<?php echo $post["ridPost"]; ?>" src="../web/img/excel.png" alt="Uploaded photo"></a>
                    <?php } ?>
                    <?php if($post['rfoto']=="power.png"){ ?>
                    <a target="_blank" href="../web/img/archivos/<?php echo $post['rdescripcionPost']; ?>"><img id="rotate-<?php echo $post["ridPost"]; ?>" src="../web/img/power.png" alt="Uploaded photo"></a>
                    <?php } ?>
                
              
                <a target="_blank" href="../web/img/archivos/<?php echo $post['rdescripcionPost']; ?>"> Descargar archivo <?php echo $post['rnombreArchivo']; ?></a>
               
            </div>

        </div>



        <div class="post-description">


            <div class="stats">

                <?php
                $connection = Yii::$app->db;
                $jefe = "select rlikes as cuenta from rpost where ridPost=" . $post["ridPost"] . "";
                $command = $connection->createCommand($jefe);
                $dataReader = $command->query();
                $modela = $dataReader->readAll();
                ?>
                      <?php if($megusta==true){


                ?>
                <button class="stat-item btn btn-success"><p class="hidden-xs">Me Gusta</p><i class="fa fa-thumbs-up icon"></i><?php echo $modela[0]["cuenta"]; ?></button>
                 <?php
                }else {?>

                 <button id="like-<?php echo $post["ridPost"]; ?>" onclick="like(<?php echo $post["ridPost"]; ?>,<?php $session = Yii::$app->session; echo $session['rutColaborador']; ?>);" class="stat-item btn visible-xs-*">
                <p class="hidden-xs">Me Gusta</p>
                <i class="fa fa-thumbs-up icon"></i><?php echo $modela[0]["cuenta"]; ?>

                </button>
                <?php
                }?>




                <?php
                $connection = Yii::$app->db;
                $jefe = "select count(*) as cuenta from rcomentarios where ridPost=" . $post["ridPost"] . "";
                $command = $connection->createCommand($jefe);
                $dataReader = $command->query();
                $modela = $dataReader->readAll();
                ?>
                <button  onclick="reveal(<?php echo $post["ridPost"]; ?>);" class="stat-item btn">
                    <p class="hidden-xs">Comentarios</p>
                    <i  class="fa fa-comments-o icon"></i><?php echo $modela[0]["cuenta"]; ?>

                </button>
                <?php if ($post["rutColaborador1"] == $rutColaborador) { ?>
                 

                    <button id="like-<?php echo $post["ridPost"]; ?>" onclick="eliminar(<?php echo $post["ridPost"]; ?>,<?php $session = Yii::$app->session; echo $session['rutColaborador']; ?>);" class="stat-item btn">
     <p class="hidden-xs"> Eliminar post</p>
     <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                <?php } ?>
            </div>

        </div>
        <div style="display:none;" id="post-<?php echo $post["ridPost"]; ?>" class="post-footer">
            <div class="input-group"> 
                <textarea maxlength="180" id="comentario-<?php echo $post["ridPost"]; ?>" name="comentario-<?php echo $post["ridPost"]; ?>" class="form-control" placeholder="Agrega un comentario" type="text" onkeydown = "if (event.keyCode == 13) {
                            enviar(<?php echo $post["ridPost"]; ?>,<?php $session = Yii::$app->session; echo $session['rutColaborador']; ?>);
                        }" onKeyUp="contarCaracteress(this,180,<?php echo $post["ridPost"]; ?>);"></textarea>
                <span class="input-group-addon">
                    <button  onclick="enviar(<?php echo $post["ridPost"]; ?>,<?php $session = Yii::$app->session; echo $session['rutColaborador']; ?>);"><i class="fa fa-edit"></i></button>  
                </span>
                 
            </div>
            <br>
            <p>Contador: <font id="contadorc-comentario-<?php echo $post["ridPost"]; ?>" >180</font></p>
            <ul class="comments-list">
                <?php
                foreach ($comentarios as $c) {
                    ?>
                    <li class="comment">
                        <a class="pull-left" href="#">
<img class="avatar" style="-ms-transform: rotate(<?php echo $c['rrotador']; ?>deg);-webkit-transform: rotate(<?php echo $c['rrotador']; ?>deg);transform: rotate(<?php echo $c['rrotador']; ?>deg);" src="../web/img/perfil/t/<?php echo $c['rfoto']; ?>" alt="avatar">
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="user"><?php echo $c["nombreColaborador"] . " " . $c["apellidosColaborador"]; ?></h4>
                                <h5 class="time"><?php echo $c["fecha"]; ?></h5>
                            </div>
                            <br>
                            <p style="text-transform: initial;" id="elComentario"><?php echo $c["rcontenido"]; ?></p>
                        </div>

                    </li>

                <?php } ?>
                <li id="<?php echo $post["ridPost"]; ?>" class="comment"></li>
            </ul>
        </div>
    </div>
</div>
