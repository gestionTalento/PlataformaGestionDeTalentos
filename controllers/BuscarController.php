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
use app\models\Ramigos;
use app\models\RcomentarioContenidos;
use app\models\Rcontenido;
use app\models\RActividad;
use app\models\Dependencia;
use app\models\bbeneficios;
use app\models\WTarea;
use app\models\WMision;
use app\models\rpublicidad;
use app\models\Rlikepost;
class BuscarController extends Controller {

    public function findColaboradors($correo) {
        
        $model3 = Colaborador::find()
                ->where(['correo' => $correo])
                ->one();
                
        if($model3 != null){
            return $model3;
        }
        else{
            return false;
        }

    }

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

     protected function findColaborador1($rutColaborador) {
        
        if (($model = \app\models\Colaborador::findOne(['rutColaborador' => $rutColaborador])) !== null) {
            return $model;
        } else {
            //return $model;
        }
    }



    public function findDependencias($rut) {
        if (($model = Dependencia::findOne($rut)) !== null) {
            return $model;
        }
        var_dump("no lo encontro");
        die();
    }

    public function findBeneficios(){

        $query = new \yii\db\Query;
        $query->select([
                    '*',
        ])
        ->from('bbeneficios')
        ->all();

        $command = $query->createCommand();
        $model = $command->queryAll();
        return $model;
    }


    
    public function encuentraMisiones(){

        $query = new \yii\db\Query;
        $query->select([
                    '*',
        ])
        ->from('wmision')
        ->all();

        $command = $query->createCommand();
        $model = $command->queryAll();
        return $model;
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

    public function findDependencia2($rutColaborador2)
    {
        if (($model = Dependencia::findOne(['rutColaborador2' => $rutColaborador2 ])) !== null) {
            return $model;
        }
    
        throw new NotFoundHttpException('The requested page does not exist.');
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

    public function findPost($idPost)

    {
        if (($model = Rpost::findOne(['RidPost' => $idPost])) !== null){
            return $model;
        } else
        {
            throw new NotFoundHttpException("The requested page does not exists");
            
        }
    }

    public function findActividad($idPost)

    {
        if (($model = RActividad::findOne(['ridpost' => $idPost])) !== null){
            return $model;
        } else
        {
            throw new NotFoundHttpException("The requested page does not exists");
            
        }
    }

    public function encuentraColaboradores(){

        $query = new \yii\db\Query;
        $query->select([
                    '*',
        ])
        ->from('colaborador')
        ->all();

        $command = $query->createCommand();
        $model = $command->queryAll();
        return $model;
    }

    public function findPostAmigos($idPost, $idAmigos){
        if(($model = Post::findOne(['ridpost' => $idPost, 'rIdAmigos' => $idAmigos])) !== null){
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function findTareaRecibida($idDependencias){
        if(($model = WTarea::findOne(['idDependencias' => $idDependencias])) !== null){
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function encuentraColaboradorPost($idpost) {
        if (($model = \app\models\Colaborador::find()->where(['ridpost' => $idPost])->all()) !== null) {

            return $model;
        } else {

            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function findPerfiles($idperfil) {
        if (($model = Rperfilredsocial::find()->where(['idperfilRed' => $idperfil])->all()) !== null) {

            return $model;
        } else {

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function findTareasRecibidas($idDependencias) {
        if (($model = WTarea::find()->where(['idDependencias' => $idDependencias])->all()) !== null) {

            return $model;
        } else {

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function findtarea($widtarea) {
        if (($model = WTarea::findOne(['widtarea' => $widtarea])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function findContenido($idContenido) {
        if (($model = Rcontenido::findOne(['idcontenido' => $idContenido])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function findMuro($rutColaborador) {

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

    public function findMuror($rutColaborador, $posisi, $perpage) {

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
                    'rpost.rfecha',
                    'rpost.rtipoPost',
                    'rpost.rlikes',
                    'rpost.rnombreArchivo',
                    'rpost.rrotador'

                        ]
                )
                ->from('rpost')
                ->join('INNER JOIN', 'ractividad', 'rpost.ridPost=ractividad.ridpost')
                ->orderBy(['ractividad.idactividad' => SORT_DESC])
                ->limit($perpage)
                ->offset($posisi)
                ->all();
                //var_dump($query);die();
        $command = $query->createCommand();
        $model = $command->queryAll();

        return $model;
    }

    public function encuentraColaboradorEstado($rutColaborador) {
    if (($model = Colaborador::find()->where(['rutColaborador' => $rutColaborador])->all()) !== null) {

        return $model;
    } else {

            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }


    public function findComentarios($idPost) {
    $query = new \yii\db\Query;
    $query->select([

                'colaborador.nombreColaborador',
                'colaborador.apellidosColaborador',
                'rperfilredsocial.rfoto',
                'rperfilredsocial.rrotador',
                'rcomentarios.rcontenido',
                'rcomentarios.fecha'
                    ]
            )
            ->from('colaborador')
            ->join('INNER JOIN', 'rcomentarios', 'rcomentarios.rut =colaborador.rutColaborador')
            ->join('INNER JOIN', 'rperfilredsocial', 'rperfilredsocial.idperfilRed =colaborador.idperfilRed')
            ->where("rcomentarios.ridpost={$idPost}")
            ->all();

    $command = $query->createCommand();
    $model = $command->queryAll();
    //var_dump($model);die();
    return $model;
}

public function findComentariosContenidos($idContenido) {
    $query = new \yii\db\Query;
    $query->select([
                'colaborador.nombreColaborador',
                'colaborador.apellidosColaborador',
                'rperfilredsocial.rfoto',
                'rcomentariocontenidos.rcontenido',
                'rperfilredsocial.rrotador'
                    ]
            )
            ->from('colaborador')
            ->join('INNER JOIN', 'rcomentariocontenidos', 'rcomentariocontenidos.rut =colaborador.rutColaborador')
            ->join('INNER JOIN', 'rperfilredsocial', 'rperfilredsocial.idperfilRed =colaborador.idperfilRed')
            ->where("rcomentariocontenidos.ridContenido={$idContenido}")
            ->all();

    $command = $query->createCommand();
    $model = $command->queryAll();
    //var_dump($model);die();
    return $model;
}

public function encuentraComentarios($idPost) {
    $query = new \yii\db\Query;
    $query->select([

                'colaborador.nombreColaborador',
                'colaborador.apellidosColaborador',
                'rperfilredsocial.rfoto',
                'rcomentarios.rcontenido',
                    ]
            )
            ->from('colaborador')
            ->join('INNER JOIN', 'rcomentarios', 'rcomentarios.rut =colaborador.rutColaborador')
            ->join('INNER JOIN', 'rperfilredsocial', 'rperfilredsocial.idperfilRed =colaborador.idperfilRed')
            ->where("rcomentarios.ridpostst={$idPost}")
            ->all();

    $command = $query->createCommand();
    $model = $command->queryAll();
    //var_dump($model);die();
    return $model;
}

   

    public function findMurora($rutColaborador, $posisi, $perpage) {

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
                    'rpost.rnombreArchivo',
                    'rpost.rrotador',
                    'rpost.rfecha'
                        ]
                )
                ->from('rpost')
                ->join('INNER JOIN', 'ractividad', 'rpost.ridPost=ractividad.ridpost')
                ->orderBy(['ractividad.idactividad' => SORT_DESC])
                ->where("rpost.rut1={$rutColaborador}")
                ->orWhere("rpost.rut2={$rutColaborador}")
                ->limit($perpage)
                ->offset($posisi)
                ->all();
                //var_dump($query);die();
        $command = $query->createCommand();
        $model = $command->queryAll();

        return $model;
    }


       public function findMuroa($rutColaborador) {

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
                ->where("rpost.rut1={$rutColaborador}")
                ->orWhere("rpost.rut2={$rutColaborador}")
                ->orderBy(['ractividad.idactividad' => SORT_DESC])
                ->limit(8)
                ->all();

        $command = $query->createCommand();
        $model = $command->queryAll();

        return $model;
    }

    public function findNotificacion($rutColaborador) {
        if (($model = RNotificacion::find()->where(['rrutNotificado' => $rutColaborador, 'rleido' => 1])->all()) !== null) {

            return $model;
        }
       
    }
    public function megusta($rutColaborador, $idPost) {
        if (($model = Rlikepost::find()->where(['rut' => $rutColaborador, 'ridPost' => $idPost])->one()) !== null) {

            return true;
        }
        else{
          return false;
        }
    }

    public function findPublicidad() {
        $query = new \yii\db\Query;
        $query->select([
                    '*',
        ])
        ->from('rpublicidad')
        ->all();

        $command = $query->createCommand();
        $model = $command->queryAll();
        return $model;
    }


}
