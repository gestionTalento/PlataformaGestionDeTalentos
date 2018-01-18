<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "icentrocosto".
 *
 * @property int $idCC
 * @property string $nombreCC
 *
 * @property Colaborador[] $colaboradors
 */
class Icentrocosto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'icentrocosto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCC'], 'required'],
            [['idCC'], 'integer'],
            [['nombreCC'], 'string', 'max' => 200],
            [['idCC'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCC' => 'Id Cc',
            'nombreCC' => 'Nombre Cc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradors()
    {
        return $this->hasMany(Colaborador::className(), ['idCC' => 'idCC']);
    }
}
