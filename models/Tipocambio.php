<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipocambio".
 *
 * @property int $idtipoCambio
 * @property string $nombre
 * @property string $descripción
 *
 * @property Historialcolaborador[] $historialcolaboradors
 */
class Tipocambio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipocambio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripción'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtipoCambio' => 'Idtipo Cambio',
            'nombre' => 'Nombre',
            'descripción' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistorialcolaboradors()
    {
        return $this->hasMany(Historialcolaborador::className(), ['idtipoCambio' => 'idtipoCambio']);
    }
}
