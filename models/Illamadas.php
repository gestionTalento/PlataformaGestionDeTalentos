<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "illamadas".
 *
 * @property int $iidllamadas
 * @property int $rutEmpresa
 * @property int $ietapa
 *
 * @property Empresas $rutEmpresa0
 * @property Ietapas $ietapa0
 * @property IllamadasPreguntas[] $illamadasPreguntas
 * @property IllamadasRealizadas[] $illamadasRealizadas
 */
class Illamadas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'illamadas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutEmpresa', 'ietapa'], 'required'],
            [['rutEmpresa', 'ietapa'], 'integer'],
            [['rutEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresas::className(), 'targetAttribute' => ['rutEmpresa' => 'rutEmpresa']],
            [['ietapa'], 'exist', 'skipOnError' => true, 'targetClass' => Ietapas::className(), 'targetAttribute' => ['ietapa' => 'iidEtapas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iidllamadas' => 'Iidllamadas',
            'rutEmpresa' => 'Rut Empresa',
            'ietapa' => 'Ietapa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutEmpresa0()
    {
        return $this->hasOne(Empresas::className(), ['rutEmpresa' => 'rutEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIetapa0()
    {
        return $this->hasOne(Ietapas::className(), ['iidEtapas' => 'ietapa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIllamadasPreguntas()
    {
        return $this->hasMany(IllamadasPreguntas::className(), ['iidllamadas' => 'iidllamadas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIllamadasRealizadas()
    {
        return $this->hasMany(IllamadasRealizadas::className(), ['iidllamadas' => 'iidllamadas']);
    }
}
