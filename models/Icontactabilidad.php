<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "icontactabilidad".
 *
 * @property int $iidcontactabilidad
 * @property int $imail
 * @property int $isms
 * @property int $iwhatsapp
 * @property int $imailc
 * @property int $ismsc
 * @property int $iwhatsappc
 * @property int $rutColaborador
 * @property int $iidEtapa
 *
 * @property Colaborador $rutColaborador0
 * @property Ietapas $iidEtapa0
 */
class Icontactabilidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'icontactabilidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imail', 'isms', 'iwhatsapp', 'imailc', 'ismsc', 'iwhatsappc', 'rutColaborador', 'iidEtapa'], 'integer'],
            [['rutColaborador', 'iidEtapa'], 'required'],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
            [['iidEtapa'], 'exist', 'skipOnError' => true, 'targetClass' => Ietapas::className(), 'targetAttribute' => ['iidEtapa' => 'iidEtapas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iidcontactabilidad' => 'Iidcontactabilidad',
            'imail' => 'Imail',
            'isms' => 'Isms',
            'iwhatsapp' => 'Iwhatsapp',
            'imailc' => 'Imailc',
            'ismsc' => 'Ismsc',
            'iwhatsappc' => 'Iwhatsappc',
            'rutColaborador' => 'Rut Colaborador',
            'iidEtapa' => 'Iid Etapa',
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
    public function getIidEtapa0()
    {
        return $this->hasOne(Ietapas::className(), ['iidEtapas' => 'iidEtapa']);
    }
}
