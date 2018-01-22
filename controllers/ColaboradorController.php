<?php

namespace app\controllers;

use Yii;
use app\controllers\SiteController;
use app\models\Colaborador;
use app\models\ControllerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ColaboradorController implements the CRUD actions for Colaborador model.
 */
class ColaboradorController extends Controller {

    public function actionPerfil() {

        $session = Yii::$app->session;
        $rutColaborador = $session['rut'];

        if ($rutColaborador == null) {
            $model = new \app\models\Colaborador();
            return $this->redirect(['site/login', 'model' => $model]);
        }


        //var_dump($session['rut']);die();

        $model = $this->encuentraColaborador($rutColaborador);
        // $model2 = $this->encuentraAmigos($rutColaborador);
        $model3 = new \app\models\Post();
        $model4 = $this->encuentraPost($rutColaborador);
        $actividad = $this->findMuro($rutColaborador);
        $model5 = $this->encuentraGrupos($rutColaborador);
        //var_dump($model5);die();



        $session['foto'] = $model[0]['foto'];
        $session['rutColaborador'] = $model[0]['rutColaborador'];
        $session['nombreColaborador'] = $model[0]['nombreColaborador'];
        $session['apellidosColaborador'] = $model[0]['apellidosColaborador'];

        return $this->render('perfil', [
                    'model' => $model,
                    'actividad' => $actividad,
                    'model3' => $model3,
                    'model4' => $model4,
                    'model5' => $model5,
        ]);
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
    
    public function encuentraColaborador($rutColaborador) {
        if (($model = \app\models\Colaborador::find()->where(['rutColaborador' => $rutColaborador])->all()) !== null) {

            return $model;
        } else {

            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }
    
    public function encuentraPost($rutColaborador) {
        if (($model = \app\models\Post::find()->where(['rut1' => $rutColaborador])->orWhere(['rut2' => $rutColaborador])->orderBy(['idPost' => SORT_ASC])->all()) !== null) {
            //var_dump($model);die();

            return $model;
        }
    }
        protected function findMuro($rutColaborador) {

        $query = new \yii\db\Query;
        $query->select([
                    'actividad.idactividad',
                    'actividad.rut1',
                    'actividad.rut2',
                    'actividad.idItem',
                    'actividad.idtipo_post',
                    'post.idPost',
                    'post.descripcionPost',
                    'post.foto',
                    'post.tipoPost',
                    'post.like',
                    'post.rotador',
                    'post.fecha'
                        ]
                )
                ->from('post')
                ->join('INNER JOIN', 'actividad', 'post.idPost=actividad.idItem')
                
                ->orderBy(['actividad.idactividad' => SORT_DESC])
                ->limit(8)
                ->all();

        $command = $query->createCommand();
        $model = $command->queryAll();

        return $model;
    }
    
        public function encuentraGrupos($rutColaborador) {
        try{

            if($rutColaborador==null){
                
            $model = new \app\models\Colaborador();
            return $this->redirect(['login', 'model' => $model]);


            }else{
               $query = new \yii\db\Query;
               $query->select([
                    'grupo.nombreGrupo',
                    'grupo_colaborador.idGrupo',
                    'grupo.rutModerador',
                    'grupo.descripcion',
                    'grupo.foto as hola',
                    'grupo.portada',
                    'colaborador.nombreColaborador',
                    'colaborador.foto'
                        ]
                )
                ->from('grupo')
                ->join('INNER JOIN', 'grupo_colaborador', 'grupo.idGrupo =grupo_colaborador.idGrupo')
                ->join('INNER JOIN', 'colaborador', 'grupo.rutModerador =colaborador.rutColaborador')
                ->where("grupo_colaborador.rutColaborador={$rutColaborador}")
                ->all();

        $command = $query->createCommand();
        $model = $command->queryAll();



        return $model;
            }
       
        }
        catch  (ErrorException $e){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
     
    }

}
