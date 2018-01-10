<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "idjmanual".
 *
 * @property int $iiddjManual
 * @property int $rutColaborador
 * @property int $iestado
 * @property string $irutaDJ
 * @property int $iestadoCarnet1
 * @property int $iestadoCarnet2
 * @property int $iestadoDJ
 * @property int $iestadoMA
 * @property int $iestadoCA
 * @property int $iestadoAR
 * @property int $iestadoPO
 *
 * @property Colaborador $rutColaborador0
 */
class Idjmanual extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'idjmanual';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutColaborador'], 'required'],
            [['rutColaborador', 'iestado', 'iestadoCarnet1', 'iestadoCarnet2', 'iestadoDJ', 'iestadoMA', 'iestadoCA', 'iestadoAR', 'iestadoPO'], 'integer'],
            [['irutaDJ'], 'string', 'max' => 200],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iiddjManual' => 'Iiddj Manual',
            'rutColaborador' => 'Rut Colaborador',
            'iestado' => 'Iestado',
            'irutaDJ' => 'Iruta Dj',
            'iestadoCarnet1' => 'Iestado Carnet1',
            'iestadoCarnet2' => 'Iestado Carnet2',
            'iestadoDJ' => 'Iestado Dj',
            'iestadoMA' => 'Iestado Ma',
            'iestadoCA' => 'Iestado Ca',
            'iestadoAR' => 'Iestado Ar',
            'iestadoPO' => 'Iestado Po',
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
