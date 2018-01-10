<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "basignacionesbeneficios".
 *
 * @property int $bidAsignaciones
 * @property string $bFecha
 * @property int $bMonto
 * @property int $rutColaboradorRecibido
 * @property int $rutColaboradorJefe
 *
 * @property Colaborador $rutColaboradorRecibido0
 * @property Colaborador $rutColaboradorJefe0
 */
class Basignacionesbeneficios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'basignacionesbeneficios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bFecha'], 'safe'],
            [['bMonto', 'rutColaboradorRecibido', 'rutColaboradorJefe'], 'integer'],
            [['rutColaboradorRecibido', 'rutColaboradorJefe'], 'required'],
            [['rutColaboradorRecibido'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaboradorRecibido' => 'rutColaborador']],
            [['rutColaboradorJefe'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaboradorJefe' => 'rutColaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bidAsignaciones' => 'Bid Asignaciones',
            'bFecha' => 'B Fecha',
            'bMonto' => 'B Monto',
            'rutColaboradorRecibido' => 'Rut Colaborador Recibido',
            'rutColaboradorJefe' => 'Rut Colaborador Jefe',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaboradorRecibido0()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaboradorRecibido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaboradorJefe0()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaboradorJefe']);
    }
}
