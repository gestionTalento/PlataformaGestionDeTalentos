<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ramigos".
 *
 * @property int $rIdAmigos
 * @property int $rut1
 * @property int $rut2
 *
 * @property Colaborador $rut10
 * @property Colaborador $rut20
 * @property RtipoPost[] $rtipoPosts
 */
class Ramigos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ramigos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rut1', 'rut2'], 'required'],
            [['rut1', 'rut2'], 'integer'],
            [['rut1'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rut1' => 'rutColaborador']],
            [['rut2'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rut2' => 'rutColaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rIdAmigos' => 'R Id Amigos',
            'rut1' => 'Rut1',
            'rut2' => 'Rut2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRut10()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rut1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRut20()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rut2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRtipoPosts()
    {
        return $this->hasMany(RtipoPost::className(), ['ridAmigos' => 'rIdAmigos']);
    }
}
