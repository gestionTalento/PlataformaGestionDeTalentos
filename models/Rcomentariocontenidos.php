<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rcomentariocontenidos".
 *
 * @property int $idcomentarios
 * @property string $rcontenido
 * @property int $rut
 * @property int $ridcontenido
 * @property int $rorden
 *
 * @property Rcontenido $ridcontenido0
 */
class Rcomentariocontenidos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rcomentariocontenidos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcomentarios'], 'required'],
            [['idcomentarios', 'rut', 'ridcontenido', 'rorden'], 'integer'],
            [['rcontenido'], 'string', 'max' => 300],
            [['idcomentarios'], 'unique'],
            [['ridcontenido'], 'exist', 'skipOnError' => true, 'targetClass' => Rcontenido::className(), 'targetAttribute' => ['ridcontenido' => 'idcontenido']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcomentarios' => 'Idcomentarios',
            'rcontenido' => 'Rcontenido',
            'rut' => 'Rut',
            'ridcontenido' => 'Ridcontenido',
            'rorden' => 'Rorden',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRidcontenido0()
    {
        return $this->hasOne(Rcontenido::className(), ['idcontenido' => 'ridcontenido']);
    }
}
