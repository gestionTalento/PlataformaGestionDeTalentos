<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wtarea".
 *
 * @property int $widtarea
 * @property string $wnombreTarea
 * @property string $wdescripcion
 * @property string $wfechainicio
 * @property string $wfechafin
 * @property int $westado
 * @property int $rutColaboradorRecibido
 * @property int $rutColaboradorJefe
 * @property string $wfeedback
 *
 * @property Colaborador $rutColaboradorRecibido0
 * @property Colaborador $rutColaboradorJefe0
 */
class Wtarea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wtarea';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wfechainicio', 'wfechafin'], 'safe'],
            [['westado', 'rutColaboradorRecibido', 'rutColaboradorJefe'], 'integer'],
            [['rutColaboradorRecibido', 'rutColaboradorJefe'], 'required'],
            [['wnombreTarea'], 'string', 'max' => 50],
            [['wdescripcion', 'wfeedback'], 'string', 'max' => 300],
            [['rutColaboradorRecibido'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaboradorRecibido' => 'rutColaborador']],
            [['rutColaboradorJefe'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaboradorJefe' => 'rutColaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'widtarea' => 'Widtarea',
            'wnombreTarea' => 'Wnombre Tarea',
            'wdescripcion' => 'Wdescripcion',
            'wfechainicio' => 'Wfechainicio',
            'wfechafin' => 'Wfechafin',
            'westado' => 'Westado',
            'rutColaboradorRecibido' => 'Rut Colaborador Recibido',
            'rutColaboradorJefe' => 'Rut Colaborador Jefe',
            'wfeedback' => 'Wfeedback',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaboradorRecibido0()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaboradorRecibido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaboradorJefe0()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaboradorJefe']);
    }
}
