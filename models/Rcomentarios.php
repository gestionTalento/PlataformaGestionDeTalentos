<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rcomentarios".
 *
 * @property int $ridcomentarios
 * @property string $rcontenido
 * @property int $rut
 * @property int $ridpost
 * @property int $rorden
 * @property string $fecha
 *
 * @property Colaborador $rut0
 */
class Rcomentarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rcomentarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rut', 'ridpost'], 'required'],
            [['rut', 'ridpost', 'rorden'], 'integer'],
            [['fecha'], 'safe'],
            [['rcontenido'], 'string', 'max' => 300],
            [['rut'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rut' => 'rutColaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ridcomentarios' => 'Ridcomentarios',
            'rcontenido' => 'Rcontenido',
            'rut' => 'Rut',
            'ridpost' => 'Ridpost',
            'rorden' => 'Rorden',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRut0()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rut']);
    }
}
