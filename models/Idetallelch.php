<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "idetallelch".
 *
 * @property int $iid
 * @property string $iitem
 * @property int $irespuesta
 * @property string $iresponsable
 * @property int $iidLch
 *
 * @property IdetalleLchUsuario[] $etalleLchUsuarios
 * @property Ilch $iidLch0
 */
class Idetallelch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'idetallelch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['irespuesta', 'iidLch'], 'integer'],
            [['iidLch'], 'required'],
            [['iitem', 'iresponsable'], 'string', 'max' => 100],
            [['iidLch'], 'exist', 'skipOnError' => true, 'targetClass' => Ilch::className(), 'targetAttribute' => ['iidLch' => 'iidLCH']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iid' => 'Iid',
            'iitem' => 'Iitem',
            'irespuesta' => 'Irespuesta',
            'iresponsable' => 'Iresponsable',
            'iidLch' => 'Iid Lch',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtalleLchUsuarios()
    {
        return $this->hasMany(IdetalleLchUsuario::className(), ['iidDetalle' => 'iid', 'iidLCH' => 'iidLch']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIidLch0()
    {
        return $this->hasOne(Ilch::className(), ['iidLCH' => 'iidLch']);
    }
}
