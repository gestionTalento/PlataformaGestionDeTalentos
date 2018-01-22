<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dependencia".
 *
 * @property integer $idDependencias
 * @property integer $rutColaborador1
 * @property integer $rutColaborador2
 * @property integer $bHistorialPuntaje_idHistorial
 *
 * @property Basignacionesbeneficios[] $basignacionesbeneficios
 * @property Bhistorialpuntaje[] $bhistorialpuntajes
 * @property Bpuntajecolaborador $bpuntajecolaborador
 * @property Colaborador $rutColaborador10
 * @property Colaborador $rutColaborador20
 * @property Bhistorialpuntaje $bHistorialPuntajeIdHistorial
 * @property Rpost[] $rposts
 * @property Wtarea[] $wtareas
 */
class Dependencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dependencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutColaborador1', 'rutColaborador2', 'bHistorialPuntaje_idHistorial'], 'required'],
            [['rutColaborador1', 'rutColaborador2', 'bHistorialPuntaje_idHistorial'], 'integer'],
            [['rutColaborador1'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador1' => 'rutColaborador']],
            [['rutColaborador2'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador2' => 'rutColaborador']],
            [['bHistorialPuntaje_idHistorial'], 'exist', 'skipOnError' => true, 'targetClass' => Bhistorialpuntaje::className(), 'targetAttribute' => ['bHistorialPuntaje_idHistorial' => 'idHistorial']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDependencias' => 'Id Dependencias',
            'rutColaborador1' => 'Rut Colaborador1',
            'rutColaborador2' => 'Rut Colaborador2',
            'bHistorialPuntaje_idHistorial' => 'B Historial Puntaje Id Historial',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBasignacionesbeneficios()
    {
        return $this->hasMany(Basignacionesbeneficios::className(), ['idDependencias' => 'idDependencias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBhistorialpuntajes()
    {
        return $this->hasMany(Bhistorialpuntaje::className(), ['idDependencias' => 'idDependencias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBpuntajecolaborador()
    {
        return $this->hasOne(Bpuntajecolaborador::className(), ['idDependencias' => 'idDependencias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaborador10()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaborador1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaborador20()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaborador2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBHistorialPuntajeIdHistorial()
    {
        return $this->hasOne(Bhistorialpuntaje::className(), ['idHistorial' => 'bHistorialPuntaje_idHistorial']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRposts()
    {
        return $this->hasMany(Rpost::className(), ['idDependencias' => 'idDependencias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWtareas()
    {
        return $this->hasMany(Wtarea::className(), ['idDependencias' => 'idDependencias']);
    }
}
