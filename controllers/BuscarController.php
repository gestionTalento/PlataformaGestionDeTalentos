<?php

namespace app\controllers;
use Yii;
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
use app\models\Ractividad;
use app\models\Dependencia;
use app\models\bbeneficios;
use app\models\Wtarea;
use app\models\Wmision;
use app\models\rpublicidad;
use app\models\Rlikepost;
use app\models\Bpuntajecolaborador;


class BuscarController extends Controller {

    public static function findColaboradors($correo) {
        
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

    public static function findColaborador($correo, $pass) {

        $model = Colaborador::find()
                ->where(['correo' => $correo, 'pass' => $pass])
                ->one();

        if ($model != null) {
            return $model;
        } else {
            return false;
        }
    }

    public static function findColaboradorRut($rutColaborador) {
        if (($model = Colaborador::findOne(['rutColaborador' => $rutColaborador])) !== null) {
            return $model;
        }
        var_dump("no lo encontro");
        die();
    }

    public static function findColaborador1($rutColaborador) {
        
        if (($model = \app\models\Colaborador::findOne(['rutColaborador' => $rutColaborador])) !== null) {
            return $model;
        } else {
            //return $model;
        }
    }



    public static function findDependencias($rut) {
        if (($model = Dependencia::findOne($rut)) !== null) {
            return $model;
        }
        var_dump("no lo encontro");
        die();
    }

    public static function findBeneficios(){

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


    
    public static function encuentraMisiones(){

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

    public static function findPerfil($id) {
        if (($model = Rperfilredsocial::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public static function findEstadistica($id) {
        if (($model = Restadisticas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public static function findDependencia2($rutColaborador2)
    {
        if (($model = Dependencia::findOne(['rutColaborador2' => $rutColaborador2 ])) !== null) {
            return $model;
        }
    
        throw new NotFoundHttpException('The requested page does not exist.');
    }



    public static function findEmpresa($id) {
        if (($model = Empresas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public static function findArea($id) {
        if (($model = Area::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public static function encuentraPost($rutColaborador) {
        if (($model = Rpost::find()->where(['rut1' => $rutColaborador])->orWhere(['rut2' => $rutColaborador])->orderBy(['ridPost' => SORT_ASC])->all()) !== null) {

            return $model;
        }
    }

    

    

    public static function encuentraColaborador($rutColaborador) {
        if (($model = \app\models\Colaborador::find()->where(['rutColaborador' => $rutColaborador])->all()) !== null) {

            return $model;
        } else {

            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public static function encuentraAmigos($rutColaborador) {
        if (($model = \app\models\Ramigos::find()->where(['rut1' => $rutColaborador])->all()) !== null) {

            return $model;
        }
    }

    public static function findPost($idPost)

    {
        if (($model = Rpost::findOne(['RidPost' => $idPost])) !== null){
            return $model;
        } else
        {
            throw new NotFoundHttpException("The requested page does not exists");
            
        }
    }

    public static function findActividad($idPost)

    {
        if (($model = Ractividad::findOne(['ridpost' => $idPost])) !== null){
            return $model;
        } else
        {
            throw new NotFoundHttpException("The requested page does not exists");
            
        }
    }

    public static function findCanje($rut){
         $query = new \yii\db\Query;
        $query->select([
                    '*',
        ])
        ->from('bcolaboradorbeneficio')
        ->where("bcolaboradorbeneficio.rutColaborador={$rut}")
        ->all();

        $command = $query->createCommand();
        $model = $command->queryAll();
        return $model;
    }

    public static function canjeMes($rut, $idbeneficio){

       
        $connection = Yii::$app->db;

        $count = Yii::$app->db->createCommand('select count(*) from induccio_talento.bcolaboradorbeneficio where MONTH(bfechaCanje) = MONTH(now()) and rutColaborador = "'.$rut.'" and bId_Beneficio="'.$idbeneficio.'"')
             ->queryScalar();

        return $count;

    }

    public static function canjeA($rut, $idbeneficio){

       
        $connection = Yii::$app->db;

        $count = Yii::$app->db->createCommand('select count(*) from induccio_talento.bcolaboradorbeneficio where YEAR(bfechaCanje) = YEAR(now()) and rutColaborador = "'.$rut.'" and bId_Beneficio="'.$idbeneficio.'"')
             ->queryScalar();

        return $count;

    }

    public static function encuentraColaboradores(){

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

    public static function findPostAmigos($idPost, $idAmigos){
        if(($model = Post::findOne(['ridpost' => $idPost, 'rIdAmigos' => $idAmigos])) !== null){
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

   

    public static function encuentraColaboradorPost($idpost) {
        if (($model = \app\models\Colaborador::find()->where(['ridpost' => $idPost])->all()) !== null) {

            return $model;
        } else {

            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public static function findPerfiles($idperfil) {
        if (($model = Rperfilredsocial::find()->where(['idperfilRed' => $idperfil])->all()) !== null) {

            return $model;
        } else {

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public static function findTareasRecibidas($idDependencias) {
        if (($model = Wtarea::find()->where(['idDependencias' => $idDependencias])->all()) !== null) {

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

    public static function findContenido($idContenido) {
        if (($model = Rcontenido::findOne(['idcontenido' => $idContenido])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public static function findMuro($rutColaborador) {

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

    public static function findMuror($rutColaborador, $posisi, $perpage) {

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

    public static function encuentraColaboradorEstado($rutColaborador) {
    if (($model = Colaborador::find()->where(['rutColaborador' => $rutColaborador])->all()) !== null) {

        return $model;
    } else {

            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }


    public static function findComentarios($idPost) {
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

    public static function findMisbeneficios($rutColaborador) {
    $query = new \yii\db\Query;
    $query->select([

                'bbeneficios.bNombre',
                'bbeneficios.bValorBeneficio',
                'bcolaboradorbeneficio.bfechaCanje',
                'bcolaboradorbeneficio.bvalorCanje'                    ]
            )
            ->from('bbeneficios')
            ->join('INNER JOIN', 'bcolaboradorbeneficio', 'bbeneficios.bId_Beneficio =bcolaboradorbeneficio.bId_Beneficio')
            ->where("bcolaboradorbeneficio.rutColaborador={$rutColaborador}")
            ->all();

    $command = $query->createCommand();
    $model = $command->queryAll();
    //var_dump($model);die();
    return $model;
}

public static function findComentariosContenidos($idContenido) {
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

public static function encuentraComentarios($idPost) {
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

   

    public static function findMurora($rutColaborador, $posisi, $perpage) {

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


       public static function findMuroa($rutColaborador) {

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

    public static function findNotificacion($rutColaborador) {
        if (($model = RNotificacion::find()->where(['rrrutNotificado' => $rutColaborador, 'rrleido' => 1])->all()) !== null) {

            return $model;
        }
       
    }

    public static function findLikePost($idPost){
     if (($model = Rlikepost::find()->where(['ridPost' => $idPost])->one()) !== null) {

            return $model;
        }
        
    }

    public static function findLikePost2($idPost){
     if (($model = Rlikepost::find()->where(['ridPost' => $idPost])->one()) !== null) {

           return true;
        }
        else{
          return false;
        }
        
    }

    public static function megusta($rutColaborador, $idPost) {
        if (($model = Rlikepost::find()->where(['rut' => $rutColaborador, 'ridPost' => $idPost])->one()) !== null) {

            return true;
        }
        else{
          return false;
        }
    }

    public static function findPublicidad() {
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

    public static function findPuntaje($rutColaborador) {
        
        if (($model = \app\models\Bpuntajecolaborador::findOne(['rutColaborador' => $rutColaborador])) !== null) {
            return $model;
        } else {
            //return $model;
        }
    }

    public static function buscarBeneficio($bId_Beneficio) {
        
        if (($model = \app\models\Bbeneficios::findOne(['bId_Beneficio' => $bId_Beneficio])) !== null) {
            return $model;
        } else {
            //return $model;
        }
    }

    

    public static function encuentraBeneficio($id){
        if (($model = Bbeneficios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
            
        }
    }

    public static function encuentraBeneficios($idbeneficio) {
        if (($model = \app\models\Bbeneficios::find()->where(['bId_Beneficio' => $idbeneficio])->all()) !== null) {

            return $model;
        }
    }


    public function notificacionb($rutColaborador,$idbeneficio){

       
  
 
          $beneficio = $this->encuentraBeneficio($idbeneficio);
          $modelo = $this->encuentraColaboradores();
          $posteador = $this->encuentraColaborador($rutColaborador2);
          

             
          $model = new Rnotificacion();
          $model->rrutNotificado = $m["rutColaborador"];
          $model->rcontenido = $rutColaborador." ha canjeado un beneficio";
          $model->rleido = 1;
          $model->rurl = 1;
          $model->save(false);

          $model->rcontenido = $posteador->nombreColaborador." ha canjeado un nuevo beneficio: ".$beneficio->bNombre."  http://flesan.gt3d.cl";


            Yii::$app->mailer->compose()
            ->setFrom('contacto@induccion.org')
            ->setTo('cgarrido@rrhh3d.cl')
            ->setSubject('De:Notificaciones FLESAN')
            ->setHtmlBody('<p>Lo canjieeeeeee</p>')
            ->send();
}
}