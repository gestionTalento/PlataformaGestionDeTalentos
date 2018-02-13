<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rperfilredsocial".
 *
 * @property int $idperfilRed
 * @property string $rfoto
 * @property string $rportada
 * @property string $rbio
 * @property int $rrotador
 * @property int $restado
 *
 * @property Colaborador[] $colaboradors
 */
class Rperfilredsocial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
        public $file;
    public static function tableName()
    {
        return 'rperfilredsocial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rrotador', 'restado'], 'integer'],
            [['rfoto', 'rportada'], 'string', 'max' => 200],
            [['file'], 'file', 'maxSize' => 8120000, 'tooBig' => 'excede el limite, 8 MB Aprox', 'extensions' => 'png, jpg'],
            [['rbio'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idperfilRed' => 'Idperfil Red',
            'rfoto' => 'Foto de Perfil',
            'rportada' => 'Rportada',
            'rbio' => 'Biografía',
            'rrotador' => 'Rrotador',
            'restado' => 'Restado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradors()
    {
        return $this->hasMany(Colaborador::className(), ['idperfilRed' => 'idperfilRed']);
    }
}
