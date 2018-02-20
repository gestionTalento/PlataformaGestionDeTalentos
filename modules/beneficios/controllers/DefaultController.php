<?php

namespace app\modules\beneficios\controllers;

use yii\web\Controller;
use app\models\Colaborador;

/**
 * Default controller for the `beneficios` module
 */
class DefaultController extends Controller
{
  

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
        $dependencia = BuscarController::findDependencia2($rutColaborador);
        $tarea = BuscarController::findTareasRecibidas($dependencia->idDependencias);
        //var_dump($tarea);die();
        
        //Misiones
        $mision = BuscarController::encuentraMisiones();

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
                    'tarea' => $tarea,
                    'mision' => $mision,
                    'publicidad' => $publicidad,
        ]);

    }
