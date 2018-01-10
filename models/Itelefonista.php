<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "itelefonista".
 *
 * @property int $irutTelefonista
 * @property string $inombres
 * @property string $iapellidos
 * @property string $iclave
 * @property int $iidGrupo
 * @property int $empresa
 *
 * @property Empresas $empresa0
 * @property Igrupo $iidGrupo0
 */
class Itelefonista extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'itelefonista';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['irutTelefonista', 'iidGrupo', 'empresa'], 'required'],
            [['irutTelefonista', 'iidGrupo', 'empresa'], 'integer'],
            [['inombres', 'iapellidos'], 'string', 'max' => 100],
            [['iclave'], 'string', 'max' => 45],
            [['irutTelefonista', 'iidGrupo', 'empresa'], 'unique', 'targetAttribute' => ['irutTelefonista', 'iidGrupo', 'empresa']],
            [['empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresas::className(), 'targetAttribute' => ['empresa' => 'rutEmpresa']],
            [['iidGrupo'], 'exist', 'skipOnError' => true, 'targetClass' => Igrupo::className(), 'targetAttribute' => ['iidGrupo' => 'iidGrupo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'irutTelefonista' => 'Irut Telefonista',
            'inombres' => 'Inombres',
            'iapellidos' => 'Iapellidos',
            'iclave' => 'Iclave',
            'iidGrupo' => 'Iid Grupo',
            'empresa' => 'Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa0()
    {
        return $this->hasOne(Empresas::className(), ['rutEmpresa' => 'empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIidGrupo0()
    {
        return $this->hasOne(Igrupo::className(), ['iidGrupo' => 'iidGrupo']);
    }
}
