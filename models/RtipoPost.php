<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rtipo_post".
 *
 * @property int $ridtipo_post
 * @property string $rnombreTipoPost
 * @property int $ridAmigos
 *
 * @property Rpost[] $rposts
 * @property Ramigos $ridAmigos0
 */
class RtipoPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rtipo_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ridAmigos'], 'required'],
            [['ridAmigos'], 'integer'],
            [['rnombreTipoPost'], 'string', 'max' => 100],
            [['ridAmigos'], 'exist', 'skipOnError' => true, 'targetClass' => Ramigos::className(), 'targetAttribute' => ['ridAmigos' => 'rIdAmigos']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ridtipo_post' => 'Ridtipo Post',
            'rnombreTipoPost' => 'Rnombre Tipo Post',
            'ridAmigos' => 'Rid Amigos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRposts()
    {
        return $this->hasMany(Rpost::className(), ['rtipoPost' => 'ridtipo_post']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRidAmigos0()
    {
        return $this->hasOne(Ramigos::className(), ['rIdAmigos' => 'ridAmigos']);
    }
}
