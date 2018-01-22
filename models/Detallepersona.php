<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detallepersona".
 *
 * @property string $correo
 * @property string $pass
 * @property string $telefono
 * @property string $direccion
 * @property integer $rutColaborador
 *
 * @property Colaborador $rutColaborador0
 */
class Detallepersona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detallepersona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pass', 'rutColaborador'], 'required'],
            [['rutColaborador'], 'integer'],
            [['correo', 'direccion'], 'string', 'max' => 100],
            [['pass'], 'string', 'max' => 15],
            [['telefono'], 'string', 'max' => 45],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'correo' => 'Correo',
            'pass' => 'Pass',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
            'rutColaborador' => 'Rut Colaborador',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaborador0()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaborador']);
    }
}
