<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ddependencias".
 *
 * @property int $dIdDependencias
 * @property string $dEtapa
 * @property string $dComentario
 * @property string $dAcuerdo
 * @property int $Colaborador_RutColaborador
 * @property int $Colaborador_RutColaborador1
 *
 * @property Colaborador $colaboradorRutColaborador
 * @property Colaborador $colaboradorRutColaborador1
 * @property DevaluacionIntermedia[] $devaluacionIntermedia
 * @property Dplanaccion[] $dplanaccions
 */
class Ddependencias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ddependencias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Colaborador_RutColaborador', 'Colaborador_RutColaborador1'], 'required'],
            [['Colaborador_RutColaborador', 'Colaborador_RutColaborador1'], 'integer'],
            [['dEtapa'], 'string', 'max' => 50],
            [['dComentario'], 'string', 'max' => 250],
            [['dAcuerdo'], 'string', 'max' => 200],
            [['Colaborador_RutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['Colaborador_RutColaborador' => 'rutColaborador']],
            [['Colaborador_RutColaborador1'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['Colaborador_RutColaborador1' => 'rutColaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dIdDependencias' => 'D Id Dependencias',
            'dEtapa' => 'D Etapa',
            'dComentario' => 'D Comentario',
            'dAcuerdo' => 'D Acuerdo',
            'Colaborador_RutColaborador' => 'Colaborador  Rut Colaborador',
            'Colaborador_RutColaborador1' => 'Colaborador  Rut Colaborador1',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradorRutColaborador()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'Colaborador_RutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradorRutColaborador1()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'Colaborador_RutColaborador1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDevaluacionIntermedia()
    {
        return $this->hasMany(DevaluacionIntermedia::className(), ['rIdDependencias' => 'dIdDependencias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDplanaccions()
    {
        return $this->hasMany(Dplanaccion::className(), ['dIdDependencias' => 'dIdDependencias']);
    }
}
