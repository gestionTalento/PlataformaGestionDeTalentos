<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bdetallebeneficio".
 *
 * @property int $idbdetalleBeneficio
 * @property string $valor
 * @property int $rutEmpresa
 * @property int $bId_Beneficio
 *
 * @property Bbeneficios $bIdBeneficio
 * @property Empresas $rutEmpresa0
 */
class Bdetallebeneficio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bdetallebeneficio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valor'], 'number'],
            [['rutEmpresa', 'bId_Beneficio'], 'required'],
            [['rutEmpresa', 'bId_Beneficio'], 'integer'],
            [['bId_Beneficio'], 'exist', 'skipOnError' => true, 'targetClass' => Bbeneficios::className(), 'targetAttribute' => ['bId_Beneficio' => 'bId_Beneficio']],
            [['rutEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresas::className(), 'targetAttribute' => ['rutEmpresa' => 'rutEmpresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idbdetalleBeneficio' => 'Idbdetalle Beneficio',
            'valor' => 'Valor',
            'rutEmpresa' => 'Rut Empresa',
            'bId_Beneficio' => 'B Id  Beneficio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBIdBeneficio()
    {
        return $this->hasOne(Bbeneficios::className(), ['bId_Beneficio' => 'bId_Beneficio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutEmpresa0()
    {
        return $this->hasOne(Empresas::className(), ['rutEmpresa' => 'rutEmpresa']);
    }
}
