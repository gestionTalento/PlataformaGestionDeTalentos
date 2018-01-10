<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "devaluacion_intermedia".
 *
 * @property int $dIdAutoNumerico
 * @property int $dValor
 * @property int $dIdConductas
 * @property int $dIdCompetencia
 * @property int $rIdDependencias
 *
 * @property Dconductas $dIdConductas0
 * @property Ddependencias $rIdDependencias0
 */
class DevaluacionIntermedia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'devaluacion_intermedia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dValor', 'dIdConductas', 'dIdCompetencia', 'rIdDependencias'], 'integer'],
            [['dIdConductas', 'dIdCompetencia', 'rIdDependencias'], 'required'],
            [['dIdConductas', 'dIdCompetencia'], 'exist', 'skipOnError' => true, 'targetClass' => Dconductas::className(), 'targetAttribute' => ['dIdConductas' => 'dIdConductas', 'dIdCompetencia' => 'dIdCompetencia']],
            [['rIdDependencias'], 'exist', 'skipOnError' => true, 'targetClass' => Ddependencias::className(), 'targetAttribute' => ['rIdDependencias' => 'dIdDependencias']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dIdAutoNumerico' => 'D Id Auto Numerico',
            'dValor' => 'D Valor',
            'dIdConductas' => 'D Id Conductas',
            'dIdCompetencia' => 'D Id Competencia',
            'rIdDependencias' => 'R Id Dependencias',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDIdConductas0()
    {
        return $this->hasOne(Dconductas::className(), ['dIdConductas' => 'dIdConductas', 'dIdCompetencia' => 'dIdCompetencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRIdDependencias0()
    {
        return $this->hasOne(Ddependencias::className(), ['dIdDependencias' => 'rIdDependencias']);
    }
}
