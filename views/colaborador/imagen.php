<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<script type="text/javascript">
    $("#pop<?php echo $post["ridPost"]; ?>").on("click", function() {    
   $('#m<?php echo $post["ridPost"]; ?>').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});
</script>
<style type="text/css">
    .modal-backdrop.fade.in {
        opacity: 0;
        z-index: -1;
    }

    /*
Full screen Modal 
*/
.fullscreen-modal .modal-dialog {
  margin: 0;
  margin-right: auto;
  margin-left: auto;
  width: 100%;
}
@media (min-width: 768px) {
  .fullscreen-modal .modal-dialog {
    width: 750px;
  }
}
@media (min-width: 992px) {
  .fullscreen-modal .modal-dialog {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .fullscreen-modal .modal-dialog {
     width: 1170px;
  }
}
</style>
<div class="panel panel-white post panel-shadow">        
    <div class="media activity-item">
        <div style="    margin-bottom: 10px;" class="row">
          <a href="<?php echo "compadre?rutAmigo=".$posteador[0]["rutColaborador"]; ?>" class="pull-left">
           <img src="../img/perfil/t/<?php echo $posteador[0]["rfoto"]; ?>" alt="Avatar" style="
                -ms-transform: rotate(<?php echo $posteador->rrotador; ?>deg);
            -webkit-transform: rotate(<?php echo $posteador->rrotador; ?>deg);
            transform: rotate(<?php echo $posteador->rrotador; ?>deg);

            " class="media-object avatar <?php if($post["rut1"]==$session['rut']){echo "perfill";} ?>">
           
        </a>
        <p class="activity-title"><a id="tituloPublicador" href="<?php echo "compadre?rutAmigo=".$posteador[0]["rutColaborador"]; ?>"><?php echo $posteador[0]['nombreColaborador'] . " " . $posteador[0]['apellidosColaborador']; ?></a> </p>
        <small class="text-muted">fecha: <?php echo $post["rfecha"]; ?></small>
    </div>

    <div class="media-body">


        <!-- Creates the bootstrap modal where the image will appear -->
        <div class="modal fade fullscreen-modal " id="m<?php echo $post["ridPost"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-body">
                          <button style="    margin-top: 45px;
                          float: right;
    margin-bottom: 60px;" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button><br>
<br><br><br><br>
                <img class="rotate-<?php echo $post["ridPost"]; ?>" style="
                display: block;
                margin: 0 auto 0 auto;
              
                        max-height: 800px;
                    max-width: -webkit-fill-available;
                -ms-transform: rotate(<?php echo $post['rrotador']; ?>deg);
                -webkit-transform: rotate(<?php echo $post['rrotador']; ?>deg);
                transform: rotate(<?php echo $post['rrotador']; ?>deg);

                " src="../img/post/<?php echo $post['rfoto']; ?>" alt="...">
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
<div id="fotol" class="activity-attachment">
    <a  id="pop<?php echo $post["ridPost"]; ?>">

        <img id="rotate-<?php echo $post["ridPost"]; ?>" style="
        height: : 600px!important;
        -ms-transform: rotate(<?php echo $post['rrotador']; ?>deg);
        -webkit-transform: rotate(<?php echo $post['rrotador']; ?>deg);
        transform: rotate(<?php echo $post['rrotador']; ?>deg);

        " src="../img/post/<?php echo $post['rfoto']; ?>" alt="...">
    </a>

</div>

</div>



<div class="post-description">

    <p> 
        <?php
        $cadena_resultante = preg_replace("/((http|https|www)[^\s]+)/", '<a target="_blank" href="$1">$0</a>', $post["rdescripcionPost"]);
               // var_dump($cadena_resultante);
        if ($cadena_resultante=="0") {
                 // $cadena_resultante;
        } else {
            echo $cadena_resultante;
        }
        ?>

    </p>

    <div class="stats">

        <?php
        $connection = Yii::$app->db;
        $jefe = "select rlikes as cuenta from rpost where ridPost=" . $post["ridPost"] . "";
        $command = $connection->createCommand($jefe);
        $dataReader = $command->query();
        $modela = $dataReader->readAll();
        ?>
        


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
        <button id="like-<?php echo $post["ridPost"]; ?>" onclick="rotate(<?php echo $post["ridPost"]; ?>,<?php echo $model[0]['rutColaborador']; ?>);" class="stat-item btn">
         <p class="hidden-xs"> Rotar Imagen</p>
         <i class="fa fa-undo" aria-hidden="true"></i>


     </button>

     <button id="like-<?php echo $post["ridPost"]; ?>" onclick="eliminar(<?php echo $post["ridPost"]; ?>,<?php echo $model[0]['rutColaborador']; ?>);" class="stat-item btn">
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
<img class="avatar" style="-ms-transform: rotate(<?php echo $c['rrotador']; ?>deg);-webkit-transform: rotate(<?php echo $c['rrotador']; ?>deg);transform: rotate(<?php echo $c['rrotador']; ?>deg);" src="../img/perfil/t/<?php echo $c['rfoto']; ?>" alt="avatar">
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="user"><?php echo $c["nombreColaborador"] . " " . $c["apellidosColaborador"]; ?></h4>
                                <h5 class="time"><?php echo $c["rfecha"]; ?></h5>
                            </div>
                            <br>
                            <p style="text-transform: initial;" id="elComentario"><?php echo $c["contenido"]; ?></p>
                        </div>

                    </li>

                <?php } ?>
                <li id="<?php echo $post["ridPost"]; ?>" class="comment"></li>
            </ul>
        </div>
</div>
</div>
