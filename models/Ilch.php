<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ilch".
 *
 * @property int $iidLCH
 * @property string $inombreLCH
 *
 * @property Idetallelch[] $etallelches
 */
class Ilch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ilch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inombreLCH'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iidLCH' => 'Iid Lch',
            'inombreLCH' => 'Inombre Lch',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtallelches()
    {
        return $this->hasMany(Idetallelch::className(), ['iidLch' => 'iidLCH']);
    }
}
