<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dplanaccion".
 *
 * @property int $dIdPlanAccion
 * @property int $dIdDependencias
 *
 * @property Ddependencias $dIdDependencias0
 * @property Dplanes[] $dplanes
 */
class Dplanaccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dplanaccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dIdDependencias'], 'required'],
            [['dIdDependencias'], 'integer'],
            [['dIdDependencias'], 'exist', 'skipOnError' => true, 'targetClass' => Ddependencias::className(), 'targetAttribute' => ['dIdDependencias' => 'dIdDependencias']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dIdPlanAccion' => 'D Id Plan Accion',
            'dIdDependencias' => 'D Id Dependencias',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDIdDependencias0()
    {
        return $this->hasOne(Ddependencias::className(), ['dIdDependencias' => 'dIdDependencias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDplanes()
    {
        return $this->hasMany(Dplanes::className(), ['dIdPlanAccion' => 'dIdPlanAccion']);
    }
}
