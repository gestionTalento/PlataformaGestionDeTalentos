<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modulos".
 *
 * @property int $idmodulos
 * @property int $redSocial
 * @property int $desempenio
 * @property int $induccion
 * @property int $beneficio
 * @property int $aprendizaje
 * @property int $wellness
 * @property int $rutEmpresa
 *
 * @property Empresas $rutEmpresa0
 */
class Modulos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modulos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['redSocial', 'desempenio', 'induccion', 'beneficio', 'aprendizaje', 'wellness', 'rutEmpresa'], 'integer'],
            [['rutEmpresa'], 'required'],
            [['rutEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresas::className(), 'targetAttribute' => ['rutEmpresa' => 'rutEmpresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmodulos' => 'Idmodulos',
            'redSocial' => 'Red Social',
            'desempenio' => 'Desempenio',
            'induccion' => 'Induccion',
            'beneficio' => 'Beneficio',
            'aprendizaje' => 'Aprendizaje',
            'wellness' => 'Wellness',
            'rutEmpresa' => 'Rut Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutEmpresa0()
    {
        return $this->hasOne(Empresas::className(), ['rutEmpresa' => 'rutEmpresa']);
    }
}
