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


class BuscarController extends Controller
{

	public function findColaborador($rutColaborador)
	{
		if (($model = Colaborador::findOne(['rutColaborador' => $rutColaborador])) !== null){
			return $model;
		}
		throw new NotFoundHttpException('The requested page does not exist.');
	}

	public function findPerfil($id){
		if (($model = Perfil::findOne($id)) !== null){
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
	public function findEmpresa($id)
    {
        if (($model = Empresas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function findArea($id)
    {
        if (($model = Area::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}