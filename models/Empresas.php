<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresas".
 *
 * @property int $rutEmpresa
 * @property string $nombreEmpresa
 * @property string $idescripcionEmpresa
 * @property string $iestadoEmpesa
 *
 * @property Illamadas[] $illamadas
 * @property Irepetidos[] $irepetidos
 * @property Itelefonista[] $itelefonistas
 * @property Rpublicidad[] $rpublicidads
 * @property Sucursal[] $sucursals
 */
class Empresas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutEmpresa'], 'required'],
            [['rutEmpresa'], 'integer'],
            [['nombreEmpresa'], 'string', 'max' => 300],
            [['idescripcionEmpresa', 'iestadoEmpesa'], 'string', 'max' => 45],
            [['rutEmpresa'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rutEmpresa' => 'Rut Empresa',
            'nombreEmpresa' => 'Nombre Empresa',
            'idescripcionEmpresa' => 'Idescripcion Empresa',
            'iestadoEmpesa' => 'Iestado Empesa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIllamadas()
    {
        return $this->hasMany(Illamadas::className(), ['rutEmpresa' => 'rutEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrepetidos()
    {
        return $this->hasMany(Irepetidos::className(), ['idEmpresa' => 'rutEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItelefonistas()
    {
        return $this->hasMany(Itelefonista::className(), ['empresa' => 'rutEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRpublicidads()
    {
        return $this->hasMany(Rpublicidad::className(), ['rutEmpresa' => 'rutEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursals()
    {
        return $this->hasMany(Sucursal::className(), ['rutEmpresa' => 'rutEmpresa']);
    }
}
