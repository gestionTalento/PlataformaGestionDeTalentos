<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ietapas".
 *
 * @property int $iidEtapas
 * @property string $inombreEtapa
 *
 * @property Colaborador[] $colaboradors
 * @property Icontactabilidad[] $icontactabilidads
 * @property Illamadas[] $illamadas
 */
class Ietapas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ietapas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inombreEtapa'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iidEtapas' => 'Iid Etapas',
            'inombreEtapa' => 'Inombre Etapa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradors()
    {
        return $this->hasMany(Colaborador::className(), ['iidEtapas' => 'iidEtapas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcontactabilidads()
    {
        return $this->hasMany(Icontactabilidad::className(), ['iidEtapa' => 'iidEtapas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIllamadas()
    {
        return $this->hasMany(Illamadas::className(), ['ietapa' => 'iidEtapas']);
    }
}
