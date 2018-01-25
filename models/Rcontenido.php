<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rcontenido".
 *
 * @property int $idcontenido
 * @property string $rdescripcion
 * @property string $rtitulo
 * @property string $rduracion
 * @property string $rlink
 * @property int $rtipo
 * @property string $rportada
 * @property int $rcomentarios
 *
 * @property Rcomentariocontenidos[] $rcomentariocontenidos
 * @property Rcomentarios $rcomentarios0
 */
class Rcontenido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rcontenido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rtipo', 'rcomentarios'], 'integer'],
            [['rdescripcion', 'rlink', 'rportada'], 'string', 'max' => 200],
            [['rtitulo'], 'string', 'max' => 100],
            [['rduracion'], 'string', 'max' => 45],
            [['rcomentarios'], 'exist', 'skipOnError' => true, 'targetClass' => Rcomentarios::className(), 'targetAttribute' => ['rcomentarios' => 'ridcomentarios']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcontenido' => 'Idcontenido',
            'rdescripcion' => 'Rdescripcion',
            'rtitulo' => 'Rtitulo',
            'rduracion' => 'Rduracion',
            'rlink' => 'Rlink',
            'rtipo' => 'Rtipo',
            'rportada' => 'Rportada',
            'rcomentarios' => 'Rcomentarios',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRcomentariocontenidos()
    {
        return $this->hasMany(Rcomentariocontenidos::className(), ['ridcontenido' => 'idcontenido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRcomentarios0()
    {
        return $this->hasOne(Rcomentarios::className(), ['ridcomentarios' => 'rcomentarios']);
    }
}
