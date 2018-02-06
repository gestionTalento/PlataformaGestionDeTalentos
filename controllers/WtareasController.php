<?php

namespace app\controllers;

use Yii;
use app\models\wtarea;
use app\models\TareasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WtareasController implements the CRUD actions for wtarea model.
 */
class WtareasController extends Controller
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
     * Lists all wtarea models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TareasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single wtarea model.
     * @param integer $widtarea
     * @param integer $idDependencias
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($widtarea, $idDependencias)
    {
        return $this->render('view', [
            'model' => $this->findModel($widtarea, $idDependencias),
        ]);
    }

    /**
     * Creates a new wtarea model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new wtarea();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'widtarea' => $model->widtarea, 'idDependencias' => $model->idDependencias]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing wtarea model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $widtarea
     * @param integer $idDependencias
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($widtarea, $idDependencias)
    {
        $model = $this->findModel($widtarea, $idDependencias);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'widtarea' => $model->widtarea, 'idDependencias' => $model->idDependencias]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing wtarea model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $widtarea
     * @param integer $idDependencias
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($widtarea, $idDependencias)
    {
        $this->findModel($widtarea, $idDependencias)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the wtarea model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $widtarea
     * @param integer $idDependencias
     * @return wtarea the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($widtarea, $idDependencias)
    {
        if (($model = wtarea::findOne(['widtarea' => $widtarea, 'idDependencias' => $idDependencias])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
