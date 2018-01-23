<<<<<<< HEAD
<?php

namespace app\controllers;

use Yii;
use app\controllers\SiteController;
use app\models\Colaborador;
use app\models\Rpost;
use app\models\ControllerSearch;
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

        $model1 = new Rpost();
        $model = BuscarController::findColaboradorRut($rutColaborador);
        $perfil = BuscarController::findPerfil($model->idperfilRed);
        $model2 = BuscarController::encuentraPost($rutColaborador);
        $actividad = BuscarController::findMuro();
        $estadistica = BuscarController::findEstadistica($model->idestadisticas);



        $session['foto'] = $perfil->rfoto;
        $session['rutColaborador'] = $model->rutColaborador;
        $session['nombreColaborador'] = $model->nombreColaborador;
        $session['apellidosColaborador'] = $model->apellidosColaborador;

        return $this->render('perfil', [
                    'model' => $model,
                    'model3' => $model1,
                    'model4' => $model2,
                    'perfil' => $perfil,
                    'actividad' => $actividad,
                    'estadistica' => $estadistica,
        ]);
    }

    public function actionFoto($rutColaborador) {
        try {
            $num = rand(5, 600);


            ini_set('memory_limit', '128M');

            $model = BuscarController::findColaboradorRut($rutColaborador);

            if ($model->load(Yii::$app->request->post())) {

                $model->file = UploadedFile::getInstances($model, 'foto');

                if (empty($model->file)) {
                    $models = $this->findModel($rutColaborador);
                    $models->bio = $model->bio;
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
                        $model->foto = $model->rutColaborador . $file->baseName . $num . "." . $file->extension;
                        $model->save();
                    }
                }



                return $this->redirect(['perfil', 'rutColaborador' => $model->rutColaborador]);
            } else {
                return $this->renderAjax('update', [
                            'model' => $model,
                ]);
            }
        } catch (ErrorException $e) {
            throw new NotFoundHttpException('Intenta subir una foto mas liviana!!!');
        }
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Colaborador models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ControllerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Colaborador model.
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
    public function actionView($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC) {
        return $this->render('view', [
                    'model' => $this->findModel($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC),
        ]);
    }

    /**
     * Creates a new Colaborador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Colaborador();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rutColaborador' => $model->rutColaborador, 'idSucursal' => $model->idSucursal, 'idArea' => $model->idArea, 'idCargo' => $model->idCargo, 'idRol' => $model->idRol, 'idGerencia' => $model->idGerencia, 'idperfil' => $model->idperfil, 'idperfilRed' => $model->idperfilRed, 'idestadisticas' => $model->idestadisticas, 'idestado' => $model->idestado, 'idCC' => $model->idCC]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
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
    public function actionUpdate($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC) {
        $busqueda = SiteController::findColaborador($rutColaborador);


        $model = $this->findModel($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rutColaborador' => $model->rutColaborador, 'idSucursal' => $model->idSucursal, 'idArea' => $model->idArea, 'idCargo' => $model->idCargo, 'idRol' => $model->idRol, 'idGerencia' => $model->idGerencia, 'idperfil' => $model->idperfil, 'idperfilRed' => $model->idperfilRed, 'idestadisticas' => $model->idestadisticas, 'idestado' => $model->idestado, 'idCC' => $model->idCC]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
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

    /**
     * Finds the Colaborador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
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
     * @return Colaborador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC) {
        if (($model = Colaborador::findOne(['rutColaborador' => $rutColaborador, 'idSucursal' => $idSucursal, 'idArea' => $idArea, 'idCargo' => $idCargo, 'idRol' => $idRol, 'idGerencia' => $idGerencia, 'idperfil' => $idperfil, 'idperfilRed' => $idperfilRed, 'idestadisticas' => $idestadisticas, 'idestado' => $idestado, 'idCC' => $idCC])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
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

            ini_set('memory_limit', '8192M');


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

            ini_set('memory_limit', '8192M');


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

                        $model->foto = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                    }
                }

                if ($model->file[0]->type == "application/msword" || $model->file[0]->type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                    $model->rtipoPost = 6; // este post es con foto
                    foreach ($model->file as $file) {
                        $file->saveAs('img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $ruta = 'img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->foto = "word.png";
                        $model->rdescripcionPost = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->nombreArchivo = $file->baseName . "." . $file->extension;
                    }
                }
                if ($model->file[0]->type == "application/vnd.openxmlformats-officedocument.presentationml.presentation") {
                    $model->rtipoPost = 6; // este post es con foto
                    foreach ($model->file as $file) {


                        $file->saveAs('img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $ruta = 'img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->foto = "power.png";
                        $model->rdescripcionPost = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->nombreArchivo = $file->baseName . "." . $file->extension;
                    }
                }
                if ($model->file[0]->type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                    $model->rtipoPost = 6; // este post es con foto
                    foreach ($model->file as $file) {
                        $file->saveAs('img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $ruta = 'img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->foto = "excel.png";
                        $model->rdescripcionPost = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->nombreArchivo = $file->baseName . "." . $file->extension;
                    }
                }

                if ($model->file[0]->type == "application/pdf") {
                    $model->rtipoPost = 6; // este post es con foto
                    foreach ($model->file as $file) {
                        $file->saveAs('img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $ruta = 'img/archivos/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->foto = "pdf.png";
                        $model->rdescripcionPost = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $model->nombreArchivo = $file->baseName . "." . $file->extension;
                    }
                }

                if ($model->file[0]->type == "video/quicktime" || $model->file[0]->type == "video/3gpp" || $model->file[0]->type == "video/mp4") {
                    $model->rtipoPost = 3; // este post es con foto
                    foreach ($model->file as $file) {


                        $ruta = 'img/post/video/' . $model->rut1 . $file->baseName . $num . "." . $file->extension;
                        $file->saveAs('img/post/video/' . $model->rut1 . $file->baseName . $num . "." . $file->extension);
                        $model->foto = $model->rut1 . $file->baseName . $num . "." . $file->extension;
                    }
                }
            }




            $model->rut1 = Yii::$app->request->post()["rutColaborador"];
            $model->rut2 = 1;
            

            if ($model->rfoto == NULL && $model->rdescripcionPost == "0") {
                
            } else {
                $model->save(false);
                $actividad = new \app\models\Ractividad();
                $actividad->rutColaborador1 = $model->rut1;
                $actividad->rutColaborador2 = $model->rut2;
                $actividad->ridpost = $model->idPost;
                $actividad->ridtipo_post = $model->rtipoPost;
                $actividad->save(false);
            }






            $session = Yii::$app->session;
            $rutColaborador = $session['rut'];

            $model = \app\controllers\BuscarController::encuentraColaborador($rutColaborador);
            $model2 = \app\controllers\BuscarController::encuentraAmigos($rutColaborador);
            $model3 = new Rpost();

            $session['foto'] = $model[0]['foto'];
            $session['apellidosColaborador'] = $model[0]['apellidosColaborador'];

            if ($model->ridPost != null) {
                $this->actionCrean($rutColaborador, $rutColaborador, 3);
            }


            return $this->redirect(['colaborador/perfil',
                        'model' => $model,
                        'model2' => $model2,
                        'model3' => $model3]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }
    
        public function convertYoutube($string) {
        return preg_replace(
                "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width='560' height='315' src=\"//www.youtube.com/embed/$2\"  allowfullscreen></iframe>", $string
        );
    }

}
=======
<?php

namespace app\controllers;

use Yii;
use app\models\Colaborador;
use app\models\ColaboradorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ColaboradorController implements the CRUD actions for Colaborador model.
 */
class ColaboradorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Colaborador models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ColaboradorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Colaborador model.
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
    public function actionView($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC)
    {
        return $this->render('view', [
            'model' => $this->findModel($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC),
        ]);
    }

    /**
     * Creates a new Colaborador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Colaborador();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rutColaborador' => $model->rutColaborador, 'idSucursal' => $model->idSucursal, 'idArea' => $model->idArea, 'idCargo' => $model->idCargo, 'idRol' => $model->idRol, 'idGerencia' => $model->idGerencia, 'idperfil' => $model->idperfil, 'idperfilRed' => $model->idperfilRed, 'idestadisticas' => $model->idestadisticas, 'idestado' => $model->idestado, 'idCC' => $model->idCC]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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
    public function actionUpdate($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC)
    {
        $model = $this->findModel($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rutColaborador' => $model->rutColaborador, 'idSucursal' => $model->idSucursal, 'idArea' => $model->idArea, 'idCargo' => $model->idCargo, 'idRol' => $model->idRol, 'idGerencia' => $model->idGerencia, 'idperfil' => $model->idperfil, 'idperfilRed' => $model->idperfilRed, 'idestadisticas' => $model->idestadisticas, 'idestado' => $model->idestado, 'idCC' => $model->idCC]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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
    public function actionDelete($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC)
    {
        $this->findModel($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Colaborador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
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
     * @return Colaborador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC)
    {
        if (($model = Colaborador::findOne(['rutColaborador' => $rutColaborador, 'idSucursal' => $idSucursal, 'idArea' => $idArea, 'idCargo' => $idCargo, 'idRol' => $idRol, 'idGerencia' => $idGerencia, 'idperfil' => $idperfil, 'idperfilRed' => $idperfilRed, 'idestadisticas' => $idestadisticas, 'idestado' => $idestado, 'idCC' => $idCC])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
>>>>>>> c1d08f4547a848b229094329bdddffff566f20a7
