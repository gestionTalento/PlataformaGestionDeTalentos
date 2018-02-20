<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\widgets\FileInput;

?>

<?php
Modal::begin([
    "id" => "modal",
    "footer" => "", // always need it for jquery plugin
])
?>
<?php
echo "<div id='modalContent'></div>";
Modal::end();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<script type="text/javascript">
    $("#archivo1").click(function () {
        $("#archivo1").addClass('btn-success');
    });
</script>
<script>



    function enviarc(post, rut) {


        var comentario = $("#comentario-" + post + "").val();

        var dato = Boolean(comentario);


        if (dato == true) {



            $.get("index.php?r=rpost/comentarioc&rutPersona=" + rut + "&idContenido=" + post + "&comentario=" + comentario + "",
                    function (dato) {
                        var data = JSON.parse(dato);
                        $('#' + post).html('<a class="pull-left" href="#"><img class="avatars" alt="Avatar" src="../web/img/perfil/t/' + data.foto + '"></a><div class="comment-body"><div class="comment-heading"><h4 style="font-size: 11px;" class="comment-user-name"><a href="#">' + data.nombre + ' ' + data.apellidos + '</a></h4><h5 class="time">Ahora</h5></div><p>' + comentario + '</p></div>');
                        $("#comentario-" + post + "").val('');

                    }).fail(function () {
                alert("No existe conexion a internet");
                // Handle error here
            });


        } else {

            alert("Debe añadir un comentario");
        }







    }

    function reveal(idPost) {


        $("#post-" + idPost).css("display", "block");


    }

    function like(idPost, rut) {

        $.get("index.php?r=rpost/like?rutPersona=" + rut + "&idPost=" + idPost + "",
                function (dato) {

                    $("#like-" + idPost).addClass('btn-loved');
                    $("#like-" + idPost).attr('onclick', " ");
                    $("#like-" + idPost).html('<i class="fa fa-heart"></i>' + dato);



                }).fail(function () {
            alert("No existe conexion a internet");
            // Handle error here
        });


    }

    function rotate(idPost) {

        $.get("index.php?r=rpost/rotate?idPost=" + idPost + "",
                function (dato) {
                    // alert(dato);
                    //$("#rotate-" + idPost).css('transform', "deg(" + dato + ")");
                    //$('#busniessmenu').css('background-color', '#323232');
                    // $("#rotate-" + idPost).rotate(dato);
                    $('#rotate-' + idPost).css('transform', 'rotate(' + dato + 'deg)');


                }).fail(function () {
            alert("No existe conexion a internet");
            // Handle error here
        });


    }
        function rotates(rutColaborador) {

        $.get("index.php?r=rotate&rutColaborador=" + rutColaborador + "",
                function (dato) {
                    // alert(dato);
                    //$("#rotate-" + idPost).css('transform', "deg(" + dato + ")");
                    //$('#busniessmenu').css('background-color', '#323232');
                    // $("#rotate-" + idPost).rotate(dato);
                    $('#colaborador-' + rutColaborador).css('transform', 'rotate(' + dato + 'deg)');


                }).fail(function () {
            alert("No existe conexion a internet");
            // Handle error here
        });


    }
    function eliminar(idPost) {

        $.get("index.php?r=rpost/eliminar&idPost=" + idPost + "",
                function (dato) {
                  if(dato==true){
                      alert("Su post ha sido eliminado");
                  }
                  else{
                      alert("No ha sido eliminado");
                  }

                }).fail(function () {
            alert("No existe conexion a internet");
            // Handle error here
        });


    }

</script>
<style>
    p.card-text {text-align: justify;}
    .rota {
        color: #fff;
    background-color: #193276!important;
    border-color: #193276!important;
   font-family: 'Roboto', sans-serif;
    text-transform: uppercase;
    font-size: 13px;
    }
    .perfill{
                         -ms-transform: rotate(<?php echo $perfil[0]['rotador']; ?>deg);
                         -webkit-transform: rotate(<?php echo $perfil[0]['rotador']; ?>deg);
                         transform: rotate(<?php echo $perfil[0]['rotador']; ?>deg);

                         
    }
</style>


<?php //var_dump($model[0]['foto']);die();   ?>

<div class="container" style="margin-top:225px;">
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12  animated fadeInLeft">

            <div class="row">
             
                <div class="col-md-12">
                    <div class="profile-info-right">

                        <div class="tab-content">
                        <style>
                         .fb-status-update-entry textarea {
                              resize: none;
                              /* Needs to be !important, since Bootstrap sets this elsewhere. */
                              box-shadow: none !important;
                              border: none;
                            }
                            .fb-status-update-entry .media {
                              border-top: 1px solid lightgrey;
                              border-bottom: 1px solid lightgrey;
                              /* Adds whitespace between bottom border and buttons */
                              margin-bottom: 10px;
                              /* Adds whitespace between top of media object and top border. */
                              padding-top: 5px;
                            }

                            video::-internal-media-controls-download-button {
    display:none;
}

video::-webkit-media-controls-enclosure {
    overflow:hidden;
}

video::-webkit-media-controls-panel {
    width: calc(100% + 30px); /* Adjust as needed */
}
                            
                        </style>

                   


                            <!-- activities -->
                            <div class="tab-pane fade in active" id="activities">


                                <div class="conatiner" style="margin:35px auto;">
                                    <div class="row">
                                        <div class="col-md-12 results col-xs-12">
                                            
                                                
                                                <p style="text-align: center;">
                                                <video id="video2" controls preload="auto" autoplay="true">

                                                    <source src="index.php?r=rcontenido/<?php echo $video; ?>" type="video/mp4">
                                                    Tu navegador no implementa el elemento <code>video</code>.
                                                </video>
                                                <br>
                                                <button style="margin-left: 50px;" class="btn btn-primary" onclick="goBack()">Volver</button>
                                                 <br> <br>

                                                </p>
                                                

                                                
                                                <script>
                                                function goBack() {
                                                    window.history.back();
                                                }
                                                </script>
                                  



                                                    <hr>


        <div class="col-xs-12">
        <div class="input-group"> 
            <input id="comentario-<?php echo $rcontenido; ?>" name="comentario-<?php echo $rcontenido; ?>" class="form-control" placeholder="Agrega un comentario" type="text" onkeydown = "if (event.keyCode == 13) {
                        enviarc(<?php echo $rcontenido; ?>,<?php $session = Yii::$app->session; echo $session['rutColaborador']; ?>);
                    }">
            <span class="input-group-addon">
                <button  onclick="enviar(<?php echo $rcontenido; ?>,<?php $session = Yii::$app->session; echo $session['rutColaborador']; ?>);"><i class="fa fa-edit"></i></button>  
            </span>
        </div>
        <ul class="comments-list">
            <?php
           
            foreach ($comentarios as $c) {
                ?>
                <li class="comment">
                    <a class="pull-left" href="#">
<img class="avatars" style="-ms-transform: rotate(<?php echo $c['rrotador']; ?>deg);-webkit-transform: rotate(<?php echo $c['rrotador']; ?>deg);transform: rotate(<?php echo $c['rrotador']; ?>deg);" src="../web/img/perfil/t/<?php echo $c['rfoto']; ?>" alt="avatar">
                        </a>
                    <div class="comment-body">
                        <div class="comment-heading">
                            <h4 class="user"><?php echo $c["nombreColaborador"] . " " . $c["apellidosColaborador"]; ?></h4>
                            <h5 class="time">5 minutes ago</h5>
                            <p style="text-transform: capitalize;" id="elComentario"><?php echo $c["rcontenido"]; ?></p>

                        </div>
                    </div>

                </li>

            <?php } ?>
            <li id="<?php echo $contenido; ?>" class="comment"></li>
        </ul>
        </div>
    </div>


                                        </div>
                                    </div>
    
                                   
                                </div>
                               



                            </div>











                            <!-- end activities -->
                            <!-- followers -->
                          
         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
video#video2 {
    width: 60%;
}
.profile-info-right {
    margin-top: -150px;
}
     img.avatars {
    width: 53%;
}
a.pull-left {
    margin-right: -20px!important;
        margin-left: 40px!important;
}
p#elComentario {
    margin-left: 125px!important;
}
h4.user {
    font-size: 11px;
}

h5.time {
    font-size: 10px;
}
</style>