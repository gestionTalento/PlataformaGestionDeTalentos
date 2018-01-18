<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bpuntajecolaborador".
 *
 * @property int $idDependencias
 * @property string $puntajeBeneficiario
 * @property string $puntajeOtorgado
 *
 * @property Dependencia $dependencias
 */
class Bpuntajecolaborador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bpuntajecolaborador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDependencias'], 'required'],
            [['idDependencias'], 'integer'],
            [['puntajeBeneficiario', 'puntajeOtorgado'], 'number'],
            [['idDependencias'], 'unique'],
            [['idDependencias'], 'exist', 'skipOnError' => true, 'targetClass' => Dependencia::className(), 'targetAttribute' => ['idDependencias' => 'idDependencias']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDependencias' => 'Id Dependencias',
            'puntajeBeneficiario' => 'Puntaje Beneficiario',
            'puntajeOtorgado' => 'Puntaje Otorgado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDependencias()
    {
        return $this->hasOne(Dependencia::className(), ['idDependencias' => 'idDependencias']);
    }
}
