<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rlikepost".
 *
 * @property int $id
 * @property int $ridpost
 * @property int $rut
 *
 * @property Rpost $ridpost0
 */
class Rlikepost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rlikepost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ridpost', 'rut'], 'required'],
            [['ridpost', 'rut'], 'integer'],
            [['ridpost'], 'exist', 'skipOnError' => true, 'targetClass' => Rpost::className(), 'targetAttribute' => ['ridpost' => 'ridPost']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ridpost' => 'Ridpost',
            'rut' => 'Rut',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRidpost0()
    {
        return $this->hasOne(Rpost::className(), ['ridPost' => 'ridpost']);
    }
}
