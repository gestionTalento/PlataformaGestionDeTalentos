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

<style>
	.sobre {
		position:absolute;
		top:0px;
		left:0px;
		border:none;
	}
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
    min-height: 100%;    }
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
</style>




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



            $.get("../rpost/comentarioc?rutPersona=" + rut + "&idContenido=" + post + "&rcomentarios=" + comentario + "",
                    function (dato) {
                        var data = JSON.parse(dato);
                        $('#' + post).html('<a class="pull-left" href="#"><img style="-ms-transform: rotate('+ data.rotate + 'deg);-webkit-transform: rotate('+ data.rotate + 'deg);transform: rotate('+ data.rotate + 'deg);" class="avatars" alt="Avatar" src="/frontend/web/img/perfil/t/' + data.foto + '"></a><div class="comment-body"><div class="comment-heading"><h4 style="font-size: 11px;" class="comment-user-name"><a href="#">' + data.nombre + ' ' + data.apellidos + '</a></h4><h5 class="time">Ahora</h5></div><p>' + comentario + '</p></div>');
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

        $.get("../rpost/like?rutPersona=" + rut + "&ridPost=" + idPost + "",
                function (dato) {

                    $("#like-" + idPost).addClass('btn-success');
                    $("#like-" + idPost).attr('onclick', " ");
                    $("#like-" + idPost).html('Me Gusta&nbsp;<i class="fa fa-thumbs-up icon"></i>' + dato);




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
                    $('#rotate-' + idPost).css('transform', 'rotate(' + dato + 'deg)!important');


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
                    $('#colaborador-' + rutColaborador).css('transform', 'rotate(' + dato + 'deg)!important');


                }).fail(function () {
            alert("No existe conexion a internet");
            // Handle error here
        });


    }
    function eliminar(idPost) {

        $.get("../rpost/eliminar?ridPost=" + idPost + "",
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
    font-family: DINPro-Light;
    text-transform: uppercase;
    font-size: 13px;
    }
    .perfill{
                         -ms-transform: rotate(<?php echo $model[0]['rrotador']; ?>deg);
                         -webkit-transform: rotate(<?php echo $model[0]['rrotador']; ?>deg);
                         transform: rotate(<?php echo $model[0]['rrotador']; ?>deg);

                         
    }
</style>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php //var_dump($model[0]['foto']);die();   ?>

<div class="container" style="margin-top:150px;">
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12  animated fadeInLeft">

            <div class="row">
                <div class="col-md-4 hidden-xs">
                    <div class="profile-info-left">
                        <div class="text-center">
                            <?= Html::img('@web/img/perfil/' . $model[0]['rfoto'], ['alt' => 'Avatar', 'width' => 200, 'class' => 'avatar perfill', 'id' => 'colaborador-'. $model[0]['rutColaborador']]); ?>
                            <h2><?php echo $model[0]['nombreColaborador'] . " " . $model[0]['apellidosColaborador']; ?></h2>
                        </div>
                        <div class="action-buttons">
                            <div class="row">
                                <div class="col-xs-12">
                 
                                </div>

                            </div>
                        </div>
                        <div class="section">
                            <h3>Sobre Mi</h3>
                            <p><?php echo $model[0]['rbio']; ?></p>
                        </div>
                        <div class="section">
                            <h3>Mi Valoracion</h3>
                            <p><span id="a" class="badge"><?php echo $model[0]['rcomentarios']; ?></span>Comentarios Realizados</p>
                            <p><span id="b" class="badge"><?php echo $model[0]['rcomentariosR']; ?></span>Comentarios Recibidos</p>
                            <p><span id="c" class="badge"><?php echo $model[0]['rlikes']; ?></span> Me gusta Realizados</p>
                            <p><span id="d" class="badge"><?php echo $model[0]['rlikesR']; ?></span> Me gusta Recibidos</p>
                        </div>


                        <div class="section">
                            <h3>Mis Compañeros</h3>
                            <div class="widget panel-friends">

                                <div class="widget-body bordered-top bordered-red text-center">

                                    <ul class="friends">


                                        <?php
                                        $rutColaborador = $model[0]['rutColaborador'];
                                        $model2 = BuscarController::encuentraAmigos($model[0]['rutColaborador']);

                                        foreach ($model2 as $amigo) {
                                            $modell3 = BuscarController::findColaboradorRut($amigo["rut2"]);
                                            ?>

                                            <li>

                                                <a href="compadre?rutAmigo=<?php echo $modell3[0]['rutColaborador'] ?>">

                                                    <img style="-ms-transform: rotate(<?php echo $modell3[0]['rotador']; ?>deg);
                                                     -webkit-transform: rotate(<?php echo $modell3[0]['rrotador']; ?>deg);
                                                     transform: rotate(<?php echo $modell3[0]['rrotador']; ?>deg);" src="../img/perfil/t/<?php echo $modell3[0]['foto']; ?>" title="<?php echo $modell3[0]['nombreColaborador'] . " " . $modell3[0]['apellidosColaborador']; ?>" class="img-responsive tip">
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

                   


                            <!-- activities -->
                            <div class="tab-pane fade in active" id="activities">


                                <div class="conatiner" style="margin:100px auto;">
                                    <div class="row">
                                        <div class="col-md-12 results"></div>
                                    </div>
                                    <div class="text-center" id="loading">
                                        <img src="../ajax-loader.gif" id="ani_img"/>
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
                                    $.get('contenido?page='+mypage+'&rutColaborador=<?php echo $rutColaborador; ?>', function(data){
                                        if(data.trim().length == 0){
                                            $('#loading').append('<button class="btn btn-primary">No existen mas contenidos disponibles</button>');
                                            var e = document.getElementById("loading");
                                            e.id = "loadings";
                                        }
                                        $('.results').append(data);
                                        $('.well').animate({scrollTop: $('#loading').offset().top}, 5000, 'easeOutBounce');
                                        $('#ani_img').hide();
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
