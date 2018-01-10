<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wproceso".
 *
 * @property int $widproceso
 * @property int $widMision
 * @property int $widtipoMision
 * @property string $wfecha
 * @property int $rutColaborador
 *
 * @property Colaborador $rutColaborador0
 * @property Wmision $widMision0
 */
class Wproceso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wproceso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['widMision', 'widtipoMision', 'rutColaborador'], 'required'],
            [['widMision', 'widtipoMision', 'rutColaborador'], 'integer'],
            [['wfecha'], 'safe'],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
            [['widMision', 'widtipoMision'], 'exist', 'skipOnError' => true, 'targetClass' => Wmision::className(), 'targetAttribute' => ['widMision' => 'widMision', 'widtipoMision' => 'widtipoMision']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'widproceso' => 'Widproceso',
            'widMision' => 'Wid Mision',
            'widtipoMision' => 'Widtipo Mision',
            'wfecha' => 'Wfecha',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidMision0()
    {
        return $this->hasOne(Wmision::className(), ['widMision' => 'widMision', 'widtipoMision' => 'widtipoMision']);
    }
}
