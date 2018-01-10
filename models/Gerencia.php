<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gerencia".
 *
 * @property int $idGerencia
 * @property string $nombreGerencia
 *
 * @property Colaborador[] $colaboradors
 */
class Gerencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gerencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreGerencia'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idGerencia' => 'Id Gerencia',
            'nombreGerencia' => 'Nombre Gerencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradors()
    {
        return $this->hasMany(Colaborador::className(), ['idGerencia' => 'idGerencia']);
    }
}
