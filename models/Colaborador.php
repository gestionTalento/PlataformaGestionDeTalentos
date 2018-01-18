<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "colaborador".
 *
 * @property int $rutColaborador
 * @property string $dvColaborador
 * @property string $pass
 * @property string $nombreColaborador
 * @property string $apellidosColaborador
 * @property int $idSucursal
 * @property int $idArea
 * @property int $idCargo
 * @property int $idRol
 * @property int $idGerencia
 * @property int $westadoJefe
 * @property int $idperfil
 * @property int $idperfilRed
 * @property int $idestadisticas
 * @property int $idestado
 * @property int $idCC
 *
 * @property Bbeneficios[] $bbeneficios
 * @property Area $area
 * @property Cargos $cargo
 * @property Gerencia $gerencia
 * @property Rol $rol
 * @property Sucursal $sucursal
 * @property Icentrocosto $cC
 * @property Estadocolaborador $estado
 * @property Perfil $perfil
 * @property Restadisticas $estadisticas
 * @property Rperfilredsocial $perfilRed
 * @property Ddependencias[] $ddependencias
 * @property Ddependencias[] $ddependencias0
 * @property Dependencia[] $dependencias
 * @property Dependencia[] $dependencias0
 * @property Detallepersona $detallepersona
 * @property Historialcolaborador[] $historialcolaboradors
 * @property Icontactabilidad[] $icontactabilidads
 * @property IdetalleLchUsuario[] $etalleLchUsuarios
 * @property Idetalleinduccion[] $etalleinduccions
 * @property Idjmanual[] $jmanuals
 * @property IllamadasRealizadas[] $illamadasRealizadas
 * @property Inocontacto[] $inocontactos
 * @property Iprogreso[] $iprogresos
 * @property Irepetidos[] $irepetidos
 * @property Ramigos[] $ramigos
 * @property Ramigos[] $ramigos0
 * @property Rnotificacion[] $rnotificacions
 * @property Wproceso[] $wprocesos
 */
class Colaborador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'colaborador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutColaborador', 'dvColaborador', 'pass', 'nombreColaborador', 'apellidosColaborador', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'idperfil', 'idperfilRed', 'idestadisticas', 'idestado', 'idCC'], 'required'],
            [['rutColaborador', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'westadoJefe', 'idperfil', 'idperfilRed', 'idestadisticas', 'idestado', 'idCC'], 'integer'],
            [['dvColaborador'], 'string', 'max' => 1],
            [['pass'], 'string', 'max' => 50],
            [['nombreColaborador', 'apellidosColaborador'], 'string', 'max' => 200],
            [['rutColaborador', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'idperfil', 'idperfilRed', 'idestadisticas', 'idestado', 'idCC'], 'unique', 'targetAttribute' => ['rutColaborador', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'idperfil', 'idperfilRed', 'idestadisticas', 'idestado', 'idCC']],
            [['idArea'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['idArea' => 'idArea']],
            [['idCargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargos::className(), 'targetAttribute' => ['idCargo' => 'idCargo']],
            [['idGerencia'], 'exist', 'skipOnError' => true, 'targetClass' => Gerencia::className(), 'targetAttribute' => ['idGerencia' => 'idGerencia']],
            [['idRol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['idRol' => 'idRol']],
            [['idSucursal'], 'exist', 'skipOnError' => true, 'targetClass' => Sucursal::className(), 'targetAttribute' => ['idSucursal' => 'idSucursal']],
            [['idCC'], 'exist', 'skipOnError' => true, 'targetClass' => Icentrocosto::className(), 'targetAttribute' => ['idCC' => 'idCC']],
            [['idestado'], 'exist', 'skipOnError' => true, 'targetClass' => Estadocolaborador::className(), 'targetAttribute' => ['idestado' => 'idestado']],
            [['idperfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['idperfil' => 'idperfil']],
            [['idestadisticas'], 'exist', 'skipOnError' => true, 'targetClass' => Restadisticas::className(), 'targetAttribute' => ['idestadisticas' => 'idestadisticas']],
            [['idperfilRed'], 'exist', 'skipOnError' => true, 'targetClass' => Rperfilredsocial::className(), 'targetAttribute' => ['idperfilRed' => 'idperfilRed']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rutColaborador' => 'Rut Colaborador',
            'dvColaborador' => 'Dv Colaborador',
            'pass' => 'Pass',
            'nombreColaborador' => 'Nombre Colaborador',
            'apellidosColaborador' => 'Apellidos Colaborador',
            'idSucursal' => 'Id Sucursal',
            'idArea' => 'Id Area',
            'idCargo' => 'Id Cargo',
            'idRol' => 'Id Rol',
            'idGerencia' => 'Id Gerencia',
            'westadoJefe' => 'Westado Jefe',
            'idperfil' => 'Idperfil',
            'idperfilRed' => 'Idperfil Red',
            'idestadisticas' => 'Idestadisticas',
            'idestado' => 'Idestado',
            'idCC' => 'Id Cc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBbeneficios()
    {
        return $this->hasMany(Bbeneficios::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['idArea' => 'idArea']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargos::className(), ['idCargo' => 'idCargo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGerencia()
    {
        return $this->hasOne(Gerencia::className(), ['idGerencia' => 'idGerencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['idRol' => 'idRol']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursal()
    {
        return $this->hasOne(Sucursal::className(), ['idSucursal' => 'idSucursal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCC()
    {
        return $this->hasOne(Icentrocosto::className(), ['idCC' => 'idCC']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estadocolaborador::className(), ['idestado' => 'idestado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['idperfil' => 'idperfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadisticas()
    {
        return $this->hasOne(Restadisticas::className(), ['idestadisticas' => 'idestadisticas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilRed()
    {
        return $this->hasOne(Rperfilredsocial::className(), ['idperfilRed' => 'idperfilRed']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDdependencias()
    {
        return $this->hasMany(Ddependencias::className(), ['Colaborador_RutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDdependencias0()
    {
        return $this->hasMany(Ddependencias::className(), ['Colaborador_RutColaborador1' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDependencias()
    {
        return $this->hasMany(Dependencia::className(), ['rutColaborador1' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDependencias0()
    {
        return $this->hasMany(Dependencia::className(), ['rutColaborador2' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallepersona()
    {
        return $this->hasOne(Detallepersona::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistorialcolaboradors()
    {
        return $this->hasMany(Historialcolaborador::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcontactabilidads()
    {
        return $this->hasMany(Icontactabilidad::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtalleLchUsuarios()
    {
        return $this->hasMany(IdetalleLchUsuario::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtalleinduccions()
    {
        return $this->hasMany(Idetalleinduccion::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJmanuals()
    {
        return $this->hasMany(Idjmanual::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIllamadasRealizadas()
    {
        return $this->hasMany(IllamadasRealizadas::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInocontactos()
    {
        return $this->hasMany(Inocontacto::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIprogresos()
    {
        return $this->hasMany(Iprogreso::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrepetidos()
    {
        return $this->hasMany(Irepetidos::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRamigos()
    {
        return $this->hasMany(Ramigos::className(), ['rut1' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRamigos0()
    {
        return $this->hasMany(Ramigos::className(), ['rut2' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRnotificacions()
    {
        return $this->hasMany(Rnotificacion::className(), ['rrutNotificado' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWprocesos()
    {
        return $this->hasMany(Wproceso::className(), ['rutColaborador' => 'rutColaborador']);
    }
}
