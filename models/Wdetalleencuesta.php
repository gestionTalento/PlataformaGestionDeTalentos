<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wdetalleencuesta".
 *
 * @property int $iddetalleEncuesta
 * @property string $wpregunta
 * @property string $wvalor
 * @property int $idencuesta
 * @property int $idtipoPregunta
 * @property int $idcategoria
 *
 * @property Wtipopregunta $tipoPregunta
 * @property Wcategoriapregunta $categoria
 * @property Wencuesta $encuesta
 */
class Wdetalleencuesta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wdetalleencuesta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idencuesta', 'idtipoPregunta', 'idcategoria'], 'required'],
            [['idencuesta', 'idtipoPregunta', 'idcategoria'], 'integer'],
            [['wpregunta'], 'string', 'max' => 500],
            [['wvalor'], 'string', 'max' => 45],
            [['idtipoPregunta'], 'exist', 'skipOnError' => true, 'targetClass' => Wtipopregunta::className(), 'targetAttribute' => ['idtipoPregunta' => 'idtipoPregunta']],
            [['idcategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Wcategoriapregunta::className(), 'targetAttribute' => ['idcategoria' => 'idcategoria']],
            [['idencuesta'], 'exist', 'skipOnError' => true, 'targetClass' => Wencuesta::className(), 'targetAttribute' => ['idencuesta' => 'widencuesta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddetalleEncuesta' => 'Iddetalle Encuesta',
            'wpregunta' => 'Wpregunta',
            'wvalor' => 'Wvalor',
            'idencuesta' => 'Idencuesta',
            'idtipoPregunta' => 'Idtipo Pregunta',
            'idcategoria' => 'Idcategoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoPregunta()
    {
        return $this->hasOne(Wtipopregunta::className(), ['idtipoPregunta' => 'idtipoPregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Wcategoriapregunta::className(), ['idcategoria' => 'idcategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncuesta()
    {
        return $this->hasOne(Wencuesta::className(), ['widencuesta' => 'idencuesta']);
    }
}
