<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "illamadas_realizadas".
 *
 * @property int $iid
 * @property string $ivalor
 * @property string $ifecha
 * @property int $iidllamadas_preguntas
 * @property int $iidllamadas
 * @property int $rutColaborador
 * @property int $iidGrupo
 *
 * @property Colaborador $rutColaborador0
 * @property Igrupo $iidGrupo0
 * @property Illamadas $iidllamadas0
 * @property IllamadasPreguntas $iidllamadasPreguntas
 */
class IllamadasRealizadas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'illamadas_realizadas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ifecha'], 'safe'],
            [['iidllamadas_preguntas', 'iidllamadas', 'rutColaborador', 'iidGrupo'], 'required'],
            [['iidllamadas_preguntas', 'iidllamadas', 'rutColaborador', 'iidGrupo'], 'integer'],
            [['ivalor'], 'string', 'max' => 500],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
            [['iidGrupo'], 'exist', 'skipOnError' => true, 'targetClass' => Igrupo::className(), 'targetAttribute' => ['iidGrupo' => 'iidGrupo']],
            [['iidllamadas'], 'exist', 'skipOnError' => true, 'targetClass' => Illamadas::className(), 'targetAttribute' => ['iidllamadas' => 'iidllamadas']],
            [['iidllamadas_preguntas'], 'exist', 'skipOnError' => true, 'targetClass' => IllamadasPreguntas::className(), 'targetAttribute' => ['iidllamadas_preguntas' => 'iidllamadas_preguntas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iid' => 'Iid',
            'ivalor' => 'Ivalor',
            'ifecha' => 'Ifecha',
            'iidllamadas_preguntas' => 'Iidllamadas Preguntas',
            'iidllamadas' => 'Iidllamadas',
            'rutColaborador' => 'Rut Colaborador',
            'iidGrupo' => 'Iid Grupo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaborador0()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIidGrupo0()
    {
        return $this->hasOne(Igrupo::className(), ['iidGrupo' => 'iidGrupo']);
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
    public function getIidllamadasPreguntas()
    {
        return $this->hasOne(IllamadasPreguntas::className(), ['iidllamadas_preguntas' => 'iidllamadas_preguntas']);
    }
}
