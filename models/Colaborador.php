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
 * @property string $rFoto
 * @property string $rPortada
 * @property string $rBio
 * @property int $rLikes
 * @property int $rComentarios
 * @property int $rLikesR
 * @property int $rComentariosR
 * @property int $rContadorP
 * @property int $rRotador
 * @property string $correo
 * @property int $rEstado
 * @property int $idSucursal
 * @property int $idArea
 * @property int $idCargo
 * @property int $idRol
 * @property int $idGerencia
 * @property string $itelefonoColaboradorr
 * @property string $idireccionColaborador
 * @property int $iestadoColaborador
 * @property int $icontadorContactadoEfectivo
 * @property int $icontadorContactadoNulo
 * @property string $iidcc
 * @property string $inombreCC
 * @property string $icorreoEmpresa
 * @property string $inombreArea
 * @property int $ibloqueado
 * @property int $idiploma
 * @property int $iidEtapas
 * @property int $iidGrupo
 * @property int $irutJefe
 * @property int $bIdPuntaje
 * @property int $bcantidadPuntos
 * @property int $bpuntosOtorgados
 * @property int $mredSocial
 * @property int $mdesempeño
 * @property int $minduccion
 * @property int $mbeneficio
 * @property int $maprendizaje
 * @property int $mwellness
 * @property int $icetapb
 * @property int $icetaps
 * @property int $icetapc
 * @property int $wjefe
 * @property string $ifechaIngreso
 *
 * @property Basignacionesbeneficios[] $basignacionesbeneficios
 * @property Basignacionesbeneficios[] $basignacionesbeneficios0
 * @property Bbeneficios[] $bbeneficios
 * @property Area $area
 * @property Cargos $cargo
 * @property Gerencia $gerencia
 * @property Rol $rol
 * @property Sucursal $sucursal
 * @property Ietapas $iidEtapas0
 * @property Igrupo $iidGrupo0
 * @property Ddependencias[] $ddependencias
 * @property Ddependencias[] $ddependencias0
 * @property Icontactabilidad[] $icontactabilidads
 * @property IdetalleLchUsuario[] $etalleLchUsuarios
 * @property Idjmanual[] $jmanuals
 * @property IllamadasRealizadas[] $illamadasRealizadas
 * @property Inocontacto[] $inocontactos
 * @property Iprogreso[] $iprogresos
 * @property Irepetidos[] $irepetidos
 * @property Ramigos[] $ramigos
 * @property Ramigos[] $ramigos0
 * @property Rnotificacion[] $rnotificacions
 * @property Rpost[] $rposts
 * @property Rpost[] $rposts0
 * @property Wproceso[] $wprocesos
 * @property Wtarea[] $wtareas
 * @property Wtarea[] $wtareas0
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
            [['rutColaborador', 'dvColaborador', 'nombreColaborador', 'apellidosColaborador', 'rRotador', 'correo', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'iidEtapas', 'iidGrupo', 'irutJefe', 'bIdPuntaje', 'mredSocial', 'mdesempeño', 'minduccion', 'mbeneficio', 'maprendizaje', 'mwellness'], 'required'],
            [['rutColaborador', 'rLikes', 'rComentarios', 'rLikesR', 'rComentariosR', 'rContadorP', 'rRotador', 'rEstado', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'iestadoColaborador', 'icontadorContactadoEfectivo', 'icontadorContactadoNulo', 'ibloqueado', 'idiploma', 'iidEtapas', 'iidGrupo', 'irutJefe', 'bIdPuntaje', 'bcantidadPuntos', 'bpuntosOtorgados', 'mredSocial', 'mdesempeño', 'minduccion', 'mbeneficio', 'maprendizaje', 'mwellness', 'icetapb', 'icetaps', 'icetapc', 'wjefe'], 'integer'],
            [['ifechaIngreso'], 'safe'],
            [['dvColaborador'], 'string', 'max' => 1],
            [['pass'], 'string', 'max' => 50],
            [['nombreColaborador', 'apellidosColaborador', 'rFoto', 'rPortada', 'correo'], 'string', 'max' => 200],
            [['rBio'], 'string', 'max' => 500],
            [['itelefonoColaboradorr', 'idireccionColaborador', 'inombreArea'], 'string', 'max' => 45],
            [['iidcc'], 'string', 'max' => 15],
            [['inombreCC'], 'string', 'max' => 100],
            [['icorreoEmpresa'], 'string', 'max' => 30],
            [['rutColaborador', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'iidEtapas', 'iidGrupo'], 'unique', 'targetAttribute' => ['rutColaborador', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'iidEtapas', 'iidGrupo']],
            [['idArea'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['idArea' => 'idArea']],
            [['idCargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargos::className(), 'targetAttribute' => ['idCargo' => 'idCargo']],
            [['idGerencia'], 'exist', 'skipOnError' => true, 'targetClass' => Gerencia::className(), 'targetAttribute' => ['idGerencia' => 'idGerencia']],
            [['idRol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['idRol' => 'idRol']],
            [['idSucursal'], 'exist', 'skipOnError' => true, 'targetClass' => Sucursal::className(), 'targetAttribute' => ['idSucursal' => 'idSucursal']],
            [['iidEtapas'], 'exist', 'skipOnError' => true, 'targetClass' => Ietapas::className(), 'targetAttribute' => ['iidEtapas' => 'iidEtapas']],
            [['iidGrupo'], 'exist', 'skipOnError' => true, 'targetClass' => Igrupo::className(), 'targetAttribute' => ['iidGrupo' => 'iidGrupo']],
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
            'rFoto' => 'R Foto',
            'rPortada' => 'R Portada',
            'rBio' => 'R Bio',
            'rLikes' => 'R Likes',
            'rComentarios' => 'R Comentarios',
            'rLikesR' => 'R Likes R',
            'rComentariosR' => 'R Comentarios R',
            'rContadorP' => 'R Contador P',
            'rRotador' => 'R Rotador',
            'correo' => 'Correo',
            'rEstado' => 'R Estado',
            'idSucursal' => 'Id Sucursal',
            'idArea' => 'Id Area',
            'idCargo' => 'Id Cargo',
            'idRol' => 'Id Rol',
            'idGerencia' => 'Id Gerencia',
            'itelefonoColaboradorr' => 'Itelefono Colaboradorr',
            'idireccionColaborador' => 'Idireccion Colaborador',
            'iestadoColaborador' => 'Iestado Colaborador',
            'icontadorContactadoEfectivo' => 'Icontador Contactado Efectivo',
            'icontadorContactadoNulo' => 'Icontador Contactado Nulo',
            'iidcc' => 'Iidcc',
            'inombreCC' => 'Inombre Cc',
            'icorreoEmpresa' => 'Icorreo Empresa',
            'inombreArea' => 'Inombre Area',
            'ibloqueado' => 'Ibloqueado',
            'idiploma' => 'Idiploma',
            'iidEtapas' => 'Iid Etapas',
            'iidGrupo' => 'Iid Grupo',
            'irutJefe' => 'Irut Jefe',
            'bIdPuntaje' => 'B Id Puntaje',
            'bcantidadPuntos' => 'Bcantidad Puntos',
            'bpuntosOtorgados' => 'Bpuntos Otorgados',
            'mredSocial' => 'Mred Social',
            'mdesempeño' => 'Mdesempeño',
            'minduccion' => 'Minduccion',
            'mbeneficio' => 'Mbeneficio',
            'maprendizaje' => 'Maprendizaje',
            'mwellness' => 'Mwellness',
            'icetapb' => 'Icetapb',
            'icetaps' => 'Icetaps',
            'icetapc' => 'Icetapc',
            'wjefe' => 'Wjefe',
            'ifechaIngreso' => 'Ifecha Ingreso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBasignacionesbeneficios()
    {
        return $this->hasMany(Basignacionesbeneficios::className(), ['rutColaboradorRecibido' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBasignacionesbeneficios0()
    {
        return $this->hasMany(Basignacionesbeneficios::className(), ['rutColaboradorJefe' => 'rutColaborador']);
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
    public function getIidEtapas0()
    {
        return $this->hasOne(Ietapas::className(), ['iidEtapas' => 'iidEtapas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIidGrupo0()
    {
        return $this->hasOne(Igrupo::className(), ['iidGrupo' => 'iidGrupo']);
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
    public function getRposts()
    {
        return $this->hasMany(Rpost::className(), ['rut1' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRposts0()
    {
        return $this->hasMany(Rpost::className(), ['rut2' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWprocesos()
    {
        return $this->hasMany(Wproceso::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWtareas()
    {
        return $this->hasMany(Wtarea::className(), ['rutColaboradorRecibido' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWtareas0()
    {
        return $this->hasMany(Wtarea::className(), ['rutColaboradorJefe' => 'rutColaborador']);
    }
}
