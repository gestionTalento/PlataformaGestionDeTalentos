<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "colaborador".
 *
 * @property integer $rutColaborador
 * @property string $dvColaborador
 * @property string $pass
 * @property string $nombreColaborador
 * @property string $apellidosColaborador
 * @property integer $idSucursal
 * @property integer $idArea
 * @property integer $idCargo
 * @property integer $idRol
 * @property integer $idGerencia
 * @property integer $westadoJefe
 * @property integer $idperfil
 * @property integer $idperfilRed
 * @property integer $idestadisticas
 * @property integer $idestado
 * @property integer $idCC
 * @property string $correo
 * @property string $telefono
 * @property string $direccion
 *
 * @property Bbeneficios[] $bbeneficios
 * @property Area $idArea0
 * @property Cargos $idCargo0
 * @property Gerencia $idGerencia0
 * @property Rol $idRol0
 * @property Restadisticas $idestadisticas0
 * @property Rperfilredsocial $idperfilRed0
 * @property Icentrocosto $idCC0
 * @property Estadocolaborador $idestado0
 * @property Perfil $idperfil0
 * @property Sucursal $idSucursal0
 * @property Ddependencias[] $ddependencias
 * @property Ddependencias[] $ddependencias0
 * @property Dependencia[] $dependencias
 * @property Dependencia[] $dependencias0
 * @property Historialcolaborador[] $historialcolaboradors
 * @property Icontactabilidad[] $icontactabilidads
 * @property IdetalleLchUsuario[] $idetalleLchUsuarios
 * @property Idetalleinduccion[] $idetalleinduccions
 * @property Idjmanual[] $idjmanuals
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
            [['rutColaborador', 'dvColaborador', 'pass', 'nombreColaborador', 'apellidosColaborador', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'idperfil', 'idperfilRed', 'idestadisticas', 'idestado', 'idCC', 'correo'], 'required'],
            [['rutColaborador', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'westadoJefe', 'idperfil', 'idperfilRed', 'idestadisticas', 'idestado', 'idCC'], 'integer'],
            [['dvColaborador'], 'string', 'max' => 1],
            [['pass'], 'string', 'max' => 50],
            [['nombreColaborador', 'apellidosColaborador', 'direccion'], 'string', 'max' => 200],
            [['correo', 'telefono'], 'string', 'max' => 45],
            [['idArea'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['idArea' => 'idArea']],
            [['idCargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargos::className(), 'targetAttribute' => ['idCargo' => 'idCargo']],
            [['idGerencia'], 'exist', 'skipOnError' => true, 'targetClass' => Gerencia::className(), 'targetAttribute' => ['idGerencia' => 'idGerencia']],
            [['idRol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['idRol' => 'idRol']],
            [['idestadisticas'], 'exist', 'skipOnError' => true, 'targetClass' => Restadisticas::className(), 'targetAttribute' => ['idestadisticas' => 'idestadisticas']],
            [['idperfilRed'], 'exist', 'skipOnError' => true, 'targetClass' => Rperfilredsocial::className(), 'targetAttribute' => ['idperfilRed' => 'idperfilRed']],
            [['idCC'], 'exist', 'skipOnError' => true, 'targetClass' => Icentrocosto::className(), 'targetAttribute' => ['idCC' => 'idCC']],
            [['idestado'], 'exist', 'skipOnError' => true, 'targetClass' => Estadocolaborador::className(), 'targetAttribute' => ['idestado' => 'idestado']],
            [['idperfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['idperfil' => 'idperfil']],
            [['idSucursal'], 'exist', 'skipOnError' => true, 'targetClass' => Sucursal::className(), 'targetAttribute' => ['idSucursal' => 'idSucursal']],
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
            'pass' => 'Contraseña:',
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
            'correo' => 'Correo corporativo:',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
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
    public function getIdArea0()
    {
        return $this->hasOne(Area::className(), ['idArea' => 'idArea']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCargo0()
    {
        return $this->hasOne(Cargos::className(), ['idCargo' => 'idCargo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGerencia0()
    {
        return $this->hasOne(Gerencia::className(), ['idGerencia' => 'idGerencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRol0()
    {
        return $this->hasOne(Rol::className(), ['idRol' => 'idRol']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdestadisticas0()
    {
        return $this->hasOne(Restadisticas::className(), ['idestadisticas' => 'idestadisticas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdperfilRed0()
    {
        return $this->hasOne(Rperfilredsocial::className(), ['idperfilRed' => 'idperfilRed']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCC0()
    {
        return $this->hasOne(Icentrocosto::className(), ['idCC' => 'idCC']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdestado0()
    {
        return $this->hasOne(Estadocolaborador::className(), ['idestado' => 'idestado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdperfil0()
    {
        return $this->hasOne(Perfil::className(), ['idperfil' => 'idperfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSucursal0()
    {
        return $this->hasOne(Sucursal::className(), ['idSucursal' => 'idSucursal']);
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
    public function getIdetalleLchUsuarios()
    {
        return $this->hasMany(IdetalleLchUsuario::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdetalleinduccions()
    {
        return $this->hasMany(Idetalleinduccion::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdjmanuals()
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
