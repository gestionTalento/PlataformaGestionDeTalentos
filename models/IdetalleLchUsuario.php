<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "idetalle_lch_usuario".
 *
 * @property int $iidAutoNumerico
 * @property int $iidAuto
 * @property int $irespuesta
 * @property int $rutColaborador
 * @property int $iidDetalle
 * @property int $iidLCH
 *
 * @property Colaborador $rutColaborador0
 * @property Idetallelch $iidDetalle0
 */
class IdetalleLchUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'idetalle_lch_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iidAuto', 'rutColaborador', 'iidDetalle', 'iidLCH'], 'required'],
            [['iidAuto', 'irespuesta', 'rutColaborador', 'iidDetalle', 'iidLCH'], 'integer'],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
            [['iidDetalle', 'iidLCH'], 'exist', 'skipOnError' => true, 'targetClass' => Idetallelch::className(), 'targetAttribute' => ['iidDetalle' => 'iid', 'iidLCH' => 'iidLch']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iidAutoNumerico' => 'Iid Auto Numerico',
            'iidAuto' => 'Iid Auto',
            'irespuesta' => 'Irespuesta',
            'rutColaborador' => 'Rut Colaborador',
            'iidDetalle' => 'Iid Detalle',
            'iidLCH' => 'Iid Lch',
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
    public function getIidDetalle0()
    {
        return $this->hasOne(Idetallelch::className(), ['iid' => 'iidDetalle', 'iidLch' => 'iidLCH']);
    }
}
