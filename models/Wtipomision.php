<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wtipomision".
 *
 * @property int $widtipoMision
 * @property string $wnombreTipo
 * @property string $wdescripcion
 *
 * @property Wmision[] $wmisions
 */
class Wtipomision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wtipomision';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wnombreTipo'], 'string', 'max' => 45],
            [['wdescripcion'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'widtipoMision' => 'Widtipo Mision',
            'wnombreTipo' => 'Wnombre Tipo',
            'wdescripcion' => 'Wdescripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWmisions()
    {
        return $this->hasMany(Wmision::className(), ['widtipoMision' => 'widtipoMision']);
    }
}
