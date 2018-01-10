<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dconductas".
 *
 * @property int $dIdConductas
 * @property string $dNombreConductas
 * @property int $dIdCompetencia
 *
 * @property Dcompetencias $dIdCompetencia0
 * @property DevaluacionIntermedia[] $devaluacionIntermedia
 */
class Dconductas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dconductas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dIdCompetencia'], 'required'],
            [['dIdCompetencia'], 'integer'],
            [['dNombreConductas'], 'string', 'max' => 600],
            [['dIdCompetencia'], 'exist', 'skipOnError' => true, 'targetClass' => Dcompetencias::className(), 'targetAttribute' => ['dIdCompetencia' => 'dIdCompetencia']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dIdConductas' => 'D Id Conductas',
            'dNombreConductas' => 'D Nombre Conductas',
            'dIdCompetencia' => 'D Id Competencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDIdCompetencia0()
    {
        return $this->hasOne(Dcompetencias::className(), ['dIdCompetencia' => 'dIdCompetencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDevaluacionIntermedia()
    {
        return $this->hasMany(DevaluacionIntermedia::className(), ['dIdConductas' => 'dIdConductas', 'dIdCompetencia' => 'dIdCompetencia']);
    }
}
