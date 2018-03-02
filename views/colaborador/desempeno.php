
<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use yii\web\Controller;
use app\Controllers\BuscarController;
use app\models\Colaborador;
use app\models\RAmigos;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use light\widgets\SweetAlert;

date_default_timezone_set("America/Santiago");


?>

<style type="text/css">
  @charset "UTF-8";

/* CSS Document */

@import url('https://fonts.googleapis.com/css?family=Inconsolata|Nunito+Sans|Nunito:800|Pacifico');
html {
  font-family: 'Roboto', sans-serif;
}

h4 {
  font-family: 'Roboto', sans-serif;
}

a {
  border-color: transparent;
  background-color: transparent;
}

p {
  font-family: 'Roboto', sans-serif;
}
body {
            font-family: 'Roboto', sans-serif !important;
            background: #e4e4e4!important;
            overflow-x: hidden;
            margin-bottom: 60px;
        }

    
    .perfilll{
        -ms-transform: rotate(<?php echo $perfil->rrotador; ?>deg)!important;
        -webkit-transform: rotate(<?php echo $perfil->rrotador; ?>deg)!important;
        transform: rotate(<?php echo $perfil->rrotador; ?>deg)!important;


    }
    .perfill{
        -ms-transform: rotate(<?php echo $perfil->rrotador; ?>deg);
        -webkit-transform: rotate(<?php echo $perfil->rrotador; ?>deg);
        transform: rotate(<?php echo $perfil->rrotador; ?>deg);


    }


.list-group {
  display: inline-block;
  margin: 1em;
  width: 95%;
  box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
}

.list-group-item {
  margin: auto;
  display: block;
  width: 100%;
}

.list-group-item.active,
.list-group-item.active:hover,
.list-group-item.active:focus {
  z-index: 2;
  color: #fff;
  background-color: transparent;
  border-color: transparent;
}

.purple-bg {
  background: #6a3093;
  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #a044ff, #6a3093);
  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #a044ff, #6a3093);
  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.blue-bg {
  background: #00d2ff;
  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #00d2ff, #928dab);
  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #00d2ff, #928dab);
  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.pink-bg {
  background: #ff00cc;
  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #ff00cc, #333399);
  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #ff00cc, #333399);
  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.white-bg {
  background-color: rgb(255, 255, 255);
  padding: 2em 0;
  width: 100%;
  margin: auto;
}

.glyphicon-cloud {
  font-size: 30px;
  margin-top: 2px;
  margin-left: 70%;
  z-index: 10;
  padding: 15px;
  position: absolute;
  color: #e1f5fe;
  box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
}

.glyphicon-music {
  font-size: 30px;
  margin-top: 2px;
  margin-left: 70%;
  z-index: 10;
  padding: 15px;
  position: absolute;
  color: #ea80fc;
  box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
}

.glyphicon-gift {
  font-size: 30px;
  margin-top: 2px;
  margin-left: 70%;
  z-index: 10;
  padding: 15px;
  position: absolute;
  color: #651fff;
  box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
}

.custom-button {
  font-family: 'Roboto', sans-serif;
  font-size: 1.3em;
  font-weight: 800;
  background: #f7971e;
  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #f7971e, #ffd200);
  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #f7971e, #ffd200);
  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  margin-left: 50%;
  margin-top: -32px;
  width: 35%;
 /* box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);*/
}

.custom-button:hover {
  position: relative;
  cursor: pointer;
  display: inline-block;
  overflow: hidden;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  vertical-align: middle;
  transform: scale(1.1);
  transition: .3s ease-out;
}


/* Medium devices (desktops, 992px and up) */

@media (min-width: 480px) {
  .row {
    padding-bottom: 0px !important;
  }
  .glyphicon-cloud {
    font-size: 30px;
    margin-top: 2px;
    margin-left: 70%;
    z-index: 10;
    padding: 15px;
    position: absolute;
    color: #e1f5fe;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
  .glyphicon-music {
    font-size: 30px;
    margin-top: 2px;
    margin-left: 70%;
    z-index: 10;
    padding: 15px;
    position: absolute;
    color: #ea80fc;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
  .glyphicon-gift {
    font-size: 30px;
    margin-top: 2px;
    margin-left: 70%;
    z-index: 10;
    padding: 15px;
    position: absolute;
    color: #651fff;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
  .custom-button {
    font-family: 'Roboto', sans-serif;
    font-size: 1.3em;
    font-weight: 800;
    background: #f7971e;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #f7971e, #ffd200);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #f7971e, #ffd200);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    margin-left: 60%;
    margin-top: -30px;
    width: 30%;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
}


/* Small devices (tablets, 768px and up) */

@media (min-width: 768px) {
  .row {
    padding-bottom: 0px !important;
  }
  .list-group {
    display: inline-block;
    margin: 0 auto;
    width: 33%;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
  .list-group-item {
    display: block;
    width: 100%;
    padding: 10px 15px;
  }
  .list-group-item.active,
  .list-group-item.active:hover,
  .list-group-item.active:focus {
    z-index: 2;
    color: #fff;
    background-color: transparent;
    border-color: transparent;
  }
  .purple-bg {
    background-color: #673ab7;
  }
  .blue-bg {
    background-color: #039be5;
  }
  .pink-bg {
    background-color: #f06292;
  }
  .white-bg {
    background-color: rgb(255, 255, 255);
    padding: 2em 0;
    width: 100%;
  }
  .glyphicon-cloud {
    font-size: 30px;
    margin-top: 10px;
    margin-left: 10px;
    z-index: 10;
    padding: 15px;
    position: absolute;
    color: #e1f5fe;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
  .glyphicon-music {
    font-size: 30px;
    margin-top: 10px;
    margin-left: 10px;
    z-index: 10;
    padding: 15px;
    position: absolute;
    color: #ea80fc;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
  .glyphicon-gift {
    font-size: 30px;
    margin-top: 10px;
    margin-left: 10px;
    z-index: 10;
    padding: 15px;
    position: absolute;
    color: #651fff;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
  .custom-button {
    font-family: 'Roboto', sans-serif;
    font-size: 1em;
    font-weight: 800;
    background: #f7971e;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #f7971e, #ffd200);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #f7971e, #ffd200);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    margin-left: 125px;
    margin-top: -30px;
    width: 100px;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
}


/* Medium devices (desktops, 992px and up) */

@media (min-width: 992px) {
  div.row {
    padding-bottom: 0px!important;
  }
  .list-group {
    display: inline-block;
    margin: 0 auto;
    width: 33%;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
  .list-group-item {
    display: inline-block;
    width: 100%;
    padding: 0 15px;
  }
  .list-group-item.active,
  .list-group-item.active:hover,
  .list-group-item.active:focus {
    z-index: 2;
    color: #fff;
    background-color: transparent;
    border-color: transparent;
  }
  .purple-bg {
    background-color: #673ab7;
  }
  .blue-bg {
    background-color: #039be5;
  }
  .pink-bg {
    background-color: #f06292;
  }
  .white-bg {
    background-color: rgb(255, 255, 255);
    width: 100%;
  }
  .glyphicon-cloud {
    font-size: 60px;
    margin-top: 10px;
    margin-left: 10px;
    z-index: 10;
    padding: 15px;
    position: absolute;
    color: #e1f5fe;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
  .glyphicon-music {
    font-size: 60px!important;
    margin-top: 10px;
    margin-left: 10px;
    z-index: 10;
    padding: 15px;
    position: absolute;
    color: #ea80fc;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
  .glyphicon-gift {
    font-size: 60px!important;
    margin-top: 10px;
    margin-left: 10px;
    z-index: 10;
    padding: 15px;
    position: absolute;
    color: #651fff;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
  .custom-button {
    font-family: 'Roboto', sans-serif;
    font-size: 1.25em;
    font-weight: 800;
    background: #f7971e;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #f7971e, #ffd200);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #f7971e, #ffd200);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    margin-left: 200px;
    margin-top: -30px;
    width: 120px;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
}


/* Large devices (large desktops, 1200px and up) */

@media (min-width: 1200px) {
  div.row {
    padding-bottom: 0px!important;
  }
  .list-group {
    display: inline-block;
    margin: 0 auto;
    width: 33%;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
  .list-group-item {
    display: inline-block;
    width: 100%;
  }
  .list-group-item.active,
  .list-group-item.active:hover,
  .list-group-item.active:focus {
    z-index: 2;
    color: #fff;
    background-color: transparent;
    border-color: transparent;
  }
  
  .white-bg {
    background-color: rgb(255, 255, 255);
    width: 100%;
  }
  
  .custom-button {
    font-family: 'Roboto', sans-serif;
    font-size: 1.5em;
    font-weight: 800;
    background: #f7971e;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #f7971e, #ffd200);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #f7971e, #ffd200);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    margin-left: 200px;
    margin-top: -30px;
    width: 130px;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
  }
}
.row {
    margin-top: 3%;
}

.BeneficioNombre {
    background-color: #e8000a;
    padding: 1em 0;
    width: 100%;
    padding-top: 1%;
    padding-bottom: 1%;
}

.puntos {
    background-color:  #343434;
    margin-right: 27%;
    padding-left: -5%;
    margin-left: 11%;
}



a.list-group-item {background-color: #e4e4e4!important;}

.white-bg {
    background-color: #e4e4e4!important;
}
.puntos {
    height: 1%;
    width: 70%;
    padding: 1%;
}
button.btn.btn-lg.btn-raised.btn-success.beneficios {
    text-transform: uppercase;
    font-family: 'Roboto', sans-serif;
    background-color: #e8000a!important;
    border-color: #e8000a!important; 
    height: 35px;
    font-size: 11px;
    font-weight: bold;
  }

  .informacion {
    margin-right: -35%!important;
    margin-left: -5%!important;
}
.user-ditels.beneficio {
      margin-right: -327%;
    /* margin-left: 55%; */
    margin-top: 21%;
    width: 330%;
    max-height: 58%;
    background-color: #717070;
    border-color: transparent;
}

.content-footer.beneficio {
    background-color: transparent!important;
    padding: 0px!important;
    position: absolute!important;
}

p.descr {
    font-size: 12px!important;
    text-transform: initial!important;
    padding-top: 7%!important;
    padding-right: 0%!important;
    text-align: -webkit-auto!important;
}

@media (max-width:768px){
  .informacion {
    margin-top: 63%!important;
    margin-right: -33%!important;
    margin-left: -16%!important;
}

img.ben{
    margin-top: -5%!important;
    width: 57%!important;
    max-width: 175%!important;
    margin-left: 19%!important;
  }
  button.btn.btn-lg.btn-raised.btn-success.beneficios {
    margin-left: 23%!important;
  }
}

</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
<script type="text/javascript">

  function solicitar(idbeneficio,rutColaborador) {
      var solicitar = $("#solicitar-" + idbeneficio + "").val();
      var dato = Boolean(solicitar);
      var c = document.getElementById('c');


        
                	swal({
					  title: "Confirmación",
					  text: "¿Seguro que desea canjear este beneficio seleccionado?",
					  icon: "warning",
					  buttons: ["Cancelar", true],
					  dangerMode: true,
					})
					.then((willDelete) => {
						
					  if (willDelete) {

					  	$.get("index.php?r=colaborador/solicitar&idbeneficio=" + idbeneficio + "&rutColaborador=" + rutColaborador + "" ,

                function (dato) {
					  	  if(dato == 1){
			                $("#solicitar-" + idbeneficio).addClass('btn-primary');
			                $("#solicitar-" + idbeneficio).attr('onclick', " ");
			                $("#solicitar-" + idbeneficio + "").val('');
                            swal("Su beneficio ha sido canjeado correctamente.")
                          .then((value) => {
                             location.reload();
                          });

                        }else{
                          if(dato==4){
                                       swal("Beneficio ya ha sido utilizado este Año")
                                    .then((value) => {
                           
                                    });
                        }else{

                          if(dato==0){
                                       swal("No tiene suficiente puntaje para canjear este beneficio.")
                                    .then((value) => {
                           
                                    });


                          }else{

                               swal("Beneficio ya ha sido utilizado este mes.")
                          .then((value) => {
                 
                          });

                          }


							}
                         
                        }
                        }).fail(function () {
				            alert("No existe conexion a internet");
				            // Handle error here
				        });

					  } else {
					    swal("Su canje no ha sido efectuado!");
					  }
					});

                
                


    }
</script>


<section>

<div class="col-sm-12 col-md-12 col-lg-12"></div>
  <div class="container-fluid">
    <div class="row" style="overflow-y: scroll;" >
    <?php foreach ($beneficio as $t) {

         $anio = BuscarController::canjeA($rutColaborador, $t["bId_Beneficio"]);
         
       ?>  
      <div class=" col-md-6" style="    margin-top: 3%;">

       <div class="BeneficioNombre"> <center><h4 style="color: #fff; text-transform: uppercase; font-size:13px!important; font-weight: bold;"><?php echo $t["bNombre"]; ?></h4></center></div>
        
        <a class="list-group-item ">

          <div class="row">
            <div class="col-sm-12">
           
            <div class="col-sm-4"> <div class="content-footer beneficio"><span aria-hidden="true"><img class="ben" style="margin-top: 23%;width: 150%;max-width: 150%;    margin-left: -35%;" src="../web/img/beneficios/<?php echo $t["bimagen"]; ?>"></span>
             <div class="user-ditels beneficio">
                                       
                                        <span class="user-full-ditels">
                                           
                                            <p class="descr"><?php echo $t["bDescripcion"]; ?></p>
                                        </span>

                                    </div>
                       </div>
          </div>
            <div class="col-sm-8">
            <div class="informacion">
              <div class="puntos">
              <p><h4 style="color:#fff; text-transform: lowercase; font-weight: bold;" align="center"><?php echo $t["bValorBeneficio"]; ?> ptos</h4></p>
              </div>
              <br>
              <p style="text-transform: capitalize; color: black; font-size: 14px;"><?php echo $anio; ?>/<?php echo $t["bvezporanio"]; ?> usados x <strong>año</strong></p>
              <p style="text-transform: capitalize; color: black; font-size: 14px;">Veces canjeable por <strong>mes</strong>: <?php echo $t["bvezpormes"]; ?></p>
            </div>
                      
             <button align="center" class="btn btn-lg btn-raised btn-success beneficios" id="solicitar-<?php echo $t["bId_Beneficio"]; ?>" onclick="solicitar(<?php echo $t["bId_Beneficio"]; ?>,<?php
                                        $session = Yii::$app->session;
                                        echo $session['rutColaborador'];
                                        ?>);">Solicitar</button>

            </div>
            </div>
          </div>
      
         
        </a>
     
      </div>

      <?php

        } ?>
    
    </div>
  </div>
</section>
