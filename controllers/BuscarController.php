<?php

namespace app\controllers;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ColaboradorSearch;
use app\models\Colaborador;
use app\models\Perfil;
use app\models\Area;
use app\models\Empresas;
use app\models\Rpost;
use app\models\Rperfilredsocial;
use app\models\Restadisticas;

class BuscarController extends Controller {

    public function findColaborador($correo, $pass) {

        $model = Colaborador::find()
                ->where(['correo' => $correo, 'pass' => $pass])
                ->one();

        if ($model != null) {
            return $model;
        } else {
            return false;
        }
    }

    public function findColaboradorRut($rut) {
        if (($model = Colaborador::findOne($rut)) !== null) {
            return $model;
        }
        var_dump("no lo encontro");
        die();
    }

    public function findPerfil($id) {
        if (($model = Rperfilredsocial::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function findEstadistica($id) {
        if (($model = Restadisticas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function findEmpresa($id) {
        if (($model = Empresas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function findArea($id) {
        if (($model = Area::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function encuentraPost($rutColaborador) {
        if (($model = Rpost::find()->where(['rut1' => $rutColaborador])->orWhere(['rut2' => $rutColaborador])->orderBy(['ridPost' => SORT_ASC])->all()) !== null) {

            return $model;
        }
    }

    public function findMuro() {

        $query = new \yii\db\Query;
        $query->select([
                    'ractividad.idactividad',
                    'ractividad.rutColaborador1',
                    'ractividad.rutColaborador2',
                    'ractividad.ridpost',
                    'ractividad.ridtipo_post',
                    'rpost.ridPost',
                    'rpost.rdescripcionPost',
                    'rpost.rfoto',
                    'rpost.rtipoPost',
                    'rpost.rlikes',
                    'rpost.rrotador',
                    'rpost.rfecha'
                        ]
                )
                ->from('rpost')
                ->join('INNER JOIN', 'ractividad', 'rpost.ridPost=ractividad.ridpost')
                ->orderBy(['ractividad.idactividad' => SORT_DESC])
                ->limit(8)
                ->all();

        $command = $query->createCommand();
        $model = $command->queryAll();

        return $model;
    }

    public function encuentraGrupos($rutColaborador) {
        try {

            if ($rutColaborador == null) {

                $model = new Colaborador();
                return $this->redirect(['login', 'model' => $model]);
            } else {
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
        } catch (ErrorException $e) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
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

    public function encuentraAmigos($rutColaborador) {
        if (($model = \app\models\Ramigos::find()->where(['rut1' => $rutColaborador])->all()) !== null) {

            return $model;
        }
    }

}
