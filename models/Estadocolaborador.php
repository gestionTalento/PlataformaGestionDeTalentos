<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estadocolaborador".
 *
 * @property int $idestado
 * @property string $nombre
 *
 * @property Colaborador[] $colaboradors
 */
class Estadocolaborador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estadocolaborador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idestado' => 'Idestado',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradors()
    {
        return $this->hasMany(Colaborador::className(), ['idestado' => 'idestado']);
    }
}
