<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rnotificacion".
 *
 * @property int $ridNotificacion
 * @property string $rcontenido
 * @property int $rleido
 * @property string $rurl
 * @property int $rrecibido
 * @property int $rrutNotificado
 *
 * @property Colaborador $rrutNotificado0
 */
class Rnotificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rnotificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rleido', 'rrecibido', 'rrutNotificado'], 'integer'],
            [['rrutNotificado'], 'required'],
            [['rcontenido', 'rurl'], 'string', 'max' => 200],
            [['rrutNotificado'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rrutNotificado' => 'rutColaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ridNotificacion' => 'Rid Notificacion',
            'rcontenido' => 'Rcontenido',
            'rleido' => 'Rleido',
            'rurl' => 'Rurl',
            'rrecibido' => 'Rrecibido',
            'rrutNotificado' => 'Rrut Notificado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRrutNotificado0()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rrutNotificado']);
    }
}
