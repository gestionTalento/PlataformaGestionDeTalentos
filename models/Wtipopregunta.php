<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wtipopregunta".
 *
 * @property int $idtipoPregunta
 * @property string $wnombre
 * @property string $wdescripcion
 *
 * @property Wdetalleencuesta[] $wdetalleencuestas
 */
class Wtipopregunta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wtipopregunta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wnombre', 'wdescripcion'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtipoPregunta' => 'Idtipo Pregunta',
            'wnombre' => 'Wnombre',
            'wdescripcion' => 'Wdescripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWdetalleencuestas()
    {
        return $this->hasMany(Wdetalleencuesta::className(), ['idtipoPregunta' => 'idtipoPregunta']);
    }
}
