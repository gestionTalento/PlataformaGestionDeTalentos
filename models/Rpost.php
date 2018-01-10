<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rpost".
 *
 * @property int $ridPost
 * @property string $rdecripcionPost
 * @property string $rfoto
 * @property string $rfecha
 * @property int $rtipoPost
 * @property int $rut1
 * @property int $rut2
 * @property int $rlikes
 * @property int $rcomentarios
 * @property int $rrotador
 * @property string $rnombreArchivo
 *
 * @property Colaborador $rut10
 * @property Colaborador $rut20
 * @property RtipoPost $rtipoPost0
 */
class Rpost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rpost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rfecha'], 'safe'],
            [['rtipoPost', 'rut1', 'rut2'], 'required'],
            [['rtipoPost', 'rut1', 'rut2', 'rlikes', 'rcomentarios', 'rrotador'], 'integer'],
            [['rdecripcionPost'], 'string', 'max' => 2000],
            [['rfoto'], 'string', 'max' => 100],
            [['rnombreArchivo'], 'string', 'max' => 200],
            [['rut1'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rut1' => 'rutColaborador']],
            [['rut2'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rut2' => 'rutColaborador']],
            [['rtipoPost'], 'exist', 'skipOnError' => true, 'targetClass' => RtipoPost::className(), 'targetAttribute' => ['rtipoPost' => 'ridtipo_post']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ridPost' => 'Rid Post',
            'rdecripcionPost' => 'Rdecripcion Post',
            'rfoto' => 'Rfoto',
            'rfecha' => 'Rfecha',
            'rtipoPost' => 'Rtipo Post',
            'rut1' => 'Rut1',
            'rut2' => 'Rut2',
            'rlikes' => 'Rlikes',
            'rcomentarios' => 'Rcomentarios',
            'rrotador' => 'Rrotador',
            'rnombreArchivo' => 'Rnombre Archivo',
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
    public function getRtipoPost0()
    {
        return $this->hasOne(RtipoPost::className(), ['ridtipo_post' => 'rtipoPost']);
    }
}
