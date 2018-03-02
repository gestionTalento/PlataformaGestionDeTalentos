<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bpuntajecolaborador".
 *
 * @property int $rutColaborador
 * @property string $puntaje

 *
 * @property Dependencia $dependencias
 */
class Bpuntajecolaborador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bpuntajecolaborador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutColaborador'], 'required'],
            [['rutColaborador'], 'integer'],
            [['puntaje'], 'number'],
            [['rutColaborador'], 'unique'],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
     public function attributeLabels()
    {
        return [
            'rutColaborador' => 'Rut',
            'puntaje' => 'Puntaje',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaborador()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaborador']);
    }
}
