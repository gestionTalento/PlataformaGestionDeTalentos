<?php

namespace app\controllers;

use Yii;
use app\controllers\SiteController;
use app\models\Colaborador;
use app\models\Rpost;
use app\models\Ractividad;
use app\models\Wtarea;
use app\models\Dependencia;
use app\models\TareasSearch;
use app\models\Rperfilredsocial;
use app\models\ColaboradorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\imagine\Image;
use app\models\Bbeneficios;
use app\models\Bpuntajecolaborador;
use app\controllers\BuscarController;
use app\models\Bcolaboradorbeneficio;


/**
 * ColaboradorController implements the CRUD actions for Colaborador model.
 */
class ColaboradorController extends Controller {

	public function actionMatch(){
		 ini_set('memory_limit', '8000M');
		 ini_set('max_execution_time', 800);
		$modelo = BuscarController::encuentraColaboradores();

		foreach ($modelo as $m) {
			
				$rut =	$m["rutColaborador"];
				$secundario = BuscarController::encuentraColaboradores();
				foreach ($secundario as $s) {

						if($m["rutColaborador"]==$s["rutColaborador"]){
							?><p><?php
							echo $m["rutColaborador"];
							?></p><br><?
						}else{

							    $connection = Yii::$app->db;
				                $connection->createCommand()
				                        ->insert('ramigos', [
				                            'rut1' => $m["rutColaborador"],
				                            'rut2' => $s["rutColaborador"],
				                        ])
				                        ->execute();

						}

				}


		}
	}



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

        //tareas
        //$dependencia = BuscarController::findDependencia2($rutColaborador);
        //$tarea = BuscarController::findTareasRecibidas($dependencia->idDependencias);
        //var_dump($tarea);die();
        
        //Misiones
        //$mision = BuscarController::encuentraMisiones();

        //publicidad

       $publicidad = BuscarController::findPublicidad();


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
                    'dependencia' => $dependencia,
                    //'tarea' => $tarea,
                    //'mision' => $mision,
                    'publicidad' => $publicidad,
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


    public function actionTareas($rutColaborador){
        $session = Yii::$app->session;
        $rutColaborador = $session['rut'];

        $model = BuscarController::findColaboradorRut($rutColaborador);
        $dependencia = BuscarController::findDependencia2($rutColaborador);
        $tarea = BuscarController::findTareasRecibidas($dependencia->idDependencias);

        $session['rutColaborador'] = $model[0]['rutColaborador'];
        $session['nombreColaborador'] = $model[0]['nombreColaborador'];
        $session['apellidosColaborador'] = $model[0]['apellidosColaborador'];


        

        $modelo = $this->renderAjax('perfil', [
                              'model' => $model,
                              'dependencia' => $dependencia,
                              'tarea' => $tarea,

                            ]);


    }

/*
    public function actionCrearPublicidad($idperfil){
     try {
            $num = rand(5, 600);


            ini_set('memory_limit', '128M');

            

            $model = new Rpublicidad();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->file = UploadedFile::getInstances($model, 'rfoto');
            ini_set('memory_limit', '512M');
            $num = rand(5, 600);
            foreach ($model->file as $file) {
                        ini_set('memory_limit', '512M');
                        $file->saveAs('img/publicidad/' . $model->ridPublicidad . $file->baseName . $num . "." . $file->extension);
                        Image::thumbnail('img/publicidad/' . $model->ridPublicidad . $file->baseName . $num . "." . $file->extension, 200, 187)
                                ->save('img/publicidad/' . $model->ridPublicidad . $file->baseName . $num . "." . $file->extension, ['quality' => 100]);

                        ini_set('memory_limit', '512M');

                        $ruta = 'img/publicidad/' . $model->ridPublicidad . $file->baseName . $num . "." . $file->extension;
                        Image::thumbnail($ruta, 120, 120)
                                ->save('img/publicidad/t/' . $model->ridPublicidad . $file->baseName . $num . "." . $file->extension, ['quality' => 50]);
                        $model->rfoto = $model->ridPublicidad . $file->baseName . $num . "." . $file->extension;
                       
                    }
            $model->save(false);
          
        }

                return $this->redirect(['perfil', 'rutColaborador' => $model->rutColaborador]);
            } else {
                return $this->renderAjax('createpublicidad', [
                            'model' => $model,
                ]);
            }
        } catch (ErrorException $e) {
            throw new NotFoundHttpException('Intenta subir una foto mas liviana!!!');
        }
    }
    */

    public function actionFoto($rutColaborador) {
        try {
            $num = rand(5, 600);


            ini_set('memory_limit', '128M');

            $model = BuscarController::findColaboradorRut($rutColaborador);

            $perfil = BuscarController::findPerfil($model->idperfilRed);

            if ($perfil->load(Yii::$app->request->post())) {

                $perfil->file = UploadedFile::getInstances($perfil, 'rfoto');

                if (empty($perfil->file)) {

                    $models = BuscarController::findColaboradorRut($rutColaborador);
                    $perfils = BuscarController::findPerfil($models->idperfilRed);
                    $perfils->rbio = $perfil->rbio;
                    $models->save(false);
                    $perfils->save(false);
                } else {

                    foreach ($perfil->file as $file) {
                        ini_set('memory_limit', '512M');
                        $file->saveAs('img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension);
                        Image::thumbnail('img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension, 200, 187)
                                ->save('img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension, ['quality' => 100]);

                        ini_set('memory_limit', '512M');

                        $ruta = 'img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension;
                        Image::thumbnail($ruta, 120, 120)
                                ->save('img/perfil/t/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension, ['quality' => 50]);
                        $perfil->rfoto = $model->rutColaborador . $file->baseName . $num . "." . $file->extension;

                        $perfil->save(false);
                        $model->save(false);
                      
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
                              'contenido' => $conte,
                              'comentarios' => $comentarios,
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
        $model = new Colaborador();
        return $this->render('login', [
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
         $perfil = new Rperfilredsocial();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rutColaborador' => $model->rutColaborador, 'idSucursal' => $model->idSucursal, 'idArea' => $model->idArea, 'idCargo' => $model->idCargo, 'idRol' => $model->idRol, 'idGerencia' => $model->idGerencia, 'idperfil' => $model->idperfil, 'idperfilRed' => $model->idperfilRed, 'idestadisticas' => $model->idestadisticas, 'idestado' => $model->idestado, 'idCC' => $model->idCC]);
        }

        return $this->render('create', [
                    'model' => $model,
                    'perfil' => $perfil,
        ]);

        /*$model = new Colaborador();
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
        return $this->render('create', [
                    'model' => $model,
        ]);
        */
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
        $perfil = BuscarController::findPerfil($model->$idperfilRed);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'perfil' => $perfil,
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
        ini_set('post_max_size', '64M');
        ini_set('upload_max_filesize', '64M');
        ini_set('memory_limit', '256M');
        //ini_set('memory_limit', '8192M');
        //var_dump(Yii::$app->request->post());die();
        date_default_timezone_set("America/Santiago");

        $model = new Rpost();
        
        if (Yii::$app->request->post()) {
          
            

            if(!preg_match("/^\s*$/", Yii::$app->request->post()["descripcionPost"]))
                 {

                     \Yii::$app->getSession()->setFlash('error', ' <div class="col-sm-12 col-md-12">
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×</button>
                           <span class="glyphicon glyphicon-no"></span> <strong>Mensaje de error</strong>
                            <hr class="message-inner-separator">
                            <p>
                                Debe ingresar algún contenido a postear.</p>
                        </div>
                    </div>');
                    return $this->redirect('index.php?r=colaborador/perfil');
                    
                 }else{
                $model->file = UploadedFile::getInstances($model, 'file');

                if (empty($model->file) && empty(Yii::$app->request->post()["rdescripcionPost"])) {



                    \Yii::$app->getSession()->setFlash('error', ' <div class="col-sm-12 col-md-12">
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×</button>
                           <span class="glyphicon glyphicon-no"></span> <strong>Mensaje de error</strong>
                            <hr class="message-inner-separator">
                            <p>
                                Debe ingresar algún contenido a postear.</p>
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

               //var_dump($model->file[0]);die();

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

                if ($model->file[0]->type == "video/mp4" || $model->file[0]->type == "video/3gpp" || $model->file[0]->type == "video/quicktime" ) {
               
                    $model->rtipoPost = 3; // este post es con foto
                    foreach ($model->file as $file) {
                        $file->saveAs('img/post/video/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $ruta = 'img/post/video/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        
                        $model->rfoto = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                      // var_dump($model->rdescripcionPost);die();
                    }
                }
                
            }




            $model->rut1 = Yii::$app->request->post()["rutColaborador"];

            $model->rut2 = 1;
            
            $model->save(false);
            if ($model->rfoto == NULL && $model->rdescripcionPost == "0") {
                
            } else {
                $model->save(false);
                $actividad = new Ractividad();
                $actividad->ridtipo_post = $model->rtipoPost;
                $actividad->rutColaborador1 = $model->rut1;
                $actividad->rutColaborador2 = $model->rut2;
                $actividad->ridpost = $model->ridPost;
                $actividad->save(false);

                $persona = BuscarController::findColaboradorRut($actividad->rutColaborador1);
                $estadistica = BuscarController::findEstadistica($persona->idestadisticas);
                $estadistica->rcontadorP = $estadistica->rcontadorP + 1;
                $persona->save(false);
                $estadistica->save(false);
                
                
            }



            $session = Yii::$app->session;
            $rutColaborador = $session['rut'];

            $model = BuscarController::encuentraColaborador($rutColaborador);
            $model2 = BuscarController::encuentraAmigos($rutColaborador);
            $perfil = BuscarController::findPerfil($model[0]["idperfilRed"]);
            $model3 = new Rpost();


      

            return $this->redirect(['colaborador/perfil',
                        'model' => $model,
                        'model2' => $model2,
                        'perfil' => $perfil,
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
            $model2->rrotador = $model2->rrotador + 90;
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
               $perfil = BuscarController::findPerfil($posteador[0]["idperfilRed"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador2"]);
               $perfil2 = BuscarController::findPerfil($posteador2[0]["idperfilRed"]);     
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);           
                $megusta = BuscarController::megusta($rutColaborador, $rpost["ridpost"]);
               $modelo = $this->renderAjax('estado', [
                              'model' => $model,
                              'post' => $rpost,
                              'perfil' => $perfil,
                              'perfil2' => $perfil2,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,
                              'megusta' => $megusta,
                              
                                        ]);
               $total =$total.$modelo;
            }

            if ($rpost["rtipoPost"] == 2) {
                //2

                $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
                $perfil = BuscarController::findPerfil($posteador[0]["idperfilRed"]);
                $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador2"]);
                $perfil2 = BuscarController::findPerfil($posteador2[0]["idperfilRed"]);    
                $megusta = BuscarController::megusta($rutColaborador, $rpost["ridpost"]);  
                 $comentarios = BuscarController::findComentarios($rpost["ridpost"]);   
                                                    
               $modelo = $this->renderAjax('imagen', [
                              'model' => $model,
                              'post' => $rpost,
                              'perfil' => $perfil,
                              'perfil2' => $perfil2,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,
                              'megusta' => $megusta,

                                        ]);
               $total =$total.$modelo;
            }


            if ($rpost["rtipoPost"] == 3) {
                //3

               $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
                $perfil = BuscarController::findPerfil($posteador[0]["idperfilRed"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador2"]);
               $perfil2 = BuscarController::findPerfil($posteador2[0]["idperfilRed"]);  
               $megusta = BuscarController::megusta($rutColaborador, $rpost["ridpost"]);        
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);    
               $modelo = $this->renderAjax('video', [
                              'model' => $model,
                              'post' => $rpost,
                              'perfil' => $perfil,
                              'perfil2' => $perfil2,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,
                              'megusta' => $megusta,

                                        ]);
               $total =$total.$modelo;
            }
           
            if ($rpost["rtipoPost"] == 5) {
                //5

                $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
                $perfil = BuscarController::findPerfil($posteador[0]["idperfilRed"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador2"]);
               $perfil2 = BuscarController::findPerfil($posteador2[0]["idperfilRed"]);         
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);
               $megusta = BuscarController::megusta($rutColaborador, $rpost["ridpost"]);                                         
               $modelo = $this->renderAjax('youtube', [
                              'model' => $model,
                              'post' => $rpost,
                              'perfil' => $perfil,
                              'perfil2' => $perfil2,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,
                              'megusta' => $megusta,

                                        ]);
               $total =$total.$modelo;
            }

              if ($rpost["rtipoPost"] == 6) {

                //6
                 $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
                $perfil = BuscarController::findPerfil($posteador[0]["idperfilRed"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador2"]);
               $perfil2 = BuscarController::findPerfil($posteador2[0]["idperfilRed"]);         
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);
               $megusta = BuscarController::megusta($rutColaborador, $rpost["ridpost"]);                                             
               $modelo = $this->renderAjax('archivo', [
                              'model' => $model,
                              'post' => $rpost,
                              'perfil' => $perfil,
                              'perfil2' => $perfil2,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,
                              'megusta' => $megusta,

                                        ]);
               $total =$total.$modelo;
            }

             if ($rpost["rtipoPost"] == 12321) {


              $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
                $perfil = BuscarController::findPerfil($posteador[0]["idperfilRed"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador2"]);
               $perfil2 = BuscarController::findPerfil($posteador2[0]["idperfilRed"]);          
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);
               $megusta = BuscarController::megusta($rutColaborador, $rpost["ridpost"]);                                             
               $modelo = $this->renderAjax('facebook', [
                              'model' => $model,
                              'post' => $rpost,
                              'perfil' => $perfil,
                              'perfil2' => $perfil2,
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


     public function actionReloadr($page, $rutColaborador, $rutAmigo){
        $numpage =$page;
        $perpage = 3;
        $posisi = (($numpage-1) * $perpage);
        $actividad = BuscarController::findMurora($rutColaborador, $posisi, $perpage);
        $model = BuscarController::findColaboradorRut($rutColaborador);
        $total = "";
        $session = Yii::$app->session;
        $rutColaborador = $session['rut'];
        foreach($actividad as $rpost){

            
             if ($rpost["rtipoPost"] == 1) {


               $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
                $perfil = BuscarController::findPerfil($posteador[0]["idperfilRed"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador2"]);
               $perfil2 = BuscarController::findPerfil($posteador2[0]["idperfilRed"]);          
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);                      
               $megusta = BuscarController::megusta($rutColaborador, $rpost["ridpost"]);

               $modelo = $this->renderAjax('estado', [
                              'model' => $model,
                              'post' => $rpost,
                              'perfil' => $perfil,
                              'perfil2' => $perfil2,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,
                              'megusta' => $megusta,

                                        ]);
               $total =$total.$modelo;
            }

            if ($rpost["rtipoPost"] == 2) {


               $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
                $perfil = BuscarController::findPerfil($posteador[0]["idperfilRed"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador2"]);
               $perfil2 = BuscarController::findPerfil($posteador2[0]["idperfilRed"]);          
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);
               $megusta = BuscarController::megusta($rutColaborador, $rpost["ridpost"]);                                     

               $modelo = $this->renderAjax('imagen', [
                              'model' => $model,
                              'post' => $rpost,
                              'perfil' => $perfil,
                              'perfil2' => $perfil2,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,
                              'megusta' => $megusta,

                                        ]);
               $total =$total.$modelo;
            }


            if ($rpost["rtipoPost"] == 3) {


              $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
                $perfil = BuscarController::findPerfil($posteador[0]["idperfilRed"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador2"]);
               $perfil2 = BuscarController::findPerfil($posteador2[0]["idperfilRed"]);          
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);
               $megusta = BuscarController::megusta($rutColaborador, $rpost["ridpost"]);                              

               $modelo = $this->renderAjax('video', [
                              'model' => $model,
                              'post' => $rpost,
                              'perfil' => $perfil,
                              'perfil2' => $perfil2,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,
                              'megusta' => $megusta,
                                        ]);
               $total =$total.$modelo;
            }
           
            if ($rpost["rtipoPost"] == 5) {


              $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
                $perfil = BuscarController::findPerfil($posteador[0]["idperfilRed"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador2"]);
               $perfil2 = BuscarController::findPerfil($posteador2[0]["idperfilRed"]);          
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);
               $megusta = BuscarController::megusta($rutColaborador, $rpost["ridpost"]);                                              
               $modelo = $this->renderAjax('youtube', [
                              'model' => $model,
                              'post' => $rpost,
                              'perfil' => $perfil,
                              'perfil2' => $perfil2,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,
                              'megusta' => $megusta,
                                        ]);
               $total =$total.$modelo;
            }

              if ($rpost["rtipoPost"] == 6) {


                $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
                $perfil = BuscarController::findPerfil($posteador[0]["idperfilRed"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador2"]);
               $perfil2 = BuscarController::findPerfil($posteador2[0]["idperfilRed"]);          
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);
               $megusta = BuscarController::megusta($rutColaborador, $rpost["ridpost"]);                                               

               $modelo = $this->renderAjax('archivo', [
                              'model' => $model,
                              'post' => $rpost,
                              'perfil' => $perfil,
                              'perfil2' => $perfil2,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,
                              'megusta' => $megusta,
                                        ]);
               $total =$total.$modelo;
            }
             if ($rpost["rtipoPost"] == 12321321) {


               $posteador = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador1"]);
                $perfil = BuscarController::findPerfil($posteador[0]["idperfilRed"]);
               $posteador2 = BuscarController::encuentraColaboradorEstado($rpost["rutColaborador2"]);
               $perfil2 = BuscarController::findPerfil($posteador2[0]["idperfilRed"]);          
               $comentarios = BuscarController::findComentarios($rpost["ridpost"]);              
               $megusta = BuscarController::megusta($rutColaborador, $rpost["ridpost"]);
               $modelo = $this->renderAjax('facebook', [
                              'model' => $model,
                              'post' => $rpost,
                              'perfil' => $perfil,
                              'perfil2' => $perfil2,
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

       public function actionBeneficios($rutAmigo){
      $session = Yii::$app->session;
      $rutColaborador = $session['rut'];





        if ($rutColaborador == null || $rutColaborador != $rutAmigo) {
            $model = new Colaborador();
            return $this->redirect(['site/login', 'model' => $model]);
        }else{

            $model = BuscarController::findColaboradorRut($rutAmigo);
            $model2 = BuscarController::encuentraAmigos($rutAmigo);
            $model3 = new RPost();
            $model4 = BuscarController::encuentraPost($rutAmigo);
            $perfil = BuscarController::findPerfil($model->idperfilRed);
            $estadistica = BuscarController::findEstadistica($model->idestadisticas);
            $actividad = BuscarController::findMuroa($rutAmigo);
            $beneficio = BuscarController::findBeneficios();
            $colaborador = BuscarController::findColaboradorRut($rutColaborador);
            $perfil = BuscarController::findPerfil($model->idperfilRed);
            $puntaje = BuscarController::findPuntaje($rutColaborador);
            $historial = BuscarController::findMisbeneficios($rutColaborador);
            $publicidad = BuscarController::findPublicidad();
            
        }


      return $this->render('beneficioHome', [
                                 'model' => $model,
                                 'model2' => $model2,
                                 'model3' => $model3,
                                 'model4' => $model4,
                                 'perfil' => $perfil,
                                 'estadistica' => $estadistica,
                                 'actividad' => $actividad,
                                 'rutAmigo' => $rutAmigo,
                                 'rutColaborador' => $rutColaborador,       
                                 'beneficio' => $beneficio, 
                                 'colaborador' => $colaborador,
                                 'perfil' => $perfil,
                                 'puntaje' => $puntaje,
                                 'historial' => $historial,
                                 'publicidad' =>$publicidad
                  ]); 
      

    }

     public function actionSolicitar($rutColaborador, $idbeneficio) {
            
        date_default_timezone_set("America/Santiago");
            $model = BuscarController::findColaboradorRut($rutColaborador);
            $beneficio = BuscarController::buscarBeneficio($idbeneficio);
            $puntaje = BuscarController::findPuntaje($rutColaborador);
            $buscar = BuscarController::findCanje($rutColaborador);
            $canje = new Bcolaboradorbeneficio();
            $mes = BuscarController::canjeMes($rutColaborador, $beneficio["bId_Beneficio"]);
            $anio = BuscarController::canjeA($rutColaborador, $beneficio["bId_Beneficio"]);
            if($anio < $beneficio->bvezporanio){

              if($mes < $beneficio->bvezpormes){

                      if($beneficio["bValorBeneficio"] <= $puntaje["puntaje"]){

                
                        $canje->bId_Beneficio = $beneficio["bId_Beneficio"];
                        $canje->rutColaborador = $model->rutColaborador;
                        $canje->bfechaCanje = date("Y-m-d G:i:s");
                        $canje->bvalorCanje = $beneficio["bValorBeneficio"];
                        $puntajefinal = ($puntaje->puntaje - $beneficio->bValorBeneficio);
                        $puntaje->puntaje = $puntajefinal;
                        $canje->save(false);
                        $puntaje->save(false);

                        

                        Yii::$app->mailer->compose()
                        ->setFrom('contacto@induccion.org')
                        ->setTo(['cgarrido@rrhh3d.cl','jibanez@rrhh3d.cl','rrhh@flesan.cl', $model->correo])
                        ->setSubject(' De:Canje de beneficio usuario: '.$model->nombreColaborador.' ')
                        ->setHtmlBody('<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
  <head>
    <!-- NAME: 1:2:1 COLUMN -->
    <!--[if gte mso 15]>
        <xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>*|MC:SUBJECT|*</title>
        
    <style type="text/css">
    p{
      margin:10px 0;
      padding:0;
    }
    table{
      border-collapse:collapse;
    }
    h1,h2,h3,h4,h5,h6{
      display:block;
      margin:0;
      padding:0;
    }
    img,a img{
      border:0;
      height:auto;
      outline:none;
      text-decoration:none;
    }
    body,#bodyTable,#bodyCell{
      height:100%;
      margin:0;
      padding:0;
      width:100%;
    }
    .mcnPreviewText{
      display:none !important;
    }
    #outlook a{
      padding:0;
    }
    img{
      -ms-interpolation-mode:bicubic;
    }
    table{
      mso-table-lspace:0pt;
      mso-table-rspace:0pt;
    }
    .ReadMsgBody{
      width:100%;
    }
    .ExternalClass{
      width:100%;
    }
    p,a,li,td,blockquote{
      mso-line-height-rule:exactly;
    }
    a[href^=tel],a[href^=sms]{
      color:inherit;
      cursor:default;
      text-decoration:none;
    }
    p,a,li,td,body,table,blockquote{
      -ms-text-size-adjust:100%;
      -webkit-text-size-adjust:100%;
    }
    .ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
      line-height:100%;
    }
    a[x-apple-data-detectors]{
      color:inherit !important;
      text-decoration:none !important;
      font-size:inherit !important;
      font-family:inherit !important;
      font-weight:inherit !important;
      line-height:inherit !important;
    }
    #bodyCell{
      padding:10px;
    }
    .templateContainer{
      max-width:600px !important;
    }
    a.mcnButton{
      display:block;
    }
    .mcnImage,.mcnRetinaImage{
      vertical-align:bottom;
    }
    .mcnTextContent{
      word-break:break-word;
    }
    .mcnTextContent img{
      height:auto !important;
    }
    .mcnDividerBlock{
      table-layout:fixed !important;
    }
  
    body,#bodyTable{
      background-color:#e4e4e4;
    }
  
    #bodyCell{
      border-top:0;
    }
  
    .templateContainer{
      border:0;
    }
  
    h1{
      color:#202020;
      font-family:Helvetica;
      font-size:26px;
      font-style:normal;
      font-weight:bold;
      line-height:125%;
      letter-spacing:normal;
      text-align:left;
    }
  
    h2{
      color:#202020;
      font-family:Helvetica;
      font-size:22px;
      font-style:normal;
      font-weight:bold;
      line-height:125%;
      letter-spacing:normal;
      text-align:left;
    }
  
    h3{
      color:#202020;
      font-family:Helvetica;
      font-size:20px;
      font-style:normal;
      font-weight:bold;
      line-height:125%;
      letter-spacing:normal;
      text-align:left;
    }
  
    h4{
      color:#202020;
      font-family:Helvetica;
      font-size:18px;
      font-style:normal;
      font-weight:bold;
      line-height:125%;
      letter-spacing:normal;
      text-align:left;
    }
  
    #templatePreheader{
      background-color:#343434;
      background-image:none;
      background-repeat:no-repeat;
      background-position:center;
      background-size:cover;
      border-top:0;
      border-bottom:0;
      padding-top:9px;
      padding-bottom:9px;
    }
  
    #templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
      color:#ffffff;
      font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size:12px;
      line-height:150%;
      text-align:left;
    }

    #templatePreheader .mcnTextContent a,#templatePreheader .mcnTextContent p a{
      color:#ffffff;
      font-weight:normal;
      text-decoration:underline;
    }
  
    #templateHeader{
      background-color:#ffffff;
      background-image:none;
      background-repeat:no-repeat;
      background-position:center;
      background-size:cover;
      border-top:0;
      border-bottom:0;
      padding-top:9px;
      padding-bottom:0;
    }
  
    #templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
      color:#202020;
      font-family:Helvetica;
      font-size:16px;
      line-height:150%;
      text-align:left;
    }
  
    #templateHeader .mcnTextContent a,#templateHeader .mcnTextContent p a{
      color:#2BAADF;
      font-weight:normal;
      text-decoration:underline;
    }
  
    #templateUpperBody{
      background-color:#FFFFFF;
      background-image:none;
      background-repeat:no-repeat;
      background-position:center;
      background-size:cover;
      border-top:0;
      border-bottom:0;
      padding-top:0;
      padding-bottom:0;
    }
  
    #templateUpperBody .mcnTextContent,#templateUpperBody .mcnTextContent p{
      color:#202020;
      font-family:Helvetica;
      font-size:16px;
      line-height:150%;
      text-align:left;
    }
  
    #templateUpperBody .mcnTextContent a,#templateUpperBody .mcnTextContent p a{
      color:#2BAADF;
      font-weight:normal;
      text-decoration:underline;
    }
  
    #templateColumns{
      background-color:#FFFFFF;
      background-image:none;
      background-repeat:no-repeat;
      background-position:center;
      background-size:cover;
      border-top:0;
      border-bottom:0;
      padding-top:0;
      padding-bottom:0;
    }
  
    #templateColumns .columnContainer .mcnTextContent,#templateColumns .columnContainer .mcnTextContent p{
      color:#202020;
      font-family:Helvetica;
      font-size:16px;
      line-height:150%;
      text-align:left;
    }
  
    #templateColumns .columnContainer .mcnTextContent a,#templateColumns .columnContainer .mcnTextContent p a{
      color:#2BAADF;
      font-weight:normal;
      text-decoration:underline;
    }

    #templateLowerBody{
      background-color:#FFFFFF;
      background-image:none;
      background-repeat:no-repeat;
      background-position:center;
      background-size:cover;
      border-top:0;
      border-bottom:2px solid #EAEAEA;
      padding-top:0;
      padding-bottom:9px;
    }
  
    #templateLowerBody .mcnTextContent,#templateLowerBody .mcnTextContent p{
      color:#202020;
      font-family:Helvetica;
      font-size:16px;
      line-height:150%;
      text-align:left;
    }
  
    #templateLowerBody .mcnTextContent a,#templateLowerBody .mcnTextContent p a{
      color:#2BAADF;
      font-weight:normal;
      text-decoration:underline;
    }
  #templateFooter{
      background-color:#343434;
      background-image:none;
      background-repeat:no-repeat;
      background-position:center;
      background-size:cover;
      border-top:0;
      border-bottom:0;
      padding-top:9px;
      padding-bottom:9px;
    }
  
    #templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
      color:#656565;
      font-family:Helvetica;
      font-size:12px;
      line-height:150%;
      text-align:center;
    }
  
    #templateFooter .mcnTextContent a,#templateFooter .mcnTextContent p a{
      color:#0091ff;
      font-weight:normal;
      text-decoration:underline;
    }
  @media only screen and (min-width:768px){
    .templateContainer{
      width:600px !important;
    }

} @media only screen and (max-width: 480px){
    body,table,td,p,a,li,blockquote{
      -webkit-text-size-adjust:none !important;
    }

} @media only screen and (max-width: 480px){
    body{
      width:100% !important;
      min-width:100% !important;
    }

} @media only screen and (max-width: 480px){
    #bodyCell{
      padding-top:10px !important;
    }

} @media only screen and (max-width: 480px){
    .columnWrapper{
      max-width:100% !important;
      width:100% !important;
    }

} @media only screen and (max-width: 480px){
    .mcnRetinaImage{
      max-width:100% !important;
    }

} @media only screen and (max-width: 480px){
    .mcnImage{
      width:100% !important;
    }

} @media only screen and (max-width: 480px){
    .mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer,.mcnImageCardLeftImageContentContainer,.mcnImageCardRightImageContentContainer{
      max-width:100% !important;
      width:100% !important;
    }

} @media only screen and (max-width: 480px){
    .mcnBoxedTextContentContainer{
      min-width:100% !important;
    }

} @media only screen and (max-width: 480px){
    .mcnImageGroupContent{
      padding:9px !important;
    }

} @media only screen and (max-width: 480px){
    .mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
      padding-top:9px !important;
    }

} @media only screen and (max-width: 480px){
    .mcnImageCardTopImageContent,.mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
      padding-top:18px !important;
    }

} @media only screen and (max-width: 480px){
    .mcnImageCardBottomImageContent{
      padding-bottom:9px !important;
    }

} @media only screen and (max-width: 480px){
    .mcnImageGroupBlockInner{
      padding-top:0 !important;
      padding-bottom:0 !important;
    }

} @media only screen and (max-width: 480px){
    .mcnImageGroupBlockOuter{
      padding-top:9px !important;
      padding-bottom:9px !important;
    }

} @media only screen and (max-width: 480px){
    .mcnTextContent,.mcnBoxedTextContentColumn{
      padding-right:18px !important;
      padding-left:18px !important;
    }

} @media only screen and (max-width: 480px){
    .mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
      padding-right:18px !important;
      padding-bottom:0 !important;
      padding-left:18px !important;
    }

} @media only screen and (max-width: 480px){
    .mcpreview-image-uploader{
      display:none !important;
      width:100% !important;
    }

} @media only screen and (max-width: 480px){
  
    h1{
      font-size:22px !important;
      line-height:125% !important;
    }

} @media only screen and (max-width: 480px){
  
    h2{
      font-size:20px !important;
      line-height:125% !important;
    }

} @media only screen and (max-width: 480px){
  
    h3{
      font-size:18px !important;
      line-height:125% !important;
    }

} @media only screen and (max-width: 480px){
  
    h4{
      font-size:16px !important;
      line-height:150% !important;
    }

} @media only screen and (max-width: 480px){
  
    .mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{
      font-size:14px !important;
      line-height:150% !important;
    }

} @media only screen and (max-width: 480px){
  
    #templatePreheader{
      display:block !important;
    }

} @media only screen and (max-width: 480px){
  
    #templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
      font-size:14px !important;
      line-height:150% !important;
    }

} @media only screen and (max-width: 480px){
    #templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
      font-size:16px !important;
      line-height:150% !important;
    }

} @media only screen and (max-width: 480px){
  
    #templateUpperBody .mcnTextContent,#templateUpperBody .mcnTextContent p{
      font-size:16px !important;
      line-height:150% !important;
    }

} @media only screen and (max-width: 480px){
  
    #templateColumns .columnContainer .mcnTextContent,#templateColumns .columnContainer .mcnTextContent p{
      font-size:16px !important;
      line-height:150% !important;
    }

} @media only screen and (max-width: 480px){

    #templateLowerBody .mcnTextContent,#templateLowerBody .mcnTextContent p{
      font-size:16px !important;
      line-height:150% !important;
    }

} @media only screen and (max-width: 480px){
  
    #templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
      font-size:14px !important;
      line-height:150% !important;
    }

}</style></head>
    <body>
    
    <!--[if !gte mso 9]><!----><span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;">*|MC_PREVIEW_TEXT|*</span><!--<![endif]-->
    <!--*|END:IF|*-->
        <center>
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                    <td align="center" valign="top" id="bodyCell">
            <!-- BEGIN TEMPLATE // -->
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
            <tr>
            <td align="center" valign="top" width="600" style="width:600px;">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
              <tr>
                <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding:0px" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 0px; padding-left: 0px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                
                                    
                                        <img align="center" alt="" src="https://gallery.mailchimp.com/512382a36ea2d736ea5d65f8b/images/7c86ae6d-bb34-439f-b804-6beae8d85d66.png" width="144" style="max-width:288px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnRetinaImage">
                                    
                                
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
              </tr>
              <tr>
                <td valign="top" id="templateHeader"></td>
              </tr>
              <tr>
                <td valign="top" id="templateUpperBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                <!--[if mso]>
        <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
        <tr>
        <![endif]-->
          
        <!--[if mso]>
        <td valign="top" width="600" style="width:600px;">
        <![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px; font-style: normal; font-weight: normal; text-align: center;">
                        
                            <h4 class="null" style="text-align: center;">&nbsp;</h4>

<div style="text-align: center;"><span style="font-size:14px">Estimado&nbsp;<strong>'.$model->nombreColaborador.' '.$model->apellidosColaborador.'</strong>,<br>
ha canjeado un nuevo beneficio llamado:&nbsp;<strong>'.$beneficio->bNombre.'</strong>&nbsp;con un valor de: '.$beneficio->bValorBeneficio.' puntos.</span><br>
&nbsp;</div>

<div style="text-align: center;"><span style="font-size:14px"><strong></strong>&nbsp;</span></div>

                        </td>
                    </tr>
                </tbody></table>
        <!--[if mso]>
        </td>
        <![endif]-->
                
        <!--[if mso]>
        </tr>
        </table>
        <![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
              </tr>
              <tr>
                <td valign="top" id="templateColumns">
                  <!--[if (gte mso 9)|(IE)]>
                  <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
                  <tr>
                  <td align="center" valign="top" width="300" style="width:300px;">
                  <![endif]-->
                  <table align="left" border="0" cellpadding="0" cellspacing="0" width="300" class="columnWrapper">
                    <tr>
                      <td valign="top" class="columnContainer"></td>
                    </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  <td align="center" valign="top" width="300" style="width:300px;">
                  <![endif]-->
                  <table align="left" border="0" cellpadding="0" cellspacing="0" width="300" class="columnWrapper">
                    <tr>
                      <td valign="top" class="columnContainer"></td>
                    </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
                </td>
              </tr>
              <tr>
                <td valign="top" id="templateLowerBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width:100%; padding:18px;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EAEAEA;">
                    <tbody><tr>
                        <td>
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
<!--            
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                <!--[if mso]>
        <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
        <tr>
        <![endif]-->
          
        <!--[if mso]>
        <td valign="top" width="600" style="width:600px;">
        <![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                        
                            <div style="text-align: center;"><strong>INGRESA CON TU EMAIL</strong></div>

                        </td>
                    </tr>
                </tbody></table>
        <!--[if mso]>
        </td>
        <![endif]-->
                
        <!--[if mso]>
        </tr>
        </table>
        <![endif]-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width:100%;">
    <tbody class="mcnButtonBlockOuter">
        <tr>
            <td style="padding-top:0; padding-right:18px; padding-bottom:18px; padding-left:18px;" valign="top" align="center" class="mcnButtonBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border-radius: 3px;background-color: #E80E0A;">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family: Arial; font-size: 16px; padding: 15px;">
                                <a class="mcnButton " title=" IR A LA RED SOCIAL FLESAN" href="http://induccion.org/plataformaB/web/index.php?r=site%2Flogin" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;"> IR A LA RED SOCIAL FLESAN</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width:100%; padding:18px;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EAEAEA;">
                    <tbody><tr>
                        <td>
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
<!--            
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                <!--[if mso]>
        <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
        <tr>
        <![endif]-->
          
        <!--[if mso]>
        <td valign="top" width="600" style="width:600px;">
        <![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px;color: #000000;">
                        
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td>
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <td style="text-align: center;">&nbsp;</td>
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
  </tbody>
</table>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td valign="top">
      <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <td style="text-align: center;" valign="top"><span style="font-size:14px">Ante cualquier duda envíanos un correo&nbsp;<br>
            <a href="http://" target="_blank">recursoshumanos@flesan.cl</a><br>
            <br>
            <strong>GERENCIA DE RECURSOS HUMANOS<br>
            FLESAN</strong></span></td>
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
  </tbody>
</table>

                        </td>
                    </tr>
                </tbody></table>
        <!--[if mso]>
        </td>
        <![endif]-->
                
        <!--[if mso]>
        </tr>
        </table>
        <![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
              </tr>
              <tr>
                <td valign="top" id="templateFooter"></td>
              </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
            <!-- // END TEMPLATE -->
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>
')->send();


return 1; // se canjeo

                    }else
                      {
                       return 0; // no teni plata
                      }
            }else{
              return 3; // te lo pitiate todos.
            }
      }else{
          return 4; // año
      }
   
        
    }
  }
