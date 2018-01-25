<?php

namespace app\controllers;

use Yii;
use app\models\Ractividad;
use app\models\RActividadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RActividadController implements the CRUD actions for Ractividad model.
 */
class RActividadController extends Controller
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
     * Lists all Ractividad models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RActividadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ractividad model.
     * @param integer $idactividad
     * @param integer $rutColaborador1
     * @param integer $rutColaborador2
     * @param integer $ridpost
     * @param integer $ridtipo_post
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idactividad, $rutColaborador1, $rutColaborador2, $ridpost, $ridtipo_post)
    {
        return $this->render('view', [
            'model' => $this->findModel($idactividad, $rutColaborador1, $rutColaborador2, $ridpost, $ridtipo_post),
        ]);
    }

    /**
     * Creates a new Ractividad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ractividad();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idactividad' => $model->idactividad, 'rutColaborador1' => $model->rutColaborador1, 'rutColaborador2' => $model->rutColaborador2, 'ridpost' => $model->ridpost, 'ridtipo_post' => $model->ridtipo_post]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ractividad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idactividad
     * @param integer $rutColaborador1
     * @param integer $rutColaborador2
     * @param integer $ridpost
     * @param integer $ridtipo_post
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idactividad, $rutColaborador1, $rutColaborador2, $ridpost, $ridtipo_post)
    {
        $model = $this->findModel($idactividad, $rutColaborador1, $rutColaborador2, $ridpost, $ridtipo_post);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idactividad' => $model->idactividad, 'rutColaborador1' => $model->rutColaborador1, 'rutColaborador2' => $model->rutColaborador2, 'ridpost' => $model->ridpost, 'ridtipo_post' => $model->ridtipo_post]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ractividad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idactividad
     * @param integer $rutColaborador1
     * @param integer $rutColaborador2
     * @param integer $ridpost
     * @param integer $ridtipo_post
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idactividad, $rutColaborador1, $rutColaborador2, $ridpost, $ridtipo_post)
    {
        $this->findModel($idactividad, $rutColaborador1, $rutColaborador2, $ridpost, $ridtipo_post)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ractividad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idactividad
     * @param integer $rutColaborador1
     * @param integer $rutColaborador2
     * @param integer $ridpost
     * @param integer $ridtipo_post
     * @return Ractividad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idactividad, $rutColaborador1, $rutColaborador2, $ridpost, $ridtipo_post)
    {
        if (($model = Ractividad::findOne(['idactividad' => $idactividad, 'rutColaborador1' => $rutColaborador1, 'rutColaborador2' => $rutColaborador2, 'ridpost' => $ridpost, 'ridtipo_post' => $ridtipo_post])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
