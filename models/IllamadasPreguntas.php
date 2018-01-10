<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "illamadas_preguntas".
 *
 * @property int $iidllamadas_preguntas
 * @property string $ipregunta
 * @property int $itipoPregunta
 * @property int $iidllamadas
 *
 * @property Illamadas $iidllamadas0
 * @property IllamadasRealizadas[] $illamadasRealizadas
 */
class IllamadasPreguntas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'illamadas_preguntas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itipoPregunta', 'iidllamadas'], 'integer'],
            [['iidllamadas'], 'required'],
            [['ipregunta'], 'string', 'max' => 500],
            [['iidllamadas'], 'exist', 'skipOnError' => true, 'targetClass' => Illamadas::className(), 'targetAttribute' => ['iidllamadas' => 'iidllamadas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iidllamadas_preguntas' => 'Iidllamadas Preguntas',
            'ipregunta' => 'Ipregunta',
            'itipoPregunta' => 'Itipo Pregunta',
            'iidllamadas' => 'Iidllamadas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIidllamadas0()
    {
        return $this->hasOne(Illamadas::className(), ['iidllamadas' => 'iidllamadas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIllamadasRealizadas()
    {
        return $this->hasMany(IllamadasRealizadas::className(), ['iidllamadas_preguntas' => 'iidllamadas_preguntas']);
    }
}
