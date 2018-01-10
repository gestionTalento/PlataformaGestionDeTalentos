<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dcompetencias".
 *
 * @property int $dIdCompetencia
 * @property string $dNombreCompetencia
 * @property string $dDescripcionCompetencia
 * @property int $idRol
 *
 * @property Rol $rol
 * @property Dconductas[] $dconductas
 * @property Dplanes[] $dplanes
 */
class Dcompetencias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dcompetencias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idRol'], 'required'],
            [['idRol'], 'integer'],
            [['dNombreCompetencia'], 'string', 'max' => 200],
            [['dDescripcionCompetencia'], 'string', 'max' => 900],
            [['idRol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['idRol' => 'idRol']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dIdCompetencia' => 'D Id Competencia',
            'dNombreCompetencia' => 'D Nombre Competencia',
            'dDescripcionCompetencia' => 'D Descripcion Competencia',
            'idRol' => 'Id Rol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['idRol' => 'idRol']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDconductas()
    {
        return $this->hasMany(Dconductas::className(), ['dIdCompetencia' => 'dIdCompetencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDplanes()
    {
        return $this->hasMany(Dplanes::className(), ['dIdCompetencia' => 'dIdCompetencia']);
    }
}
