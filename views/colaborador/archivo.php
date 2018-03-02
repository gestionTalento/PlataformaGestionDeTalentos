<?php

use yii\helpers\Html;
?>
<script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

 <section id="blog-section" class="col-md-12 col-sm-12" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-sm-12 col-md-12 imagen">
                            <aside>

        <div class="activity-attachment" >

        <?php if($post['rfoto']=="pdf.png"){ ?>
        <a target="_blank " href="../web/img/archivos/<?php echo $post['rdescripcionPost']; ?>">
        <img class="img-responsive archivo rotate-<?php echo $post["ridPost"]; ?>" 
        src="../web/img/pdf.png" alt="Uploaded photo" ></a>
        <?php } ?>
        <?php if($post['rfoto']=="word.png"){ ?>                        
        <a target="_blank" href="../web/img/archivos/<?php echo $post['rdescripcionPost']; ?>">    
        <img class="img-responsive archivo rotate-<?php echo $post["ridPost"]; ?>" 
        src="../web/img/word.png" alt="Uploaded photo"></a>
        <?php } ?>
        <?php if($post['rfoto']=="excel.png"){ ?>
        <a target="_blank" href="../web/img/archivos/<?php echo $post['rdescripcionPost']; ?>">    
        <img class="img-responsive archivo rotate-<?php echo $post["ridPost"]; ?>" 
        src="../web/img/excel.png" alt="Uploaded photo"></a>
        <?php } ?>
        <?php if($post['rfoto']=="power.png"){ ?>
        <a target="_blank" href="../web/img/archivos/<?php echo $post['rdescripcionPost']; ?>">    
        <img class="img-responsive archivo rotate-<?php echo $post["ridPost"]; ?>" 
        src="../web/img/power.png" alt="Uploaded photo"></a>
        <?php } ?>

        <a target="_blank" href="../web/img/archivos/<?php echo $post['rdescripcionPost']; ?>"> Descargar archivo <?php echo $post['rnombreArchivo']; ?></a>

        </div>
        <div class="content-title" id="m<?php echo $post["ridPost"]; ?>">
        <div class="post-description text-left">
                <h3><p>
                </p></h3>
        </div>
        </div>


            <div class="content-footer">
                                    <img class="user-small-img" src="../web/img/perfil/t/<?php echo $perfil->rfoto; ?>" style="                                               -ms-transform: rotate(<?php echo $perfil->rrotador; ?>deg);-webkit-transform: rotate(<?php echo $perfil->rrotador; ?>deg);transform: rotate(<?php echo $perfil->rrotador; ?>deg);
                                    ">
                                    <a id="letra" href="<?php echo "index.php?r=colaborador/compadre&rutAmigo=".$posteador[0]["rutColaborador"]; ?>"><?php echo $posteador[0]['nombreColaborador'] . " " . $posteador[0]['apellidosColaborador']; ?></a>
                                    <span class="pull-right">

                                        <?php
                                        $connection = Yii::$app->db;
                                        $jefe = "select count(*) as cuenta from rcomentarios where ridPost=" . $post["ridPost"] . "";
                                        $command = $connection->createCommand($jefe);
                                        $dataReader = $command->query();
                                        $modela = $dataReader->readAll();
                                        ?>

                                        <a  onclick="reveal(<?php echo $post["ridPost"]; ?>);" data-toggle="tooltip" data-placement="left" title="Comentarios"><i class="fa fa-comments" ></i> <?php echo $modela[0]["cuenta"]; ?></a>

                                        <?php
                                        $connection = Yii::$app->db;
                                        $jefe = "select rlikes as cuenta from rpost where ridPost=" . $post["ridPost"] . "";
                                        $command = $connection->createCommand($jefe);
                                        $dataReader = $command->query();
                                        $modela = $dataReader->readAll();
                                        ?>

                                        <?php if($megusta==true){


                ?>
               <a class="btn-loved" data-toggle="tooltip" data-placement="right" title="Me gusta"><i class="fa fa-heart"></i><?php echo $modela[0]["cuenta"]; ?></a>
                 <?php
                }else {?>

                  <a id="like-<?php echo $post["ridPost"]; ?>" onclick="like(<?php echo $post["ridPost"]; ?>,<?php
                                        $session = Yii::$app->session;
                                        echo $session['rutColaborador'];
                                        ?>);" data-toggle="tooltip" data-placement="right" title="Me gusta"><i class="fa fa-heart"></i> <?php echo $modela[0]["cuenta"]; ?></a>
                <?php
                }?>

    <?php if ($post["rutColaborador1"] == $rutColaborador) { ?>

                                            <a id="like-<?php echo $post["ridPost"]; ?>" onclick="eliminar(<?php echo $post["ridPost"]; ?>,<?php
                                           $session = Yii::$app->session;
                                           echo $session['rutColaborador'];
                                               ?>);"  data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fas fa-trash-alt"></i> </a>


    <?php } ?>

                                    </span>
                                    <div class="user-ditels">
                                        <div class="user-img"> <a href="<?php echo "index.php?r=colaborador/compadre&rutAmigo=" . $posteador[0]["rutColaborador"]; ?>" class="pull-left"><img src="../web/img/perfil/t/<?php echo $perfil->rfoto; ?>" alt="Avatar" class="fotoavatar" style="                                               -ms-transform: rotate(<?php echo $perfil->rrotador; ?>deg);-webkit-transform: rotate(<?php echo $perfil->rrotador; ?>deg);transform: rotate(<?php echo $perfil->rrotador; ?>deg);
                                    " class="media-object fotoavatar <?php echo $post["rutColaborador1"]; ?>"> </a>
                                        </div>
                                        <span class="user-full-ditels">
                                            <p href="<?php echo "index.php?r=colaborador/compadre&rutAmigo=" . $posteador[0]["rutColaborador"]; ?>"><?php echo $posteador[0]['nombreColaborador'] . " " . $posteador[0]['apellidosColaborador']; ?></a> </p>
                                            <p> Fecha: <?php echo $post["rfecha"]; ?></p>
                                        </span>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>

                </div>

            </div>
        </div>

<div class="container-fluid coment">
    <div style="display:none;" id="post-<?php echo $post["ridPost"]; ?>" class="post-footer">
        <div class="input-group">
            <textarea maxlength="180" id="comentario-<?php echo $post["ridPost"]; ?>" name="comentario-<?php echo $post["ridPost"]; ?>" class="form-control" placeholder="Agrega un comentario" type="text" onkeydown = "if (event.keyCode == 13) {
                                enviar(<?php echo $post["ridPost"]; ?>,<?php
                      $session = Yii::$app->session;
                      echo $session['rutColaborador'];
    ?>);
                            }" onKeyUp="contarCaracteress(this, 180,<?php echo $post["ridPost"]; ?>);"></textarea>
            <span class="input-group-addon">
                <button  onclick="enviar(<?php echo $post["ridPost"]; ?>,<?php
                         $session = Yii::$app->session;
                         echo $session['rutColaborador'];
    ?>);"><i class="fa fa-edit"></i></button>
            </span>

        </div>
        <br>
        <p>Contador: <font id="contadorc-comentario-<?php echo $post["ridPost"]; ?>" >180</font></p>
        <ul class="comments-list" style=" list-style-type: none;">
    <?php
    foreach ($comentarios as $c) {
        ?>
                 <li class="comment">
                     <a class="pull-left" href="#">
                     <div class="user-img img-circle"><p><img src="../web/img/perfil/t/<?php echo $c['rfoto']; ?>" alt="avatar" class="fotocomentario" style="-ms-transform: rotate(<?php echo $c['rrotador']; ?>deg);-webkit-transform: rotate(<?php echo $c['rrotador']; ?>deg);transform: rotate(<?php echo $c['rrotador']; ?>deg);"
                      <?php echo $post["rutColaborador1"]; ?>
                     ></p>
                     </div>
                     </a>
                       <div class="comment-body">
                        <div class="comment-heading">
                            <p><h4 class="nombre"><?php echo $c["nombreColaborador"] . " " . $c["apellidosColaborador"]; ?></h4>
                            <h5 class="fecha"><?php echo $c["fecha"]; ?></h5></p>
                        </div>
                        
                        <p style="text-transform: initial;" id="elComentario"><?php echo $c["rcontenido"]; ?></p>
                        <br>
                    </div>
                    
                    </li>

    <?php } ?>
            <li id="<?php echo $post["ridPost"]; ?>" class="comment"></li>
        </ul>

    </div>
    </section>