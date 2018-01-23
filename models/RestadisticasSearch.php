<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Restadisticas;

/**
 * RestadisticasSearch represents the model behind the search form of `app\models\Restadisticas`.
 */
class RestadisticasSearch extends Restadisticas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idestadisticas', 'rlikes', 'rcomentarios', 'rlikesr', 'rcomentariosr', 'rcontadorP'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Restadisticas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idestadisticas' => $this->idestadisticas,
            'rlikes' => $this->rlikes,
            'rcomentarios' => $this->rcomentarios,
            'rlikesr' => $this->rlikesr,
            'rcomentariosr' => $this->rcomentariosr,
            'rcontadorP' => $this->rcontadorP,
        ]);

        return $dataProvider;
    }
}
