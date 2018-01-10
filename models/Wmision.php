<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wmision".
 *
 * @property int $widMision
 * @property string $wnombre
 * @property string $wfecha
 * @property int $widtipoMision
 * @property int $widencuesta
 * @property string $wlinkvideo
 * @property string $winfografia
 * @property string $wlinkminijuego
 * @property string $wetapaminijuego
 * @property int $wcantidadetapa
 *
 * @property Wencuesta $widencuesta0
 * @property Wtipomision $widtipoMision0
 * @property Wproceso[] $wprocesos
 */
class Wmision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wmision';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wfecha'], 'safe'],
            [['widtipoMision', 'widencuesta'], 'required'],
            [['widtipoMision', 'widencuesta', 'wcantidadetapa'], 'integer'],
            [['wnombre'], 'string', 'max' => 45],
            [['wlinkvideo', 'winfografia', 'wlinkminijuego'], 'string', 'max' => 300],
            [['wetapaminijuego'], 'string', 'max' => 200],
            [['widencuesta'], 'exist', 'skipOnError' => true, 'targetClass' => Wencuesta::className(), 'targetAttribute' => ['widencuesta' => 'widencuesta']],
            [['widtipoMision'], 'exist', 'skipOnError' => true, 'targetClass' => Wtipomision::className(), 'targetAttribute' => ['widtipoMision' => 'widtipoMision']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'widMision' => 'Wid Mision',
            'wnombre' => 'Wnombre',
            'wfecha' => 'Wfecha',
            'widtipoMision' => 'Widtipo Mision',
            'widencuesta' => 'Widencuesta',
            'wlinkvideo' => 'Wlinkvideo',
            'winfografia' => 'Winfografia',
            'wlinkminijuego' => 'Wlinkminijuego',
            'wetapaminijuego' => 'Wetapaminijuego',
            'wcantidadetapa' => 'Wcantidadetapa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidencuesta0()
    {
        return $this->hasOne(Wencuesta::className(), ['widencuesta' => 'widencuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidtipoMision0()
    {
        return $this->hasOne(Wtipomision::className(), ['widtipoMision' => 'widtipoMision']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWprocesos()
    {
        return $this->hasMany(Wproceso::className(), ['widMision' => 'widMision', 'widtipoMision' => 'widtipoMision']);
    }
}
