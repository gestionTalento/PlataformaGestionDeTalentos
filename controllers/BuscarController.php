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
        if (($model = Rpost::findOne(['idPost' => $idPost])) !== null){
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

    public function encuentraColaboradorPost($idpost) {
        if (($model = \app\models\Colaborador::find()->where(['ridpost' => $idPost])->all()) !== null) {

            return $model;
        } else {

            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function findContenido($idContenido) {
        if (($model = Rcontenido::findOne(['idcontenido' => $idContenido])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
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
                    'rpost.rlike',
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
            ->where("rcomentarios.ridPost={$ridPost}")
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

    public function actionReload($page, $rutColaborador){
        $numpage =$page;
        $perpage = 3;
        $posisi = (($numpage-1) * $perpage);
        $actividad = $this->findMuror($rutColaborador, $posisi, $perpage);
        $model = $this->encuentraColaborador($rutColaborador);
        $total = "";

        foreach($actividad as $rpost){

            
             if ($rpost["rtipoPost"] == 1) {


               $posteador = $this->encuentraColaboradorEstado($rpost["rut"]);
               $posteador2 = $this->encuentraColaboradorEstado($rpost["rut2"]);
               $comentarios = $this->findComentarios($rpost["ridPost"]);                                      
               $modelo = $this->renderAjax('estado', [
                              'model' => $model,
                              'rpost' => $rpost,
                              'rcomentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,
                                        ]);
               $total =$total.$modelo;
            }

            if ($rpost["rtipoPost"] == 2) {


               $posteador = $this->encuentraColaboradorEstado($rpost["rut1"]);
               $posteador2 = $this->encuentraColaboradorEstado($rpost["rut2"]);
               $comentarios = $this->findComentarios($rpost["ridPost"]);                                      
               $modelo = $this->renderAjax('imagen', [
                              'model' => $model,
                              'rpost' => $rpost,
                              'rcomentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }


            if ($rpost["rtipoPost"] == 3) {


               $posteador = $this->encuentraColaboradorEstado($rpost["rut1"]);
               $posteador2 = $this->encuentraColaboradorEstado($rpost["rut2"]);
               $comentarios = $this->findComentarios($rpost["ridPost"]);
               $modelo = $this->renderAjax('video', [
                              'model' => $model,
                              'rpost' => $rpost,
                              'rcomentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }
           
            if ($rpost["rtipoPost"] == 5) {


               $posteador = $this->encuentraColaboradorEstado($rpost["rut1"]);
               $posteador2 = $this->encuentraColaboradorEstado($rpost["rut2"]);
               $comentarios = $this->findComentarios($rpost["idPost"]);                                      
               $modelo = $this->renderAjax('youtube', [
                              'model' => $model,
                              'rpost' => $rpost,
                              'rcomentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }

              if ($rpost["rtipoPost"] == 6) {


               $posteador = $this->encuentraColaboradorEstado($rpost["rut1"]);
               $posteador2 = $this->encuentraColaboradorEstado($rpost["rut2"]);
               $comentarios = $this->findComentarios($rpost["ridPost"]);                                      
               $megusta = $this->megusta($rutColaborador,$rpost["ridPost"]);
               $modelo = $this->renderAjax('archivo', [
                              'model' => $model,
                              'rpost' => $rpost,
                              'rcomentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }

             if ($rpost["rtipoPost"] == 12321) {


               $posteador = $this->encuentraColaboradorEstado($rpost["rut1"]);
               $posteador2 = $this->encuentraColaboradorEstado($rpost["rut2"]);
               $comentarios = $this->findComentarios($rpost["ridPost"]);                                      
               $modelo = $this->renderAjax('facebook', [
                              'model' => $model,
                              'rpost' => $rpost,
                              'rcomentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }



        }

        
         return $total;



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
                    'rpost.rlike',
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

    public function actionReloadr($page, $rutColaborador, $rutAmigo){
        $numpage =$page;
        $perpage = 3;
        $posisi = (($numpage-1) * $perpage);
        $actividad = $this->findMurora($rutColaborador, $posisi, $perpage);
        $model = $this->findColaboradorRut($rutColaborador);
        $total = "";
        $session = Yii::$app->session;
        $rutColaborador = $session['rut'];
        foreach($actividad as $post){

            
             if ($post["rtipoPost"] == 1) {


               $posteador = $this->encuentraColaboradorEstado($post["rutColaborador1"]);
               $posteador2 = $this->encuentraColaboradorEstado($post["rutColaborador2"]);
               $comentarios = $this->findComentarios($post["ridPost"]);                                     

               $modelo = $this->renderAjax('estado', [
                              'model' => $model,
                              'post' => $post,
                              'comentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }

            if ($post["rtipoPost"] == 2) {


               $posteador = $this->encuentraColaboradorEstado($post["rutColaborador1"]);
               $posteador2 = $this->encuentraColaboradorEstado($post["rutColaborador2"]);
               $comentarios = $this->findComentarios($post["ridPost"]);                                      

               $modelo = $this->renderAjax('imagen', [
                              'model' => $model,
                              'rpost' => $post,
                              'rcomentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }


            if ($post["rtipoPost"] == 3) {


               $posteador = $this->encuentraColaboradorEstado($post["rutColaborador1"]);
               $posteador2 = $this->encuentraColaboradorEstado($post["rutColaborador2"]);
               $comentarios = $this->findComentarios($post["ridPost"]);                                      

               $modelo = $this->renderAjax('video', [
                              'model' => $model,
                              'rpost' => $post,
                              'rcomentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }
           
            if ($post["rtipoPost"] == 5) {


               $posteador = $this->encuentraColaboradorEstado($post["rutColaborador1"]);
               $posteador2 = $this->encuentraColaboradorEstado($post["rutColaborador2"]);
               $comentarios = $this->findComentarios($post["ridPost"]);                                      
               $modelo = $this->renderAjax('youtube', [
                              'model' => $model,
                              'rpost' => $post,
                              'rcomentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }

              if ($post["rtipoPost"] == 6) {


               $posteador = $this->encuentraColaboradorEstado($post["rutColaborador1"]);
               $posteador2 = $this->encuentraColaboradorEstado($post["rutColaborador2"]);
               $comentarios = $this->findComentarios($post["ridPost"]);                                      

               $modelo = $this->renderAjax('archivo', [
                              'model' => $model,
                              'rpost' => $post,
                              'rcomentarios' => $comentarios,
                              'posteador' => $posteador,
                              'posteador2' => $posteador2,
                              'rutColaborador' => $rutColaborador,

                                        ]);
               $total =$total.$modelo;
            }
             if ($post["rtipoPost"] == 12321321) {


               $posteador = $this->encuentraColaboradorEstado($post["rutColaborador1"]);
               $posteador2 = $this->encuentraColaboradorEstado($post["rutColaborador2"]);
               $comentarios = $this->findComentarios($post["ridPost"]);                                      
               $modelo = $this->renderAjax('facebook', [
                              'model' => $model,
                              'rpost' => $post,
                              'rcomentarios' => $comentarios,
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


}
