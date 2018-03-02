<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\Controllers\BuscarController;
use kartik\widgets\FileInput;
use app\models\Colaborador;
use app\models\RAmigos;
use yii\web\Controller;
date_default_timezone_set("America/Santiago");

$lugar = 1;
$rut2 = 1;
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

<?php
Modal::begin([
    "id" => "modal1",
    "size" => "large",
    "footer" => "", // always need it for jquery plugin
])
?>
<?php
echo "<div id='modalContent'>
<img id='my_image' />
</div>";
Modal::end();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style type="text/css">
    .profile-header-background img {
            background-color: #e8000a!important;
        width: 100%;

    }

    @media only screen and (max-width : 320px) {
    aside{
        
    }
    .container-fluid.coment {
    
    }

    .well{
        width: 143%!important;
    margin-left: -19%!important;
    }

    aside {
    margin-left: -7%!important;
}
}

     @media (max-width:768px){
        section#blog-section {
    max-width: 118%!important;
    padding-right: 0%!important;
    padding-left: 0%!important;
    margin-left: -19%!important;
}
     }
</style>
<script type="text/javascript">
    function contarCaracteres(campo, campo_conteo, limite_maximo) {
        if(campo.value.length > limite_maximo)
                         { // Si es muy largo, lo cortamos!
                         campo.value = campo.value.substring(0, limite_maximo); // Substring toma del principio, osea 0, hasta el limite máximo de caracteres.  
                     }
                     else
                        { // Si no es más largo del máximo, actualizamos el contador de 'caracteres quedan'
                    var limite = limite_maximo - campo.value.length;
                    $('#contador').text("");
                    $('#contador').append(limite);
                    console.log(limite);
                }
            }

            function rotate(idPost) {

                $.get("index.php?r=rpost/rotate&idPost=" + idPost + "",
                    function (dato) {
                     //alert(dato);
                     $('#rotate-' + idPost).css('transform', 'rotate(' + dato + 'deg)');
                     $('.rotate-' + idPost).css('transform', 'rotate(' + dato + 'deg)');
                 }).fail(function () {
                    alert("No existe conexion a internet");
            // Handle error here
        });


             }
             function rotates(rutColaborador) {

                $.get("index.php?r=colaborador/rotate&rutColaborador=" + rutColaborador + "",
                    function (dato) {

                    //$("#rotate-" + idPost).css('transform', "deg(" + dato + ")");
                    //$('#busniessmenu').css('background-color', '#323232');
                    // $("#rotate-" + idPost).rotate(dato);
                    $('#colaborador-' + rutColaborador).css('transform', 'rotate(' + dato + 'deg)');


                }).fail(function () {
                    alert("No existe conexion a internet");
            // Handle error here
        });
            }
        </script>

        <script>
          function contarCaracteress(campo, limite_maximo, id) {
            if(campo.value.length > limite_maximo)
                         { // Si es muy largo, lo cortamos!
                         campo.value = campo.value.substring(0, limite_maximo); // Substring toma del principio, osea 0, hasta el limite máximo de caracteres.  
                     }
                     else
                        { // Si no es más largo del máximo, actualizamos el contador de 'caracteres quedan'
                    var limite = limite_maximo - campo.value.length;
                    $('#contadorc-comentario-'+id).text("");
                    $('#contadorc-comentario-'+id).append(limite);

                }
            }

            function enviar(post, rut) {

                var comentario = $("#comentario-" + post + "").val();

                var valid;  
                if(/^\s*$/.test(comentario))
                    valid = 1;
                else
                    valid = 2;

                var dato = Boolean(comentario);



                var ca = $('#b').text();
                var c = document.getElementById('b');
                c.innerHTML = parseInt(ca)+1;

                if (dato == true && valid == 2) {

                    $.get("index.php?r=rpost/comentario&rutPersona=" + rut + "&idPost=" + post + "&comentario=" + comentario + "",
                        function (dato) {

                         var data = JSON.parse(dato);
                         $('#' + post).html('<a class="pull-left" href="#"><img style="-ms-transform: rotate(' + data.rotate + 'deg);-webkit-transform: rotate(' + data.rotate + 'deg);transform: rotate(' + data.rotate + 'deg);     width: 49px; margin-left: 36%;" class="user-img"  src="../web/img/perfil/t/' + data.foto + '"></a><div style="margin-left: 15%;" class="comment-body"><div class="comment-heading"><h4 class="nombre">' + data.nombre + ' ' + data.apellidos + '</a></h4><h5 class="fecha">Ahora</h5></div><p style="text-transform: initial; font-size: 16px; font-weight: bold;margin-left: 17%;">' + comentario + '</p></div>');
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

            function checkform()
{
    var regex = "^\\s+$";
    cuca = document.cuca.rdescripcionPost.value;
    archivo = document.getElementById('rpost-file').value;
    

    if (cuca.match(/^\s*$/g) && archivo.length == "")
    {
        // something is wrong
        swal("Debes ingresar algún contenido");
        return false;
    }


            function like(idPost, rut) {

                $.get("index.php?r=rpost/like&rutPersona=" + rut + "&idPost=" + idPost + "",
                    function (dato) {

                        $("#like-" + idPost).addClass('btn-loved');
                        $("#like-" + idPost).attr('onclick', " ");
                        $("#like-" + idPost).html('<i class="fa fa-heart"></i>' + dato);
                        var ca = $('#d').text();
                        var c = document.getElementById('d');

                        c.innerHTML = parseInt(ca)+1;



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
                              location.reload();

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




              <?php //var_dump($model[0]['foto']);die();   ?>
              <div class="container" style="margin-top:84px;">
                <div class="row-fluid">
                    <div class="col-md-12 col-xs-12 col-sm-12  animated fadeInLeft">
                        <div class="profile-header-background">
                            <?= Html::img('@web/img/portada/beneficios2.png', ['alt' => 'Profile Header Background']); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-4 hidden-xs">
                                <div class="profile-info-left amigo" style="top: -145px!important;box-shadow: 1px 4px 20px 3px rgba(27, 4, 27, 0.44)!important;"">
                                    <div class="text-center">



                                        <?= Html::img('@web/img/perfil/' . $perfil->rfoto, ['alt' => 'Avatar', 'width' => 200, 'class' => 'avatar img-circle perfilll', 'id' => 'colaborador-' . $model->rutColaborador]); ?>

                                        <h2><?php echo $model->nombreColaborador . " " . $model->apellidosColaborador; ?></h2></h2>
                                    </div>
                                    <div class="action-buttons">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php
                                                $global = $rutColaborador;


                                                if ($rutColaborador == $model->rutColaborador) {
                                                    ?> 


                                                    <?= Html::button('Actualiza tus datos', ['value' => Url::to('index.php?r=colaborador/foto&rutColaborador=' . $model->rutColaborador . ''), 'class' => 'btn btn-lg btn-raised btn-success', 'id' => 'modalButton']) ?>
                                                    <button  onclick="rotates(<?php echo $model->rutColaborador; ?>);" class="btn btn-lg btn-raised btn-success rota">

                                                        Rotar foto
                                                        <i class="fa fa-undo" aria-hidden="true"></i>
                                                    </button>
                                                    <?php } ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="section" align="center">
                                            <h3>Sobre Mi</h3>
                                            <p><?php echo $perfil->rbio; ?></p>
                                        </div>
                                        <div class="section" align="center">
                                            <h3>Mi Valoración</h3>
                                            <p><span id="e" class="badge"><?php echo $estadistica->rcontadorP; ?></span> <br>Post Realizados</p>
                                            <p> <span id="a" class="badge"><?php echo $estadistica->rcomentarios; ?></span><br>Comentarios Realizados</p>
                                            <p><span id="b" class="badge"><?php echo $estadistica->rcomentariosr; ?></span><br>Comentarios Recibidos</p>
                                            <p><span id="c" class="badge"><?php echo $estadistica->rlikes; ?></span> <br>Me gusta Realizados</p>
                                            <p><span id="d" class="badge"><?php echo $estadistica->rlikesr; ?></span> <br>Me gusta Recibidos</p>
                                        </div>

                                         <div class="section" align="center">
                            <h3>Mis Procesos </h3>
                            <?= Html::a('<i class="fas fa-star"></i>&nbsp;Beneficios', ['colaborador/beneficios', 'rutAmigo' => $model->rutColaborador], ['class'=>'btn btn-lg btn-raised btn-success procesos' ]) ?>
                            
                           
                            
                          
                        </div>

                                        <div class="section" align="center">
                                            <h3>Mis Plataformas </h3>
                                             <button onclick="window.open('http://www.flesan.cl','_blank')" class="btn btn-lg btn-raised btn-success procesos" title="Clima">
                                <i class="fas fa-sun" aria-hidden="true"></i> Clima
                            </button>

                           
                            <button onclick="window.open('https://flesan.gointegro.com/gosocial/company/stream','_blank')" class="btn btn-lg btn-raised btn-success procesos" title="Convenios">
                                <i class="fas fa-thumbs-up" aria-hidden="true"></i> GO Integro
                            </button>
  
                            <button onclick="window.open('https://www.grupopayroll.com/webpay/loginap.aspx','_blank')" class="btn btn-lg btn-raised btn-success procesos" title="Payroll">
                                <i class="far fa-file-alt" aria-hidden="true" ></i> Payroll
                            </button>

                            <button onclick="window.open('https://www.biwiser.com/que-es-biwiser/','_blank')" class="btn btn-lg btn-raised btn-success procesos" title="Biwiser">
                                <i class="far fa-clipboard" aria-hidden="true"></i> Biwiser
                            </button>

                            <button onclick="window.open('https://www.dec.cl/login.php','_blank')" class="btn btn-lg btn-raised btn-success procesos" title="DEC">
                                <i class="far fa-check-square" aria-hidden="true"></i> DEC
                            </button> 

                            <button onclick="window.open('https://www.iconstruye.com/includes/default.aspx','_blank')" class="btn btn-lg btn-raised btn-success procesos" title="IConstruye">
                                <i class="fas fa-shopping-cart" aria-hidden="true"></i> IConstruye
                            </button>   

                            <button onclick="window.open('https://www.flesanteescucha.com/','_blank')" class="btn btn-lg btn-raised btn-success procesos" title="Canal de Denuncias">
                                <i class="fas fa-ban" aria-hidden="true"></i> Canal de Denuncias
                            </button>   

                            <button onclick="window.open('https://www.flesan.cl/','_blank')" class="btn btn-lg btn-raised btn-success procesos" title=" Control IT">
                                <i class="fas fa-shield-alt" aria-hidden="true"></i> Control IT
                            </button>   

                             <!-- Futuros Procesos
                            <button class="btn btn-lg btn-raised btn-success procesos">
                                <i class="fas fa-rocket" aria-hidden="true"></i> Inducción
                            </button>
                            <button class="btn btn-lg btn-raised btn-success procesos">
                                <i class="fas fa-tachometer-alt" aria-hidden="true"></i> Wellness Org
                            </button>
                            <button class="btn btn-lg btn-raised btn-success procesos">
                                <i class="fas fa-star" aria-hidden="true"></i> Beneficios
                            </button>
                            <button class="btn btn-lg btn-raised btn-success procesos">
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i> Aprendizaje
                            </button>
                            <button class="btn btn-lg btn-raised btn-success procesos">
                                <i class="fas fa-universal-access" aria-hidden="true"></i> Bienestar
                            </button>
                             <button class="btn btn-lg btn-raised btn-success procesos">
                                <i class="far fa-money-bill-alt" aria-hidden="true"></i> Payroll 
                            </button>
                        -->
                    </div>

                    <div class="section" align="center">
                        <h3>Mis Compañeros</h3>
                        <div class="widget panel-friends">

                            <div class="widget-body bordered-top bordered-red text-center">

                                <ul class="friends">


                                    <?php
                                    $rutColaborador = $model['rutColaborador'];
                                    $model2 = BuscarController::encuentraAmigos($model['rutColaborador']);

                                    foreach ($model2 as $amigo) {
                                        $modell3 = BuscarController::findColaboradorRut($amigo["rut2"]);

                                        $perfilamigo = BuscarController::findPerfiles($modell3["idperfilRed"]);

                                        ?>


                                        <li>

                                          <a href="<?php echo "index.php?r=colaborador/compadre&rutAmigo=".$modell3["rutColaborador"]; ?>">


                                            <img   style="

                                            -ms-transform: rotate(<?php echo $perfilamigo[0]['rrotador']; ?>deg);
                                            -webkit-transform: rotate(<?php echo $perfilamigo[0]['rrotador']; ?>deg);
                                            transform: rotate(<?php echo $perfilamigo[0]['rrotador']; ?>deg);


                                            " src="../web/img/perfil/t/<?php echo $perfilamigo[0]["rfoto"]; ?>" title="<?php echo $modell3['nombreColaborador'] . " " . $modell3['apellidosColaborador']; ?>" class="img-responsive tip perfill">

                                        </a>

                                    </li>

                                    <?php } ?>

                                </ul>

                            </div>

                        </div>
                    </div>



                </div>
            </div>
            <div class="col-md-7 col-lg-7 col-xs-12">
                <div class="profile-info-right amigo">
                    <ul class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom">

                    </ul>
                    <div class="tab-content">


                        <script type="text/javascript">



                            $("#archivo1").click(function () {
                                $("#archivo1").addClass('btn-success');
                            });
                        </script>


                        <!-- activities -->
                        <div class="tab-pane fade in active container" id="activities">
                            
                            <div class="col-md-7 col-lg-7 col-xs-12 ">
                                 <?php

                                   echo $this->render('cardpuntos',[
                                        'puntaje' => $puntaje,
                                   ]);

                                   ?>   
                            <div class="panel panel-default asw" >
                              <div class="panelb panel-heading ">
                                <h3 class="titulob panel-title " >
                                <a data-toggle="collapse" href="#collapseBene" style="visibility: visible!important;-webkit-max-logical-height: -webkit-fill-available!important;overflow-y: scroll!important;" >BENEFICIOS DISPONIBLES</a></h3>
                              </div>
                              <div id="collapseBene" class="panel-collapse collapse" style="visibility: visible!important; -webkit-max-logical-height: -webkit-fill-available!important; overflow-y: scroll!important;">
                              <div class="panel-body">
                                <?php

                                   echo $this->render('beneficios', [
                                       'beneficio' => $beneficio, 
                                       'model' => $colaborador,
                                       'rutColaborador' => $rutColaborador,
                                       'perfil' => $perfil,
                                       'puntaje' => $puntaje,
                                   ]);

                                   ?>   

                              </div>
                            </div>
                            </div>
                        </div>
                            <div class="col-md-7 col-lg-7 col-xs-12 ">
                            <div class="panel panel-default">
                              <div class="panelb panel-heading ">
                                <h3 class="titulob panel-title ">
                                <a data-toggle="collapse" href="#collapseBenem">BENEFICIOS CANJEADOS</a></h3>
                              </div>
                              <div id="collapseBenem" class="panel-collapse collapse" style="visibility: visible!important; -webkit-max-logical-height: -webkit-fill-available!important; overflow: scroll!important;">
                              <div class="panel-body beneficioh">
                                
                                 <?php

                                   echo $this->render('historial', [
                                       'historial' => $historial, 
                                  
                                   ]);

                                   ?>   

                              </div>
                            </div>
                            </div>
                        </div>
                           <div class="conatiner" style="margin:35px auto;">
                            <div class="row">
                                <div class="col-md-7 col-lg-7 col-xs-12 ">

                                  


                               </div>
                           </div>
                           <br>

                           <div class="conatiner" style="margin:35px auto;">            
                            <div class="col-md-7 col-lg-7 col-xs-12 ">
                                 <h2><p class="act">Actividades en la Red</p></h2>
                                <div class="panel panel-default publicador amigo ben">
                                  <div class="panel-body">

                                   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'name' => 'cuca', 'onSubmit' => 'return checkform()'], 'action' => ['colaborador/post']]); ?>

                                   <div class="row">


                                    <input type="hidden" name="rutColaborador" value="<?php echo $rutColaborador; ?>">
                                    <input type="hidden" name="rut2" value="<?php echo $rut2; ?>">

                                </div>

                                <div class="media">
                                  <div class="media-left media-top">

                                  </div>
                                  <div class="media-body">
                                    <div class="form-group">
                                      <!-- rows="2" means "display the textarea as 2 rows high". The user can
                                         enter more than 2 rows of text. -->
                                         <div class="col-md-10 col-xs-7">
                                            <?= Yii::$app->session->getFlash('error'); ?>
                                            <textarea onKeyDown="contarCaracteres(this.form.rdescripcionPost, this.form.remLen, 180);" placeholder="Que estás pensando hoy??? " maxlength="180"  name="rdescripcionPost" data-ls-module="charCounter" placeholder="Que estás pensando hoy??? " rows="5" maxlength="180" class="form-control input-lg p-text-area"></textarea>
                                            <p>Contador: <font id="contador">180</font></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-pills">
                              <li role="presentation" class="active">

                                <?= $form->errorSummary($model); ?>
                                <?=
                                $form->field($model3, 'file')->widget(FileInput::classname(), [
                                    'pluginOptions' => [
                                        'showCaption' => false,
                                        'showRemove' => false,
                                        'showCancel' => false,
                                        'ShowLabel' => false,
                                        'showUpload' => false,
                                        'browseClass' => 'btn btn-primary',
                                        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                                        'browseLabel' => 'Selecciona tu archivo a subir']
                                    ])->label(false);
                                    ?>

                                </li>

                                <li role="presentation" class="active">
                                    <button class="btn btn-primary"  type="submit" data-toggle="collapse" data-target="#demo1" ><span class=" glyphicon glyphicon-pencil">
                                    </span> <strong>Publicar</strong></button>
                                </li>

                            </ul>
                        </div>
                        <?php ActiveForm::end(); ?>


                    </div>

                </div>
            </div>

            <div class="col-md-7 col-lg-7 col-xs-12 results"></div>
        </div>
        <div class="text-center" id="loading">
            <img src="" id="ani_img"/>
        </div>
        <button class="btn btn-block btn-primary hidden-lg hidden-md" onclick="myContent2();">Cargar mas!</button>
    </div>
    <script>
        var mypage = 1;
        mycontent(mypage);
        $(window).scroll(function(){
            if($(window).scrollTop() >= $(document).height() - $(window).height() - 4){
                mypage++;
                mycontent(mypage);
            }
        })
        function mycontent(mypage){

            $('#ani_img').show();
            $.get('index.php?r=colaborador/reloadr&page='+mypage+'&rutColaborador=<?php echo $rutColaborador; ?>&rutAmigo=<?php echo $rutAmigo; ?>', function(data){
                if(data.trim().length == 0){
                   $('#loading').append('<button style="margin-right:35%;margin-bottom:10%;" class="btn btn-primary btn btn-primary">No existen más post disponibles</button>');
                   var e = document.getElementById("loading");
                   e.id = "loadings";
                   document.getElementById('ani_img').style.display = 'none';
                   document.getElementById('ani_img').style.visibility = 'none';
                   var s = document.getElementById("ani_img");
                   s.id = "ani_imgs"
               }
               $('.results').append(data);

               $('.well').animate({scrollTop: $('#loading').offset().top}, 5000, 'easeOutBounce');
               document.getElementById("ani_img").style.display = "none";
               setInterval(function(){ },3000);

           })
        }


        function myContent2(){
           mypage++;
           mycontent(mypage);
       }
   </script>


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
</div>
