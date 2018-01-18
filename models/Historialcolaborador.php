<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historialcolaborador".
 *
 * @property int $idhistorialColaborador
 * @property int $rutColaborador
 * @property string $fecha
 * @property string $valorAntiguo
 * @property string $valorNuevo
 * @property int $idtipoCambio
 *
 * @property Colaborador $rutColaborador0
 * @property Tipocambio $tipoCambio
 */
class Historialcolaborador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'historialcolaborador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idhistorialColaborador', 'rutColaborador', 'idtipoCambio'], 'required'],
            [['idhistorialColaborador', 'rutColaborador', 'idtipoCambio'], 'integer'],
            [['fecha'], 'safe'],
            [['valorAntiguo', 'valorNuevo'], 'string', 'max' => 200],
            [['idhistorialColaborador', 'rutColaborador', 'idtipoCambio'], 'unique', 'targetAttribute' => ['idhistorialColaborador', 'rutColaborador', 'idtipoCambio']],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
            [['idtipoCambio'], 'exist', 'skipOnError' => true, 'targetClass' => Tipocambio::className(), 'targetAttribute' => ['idtipoCambio' => 'idtipoCambio']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idhistorialColaborador' => 'Idhistorial Colaborador',
            'rutColaborador' => 'Rut Colaborador',
            'fecha' => 'Fecha',
            'valorAntiguo' => 'Valor Antiguo',
            'valorNuevo' => 'Valor Nuevo',
            'idtipoCambio' => 'Idtipo Cambio',
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
    public function getTipoCambio()
    {
        return $this->hasOne(Tipocambio::className(), ['idtipoCambio' => 'idtipoCambio']);
    }
}
