<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use yii\web\Controller;
use app\Controllers\BuscarController;
use app\models\colaborador;
use app\models\RAmigos;


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style>
    .nav-pills > li {
        float: left;
        margin-left: 40px;
    }


    #flecha{
        width: 81%;
        opacity: 0.1;
    }
    #videoa { 

        background:transparent url('play.jpg') no-repeat 0 0; 
        -webkit-background-size:cover; 
        -moz-background-size:cover; 
        -o-background-size:cover; 
        background-size:cover; 
    }

    .media-body {padding-left: 14px;}
    body {
        background-repeat: repeat;
        min-height: 1585px;
    }
    /*------------------------------------------------*/
    /*    Profile Page
    /*------------------------------------------------*/
    .user-profile {
        padding-bottom: 30px;
    }

    .profile-header-background {
        margin: -30px -30px 0 -30px;
    }
    .profile-header-background img {
        width: 100%;

    }
    .comment{

    }

    .profile-info-left {
        position: relative;
        top: -92px;
    }
    .profile-info-left img.avatar {
        border: 2px solid #fff;
    }
    .profile-info-left h2 {
        font-family: "DINPro-Medium";
        letter-spacing: -1px;
        margin-bottom: 30px;
    }
    .profile-info-left .section {
        margin-top: 50px;
    }
    .profile-info-left .section h3 {
        font-size: 1.1em;
        font-weight: 700;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
    }
    .profile-info-left ul.list-social > li {
        line-height: 2.3;
    }
    .profile-info-left ul.list-social > li i {
        display: inline-block;
        vertical-align: middle;
        *vertical-align: auto;
        *zoom: 1;
        *display: inline;
        position: relative;
        top: 1px;
        font-size: 16px;
        min-width: 16px;
        line-height: 1;
    }
    .profile-info-left ul.list-social > li a {
        color: #696565;
    }

    .profile-info-right .tab-content {
        padding: 30px 0;
        background-color: transparent;
    }
    @media screen and (max-width: 768px) {
        .profile-info-right {
            position: relative;
            top: -70px;
        }
    }

    .user-follower,
    .user-following {
        position: relative;
        margin-bottom: 40px;
    }
    .user-follower img,
    .user-following img {
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        width: 40px;
    }
    .user-follower a,
    .user-following a {
        font-size: 1.1em;
        line-height: 1;
    }
    .user-follower .username,
    .user-following .username {
        font-size: 0.9em;
        line-height: 1.5;
    }
    .user-follower .btn,
    .user-following .btn {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 92px;
    }

    .btn-toggle-following {
        background-color: #7bae16;
        color: #fff;
    }
    .btn-toggle-following:hover {
        background-color: #ef2020;
        color: #fff;
    }
    .btn-toggle-following:hover span {
        display: none;
    }
    .btn-toggle-following:hover:after {
        content: 'Unfollow';
        display: inline;
    }
    .btn-toggle-following:hover i:before {
        content: '\f129';
    }


    /* list icons */
    .list-icons-demo li {
        margin-bottom: 20px;
        text-align: center;
    }
    .list-icons-demo li i {
        font-size: 24px;
    }

    .list-icons-demo2 li {
        margin-bottom: 10px;
    }

    .activity-item {
        overflow: visible;
        position: relative;
        margin: 15px 0;
        border-top: 1px dashed #ccc;
        padding-top: 15px;
    }
    .activity-item:first-child {
        border-top: none;
    }
    .activity-item .avatar {
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        width: 32px;
    }
    .activity-item > i {
        font-size: 18px;
        line-height: 1;
    }
    .activity-item .media-body {
        position: relative;
    }
    .activity-item .activity-title {
        margin-bottom: 0;
        line-height: 1.3;
    }
    .activity-item .activity-attachment {
        padding-top: 20px;
    }
    .activity-item .well {
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        border-radius: 0;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        border: none;
        border-left: 2px solid #cfcfcf;
        background: #fff;
        margin-left: 20px;
        font-size: 0.85em;
    }
    .activity-item .thumbnail {
        display: inline;
        border: none;
        padding: 0;
    }
    .activity-item .thumbnail img {
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        width: auto;
        margin: 0;
    }
    .activity-item .activity-actions {
        position: absolute;
        top: 15px;
        right: 0;
    }
    .activity-item .activity-actions .btn i {
        margin: 0;
    }
    .activity-item .activity-actions .dropdown-menu > li > a {
        font-size: 0.9em;
        padding: 3px 10px;
    }
    .activity-item + .btn {
        margin-bottom: 15px;
    }


    .nav-tabs > li > a {
        -moz-border-radius-topleft: 2px;
        -webkit-border-top-left-radius: 2px;
        border-top-left-radius: 2px;
        -moz-border-radius-topright: 2px;
        -webkit-border-top-right-radius: 2px;
        border-top-right-radius: 2px;
    }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        cursor: pointer;
    }

    .nav-pills > li > a {
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
    }
    .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
        background-color: #1688ae;
    }

    .nav-tabs.tabs-iconized > li a,
    .nav-pills.tabs-iconized > li a {
        padding-top: 0;
        padding-bottom: 5px;
    }
    .nav-tabs.tabs-iconized > li i,
    .nav-pills.tabs-iconized > li i {
        position: relative;
        margin-right: 3px;
        top: 4px;
        font-size: 24px;
    }

    .tab-content {
        padding: 30px 15px 15px 15px;
        background-color: #fff;
    }

    .nav.nav-tabs-custom-colored > li > a {
        border-color: #ccc;
        border-bottom: transparent;
    }
    .nav.nav-tabs-custom-colored > li > a:hover, .nav.nav-tabs-custom-colored > li > a:focus {
        background-color: #1688ae;
    }

    .nav-tabs.nav-tabs-custom-colored {
        border-bottom-color: #1688ae;
    }
    .nav-tabs.nav-tabs-custom-colored > li {
        z-index: 0;
        margin-bottom: 0;
        background-color: #fff;
    }
    .nav-tabs.nav-tabs-custom-colored > li > a {
        -moz-border-radius-topleft: 2px;
        -webkit-border-top-left-radius: 2px;
        border-top-left-radius: 2px;
        -moz-border-radius-topright: 2px;
        -webkit-border-top-right-radius: 2px;
        border-top-right-radius: 2px;
        color: #696565;
        margin-right: 0;
    }
    .nav-tabs.nav-tabs-custom-colored > li > a:hover, .nav-tabs.nav-tabs-custom-colored > li > a:focus {
        color: #fff;
        border-color: #1688ae;
    }
    .nav-tabs.nav-tabs-custom-colored > li.active > a, .nav-tabs.nav-tabs-custom-colored > li.active > a:hover, .nav-tabs.nav-tabs-custom-colored > li.active > a:focus {
        color: #fff;
        background-color: #1688ae;
        border-color: #1688ae;
        border-bottom: transparent;
    }
    .nav-tabs > li.active {
        z-index: 1;
    }

    .panel.panel-white.post.panel-shadow.animated.fadeInUp {
        padding: 15px;
    }

    .nav-pills-custom-minimal {
        border-bottom: 1px solid #ccc;
    }
    .nav-pills-custom-minimal > li > a {
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        border-radius: 0;
        padding: 10px;
        border-top: 4px solid transparent;
        color: #696565;
    }
    .nav-pills-custom-minimal > li > a:hover, .nav-pills-custom-minimal > li > a:focus {
        background-color: transparent;
        color: #4f4c4c;
    }
    .nav-pills-custom-minimal > li.active > a, .nav-pills-custom-minimal > li.active > a:hover, .nav-pills-custom-minimal > li.active > a:focus {
        background-color: transparent;
        border-top-color: #ff766c;
        color: #696565;
    }
    .nav-pills-custom-minimal > li + li {
        margin-left: 30px;
    }
    @media screen and (max-width: 480px) {
        .nav-pills-custom-minimal > li + li {
            margin-left: 0;
        }
    }
    .nav-pills-custom-minimal.custom-minimal-bottom > li a {
        border-top: none;
        border-bottom: 4px solid transparent;
    }
    .nav-pills-custom-minimal.custom-minimal-bottom > li.active > a, .nav-pills-custom-minimal.custom-minimal-bottom > li.active > a:hover, .nav-pills-custom-minimal.custom-minimal-bottom > li.active > a:focus {
        border-bottom-color: #ff766c;
    }


    .fileinput-button {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }
    .fileinput-button input {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        opacity: 0;
        -ms-filter: 'alpha(opacity=0)';
        font-size: 200px !important;
        direction: ltr;
        cursor: pointer;
    }

    /* Fixes for IE < 8 */
    @media screen\9 {
        .fileinput-button input {
            filter: alpha(opacity=0);
            font-size: 100%;
            height: 100%;
        }
    }

    video#video2 {
        width: 100%;
    }

    a.btn.btn-primary.btn-block {
        background-color: #d7072a!important;
        border-color: #d7072a!important;
    }

    button#modalButton {
        color: #fff;
        background-color: #193276!important;
        border-color: #193276!important;
        font-family: DINPro-Light;
        text-transform: uppercase;
        font-size: 13px;
    }

    a.btn.btn-primary.btn-block {
        color: #fff;
        background-color: #d7072a!important;
        border-color: #d7072a!important;
        font-family: DINPro-Light;
        text-transform: uppercase;
        font-size: 13px;
    }

    a.btn.btn-primary.btn-block {
        color: #fff;
        background-color: #d7072a!important;
        border-color: #d7072a!important;
        font-family: DINPro-Light;
        text-transform: uppercase;
        font-size: 13px;
    }

    iframe {
        width: 100%!important;
        height: 560px!important;
    }

    h3 {
        font-family: DINPro-Medium;
    }

    p {
        font-family: arial;
    }

    a {
        /* font-family: DINPro-Medium; */
        /* text-transform: uppercase; */
    }

    li {
        font-family: DINPro-Medium;
        font-size: 13px;
        text-transform: uppercase;
    }

    a#tituloPublicador {
        font-family: DINPro-Medium!important;
        color: #0078B3!important;
        font-size: 16px;
        /* margin-top: 28px; */
    }

    img.media-object.avatar {width: 60px;}

    small.text-muted {
        font-family: DINPro-Light;
        /* text-transform: uppercase; */
        font-size: 12px;
    }
    h1 {
        font-family: "DINPro-Medium";
        letter-spacing: -1px;
    }
    a {
        font-family: DINPro-Medium;
        text-transform: uppercase;
    }

    button.btn.btn-danger.pull-right {
        color: #fff;
        background-color: #d7072a!important;
        border-color: #d7072a!important;
        font-family: DINPro-Light;
        text-transform: uppercase;
        font-size: 13px;
    }
    .panel-shadow {
        box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
    }
    .panel-white {
        border: 1px solid #dddddd;
    }
    .panel-white  .panel-heading {
        color: #333;
        background-color: #fff;
        border-color: #ddd;
    }
    .panel-white  .panel-footer {
        background-color: #fff;
        border-color: #ddd;
    }

    .post .post-footer {
        border-top: 1px solid #ddd;
        padding: 15px;
        background-color: rgba(144, 144, 144, 0.21);
    }
    .post .post-footer .input-group-addon a {
        color: #454545;
    }
    .post .post-footer .comments-list {
        padding: 0;
        margin-top: 20px;
        list-style-type: none;
    }
    .post .post-footer .comments-list .comment {
        display: block;
        width: 100%;
        margin: 20px 0;
    }
    .post .post-footer .comments-list .comment .avatar {
        width: 35px;
        height: 35px;
    }
    .post .post-footer .comments-list .comment .comment-heading {
        display: block;
        width: 100%;
    }
    .post .post-footer .comments-list .comment .comment-heading .user {
        font-size: 14px;
        font-weight: bold;
        display: inline;
        margin-top: 0;
        margin-right: 10px;
    }
    .post .post-footer .comments-list .comment .comment-heading .time {
        font-size: 12px;
        color: #aaa;
        margin-top: 0;
        display: inline;
    }
    .post .post-footer .comments-list .comment .comment-body {
        margin-left: 74px;
    }
    .post .post-footer .comments-list .comment > .comments-list {
        margin-left: 50px;
    }
    p#elComentario {
        margin-left: 25px;

    }

    hr.message-inner-separator
    {
        clear: both;
        margin-top: 10px;
        margin-bottom: 13px;
        border: 0;
        height: 1px;
        background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
        background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
        background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
        background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    }

    span.btn.btn-success.fileinput-button {
        color: #fff;
        background-color: #7793bb!important;
        border-color: #7793bb!important;
    }
    h4.user {
        color: #193276;
    }
    p#elComentario {
        font-family: DINPro-Regular;
    }

    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 30px; height: 0; overflow: hidden;
    }

    .video-container iframe,
    .video-container object,
    .video-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .profile-info-right {
        margin-top: -50px;
    }
    .truncate {
        width: 50%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }


    #lightbox .modal-content {
        display: inline-block;
        text-align: center;   
    }

    #lightbox .close {
        opacity: 1;
        color: rgb(255, 255, 255);
        background-color: rgb(25, 25, 25);
        padding: 5px 8px;
        border-radius: 30px;
        border: 2px solid rgb(255, 255, 255);
        position: absolute;
        top: -15px;
        right: -55px;

        z-index:1032;
    }

    .action-buttons {
        text-align: center;
    }
    p {
        word-wrap: break-word;
    }
</style>




<script type="text/javascript">

    function contarCaracteres(campo, campo_conteo, limite_maximo) {

        if (campo.value.length > limite_maximo)
        { // Si es muy largo, lo cortamos!
            campo.value = campo.value.substring(0, limite_maximo); // Substring toma del principio, osea 0, hasta el limite máximo de caracteres.  
        } else
        { // Si no es más largo del máximo, actualizamos el contador de 'caracteres quedan'
            var limite = limite_maximo - campo.value.length;
            $('#contador').text("");
            $('#contador').append(limite);
            console.log(limite);
        }
    }
    function contarCaracteress(campo, limite_maximo, id) {
        if (campo.value.length > limite_maximo)
        { // Si es muy largo, lo cortamos!
            campo.value = campo.value.substring(0, limite_maximo); // Substring toma del principio, osea 0, hasta el limite máximo de caracteres.  
        } else
        { // Si no es más largo del máximo, actualizamos el contador de 'caracteres quedan'
            var limite = limite_maximo - campo.value.length;
            $('#contadorc-comentario-' + id).text("");
            $('#contadorc-comentario-' + id).append(limite);

        }
    }


    $("#archivo1").click(function () {
        $("#archivo1").addClass('btn-success');
    });
</script>
<script>

    function enviar(post, rut) {


        var comentario = $("#comentario-" + post + "").val();
        var valid;
        if (/^\s*$/.test(comentario))
            valid = 1;
        else
            valid = 2;

        var dato = Boolean(comentario);
        var ca = $('#a').text();
        var c = document.getElementById('a');
        c.innerHTML = parseInt(ca) + 1;

        if (dato == true && valid == 2) {



            $.get("../rpost/comentario?rutPersona=" + rut + "&ridPost=" + post + "&comentario=" + comentario + "",
                    function (dato) {
                        var data = JSON.parse(dato);
                        $('#' + post).html('<a class="pull-left" href="#"><img style="-ms-transform: rotate(' + data.rotate + 'deg);-webkit-transform: rotate(' + data.rotate + 'deg);transform: rotate(' + data.rotate + 'deg);" class="avatar perfill" alt="Avatar" src="web/img/perfil/t/' + data.foto + '"></a><div class="comment-body"><div class="comment-heading"><h4 class="comment-user-name"><a href="#">' + data.nombre + ' ' + data.apellidos + '</a></h4><h5 class="time">Ahora</h5></div><p style="text-transform: initial;">' + comentario + '</p></div>');
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


        $("#post-" + ridPost).css("display", "block");


    }

    function like(idPost, rut) {

        $.get("../rpost/like?rutPersona=" + rut + "&ridPost=" + idPost + "",
                function (dato) {

                    $("#like-" + ridPost).addClass('btn-success');
                    $("#like-" + ridPost).attr('onclick', " ");
                    $("#like-" + ridPost).html('<p class="hidden-xs">Me Gusta</p><i class="fa fa-thumbs-up icon"></i>' + dato);
                    var ca = $('#c').text();
                    var c = document.getElementById('c');
                    c.innerHTML = parseInt(ca) + 1;



                }).fail(function () {
            alert("No existe conexion a internet");
            // Handle error here
        });


    }

    function rotate(idPost) {

        $.get("../rpost/rotate?ridPost=" + idPost + "",
                function (dato) {
                    // alert(dato);
                    //$("#rotate-" + idPost).css('transform', "deg(" + dato + ")");
                    //$('#busniessmenu').css('background-color', '#323232');
                    // $("#rotate-" + idPost).rotate(dato);
                    $('#rotate-' + ridPost).css('transform', 'rotate(' + dato + 'deg)');
                    $('.rotate-' + ridPost).css('transform', 'rotate(' + dato + 'deg)');


                }).fail(function () {
            alert("No existe conexion a internet");
            // Handle error here
        });


    }
    function rotates(rutColaborador) {

        $.get("rotate?rutColaborador=" + rutColaborador + "",
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

        $.get("../rpost/eliminar?ridPost=" + ridPost + "",
                function (dato) {
                    if (dato == true) {
                        alert("Su post ha sido eliminado");
                        location.reload();
                    } else {
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
        font-family: DINPro-Light;
        text-transform: uppercase;
        font-size: 13px;
    }
    .perfilll{
        -ms-transform: rotate(<?php echo $perfil->rrotador; ?>deg);
        -webkit-transform: rotate(<?php echo $perfil->rrotador; ?>deg);
        transform: rotate(<?php echo $perfil->rrotador; ?>deg);


    }
    .perfill{
        -ms-transform: rotate(<?php echo $perfil->rrotador; ?>deg);
        -webkit-transform: rotate(<?php echo $perfil->rrotador; ?>deg);
        transform: rotate(<?php echo $perfil->rrotador; ?>deg);


    }
</style>



<div class="container" style="margin-top:150px;">
    <div class="row-fluid">
        <div class="col-md-12 col-xs-12 col-sm-12  animated fadeInLeft">

            <div class="row-fluid">
                <div class="col-md-4 hidden-xs">
                    <div class="profile-info-left">
                        <div class="text-center">


                            <?= Html::img('@web/img/perfil/' . $perfil->rfoto, ['alt' => 'Avatar', 'width' => 200, 'class' => 'avatar perfilll', 'id' => 'colaborador-' . $model->rutColaborador]); ?>
                            <h2><?php echo $model->nombreColaborador . " " . $model->apellidosColaborador; ?></h2>
                        </div>
                        <div style="text-align: center!important;" class="action-buttons">
                            <div class="row">
                                <div class="col-xs-12">

                                    <?= Html::button('Actualiza tus datos', ['value' => Url::to('index.php?r=colaborador/foto&rutColaborador=' . $model->rutColaborador . ''), 'class' => 'btn btn-lg btn-raised btn-success', 'id' => 'modalButton']) ?>
                                    <button  onclick="rotates(<?php echo $model->rutColaborador; ?>);" class="btn btn-lg btn-raised btn-success rota">
                                        Rotar foto
                                        <i class="fa fa-undo" aria-hidden="true"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="section">
                            <h3>Sobre Mi</h3>
                            <p><?php echo $perfil->rbio; ?></p>
                        </div>
                        <div class="section">
                            <h3>Mi Valoracion</h3>
                            <p><span id="a" class="badge"><?php echo $estadistica->rcomentarios; ?></span>Comentarios Realizados</p>
                            <p><span id="b" class="badge"><?php echo $estadistica->rcomentariosr; ?></span>Comentarios Recibidos</p>
                            <p><span id="c" class="badge"><?php echo $estadistica->rlikes; ?></span> Me gusta Realizados</p>
                            <p><span id="d" class="badge"><?php echo $estadistica->rlikesr; ?></span> Me gusta Recibidos</p>
                        </div>


                        <div class="section">
                            <h3>Mis Compañeros</h3>
                            <div class="widget panel-friends">

                                <div class="widget-body bordered-top bordered-red text-center">

                                    <ul class="friends">


                                        <?php
                                        $rutColaborador = $model->rutColaborador;
                                        $model2 = BuscarController::encuentraAmigos($model->rutColaborador);

                                        foreach ($model2 as $amigo) {
                                            $modell3 = BuscarController::findColaboradorRut($amigo["rut2"]);
                                            ?>

                                            <li>

                                                <a href="compadre?rutAmigo=<?php echo $modell3->rutColaborador ?>">

                                                    <img style="-ms-transform: rotate(<?php echo $modell3->rrotador; ?>deg);
                                                         -webkit-transform: rotate(<?php echo $modell3->rrotador; ?>deg);
                                                         transform: rotate(<?php echo $modell3->rrotador; ?>deg);" src="../img/perfil/t/<?php echo $modell3->rfoto; ?>" title="<?php echo $modell3->rutColaborador . " " . $modell3->apellidosColaborador; ?>" class="img-responsive tip">

                                                </a>

                                            </li>

                                        <?php } ?>

                                    </ul>

                                </div>

                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-md-8 col-xs-12">
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
                            </style>

                            <div class="panel panel-default">
                                <div class="panel-body">

                                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => ['colaborador/post']]); ?>

                                    <div class="row">


                                        <input type="hidden" name="rutColaborador" value="<?php echo $rutColaborador; ?>">
                                        <input type="hidden" name="rut2" value="<?php echo $rut2; ?>">
                                        <input type="hidden" name="lugar" value="<?php echo $lugar; ?>">
                                    </div>

                                    <div class="media">
                                        <div class="media-left media-top">

                                        </div>
                                        <div class="media-body">
                                            <div class="form-group">
                                                <!-- rows="2" means "display the textarea as 2 rows high". The user can
                                                     enter more than 2 rows of text. -->
                                                <div class="col-md-2 col-xs-4">


                                                    <img alt="Avatar" style="-ms-transform: rotate(<?php echo $perfil->rrotador; ?>deg);
                                                         -webkit-transform: rotate(<?php echo $perfil->rrotador; ?>deg);
                                                         transform: rotate(<?php echo $perfil->rrotador; ?>deg);" src="img/perfil/t/<?php echo $perfil->rfoto; ?>" title="<?php echo $model->nombreColaborador . " " . $model->apellidosColaborador; ?>" class="media-object avatar">
                                                    <br>
                                                </div>
                                                <div class="col-md-10 col-xs-7">
                                                    <?= Yii::$app->session->getFlash('error'); ?>
                                                    <textarea onKeyDown="contarCaracteres(this.form.rdescripcionPost, this.form.remLen, 180);" placeholder="Que estas pensando hoy??? " maxlength="180"  name="rdescripcionPost" data-ls-module="charCounter" placeholder="Que estas pensando hoy??? " rows="5" maxlength="180" class="form-control input-lg p-text-area"></textarea>
                                                    <p>Contador: <font id="contador">180</font></p>
                                                    <br>
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
                                                    'ShowLabel' => false,
                                                    'showUpload' => false,
                                                    'browseClass' => 'btn btn-primary btn-block',
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



                            <!-- activities -->
                            <div class="tab-pane fade in active" id="activities">


                                <div class="conatiner" style="margin:35px auto;">
                                    <div class="row">
                                        <div class="col-md-12 results"></div>
                                    </div>
                                    <div class="text-center" id="loading">
                                        <img src="ajax-loader.gif" id="ani_img"/>
                                    </div>
                                    <button class="btn btn-block btn-primary hidden-lg hidden-md" onclick="myContent2();">Cargar mas!</button>

                                </div>
                                <script>
                                    var mypage = 1;
                                    mycontent(mypage);
                                    $(window).scroll(function () {
                                        if ($(window).scrollTop() >= $(document).height() - $(window).height() - 4) {
                                            mypage++;
                                            mycontent(mypage);
                                        }
                                    })
                                    function mycontent(mypage) {

                                        $('#ani_img').show();
                                        $.get('index.php?r=colaborador/reload&page=' + mypage + '&rutColaborador=<?php echo $rutColaborador; ?>', function (data) {
                                            if (data.trim().length == 0) {
                                                $('#loading').append('<button style="margin-right:35%;" class="btn btn-primary">No existen mas post disponibles</button>');
                                                var e = document.getElementById("loading");
                                                e.id = "loadings";
                                                document.getElementById('ani_img').style.display = 'none';
                                                document.getElementById('ani_img').style.visibility = 'none';
                                                var s = document.getElementById("ani_img");
                                                s.id = "ani_imgs"
                                            }
                                            $('.results').append(data);

                                            $('.well').animate({scrollTop: $('#loading').offset().top}, 5000, 'easeOutBounce');
                                            setInterval(function () { }, 3000);

                                        })
                                    }


                                    function myContent2() {
                                        mypage++;
                                        mycontent(mypage);
                                    }
                                </script>



                            </div>
                            <!-- end activities -->
                            <!-- followers -->
                            <div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
                                <div class="modal-dialog">
                                    <button type="button" class="close hidden"  aria-hidden="true">×</button>
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
