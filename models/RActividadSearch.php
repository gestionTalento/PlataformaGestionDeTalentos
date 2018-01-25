<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ractividad;

/**
 * RActividadSearch represents the model behind the search form of `app\models\Ractividad`.
 */
class RActividadSearch extends Ractividad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idactividad', 'rutColaborador1', 'rutColaborador2', 'ridpost', 'ridtipo_post'], 'integer'],
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
        $query = Ractividad::find();

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
            'idactividad' => $this->idactividad,
            'rutColaborador1' => $this->rutColaborador1,
            'rutColaborador2' => $this->rutColaborador2,
            'ridpost' => $this->ridpost,
            'ridtipo_post' => $this->ridtipo_post,
        ]);

        return $dataProvider;
    }
}
