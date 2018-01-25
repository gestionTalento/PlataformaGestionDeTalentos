<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RPost;

/**
 * PostSearch represents the model behind the search form of `app\models\RPost`.
 */
class PostSearch extends RPost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ridPost', 'rtipoPost', 'rlikes', 'rcomentarios', 'rrotador', 'rut1', 'rut2'], 'integer'],
            [['rdescripcionPost', 'rfoto', 'rfecha', 'rnombreArchivo', 'grupo'], 'safe'],
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
        $query = RPost::find();

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
            'ridPost' => $this->ridPost,
            'rfecha' => $this->rfecha,
            'rtipoPost' => $this->rtipoPost,
            'rlikes' => $this->rlikes,
            'rcomentarios' => $this->rcomentarios,
            'rrotador' => $this->rrotador,
            'rut1' => $this->rut1,
            'rut2' => $this->rut2,
        ]);

        $query->andFilterWhere(['like', 'rdescripcionPost', $this->rdescripcionPost])
            ->andFilterWhere(['like', 'rfoto', $this->rfoto])
            ->andFilterWhere(['like', 'rnombreArchivo', $this->rnombreArchivo])
            ->andFilterWhere(['like', 'grupo', $this->grupo]);

        return $dataProvider;
    }
}
