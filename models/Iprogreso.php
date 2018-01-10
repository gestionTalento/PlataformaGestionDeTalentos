<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "iprogreso".
 *
 * @property int $iidprogreso
 * @property int $rutColaborador
 * @property int $iunidad1
 * @property int $iunidad2
 * @property int $iunidad3
 * @property int $iunidad4
 * @property int $iunidad5
 * @property int $iunidad6
 * @property int $iunidad7
 * @property int $iunidad8
 * @property int $iunidad9
 * @property int $iunidad10
 * @property int $iterminado
 * @property int $ichecklist
 *
 * @property Colaborador $rutColaborador0
 * @property Ichecklist $ichecklist0
 */
class Iprogreso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'iprogreso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutColaborador', 'ichecklist'], 'required'],
            [['rutColaborador', 'iunidad1', 'iunidad2', 'iunidad3', 'iunidad4', 'iunidad5', 'iunidad6', 'iunidad7', 'iunidad8', 'iunidad9', 'iunidad10', 'iterminado', 'ichecklist'], 'integer'],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
            [['ichecklist'], 'exist', 'skipOnError' => true, 'targetClass' => Ichecklist::className(), 'targetAttribute' => ['ichecklist' => 'iidchecklist']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iidprogreso' => 'Iidprogreso',
            'rutColaborador' => 'Rut Colaborador',
            'iunidad1' => 'Iunidad1',
            'iunidad2' => 'Iunidad2',
            'iunidad3' => 'Iunidad3',
            'iunidad4' => 'Iunidad4',
            'iunidad5' => 'Iunidad5',
            'iunidad6' => 'Iunidad6',
            'iunidad7' => 'Iunidad7',
            'iunidad8' => 'Iunidad8',
            'iunidad9' => 'Iunidad9',
            'iunidad10' => 'Iunidad10',
            'iterminado' => 'Iterminado',
            'ichecklist' => 'Ichecklist',
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
    public function getIchecklist0()
    {
        return $this->hasOne(Ichecklist::className(), ['iidchecklist' => 'ichecklist']);
    }
}
