<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bhistorialpuntaje".
 *
 * @property int $idHistorial
 * @property string $fecha
 * @property string $puntajeAsignado
 * @property int $idDependencias
 *
 * @property Dependencia $dependencias
 * @property Dependencia[] $dependencias0
 */
class Bhistorialpuntaje extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bhistorialpuntaje';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['puntajeAsignado'], 'number'],
            [['idDependencias'], 'required'],
            [['idDependencias'], 'integer'],
            [['idDependencias'], 'exist', 'skipOnError' => true, 'targetClass' => Dependencia::className(), 'targetAttribute' => ['idDependencias' => 'idDependencias']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idHistorial' => 'Id Historial',
            'fecha' => 'Fecha',
            'puntajeAsignado' => 'Puntaje Asignado',
            'idDependencias' => 'Id Dependencias',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDependencias()
    {
        return $this->hasOne(Dependencia::className(), ['idDependencias' => 'idDependencias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDependencias0()
    {
        return $this->hasMany(Dependencia::className(), ['bHistorialPuntaje_idHistorial' => 'idHistorial']);
    }
}
