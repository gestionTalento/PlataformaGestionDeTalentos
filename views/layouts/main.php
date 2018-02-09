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
        <!-- If you'd like to support IE8 -->
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <style>


        .navbar-principal .navbar-brand, .navbar-principal .navbar-brand li a:visited, .navbar-principal .navbar-nav li a {
        color: #ffffff;
        font-weight: 500;
        padding-top: 30px;
        }

        body {
            font-family: 'Roboto', sans-serif !important;
            background: #eaeaea;
            overflow-x: hidden;
            margin-bottom: 60px;
        }

        .navbar-principal {
            background-color: #000;
            /* background-color: #9f9fa2; */
            border-color: rgba(202, 86, 67, 0.42);
            box-shadow: 0 2px 2px -2p xrgba(0, 0, 0, .52);*/
        }
         .navbar-principal .navbar-nav .open a, .navbar-principal .navbar-nav .open a:hover, .navbar-principal .navbar-nav li a:hover, .navbar-principal .navbar-nav li a:focus, .navbar-principal .navbar-nav .active a, .navbar-principal .navbar-nav .active a:hover {
            color: #fff;
                background: rgba(2, 2, 2, 0.2);
                padding-top: 30px;
        }
       
        a.navbar-brand {
            padding: 15px 8px!important;
        }
        div#fotol {
            max-height: 390px;
        }
        img#logo {
            margin-top: -5px;
        }
        ul.nav.navbar-nav.navbar-right {
            color: #fff;
            margin-top: -17px!important;
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
            font-family: DINPro-Regular;
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
                background-color: #02398b;
            }

            span.icon-bar {
                background-color: #fff;
            }

            .navbar-header {
                background-color: #404040;
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
                background-color: #02398b;
            }

            span.icon-bar {
                background-color: #fff;
            }

            .navbar-header {
                background-color: #14377d;
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

            <div class="container">

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                    </button>

                    <a class="navbar-brand hidden-xs hidden-md" >

                        <b><img id="logo" src=""></b>

                    </a>
                    <a class="navbar-brand hidden-lg hidden-md" >

                        <b><img style="width: 132px; margin-left: 5px;" id="logo" src="../web/armas1.png"></b>

                    </a>

                </div>

                <div id="navbar" class="collapse navbar-collapse">

                    <div class="col-md-5 col-sm-4">         

                        <form class="navbar-form">

                            <div class="form-group" style="display:inline;">

                                <div class="input-group" style="display:table;">





                                </div>

                            </div>

                        </form>

                    </div>        

                    <ul class="nav navbar-nav navbar-right">

                        <li class="active">
                            <?= Html::a('<i  class="fa fa-user"></i>&nbsp;' . $session['nombreColaborador'], ['colaborador/compadre', 'rutAmigo' => $rutColaborador]) ?>

                        </li>


                        <li>

                            <?= Html::a('<i class="fa fa-home"></i>&nbsp;Inicio', ['colaborador/perfil', 'rutColaborador' => $rutColaborador]) ?>

                        <li>

                            <?= Html::a('<i class="fas fa-caret-square-up"></i>&nbsp;Procesos', ['colaborador/perfil']) ?>

                        </li>

                        <li>

                            <?= Html::a('<i class="fas fa-trophy"></i>&nbsp;Ranking', ['colaborador/perfil']) ?>

                        </li>

                        <li>

                            <?= Html::a('<i class="fas fa-envelope"></i>&nbsp;Mis tareas', ['colaborador/tareas']) ?>

                        </li>

                        <li>

                            <?= Html::a('<i class="fas fa-envelope"></i>&nbsp;Inbox', ['colaborador/perfil']) ?>

                        </li>

                        <li><?php
                            echo Html::a('<i class="fas fa-sign-out-alt"></i>&nbsp;Salir', ['/site/logout'], ['data-method' => 'post']);
                            ?></li>	


                    </ul>

                </div>

            </div>

        </nav>



        <?php $this->beginBody() ?>

        <div class="container">




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
