<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bbeneficios".
 *
 * @property int $bId_Beneficio
 * @property string $bNombre
 * @property string $bDescripcion
 * @property int $bIdPuntaje
 * @property string $bTipoBeneficio
 * @property string $bValorBeneficio
 * @property int $rutColaborador
 *
 * @property Colaborador $rutColaborador0
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
            [['bIdPuntaje', 'rutColaborador'], 'integer'],
            [['rutColaborador'], 'required'],
            [['bNombre'], 'string', 'max' => 100],
            [['bDescripcion'], 'string', 'max' => 200],
            [['bTipoBeneficio', 'bValorBeneficio'], 'string', 'max' => 45],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
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
            'bIdPuntaje' => 'B Id Puntaje',
            'bTipoBeneficio' => 'B Tipo Beneficio',
            'bValorBeneficio' => 'B Valor Beneficio',
            'rutColaborador' => 'Rut Colaborador',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaborador0()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaborador']);
    }
}
