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
 * @property string $wfeedback
 * @property int $idDependencias
 * @property int $westadofeed
 *
 * @property Dependencia $dependencias
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
            [['westado', 'idDependencias', 'westadofeed'], 'integer'],
            [['idDependencias'], 'required'],
            [['wnombreTarea'], 'string', 'max' => 50],
            [['wdescripcion', 'wfeedback'], 'string', 'max' => 300],
            [['idDependencias'], 'exist', 'skipOnError' => true, 'targetClass' => Dependencia::className(), 'targetAttribute' => ['idDependencias' => 'idDependencias']],
        ];
    }

    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'widtarea' => 'Widtarea',
            'wnombreTarea' => 'Actividad',
            'wdescripcion' => 'Descripción',
            'wfechainicio' => 'Fecha Inicio',
            'wfechafin' => 'Fecha de Vencimiento',
            'westado' => 'Estado',
            'wfeedback' => 'Feedback',
            'idDependencias' => 'Id Dependencias',
            'westadofeed' => 'Estado Feedback',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDependencias()
    {
        return $this->hasOne(Dependencia::className(), ['idDependencias' => 'idDependencias']);
    }
}
