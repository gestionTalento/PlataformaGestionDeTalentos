<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bbeneficios".
 *
 * @property int $bId_Beneficio
 * @property string $bNombre
 * @property string $bDescripcion
 * @property string $bTipoBeneficio
 * @property string $bValorBeneficio
 * @property string $bvalorhora
 * @property string $bvezporanio
 * @property string $bvezpormes
 * @property string $bimagen
 *
 * @property Bcolaboradorbeneficio[] $bcolaboradorbeneficios
 * @property Bdetallebeneficio[] $bdetallebeneficios
 */
class Bbeneficios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bbeneficios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bValorBeneficio', 'bvalorhora', 'bvezporanio', 'bvezpormes'], 'number'],
            [['bNombre'], 'string', 'max' => 100],
            [['bDescripcion', 'bimagen'], 'string', 'max' => 200],
            [['bTipoBeneficio'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bId_Beneficio' => 'B Id  Beneficio',
            'bNombre' => 'B Nombre',
            'bDescripcion' => 'B Descripcion',
            'bTipoBeneficio' => 'B Tipo Beneficio',
            'bValorBeneficio' => 'B Valor Beneficio',
            'bvalorhora' => 'Bvalorhora',
            'bvezporanio' => 'Bvezporanio',
            'bvezpormes' => 'Bvezpormes',
            'bimagen' => 'Bimagen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcolaboradorbeneficios()
    {
        return $this->hasMany(Bcolaboradorbeneficio::className(), ['bId_Beneficio' => 'bId_Beneficio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBdetallebeneficios()
    {
        return $this->hasMany(Bdetallebeneficio::className(), ['bId_Beneficio' => 'bId_Beneficio']);
    }
}
