<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ractividad".
 *
 * @property int $idactividad
 * @property int $rutColaborador1
 * @property int $rutColaborador2
 * @property int $ridpost
 * @property int $ridtipo_post
 *
 * @property RtipoPost $ridtipoPost
 * @property Rpost $ridpost0
 * @property Colaborador $rutColaborador10
 * @property Colaborador $rutColaborador20
 */
class Ractividad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ractividad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutColaborador1', 'rutColaborador2', 'ridpost', 'ridtipo_post'], 'required'],
            [['rutColaborador1', 'rutColaborador2', 'ridpost', 'ridtipo_post'], 'integer'],
            [['ridtipo_post'], 'exist', 'skipOnError' => true, 'targetClass' => RtipoPost::className(), 'targetAttribute' => ['ridtipo_post' => 'ridtipo_post']],
            [['ridpost'], 'exist', 'skipOnError' => true, 'targetClass' => Rpost::className(), 'targetAttribute' => ['ridpost' => 'ridPost']],
            [['rutColaborador1'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador1' => 'rutColaborador']],
            [['rutColaborador2'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador2' => 'rutColaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idactividad' => 'Idactividad',
            'rutColaborador1' => 'Rut Colaborador1',
            'rutColaborador2' => 'Rut Colaborador2',
            'ridpost' => 'Ridpost',
            'ridtipo_post' => 'Ridtipo Post',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRidtipoPost()
    {
        return $this->hasOne(RtipoPost::className(), ['ridtipo_post' => 'ridtipo_post']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRidpost0()
    {
        return $this->hasOne(Rpost::className(), ['ridPost' => 'ridpost']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaborador10()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaborador1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaborador20()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaborador2']);
    }
}
