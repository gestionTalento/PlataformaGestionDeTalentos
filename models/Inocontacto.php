<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inocontacto".
 *
 * @property int $iidnocontacto
 * @property string $imotivo
 * @property string $ifecha
 * @property int $rutColaborador
 * @property int $iidEtapa
 *
 * @property Colaborador $rutColaborador0
 */
class Inocontacto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inocontacto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ifecha'], 'safe'],
            [['rutColaborador', 'iidEtapa'], 'required'],
            [['rutColaborador', 'iidEtapa'], 'integer'],
            [['imotivo'], 'string', 'max' => 200],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iidnocontacto' => 'Iidnocontacto',
            'imotivo' => 'Imotivo',
            'ifecha' => 'Ifecha',
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
}
