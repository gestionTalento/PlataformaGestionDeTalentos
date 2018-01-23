<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empresas;

/**
 * EmpresaSearch represents the model behind the search form of `app\models\Empresas`.
 */
class EmpresaSearch extends Empresas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutEmpresa'], 'integer'],
            [['nombreEmpresa', 'idescripcionEmpresa', 'iestadoEmpesa'], 'safe'],
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
        $query = Empresas::find();

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
            'rutEmpresa' => $this->rutEmpresa,
        ]);

        $query->andFilterWhere(['like', 'nombreEmpresa', $this->nombreEmpresa])
            ->andFilterWhere(['like', 'idescripcionEmpresa', $this->idescripcionEmpresa])
            ->andFilterWhere(['like', 'iestadoEmpesa', $this->iestadoEmpesa]);

        return $dataProvider;
    }
}
