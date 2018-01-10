<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "irepetidos".
 *
 * @property int $iidrepetidos
 * @property int $rutColaborador
 * @property int $iidgrupo
 * @property int $iidGrupoN
 * @property int $idEmpresa
 *
 * @property Colaborador $rutColaborador0
 * @property Empresas $empresa
 * @property Igrupo $iidgrupo0
 */
class Irepetidos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'irepetidos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutColaborador', 'iidgrupo', 'idEmpresa'], 'required'],
            [['rutColaborador', 'iidgrupo', 'iidGrupoN', 'idEmpresa'], 'integer'],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
            [['idEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresas::className(), 'targetAttribute' => ['idEmpresa' => 'rutEmpresa']],
            [['iidgrupo'], 'exist', 'skipOnError' => true, 'targetClass' => Igrupo::className(), 'targetAttribute' => ['iidgrupo' => 'iidGrupo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iidrepetidos' => 'Iidrepetidos',
            'rutColaborador' => 'Rut Colaborador',
            'iidgrupo' => 'Iidgrupo',
            'iidGrupoN' => 'Iid Grupo N',
            'idEmpresa' => 'Id Empresa',
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
    public function getEmpresa()
    {
        return $this->hasOne(Empresas::className(), ['rutEmpresa' => 'idEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIidgrupo0()
    {
        return $this->hasOne(Igrupo::className(), ['iidGrupo' => 'iidgrupo']);
    }
}
