<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dplanes".
 *
 * @property int $dIdPlanes
 * @property string $dTexto1
 * @property string $dTexto3
 * @property int $dIdPlanAccion
 * @property int $dIdCompetencia
 *
 * @property Dplanaccion $dIdPlanAccion0
 * @property Dcompetencias $dIdCompetencia0
 */
class Dplanes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dplanes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dIdPlanAccion', 'dIdCompetencia'], 'required'],
            [['dIdPlanAccion', 'dIdCompetencia'], 'integer'],
            [['dTexto1', 'dTexto3'], 'string', 'max' => 500],
            [['dIdPlanAccion'], 'exist', 'skipOnError' => true, 'targetClass' => Dplanaccion::className(), 'targetAttribute' => ['dIdPlanAccion' => 'dIdPlanAccion']],
            [['dIdCompetencia'], 'exist', 'skipOnError' => true, 'targetClass' => Dcompetencias::className(), 'targetAttribute' => ['dIdCompetencia' => 'dIdCompetencia']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dIdPlanes' => 'D Id Planes',
            'dTexto1' => 'D Texto1',
            'dTexto3' => 'D Texto3',
            'dIdPlanAccion' => 'D Id Plan Accion',
            'dIdCompetencia' => 'D Id Competencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDIdPlanAccion0()
    {
        return $this->hasOne(Dplanaccion::className(), ['dIdPlanAccion' => 'dIdPlanAccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDIdCompetencia0()
    {
        return $this->hasOne(Dcompetencias::className(), ['dIdCompetencia' => 'dIdCompetencia']);
    }
}
