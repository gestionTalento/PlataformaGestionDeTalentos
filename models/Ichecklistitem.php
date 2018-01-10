<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ichecklistitem".
 *
 * @property int $iidcheckListItems
 * @property string $ipregunta
 * @property string $irespuesta
 * @property string $iresponsable
 * @property int $ichecklist_idchecklist
 *
 * @property Ichecklist $ichecklistIdchecklist
 */
class Ichecklistitem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ichecklistitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ichecklist_idchecklist'], 'required'],
            [['ichecklist_idchecklist'], 'integer'],
            [['ipregunta', 'iresponsable'], 'string', 'max' => 300],
            [['irespuesta'], 'string', 'max' => 200],
            [['ichecklist_idchecklist'], 'exist', 'skipOnError' => true, 'targetClass' => Ichecklist::className(), 'targetAttribute' => ['ichecklist_idchecklist' => 'iidchecklist']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iidcheckListItems' => 'Iidcheck List Items',
            'ipregunta' => 'Ipregunta',
            'irespuesta' => 'Irespuesta',
            'iresponsable' => 'Iresponsable',
            'ichecklist_idchecklist' => 'Ichecklist Idchecklist',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIchecklistIdchecklist()
    {
        return $this->hasOne(Ichecklist::className(), ['iidchecklist' => 'ichecklist_idchecklist']);
    }
}
