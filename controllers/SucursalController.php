<?php

namespace app\controllers;

use Yii;
use app\models\Sucursal;
use app\models\SucursalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SucursalController implements the CRUD actions for Sucursal model.
 */
class SucursalController extends Controller
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
     * Lists all Sucursal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SucursalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sucursal model.
     * @param integer $idSucursal
     * @param integer $rutEmpresa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idSucursal, $rutEmpresa)
    {
        return $this->render('view', [
            'model' => $this->findModel($idSucursal, $rutEmpresa),
        ]);
    }

    /**
     * Creates a new Sucursal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sucursal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idSucursal' => $model->idSucursal, 'rutEmpresa' => $model->rutEmpresa]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Sucursal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idSucursal
     * @param integer $rutEmpresa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idSucursal, $rutEmpresa)
    {
        $model = $this->findModel($idSucursal, $rutEmpresa);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idSucursal' => $model->idSucursal, 'rutEmpresa' => $model->rutEmpresa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sucursal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idSucursal
     * @param integer $rutEmpresa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idSucursal, $rutEmpresa)
    {
        $this->findModel($idSucursal, $rutEmpresa)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sucursal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idSucursal
     * @param integer $rutEmpresa
     * @return Sucursal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idSucursal, $rutEmpresa)
    {
        if (($model = Sucursal::findOne(['idSucursal' => $idSucursal, 'rutEmpresa' => $rutEmpresa])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
