<?php

namespace app\controllers;

use Yii;
use app\controllers\SiteController;
use app\models\Colaborador;
use app\models\Rpost;
use app\models\Ractividad;
use app\models\ColaboradorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ColaboradorController implements the CRUD actions for Colaborador model.
 */
class ColaboradorController extends Controller {

    public function actionPerfil() {

        $session = Yii::$app->session;
        $rutColaborador = $session['rut'];

        if ($rutColaborador == null) {
            $model = new Colaborador();
            return $this->redirect(['site/login', 'model' => $model]);
        }



        $model3 = new Rpost();
        $model = BuscarController::findColaboradorRut($rutColaborador);
        $perfil = BuscarController::findPerfil($model->idperfilRed);
        $model4 = BuscarController::encuentraPost($rutColaborador);
        $actividad = BuscarController::findMuro($rutColaborador);
        $estadistica = BuscarController::findEstadistica($model->idestadisticas);



        $session['foto'] = $perfil->rfoto;
        $session['rutColaborador'] = $model->rutColaborador;
        $session['nombreColaborador'] = $model->nombreColaborador;
        $session['apellidosColaborador'] = $model->apellidosColaborador;
        // var_dump($actividad);die();
        return $this->render('perfil', [
                    'model' => $model,
                    'model3' => $model3,
                    'model4' => $model4,
                    'perfil' => $perfil,
                    'actividad' => $actividad,
                    'estadistica' => $estadistica,
        ]);
    }

     public function actionCine($video, $idContenido) {
     
        $session = Yii::$app->session;
        $rutColaborador = $session['rut'];

        if($rutColaborador==null){
             $model = new Colaborador();
            return $this->redirect(['site/login', 'model' => $model,]);
        }


        //var_dump($session['rut']);die();

        $model = BuscarController::encuentraColaborador($rutColaborador);
        // $model2 = $this->encuentraAmigos($rutColaborador);
        $model3 = new Post();
        $model4 = BuscarController::encuentraPost($rutColaborador);
        $actividad = BuscarController::findMuro($rutColaborador);
        $contenidos = BuscarController::findContenidos($idContenido);
         $perfil = BuscarController::findPerfil($model->idperfilRed);
        //var_dump($model5);die();
       $comentarios = BuscarController::findComentariosContenidos($idContenido);                                      



        $session['foto'] = $perfil[0]['rfoto'];
        $session['rutColaborador'] = $model[0]['rutColaborador'];
        $session['nombreColaborador'] = $model[0]['nombreColaborador'];
        $session['apellidosColaborador'] = $model[0]['apellidosColaborador'];

        return $this->render('cine', [
                    'model' => $model,
                    'contenido' => $idContenido,
                    'video' => $video,
                    'contenidos' => $contenidos,
                    'comentarios' => $comentarios,
        ]);
    }


        public function actionPortal() {
     
        $session = Yii::$app->session;
        $rutColaborador = $session['rut'];

        if($rutColaborador==null){
             $model = new Colaborador();
            return $this->redirect(['site/login', 'model' => $model]);
        }


        //var_dump($session['rut']);die();

        $model = BuscarController::encuentraColaborador($rutColaborador);
        $perfil = BuscarController::findPerfil($model->idperfilRed);



        $session['foto'] = $perfil[0]['rfoto'];
        $session['rutColaborador'] = $model[0]['rutColaborador'];
        $session['nombreColaborador'] = $model[0]['nombreColaborador'];
        $session['apellidosColaborador'] = $model[0]['apellidosColaborador'];

        return $this->render('contenidos', [
                    'model' => $model,
        ]);
    }


    public function actionFoto($rutColaborador) {
        try {
            $num = rand(5, 600);


            ini_set('memory_limit', '128M');

            $model = BuscarController::findColaboradorRut($rutColaborador);
            $perfil = BuscarController::findPerfil($model->idperfilRed);
            if ($model->load(Yii::$app->request->post())) {

                $model->file = UploadedFile::getInstances($perfil, 'rfoto');

                if (empty($model->file)) {
                    $models = BuscarController::findColaboradorRut($rutColaborador);
                    $models->rbio = $perfil->rbio;
                    $models->save(false);
                } else {

                    foreach ($model->file as $file) {
                        ini_set('memory_limit', '512M');
                        $file->saveAs('img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension);
                        Image::thumbnail('img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension, 200, 187)
                                ->save('img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension, ['quality' => 100]);

                        ini_set('memory_limit', '512M');

                        $ruta = 'img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension;
                        Image::thumbnail($ruta, 120, 120)
                                ->save('img/perfil/t/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension, ['quality' => 50]);
                        $perfil->rfoto = $model->rutColaborador . $file->baseName . $num . "." . $file->extension;
                        $model->save();
                        $perfil->save();
                    }
                }



                return $this->redirect(['perfil', 'rutColaborador' => $model->rutColaborador]);
            } else {
                return $this->renderAjax('update', [
                            'model' => $model,
                            'perfil' => $perfil,
                ]);
            }
        } catch (ErrorException $e) {
            throw new NotFoundHttpException('Intenta subir una foto mas liviana!!!');
        }
    }

  public function actionContenido($page, $rutColaborador){
        $numpage =$page;
        $perpage = 3;
        $posisi = (($numpage-1) * $perpage);
        $contenidos = BuscarController::findContenidos($rutColaborador, $posisi, $perpage);
        $model = BuscarController::encuentraColaborador($rutColaborador);
        $total = "";

        foreach($contenidos as $conte){

            
             if ($conte["rtipo"] == 1) {

               $comentarios = BuscarController::findComentariosContenidos($conte["idContenido"]);                                      
               
               $modelo = $this->renderAjax('elcontenido', [
                              'model' => $model,
                              'rcontenido' => $conte,
                              'rcomentarios' => $comentarios,
                                        ]);
               $total =$total.$modelo;


            }

            



        }

        
         return $total;



    }

    
    /**
     * Lists all Colaborador models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ColaboradorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

     public function actionNotificacion($rutColaborador){

        $model = BuscarController::findNotificacion($rutColaborador);
        $total = "";
        $contador = 0;
        foreach($model as $m){
      
          $m = "<p>".$m["contenido"]."</p><br>";
          $total = $total.$m;
          $contador = $contador= $contador+1;
        }
        $array["contador"] = $contador;
        $array["contenido"] = $total;

        if($total==""){
          
        }else{
         return json_encode($array);

        }

      }
    
    public function actionCreate() {
        $session = Yii::$app->session;
        $rutColaborador = $session['rut'];


        $model = new Colaborador();
        $perfil = BuscarController::findPerfil($model->idperfilRed);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rutColaborador]);
        } else {
            return $this->render('foto', [
                        'model' => $model,
                        'perfil' => $perfil,
                        'rutColaborador' => $rutColaborador,
            ]);
        }
    }
    /**
     * Updates an existing Colaborador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $rutColaborador
     * @param integer $idSucursal
     * @param integer $idArea
     * @param integer $idCargo
     * @param integer $idRol
     * @param integer $idGerencia
     * @param integer $idperfil
     * @param integer $idperfilRed
     * @param integer $idestadisticas
     * @param integer $idestado
     * @param integer $idCC
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($rutColaborador) {
        $model = BuscarController::findColaboradorRut($rutColaborador);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Colaborador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $rutColaborador
     * @param integer $idSucursal
     * @param integer $idArea
     * @param integer $idCargo
     * @param integer $idRol
     * @param integer $idGerencia
     * @param integer $idperfil
     * @param integer $idperfilRed
     * @param integer $idestadisticas
     * @param integer $idestado
     * @param integer $idCC
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC) {
        $this->findModel($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC)->delete();

        return $this->redirect(['index']);
    }
    
        public function actionPost() {
//        ini_set('post_max_size', '64M');
//        ini_set('upload_max_filesize', '64M');
//        ini_set('memory_limit', '256M');
//        ini_set('memory_limit', '8192M');
        //var_dump(Yii::$app->request->post());die();
        //date_default_timezone_set("America/Santiago");

        $model = new Rpost();
        
        if (Yii::$app->request->post()) {
            if (!preg_match("/^\S*$/", Yii::$app->request->post()["rdescripcionPost"])) {

                \Yii::$app->getSession()->setFlash('error', ' <div class="col-sm-12 col-md-12">
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×</button>
                           <span class="glyphicon glyphicon-no"></span> <strong>Mensaje de error</strong>
                            <hr class="message-inner-separator">
                            <p>
                                Debe ingresar algun contenido a postear.</p>
                        </div>
                    </div>');
                return $this->redirect('../colaborador/perfil');
            } else {
                $model->file = UploadedFile::getInstances($model, 'file');

                if (empty($model->file) && empty(Yii::$app->request->post()["rdescripcionPost"])) {



                    \Yii::$app->getSession()->setFlash('error', ' <div class="col-sm-12 col-md-12">
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×</button>
                           <span class="glyphicon glyphicon-no"></span> <strong>Mensaje de error</strong>
                            <hr class="message-inner-separator">
                            <p>
                                Debe ingresar algun contenido a postear.</p>
                        </div>
                    </div>');
                    return $this->redirect('index.php?r=colaborador/perfil');
                } else {
                    
                }
            }


            $model->file = UploadedFile::getInstances($model, 'file');
            $model->file1 = UploadedFile::getInstances($model, 'file1');
            $model->file2 = UploadedFile::getInstances($model, 'file2');



            // var_dump($model->file[0]->type);die();


            $model->rut1 = Yii::$app->request->post()["rutColaborador"];
            if (empty(Yii::$app->request->post()["rdescripcionPost"])) {
                $model->rdescripcionPost = "0";
            } else {
                $model->rdescripcionPost = Yii::$app->request->post()["rdescripcionPost"];
            }

            $mystring = Yii::$app->request->post()["rdescripcionPost"];
            $findme = "youtube";
            $pos = strpos($mystring, $findme);
            $num = rand(5, 600);

           


            if ($pos == false) {
                $model->rfecha = date("Y-m-d G:i:s");
            } else {
                $iframe = $this->convertYoutube($mystring);
                $model->rdescripcionPost = $iframe;
                date_default_timezone_set("America/Santiago");

                $model->rfecha = date("Y-m-d G:i:s");
                $model->rtipoPost = 1;
            }


            $mystring2 = Yii::$app->request->post()["rdescripcionPost"];
            $findme2 = "facebook";
            $pos2 = strpos($mystring2, $findme2);
            $num2 = rand(5, 600);

         

            if ($pos2 == false) {
                $model->rfecha = date("Y-m-d G:i:s");
            } else {

                $model->rdescripcionPost = Yii::$app->request->post()["rdescripcionPost"];
                date_default_timezone_set("America/Santiago");

                $model->rfecha = date("Y-m-d G:i:s");
                $model->rtipoPost = 7;
            }


            if (empty($model->file)) {
                if ($pos == true) {
                    $model->rtipoPost = 5; // este post es sin foto
                } else {
                    $model->rtipoPost = 1; // este post es sin foto
                }
            } else {

                //var_dump($model->file[0]->type);die();

                if ($model->file[0]->type == "image/jpeg" || $model->file[0]->type == "image/png" || $model->file[0]->type == "image/gif") {
                    $model->rtipoPost = 2; // este post es con foto
                    foreach ($model->file as $file) {


                        $file->saveAs('img/post/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $ruta = 'img/post/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        Image::thumbnail($ruta, 5000, 5000)
                                ->save('img/post/' . $model->rut1 . $file->baseName . $num . "." . $file->extension, ['quality' => 50]);

                        $model->rfoto = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                    }
                }

                if ($model->file[0]->type == "application/msword" || $model->file[0]->type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                    $model->rtipoPost = 6; // este post es con foto
                    foreach ($model->file as $file) {
                        $file->saveAs('img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $ruta = 'img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->rfoto = "word.png";
                        $model->rdescripcionPost = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->rnombreArchivo = $file->baseName . "." . $file->extension;
                    }
                }
                if ($model->file[0]->type == "application/vnd.openxmlformats-officedocument.presentationml.presentation") {
                    $model->rtipoPost = 6; // este post es con foto
                    foreach ($model->file as $file) {


                        $file->saveAs('img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $ruta = 'img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->rfoto = "power.png";
                        $model->rdescripcionPost = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->rnombreArchivo = $file->baseName . "." . $file->extension;
                    }
                }
                if ($model->file[0]->type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                    $model->rtipoPost = 6; // este post es con foto
                    foreach ($model->file as $file) {
                        $file->saveAs('img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $ruta = 'img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->rfoto = "excel.png";
                        $model->rdescripcionPost = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->rnombreArchivo = $file->baseName . "." . $file->extension;
                    }
                }

                if ($model->file[0]->type == "application/pdf") {
                    $model->rtipoPost = 6; // este post es con foto
                    foreach ($model->file as $file) {
                        $file->saveAs('img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $ruta = 'img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->rfoto = "pdf.png";
                        $model->rdescripcionPost = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->rnombreArchivo = $file->baseName . "." . $file->extension;
                    }
                }

                if ($model->file[0]->type == "video/quicktime" || $model->file[0]->type == "video/3gpp" || $model->file[0]->type == "video/mp4") {
                    $model->rtipoPost = 3; // este post es con foto
                    foreach ($model->file as $file) {


                        $ruta = 'img/post/video/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $file->saveAs('img/post/video/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $model->rfoto = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                    }
                }
            }




            $model->rut1 = Yii::$app->request->post()["rutColaborador"];
            $model->rut2 = 1;
            

            if ($model->rfoto == NULL && $model->rdescripcionPost == "0") {
                
            } else {
                $model->save(false);
                $actividad = new Ractividad();
                $actividad->rutColaborador1 = $model->rut1;
                $actividad->rutColaborador2 = $model->rut2;
                $actividad->ridpost = $model->ridPost;
                $actividad->ridtipo_post = $model->rtipoPost;
                $actividad->save(false);
            }






            $session = Yii::$app->session;
            $rutColaborador = $session['rut'];

            $model = \app\controllers\BuscarController::encuentraColaborador($rutColaborador);
            $model2 = \app\controllers\BuscarController::encuentraAmigos($rutColaborador);
            $model3 = new Rpost();


      

            return $this->redirect(['index.php?r=colaborador/perfil',
                        'model' => $model,
                        'model2' => $model2,
                        'model3' => $model3]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionCrean($rutColaborador, $rutColaborador2, $id){



        if($id==1){
          $model = new RNotificacion();
          $model->rrutNotificado = $rutColaborador;
          $model->rcontenido = $rutColaborador2." Ha comentado su post";
          $model->save(false);
        }
        if($id==2){
          $model = new Notificacion();
          $model->rrutNotificado = $rutColaborador;
          $model->rcontenido = $rutColaborador2." le ha dado me gusta a su imagen";
          $model->save(false);
        }
        if($id==3){

          $modelo = $this->findColaboradores();

          foreach($modelo as $m){
          $model = new Notificacion();
          $model->rrutNotificado = $m["rutColaborador"];
          $model->rcontenido = $rutColaborador2." ha subido un nuevo post";
          $model->save(false);
          }

          
        }
             


      }
    
        public function convertYoutube($string) {
        return preg_replace(
                "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width='560' height='315' src=\"//www.youtube.com/embed/$2\"  allowfullscreen></iframe>", $string
        );
    }

    public function actionRotate($rutColaborador) {
        $model = BuscarController::findColaboradorRut($rutColaborador);
        $model2 = BuscarController::findPerfil($model->idperfilRed);
        if ($model2->rrotador == 270) {
            $model2->rrotador = 0;
        } else {
            $model2->rrotador = $model2->rotador + 90;
        }
        $model->save(false);
        $model2->save(false);
        return $model2->rrotador;
    }

    public function actionCompadre($rutAmigo) {
        $session = Yii::$app->session;
        $rutColaborador = $session['rut'];
        if($rutColaborador==null){

      $model = new Colaborador();
            return $this->redirect(['site/login', 'model' => $model]);


        }else{
        $model = BuscarController::findColaboradorRut($rutAmigo);
        $model2 = BuscarController::encuentraAmigos($rutAmigo);
        $perfil = BuscarController::findPerfil($model->idperfilRed);
        $actividad = BuscarController::findMuroa($rutAmigo);
        $model3 = new RPost();
        $estadistica = BuscarController::findEstadistica($model->idestadisticas);
        $model4 = BuscarController::encuentraPost($rutAmigo);
        return $this->render('perfilAmigo', [
                    'model' => $model,
                    'model2' => $model2,
                    'model3' => $model3,
                    'model4' => $model4,
                    'perfil' => $perfil,
                    'estadistica' => $estadistica,
                    'actividad' => $actividad,
                    'rutAmigo' => $rutAmigo,
                    'rutColaborador' => $rutColaborador,
        ]);
        }
      
       }
    

    public function actionReload($page, $rutColaborador){
        $numpage =$page;
        $perpage = 3;
        $posisi = (($numpage-1) * $perpage);
        $actividad = BuscarController::findMuror($rutColaborador, $posisi, $perpage);
        $model = BuscarController::encuentraColaborador($rutColaborador);
        
        $total = "";

        foreach($actividad as $rpost){

            
             if ($rpost["rtipoPost"] == 1) {


               $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
               //var_dump($posteador );die();
               $perfil = BuscarController::findPerfil($posteador[0]["idperfilRed"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador2"]);
               $perfil2 = BuscarController::findPerfil($posteador2[0]["idperfilRed"]);     
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);           
                                    
               $modelo = $this->renderAjax('estado', [
                              'model' => $model,
                              'post' => $rpost,
                              'perfil' => $perfil,
                              'perfil2' => $perfil2,
                              'rcomentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,
                              'megusta' => $rpost,
                                        ]);
               $total =$total.$modelo;
            }

            if ($rpost["rtipoPost"] == 22222222222) {
                //2

                $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);     
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);   
                                                   
               $modelo = $this->renderAjax('imagen', [
                              'model' => $model,
                              'post' => $rpost,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }


            if ($rpost["rtipoPost"] == 3222222222) {
                //3

           $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);     
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);    
               $modelo = $this->renderAjax('video', [
                              'model' => $model,
                              'post' => $rpost,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }
           
            if ($rpost["rtipoPost"] == 598798789) {
                //5

                $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);     
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);                                         
               $modelo = $this->renderAjax('youtube', [
                              'model' => $model,
                              'post' => $rpost,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }

              if ($rpost["rtipoPost"] == 231231236) {

                //6
                 $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);     
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);                                             
               $modelo = $this->renderAjax('archivo', [
                              'model' => $model,
                              'post' => $rpost,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }

             if ($rpost["rtipoPost"] == 12321) {


              $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);     
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);                                             
               $modelo = $this->renderAjax('facebook', [
                                'model' => $model,
                              'post' => $rpost,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,


                                        ]);
               $total =$total.$modelo;
            }



        }

        
         return $total;



    }


     public function actionReloadr($page, $rutColaborador, $rutAmigo){
        $numpage =$page;
        $perpage = 3;
        $posisi = (($numpage-1) * $perpage);
        $actividad = BuscarController::findMurora($rutColaborador, $posisi, $perpage);
        $model = BuscarController::findColaboradorRut($rutColaborador);
        $total = "";
        $session = Yii::$app->session;
        $rutColaborador = $session['rut'];
        foreach($actividad as $post){

            
             if ($post["rtipoPost"] == 1) {


               $posteador = BuscarController::encuentraColaboradorEstado($post->rutColaborador1);
               $posteador2 = BuscarController::encuentraColaboradorEstado($post->rutColaborador2);     
               $comentarios = BuscarController::findComentarios($post->ridPost);                                    

               $modelo = $this->renderAjax('estado', [
                              'model' => $model,
                              'post' => $post,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }

            if ($post["rtipoPost"] == 2) {


               $posteador = BuscarController::encuentraColaboradorEstado($post->rutColaborador1);
               $posteador2 = BuscarController::encuentraColaboradorEstado($post->rutColaborador2);     
               $comentarios = BuscarController::findComentarios($post->ridPost);                                     

               $modelo = $this->renderAjax('imagen', [
                              'model' => $model,
                              'post' => $post,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,


                                        ]);
               $total =$total.$modelo;
            }


            if ($post["rtipoPost"] == 3) {


              $posteador = BuscarController::encuentraColaboradorEstado($post->rutColaborador1);
               $posteador2 = BuscarController::encuentraColaboradorEstado($post->rutColaborador2);     
               $comentarios = BuscarController::findComentarios($post->ridPost);                               

               $modelo = $this->renderAjax('video', [
                              'model' => $model,
                              'post' => $post,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }
           
            if ($post["rtipoPost"] == 5) {


              $posteador = BuscarController::encuentraColaboradorEstado($post->rutColaborador1);
               $posteador2 = BuscarController::encuentraColaboradorEstado($post->rutColaborador2);     
               $comentarios = BuscarController::findComentarios($post->ridPost);                                              
               $modelo = $this->renderAjax('youtube', [
                              'model' => $model,
                              'post' => $post,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }

              if ($post["rtipoPost"] == 6) {


               $posteador = BuscarController::encuentraColaboradorEstado($post->rutColaborador1);
               $posteador2 = BuscarController::encuentraColaboradorEstado($post->rutColaborador2);     
               $comentarios = BuscarController::findComentarios($post->ridPost);                                               

               $modelo = $this->renderAjax('archivo', [
                              'model' => $model,
                              'post' => $post,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }
             if ($post["rtipoPost"] == 12321321) {


               $posteador = BuscarController::encuentraColaboradorEstado($post->rutColaborador1);
               $posteador2 = BuscarController::encuentraColaboradorEstado($post->rutColaborador2);     
               $comentarios = BuscarController::findComentarios($post->ridPost);                                            
               $modelo = $this->renderAjax('facebook', [
                              'model' => $model,
                              'post' => $post,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                              'megusta' => $megusta,
                              
                                        ]);
               $total =$total.$modelo;
            }



        }

        
         return $total;



    }
}
