<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Html;
use common\widgets\Alert;
use yii\bootstrap\Modal;

function encuentraColaborador($rutColaborador) {
    if (($model = \app\models\Colaborador::find()->where(['rutColaborador' => $rutColaborador])->all()) !== null) {

        return $model;
    } else {

        return $this->render('login', [
                    'model' => $model,
        ]);
    }
}

function encuentraAmigos($rutColaborador) {
    if (($model = \app\models\Dependencia::find()->where(['rutColaborador1' => $rutColaborador])->all()) !== null) {

        return $model;
    }
}

$session = Yii::$app->session;

if ($session->isActive) {
    $rutColaborador = $session['rut'];
    $nombre = $session['nombreColaborador'];
    $apellidos = $session['apellidosColaborador'];
    $foto = $session['foto'];
}


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- If you'd like to support IE8 -->
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <style>

        .navbar-principal .navbar-brand, .navbar-principal .navbar-brand li a:visited, .navbar-principal .navbar-nav li a {
        color: #ffffff!important;
        font-weight: 500;
        padding-top: 35px;
        }

        body {
            font-family: 'Roboto', sans-serif !important;
            background: #e4e4e4;
            overflow-x: hidden;
            margin-bottom: 60px;
        }

        .navbar-principal {
            background-color: #343434!important;
            /* background-color: #9f9fa2; */
            border-color: rgba(202, 86, 67, 0.42);
            box-shadow: 0 2px 2px -2p xrgba(0, 0, 0, .52);*/
        }

         .navbar-principal .navbar-nav .open a, .navbar-principal .navbar-nav .open a:hover, .navbar-principal .navbar-nav li a:hover, .navbar-principal .navbar-nav li a:focus, .navbar-principal .navbar-nav .active a, .navbar-principal .navbar-nav .active a:hover {
            color: #fff!important;
                 background-color: #343434 !important;
              
        }
       
        a.navbar-brand {
            padding: 14px 8px!important;
        }

        div#fotol {
            max-height: 390px;
        }

        img#logo {
            width: 51%!important;
            margin-left: 13%!important;
            margin-top: -10%!important;
        }
        
        ul.nav.navbar-nav.navbar-right {
            color: #fff;
            background-color: #343434;
            margin-top: -40px!important;
        }

        video#video2 {
            width: 100%;
            height: 480px;
        }

        .post .post-footer .comments-list .comment .avatar {
            width: 45px!important;
            height: 45px!important;
        }

        p#estado {
            word-wrap: break-word; 
        }


        p#elComentario {
            font-family: 'Roboto', sans-serif !important;
            font-size: 16px;
            font-weight: bold;
        }

        video::-internal-media-controls-download-button {
            display:none;
        }

        .file-actions {
            display: none;
        }

        textarea.form-control.input-lg.p-text-area {
            color: #000000!important;
        }

        video::-webkit-media-controls-enclosure {
            overflow:hidden;
        }

        video::-webkit-media-controls-panel {
            width: calc(100% + 30px); /* Adjust as needed */
        }

        @media only screen and (max-width : 768px) {
            button.navbar-toggle.collapsed {
                    background-color: #404040!important;
            }
            a.navbar-brand {
    padding: 0px 3px!important;
}

            span.icon-bar {
                background-color: #fff;
            }

            .navbar-header {
                 background-color: #2e2e2e !important;
            }
            button.navbar-toggle.collapsed {
                background-color: #02398b;
            }

            span.icon-bar {
                background-color: white!important;
            }
        }

        @media only screen and (max-width : 320px) {
            button.navbar-toggle.collapsed {
                background-color: #404040!important;
            }

            span.icon-bar {
                background-color: #fff;
            }

            .navbar-header {
                background-color: #14377d;
            }
            aside {
                width: 290px !important; 
                max-width: 290px;
            } 
            img#logo {
                width: 51%!important;
                margin-left: 13%!important;
                margin-top: -42%!important;
            }
        }



        .container {
            padding-right: 8px!important; 
            padding-left: 8px!important; 

        }

    </style>





    <script type="text/javascript">

        function notifica(rutColaborador) {

            $.get("notificacion?rutColaborador=" + rutColaborador + "",
                    function (dato) {
                        obj = JSON.parse(dato);


                        var c = document.getElementById('contador');
                        c.innerHTML = obj.contador;




                        //alert(obj.contador);
                        console.log(obj);

                    });


        }

    </script>
















    <body>

        <?php
        Modal::begin([
            "id" => "modalImagen",
            "footer" => "", // always need it for jquery plugin
        ])
        ?>
        <?php
        echo "<div id='modalContent'></div>";
        Modal::end();
        ?>


        <nav class="navbar navbar-default navbar-fixed-top navbar-principal"  >

            <div class="container-fluid">

                <div class="navbar-header bounceInLeft">

                    <button type="button" class="navbar-toggle collapsed bounceInLeft" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style=" margin-top: 20px;">

                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                    </button>

                    <a class="navbar-brand hidden-xs hidden-md" >

                        <b><img style="width: 100px; margin-left: 5px; margin-top: -18px;" id="logo" src="../web/flesan.png"></b>

                    </a>
                    <a class="navbar-brand hidden-lg hidden-md" >

                        <b><img style="width: 35%!important; margin-left: 5px;margin-bottom: -20%!important; " id="logo" src="../web/flesan.png"></b>
                    </a>

                </div>

                <div id="navbar" class="collapse navbar-collapse bounceInLeft">

                        <form class="navbar-form">

                            <div class="form-group" style="display:inline;">

                                <div class="input-group" style="display:table;">

                                </div>

                            </div>

                        </form>

                  
                    <ul class="nav navbar-nav navbar-right bounceInLeft">

                        <li class="active">
                            <?= Html::a('<i  class="fa fa-user"></i>&nbsp;' . $session['nombreColaborador'], ['colaborador/compadre', 'rutAmigo' => $rutColaborador]) ?>

                        </li>

                        <li>

                          <?= Html::a('<i class="fa fa-home"></i>&nbsp;Inicio', ['colaborador/perfil', 'rutColaborador' => $rutColaborador]) ?>
                      </li>

                      <li class="hidden-md hidden-lg">

                          <?= Html::a('<i class="fas fa-star"></i>&nbsp;Beneficios', ['colaborador/beneficios', 'rutAmigo' => $rutColaborador]) ?>
                      </li>

                      <li class="hidden-md hidden-lg">

                          <a href="http://www.flesan.cl" ><i class="fas fa-sun" aria-hidden="true"></i> Clima</a>
                      </li>

                      <li class="hidden-md hidden-lg">

                          <a href="https://flesan.gointegro.com/gosocial/company/stream" ><i class="fas fa-thumbs-up" aria-hidden="true"></i> GO Integro</a>
                      </li>

                       <li class="hidden-md hidden-lg">

                          <a href="https://www.grupopayroll.com/webpay/loginap.aspx" ><i class="far fa-file-alt" aria-hidden="true" ></i> Payroll</a>
                      </li>

                       <li class="hidden-md hidden-lg">

                          <a href="https://www.biwiser.com/que-es-biwiser/" ><i class="far fa-clipboard" aria-hidden="true"></i> Biwiser</a>
                      </li>

                       <li class="hidden-md hidden-lg">

                          <a href="https://www.dec.cl/login.php" ><i class="far fa-check-square" aria-hidden="true"></i> DEC</a>
                      </li>

                      <li class="hidden-md hidden-lg">

                          <a href="https://www.iconstruye.com/includes/default.aspx" ><i class="fas fa-shopping-cart" aria-hidden="true"></i> IConstruye</a>
                      </li>

                      <li class="hidden-md hidden-lg">

                          <a href="https://www.flesanteescucha.com/" ><i class="fas fa-ban" aria-hidden="true"></i> Canal de Denuncias</a>
                      </li>

                      <li class="hidden-md hidden-lg">

                          <a href="https://www.flesan.cl/" ><i class="fas fa-shield-alt" aria-hidden="true"></i> Control IT</a>
                      </li>

                        <li><?php
                            echo Html::a('<i class="fas fa-sign-out-alt"></i>&nbsp;Salir', ['/site/logout'], ['data-method' => 'post']);
                            ?></li>	


                    </ul>

                </div>

            </div>

        </nav>



        <?php $this->beginBody() ?>

        <div class="container-fluid">




            <div class="col-md-12 col-xs-12 no-paddin-xs">

                <div class="row">



                    <?= $content ?>



                </div>

            </div>

        </div><!-- end timeline content-->


        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
