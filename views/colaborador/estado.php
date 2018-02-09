<?php

use yii\helpers\Html;
?>



 <section id="blog-section" >
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">

                        <div class="col-md-8 imagen">
                            <aside>
                            <div class="content-title" id="m<?php echo $post["ridPost"]; ?>">
                            <div class="post-description text-left">

                                <h3><p style="margin-top: 35px;" id="estado"><?php
                                $cadena_resultante = preg_replace("/((http|https|www)[^\s]+)/", '<a target="_blank" href="$1">$0</a>', $post['rdescripcionPost']);
                                echo $cadena_resultante;
                                ?></p>
                                </h3>
                                    </div>
                                </div>

                                <div class="content-footer">
                                    <img class="user-small-img" href="<?php echo "index.php?r=colaborador/compadre&rutAmigo=" . $posteador[0]["rutColaborador"]; ?>" src="../web/img/perfil/t/<?php echo $perfil->rfoto; ?>">
                                    <span style="font-size: 16px;color: #fff;"><?php echo $posteador[0]['nombreColaborador'] . " " . $posteador[0]['apellidosColaborador']; ?></span>
                                    <span class="pull-right">

                                        <?php
                                        $connection = Yii::$app->db;
                                        $jefe = "select count(*) as cuenta from rcomentarios where ridPost=" . $post["ridPost"] . "";
                                        $command = $connection->createCommand($jefe);
                                        $dataReader = $command->query();
                                        $modela = $dataReader->readAll();
                                        ?>

                                        <a  onclick="reveal(<?php echo $post["ridPost"]; ?>);" data-toggle="tooltip" data-placement="left" title="Comments"><i class="fa fa-comments" ></i> <?php echo $modela[0]["cuenta"]; ?></a>

                                        <?php
                                        $connection = Yii::$app->db;
                                        $jefe = "select rlikes as cuenta from rpost where ridPost=" . $post["ridPost"] . "";
                                        $command = $connection->createCommand($jefe);
                                        $dataReader = $command->query();
                                        $modela = $dataReader->readAll();
                                        ?>

                                        <a id="like-<?php echo $post["ridPost"]; ?>" onclick="like(<?php echo $post["ridPost"]; ?>,<?php
                                        $session = Yii::$app->session;
                                        echo $session['rutColaborador'];
                                        ?>);" data-toggle="tooltip" data-placement="right" title="Loved"><i class="fa fa-heart"></i> <?php echo $modela[0]["cuenta"]; ?></a>

    <?php if ($post["rutColaborador1"] == $rutColaborador) { ?>

                                            <a id="like-<?php echo $post["ridPost"]; ?>" onclick="rotate(<?php echo $post["ridPost"]; ?>,<?php
                                               $session = Yii::$app->session;
                                               echo $session['rutColaborador'];
                                               ?>);"  data-toggle="tooltip" data-placement="right" title="Loved"><i class="fa fa-undo"></i> </a>

                                            <a id="like-<?php echo $post["ridPost"]; ?>" onclick="eliminar(<?php echo $post["ridPost"]; ?>,<?php
                                           $session = Yii::$app->session;
                                           echo $session['rutColaborador'];
                                               ?>);"  data-toggle="tooltip" data-placement="right" title="Loved"><i class="fas fa-trash-alt"></i> </a>


    <?php } ?>


                                    </span>
                                     <?php if ($posteador2[0]["rutColaborador"] != 1 ) { ?>

                                    <div class="user-ditels">
                                        <div class="user-img"> <a href="<?php echo "index.php?r=colaborador/compadre&rutAmigo=" . $posteador[0]["rutColaborador"]; ?>" class="pull-left"><img src="../web/img/perfil/t/<?php echo $perfil->rfoto; ?>" alt="Avatar" class="fotoavatar" style="                                               -ms-transform: rotate(<?php echo $perfil->rrotador; ?>deg);-webkit-transform: rotate(<?php echo $perfil->rrotador; ?>deg);transform: rotate(<?php echo $perfil->rrotador; ?>deg);
                                    " class="media-object avatar fotoavatar <?php echo $post["rutColaborador1"]; ?>"> </a>     
                                        </div>
                                        <span class="user-full-ditels">
                                            <p href="
                                            <?php 
                                            Yii::$app->session; 

                                            if($posteador[0]["rutColaborador"] == 'rutColaborador'){
                                                echo "index.php?r=colaborador/compadre&rutAmigo=".'rutcolaborador';
                                            }else{
                                                echo "index.php?r=colaborador/compadre&rutAmigo=".$posteador[0]["rutColaborador"];
                                            }
                                            ?>">
                                                <?php echo $posteador[0]['nombreColaborador'] . " " . $posteador[0]['apellidosColaborador']; ?>
                                                </p>
                                                 <i class="fa fa-caret-right" aria-hidden="true"></i>
                                                <p href="<?php  echo "index.php?r=colaborador/compadre&rutAmigo=".$posteador2[0]["rutColaborador"]; ?>
                        ">
                            <?php echo $posteador2[0]['nombreColaborador'] . " " . $posteador2[0]['apellidosColaborador']; ?>
                                
                        </p>
                                    
                             <i class="fa fa-caret-right" aria-hidden="true"></i> </p>
                                            <p> Fecha: <?php echo $post["rfecha"]; ?></p>
                                        </span>

                                    </div>
                                    <?php } else { ?>

                                    <div class="user-ditels">
                                        <div class="user-img"> <a href="<?php echo "index.php?r=colaborador/compadre&rutAmigo=" . $posteador[0]["rutColaborador"]; ?>" class="pull-left"><img src="../web/img/perfil/t/<?php echo $perfil['rfoto'] ?>" alt="Avatar" class="fotoavatar" style="                                               -ms-transform: rotate(<?php echo $perfil->rrotador; ?>deg);-webkit-transform: rotate(<?php echo $perfil->rrotador; ?>deg);transform: rotate(<?php echo $perfil->rrotador; ?>deg);
                                    " class="media-object avatar fotoavatar<?php if($post["rutColaborador1"]=='rutColaborador'){echo "perfill";} ?>"> </a>  
                                    </div>   
                                     <span class="user-full-ditels">
                                            <p href="<?php echo "index.php?r=colaborador/compadre&rutAmigo=" . $posteador[0]["rutColaborador"]; ?>"><?php echo $posteador[0]['nombreColaborador'] . " " . $posteador[0]['apellidosColaborador']; ?></a> </p>
                                            <p> Fecha: <?php echo $post["rfecha"]; ?></p>
                                        </span> 
                            <?php } ?>
                                </div>
                                </div>
                                </div>

                            </aside>
                        </div>
                    </div>

                </div>

            </div>
        </div>


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
    </section>

<style type="text/css">

img.fotoavatar {
    max-width: 169%;
    padding-left: 0px;
    align-self:  left;
}
#blog-section {
    margin-top: -30px;
    margin-bottom: 30px;
}

.col-md-8.imagen {
            width: 557px;
            padding-left: 6px;
        }

        .navbar-inverse {
            background-color: #34495E;
            border-color: #34495E;
        }

        .navbar {
            position: relative;
            min-height: 50px;
            margin-bottom: 20px;
            border: 0px solid transparent;
            border-radius:0px;

        }
        .navbar-brand {

            float: left;
            height:auto;
            padding: 10px 10px;
            font-size: 18px;
            line-height: 20px;
        }
        .navbar-brand>img{ width:80%;}

        .navbar-inverse .navbar-nav > li > a {
            color: #F39C12;
        }
        .navbar-inverse .navbar-nav > li > a:hover {
            background-color: #009688;
        }

        .btn-default {
            color: #333;
            background-color: #009688;
            border-color: #009688;
            border-radius:0px;
            color:#fff;
        }

        #blog-section{margin-top: -30px; margin-bottom: 30px;}
        .content-title{padding:5px;background-color:#fff;}
        .content-title h3 a{color:#34495E;text-decoration:none; transition: 0.5s;}
        .content-title h3 a:hover{color:#F39C12; }
        .content-footer{background-color:#16A085;padding:10px;position: relative;}
        .content-footer span a {
            color: #fff;
            display: inline-block;
            padding: 6px 5px;
            text-decoration: none;
            transition: 0.5s;
        }
        .content-footer span a:hover{
            color:#F39C12;
        }
        aside{
            background-color:  white;
            margin-top: 30px;
            -webkit-box-shadow: 1px 4px 16px 3px rgba(199,197,199,1);
            -moz-box-shadow: 1px 4px 16px 3px rgba(199,197,199,1);
            box-shadow: 1px 4px 16px 3px rgba(199,197,199,1);}
        aside .content-footer>img {
            width: 33px;
            height: 33px;
            border-radius: 100%;
            margin-right: 10px;
            border: 2px solid #fff;
        }

        .user-ditels {
                width: 338px;
                top: -82px;
                height: 83px;
                padding-bottom: 85px;
                position: absolute;
                border: solid 2px #fff;
                background-color: #16a085;
                right: 29px;
                display: none;
                z-index: 1;

        }
        img.fotoavatar {
    max-width: 169%;
    padding-left: 0px;
    align-self:  left;
}

        @media (max-width:768px){
            .user-ditels {
                left: 5px;
            }

        }
        .user-small-img{cursor: pointer;}

        .content-footer:hover .user-ditels  {
            display: block;
        }


        .content-footer .user-ditels .user-img{width: 100px;height:100px;float: left;}
        .user-full-ditels h3 {
            color: #fff;
            display: block;
            margin: 0px;
            padding-top: 10px;
            padding-right: 28px;
            text-align: right;
        }
        .user-full-ditels p{
            color: #fff;
            display: block;
            margin: 0px;
            padding-right: 20px;
            padding-top: 5px;
            text-align: right;}

p#estado {
    font-size: 19px;
    margin-left: 25px;
    margin-bottom: 70px;
    padding-top: 0px;
    font-weight: 300;
}
i.fa.fa-caret-right {
    font-size: 21px;
    padding: 10px;
    color: #7f7f7f;
}
</style>

