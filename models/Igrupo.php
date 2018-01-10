<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "igrupo".
 *
 * @property int $iidGrupo
 * @property string $inombreCurso
 * @property string $icodigoSence
 * @property string $ifechaDiaSENCE
 * @property string $ifechaInicioSENCE
 * @property string $ifechaTerminoSENCE
 * @property string $ifechaInicioInduccion
 * @property string $iFechaTerminoInduccion
 * @property string $idescripcion
 * @property string $iruta
 * @property string $iidAccion
 *
 * @property Colaborador[] $colaboradors
 * @property IllamadasRealizadas[] $illamadasRealizadas
 * @property Irepetidos[] $irepetidos
 * @property Itelefonista[] $itelefonistas
 */
class Igrupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'igrupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ifechaDiaSENCE', 'ifechaInicioSENCE', 'ifechaTerminoSENCE', 'ifechaInicioInduccion', 'iFechaTerminoInduccion'], 'safe'],
            [['inombreCurso'], 'string', 'max' => 200],
            [['icodigoSence', 'iidAccion'], 'string', 'max' => 45],
            [['idescripcion'], 'string', 'max' => 100],
            [['iruta'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iidGrupo' => 'Iid Grupo',
            'inombreCurso' => 'Inombre Curso',
            'icodigoSence' => 'Icodigo Sence',
            'ifechaDiaSENCE' => 'Ifecha Dia Sence',
            'ifechaInicioSENCE' => 'Ifecha Inicio Sence',
            'ifechaTerminoSENCE' => 'Ifecha Termino Sence',
            'ifechaInicioInduccion' => 'Ifecha Inicio Induccion',
            'iFechaTerminoInduccion' => 'I Fecha Termino Induccion',
            'idescripcion' => 'Idescripcion',
            'iruta' => 'Iruta',
            'iidAccion' => 'Iid Accion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradors()
    {
        return $this->hasMany(Colaborador::className(), ['iidGrupo' => 'iidGrupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIllamadasRealizadas()
    {
        return $this->hasMany(IllamadasRealizadas::className(), ['iidGrupo' => 'iidGrupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrepetidos()
    {
        return $this->hasMany(Irepetidos::className(), ['iidgrupo' => 'iidGrupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItelefonistas()
    {
        return $this->hasMany(Itelefonista::className(), ['iidGrupo' => 'iidGrupo']);
    }
}
