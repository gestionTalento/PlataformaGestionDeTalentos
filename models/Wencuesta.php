<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wencuesta".
 *
 * @property int $widencuesta
 * @property string $wpregunta
 * @property string $wrespuesta
 * @property int $wtipopregunta
 *
 * @property Wmision[] $wmisions
 */
class Wencuesta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wencuesta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wtipopregunta'], 'integer'],
            [['wpregunta', 'wrespuesta'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'widencuesta' => 'Widencuesta',
            'wpregunta' => 'Wpregunta',
            'wrespuesta' => 'Wrespuesta',
            'wtipopregunta' => 'Wtipopregunta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWmisions()
    {
        return $this->hasMany(Wmision::className(), ['widencuesta' => 'widencuesta']);
    }
}
