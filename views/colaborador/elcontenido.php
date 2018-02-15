<?php

use yii\helpers\Html;
?>
         <div class="contenido col-xs-12">
      <div class="media">
        <a class="pull-left col-xs-6 col-md-5" >
            <img class="media-object" src="../contenidoPortada/<?php echo $contenido['portada'] ?>">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?php echo $contenido["rtitulo"]; ?></h4>
          <p><?php echo $contenido['rdescripcion'] ?></p>
          <ul class="list-inline list-unstyled">
            <li><span><i class="glyphicon glyphicon-calendar"></i> <?php echo $contenido["rduracion"]; ?> </span></li>
            <li>|</li>
            <?php
            $connection = Yii::$app->db;
            $jefe = "select count(*) as cuenta from rcomentariocontenidos where idContenido=" . $contenido["idContenido"] . "";
            $command = $connection->createCommand($jefe);
            $dataReader = $command->query();
            $modela = $dataReader->readAll();
            ?>
            <span onclick="reveal(<?php echo $contenido["idContenido"]; ?>);"><i class="glyphicon glyphicon-comment"></i>&nbsp;<?php echo $modela[0]["cuenta"]; ?></span>
            
            <li>
            <a href="/frontend/web/colaborador/cine?video=<?php echo $contenido["rlink"]; ?>&idContenido=<?php echo $contenido["idContenido"]; ?>">Acceder</a>
</li>
          
            </ul>
       </div>
    </div>
    <div style="display:none;" id="post-<?php echo $contenido["idContenido"]; ?>" class="post-footer">
        <hr>

        <div class="input-group"> 
            <input id="comentario-<?php echo $contenido["idContenido"]; ?>" name="comentario-<?php echo $contenido["idContenido"]; ?>" class="form-control" placeholder="Agrega un comentario" type="text" onkeydown = "if (event.keyCode == 13) {
                        enviarc(<?php echo $contenido["idContenido"]; ?>,<?php $session = Yii::$app->session; echo $session['rutColaborador']; ?>);
                    }">
            <span class="input-group-addon">
                <button  onclick="enviar(<?php echo $contenido["idContenido"]; ?>,<?php $session = Yii::$app->session; echo $session['rutColaborador']; ?>);"><i class="fa fa-edit"></i></button>  
            </span>
        </div>
        <ul class="comments-list">
            <?php
           
            foreach ($comentarios as $c) {
                ?>
                <li class="comment">
                    <a class="pull-left" href="#">
<img class="avatars" style="-ms-transform: rotate(<?php echo $c['rrotador']; ?>deg);-webkit-transform: rotate(<?php echo $c['rrotador']; ?>deg);transform: rotate(<?php echo $c['rrotador']; ?>deg);" src="../img/perfil/t/<?php echo $c['foto']; ?>" alt="avatar">
                    </a>
                    <div class="comment-body">
                        <div class="comment-heading">
                            <h4 class="user"><?php echo $c["nombreColaborador"] . " " . $c["apellidosColaborador"]; ?></h4>
                            <h5 class="time">5 minutes ago</h5>
                            <p id="elComentario"><?php echo $c["contenido"]; ?></p>

                        </div>
                    </div>

                </li>

            <?php } ?>
            <li id="<?php echo $contenido["idContenido"]; ?>" class="comment"></li>
        </ul>
    </div>
  </div>
