<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wcategoriapregunta".
 *
 * @property int $idcategoria
 * @property string $wdescripcion
 *
 * @property Wdetalleencuesta[] $wdetalleencuestas
 */
class Wcategoriapregunta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wcategoriapregunta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcategoria'], 'required'],
            [['idcategoria'], 'integer'],
            [['wdescripcion'], 'string', 'max' => 100],
            [['idcategoria'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcategoria' => 'Idcategoria',
            'wdescripcion' => 'Wdescripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWdetalleencuestas()
    {
        return $this->hasMany(Wdetalleencuesta::className(), ['idcategoria' => 'idcategoria']);
    }
}
