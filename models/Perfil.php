<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property int $idperfil
 * @property string $nombre
 * @property string $descripcion
 *
 * @property Colaborador[] $colaboradors
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idperfil'], 'required'],
            [['idperfil'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 200],
            [['idperfil'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idperfil' => 'Idperfil',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradors()
    {
        return $this->hasMany(Colaborador::className(), ['idperfil' => 'idperfil']);
    }
}
