<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ichecklist".
 *
 * @property int $iidchecklist
 * @property string $inombreCheckList
 * @property string $idescripcionCheckList
 *
 * @property Ichecklistitem[] $ichecklistitems
 * @property Iprogreso[] $iprogresos
 */
class Ichecklist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ichecklist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inombreCheckList'], 'string', 'max' => 45],
            [['idescripcionCheckList'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iidchecklist' => 'Iidchecklist',
            'inombreCheckList' => 'Inombre Check List',
            'idescripcionCheckList' => 'Idescripcion Check List',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIchecklistitems()
    {
        return $this->hasMany(Ichecklistitem::className(), ['ichecklist_idchecklist' => 'iidchecklist']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIprogresos()
    {
        return $this->hasMany(Iprogreso::className(), ['ichecklist' => 'iidchecklist']);
    }
}
