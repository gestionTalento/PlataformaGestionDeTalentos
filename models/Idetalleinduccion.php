<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "idetalleinduccion".
 *
 * @property int $icontadorContactoEfectivo
 * @property int $icontadorContactadoNulo
 * @property int $iidEtapas
 * @property int $iidGrupo
 * @property string $icorreoEmpresa
 * @property int $icetapb
 * @property int $icetaps
 * @property int $icetapc
 * @property int $rutColaborador
 * @property string $ifechaIngreso
 *
 * @property Colaborador $rutColaborador0
 * @property Ietapas $iidEtapas0
 * @property Igrupo $iidGrupo0
 */
class Idetalleinduccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'idetalleinduccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['icontadorContactoEfectivo', 'icontadorContactadoNulo', 'iidEtapas', 'iidGrupo', 'icetapb', 'icetaps', 'icetapc', 'rutColaborador'], 'integer'],
            [['iidEtapas', 'iidGrupo', 'rutColaborador'], 'required'],
            [['ifechaIngreso'], 'safe'],
            [['icorreoEmpresa'], 'string', 'max' => 100],
            [['iidEtapas', 'iidGrupo', 'rutColaborador'], 'unique', 'targetAttribute' => ['iidEtapas', 'iidGrupo', 'rutColaborador']],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
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
            'icontadorContactoEfectivo' => 'Icontador Contacto Efectivo',
            'icontadorContactadoNulo' => 'Icontador Contactado Nulo',
            'iidEtapas' => 'Iid Etapas',
            'iidGrupo' => 'Iid Grupo',
            'icorreoEmpresa' => 'Icorreo Empresa',
            'icetapb' => 'Icetapb',
            'icetaps' => 'Icetaps',
            'icetapc' => 'Icetapc',
            'rutColaborador' => 'Rut Colaborador',
            'ifechaIngreso' => 'Ifecha Ingreso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaborador0()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaborador']);
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
}
