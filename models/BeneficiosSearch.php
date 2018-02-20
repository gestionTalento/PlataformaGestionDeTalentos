<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bbeneficios;

/**
 * BeneficiosSearch represents the model behind the search form of `app\models\Bbeneficios`.
 */
class BeneficiosSearch extends Bbeneficios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bId_Beneficio'], 'integer'],
            [['bNombre', 'bDescripcion', 'bTipoBeneficio', 'bimagen'], 'safe'],
            [['bValorBeneficio', 'bvalorhora', 'bvezporanio', 'bvezpormes'], 'number'],
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
        $query = Bbeneficios::find();

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
            'bId_Beneficio' => $this->bId_Beneficio,
            'bValorBeneficio' => $this->bValorBeneficio,
            'bvalorhora' => $this->bvalorhora,
            'bvezporanio' => $this->bvezporanio,
            'bvezpormes' => $this->bvezpormes,
        ]);

        $query->andFilterWhere(['like', 'bNombre', $this->bNombre])
            ->andFilterWhere(['like', 'bDescripcion', $this->bDescripcion])
            ->andFilterWhere(['like', 'bTipoBeneficio', $this->bTipoBeneficio])
            ->andFilterWhere(['like', 'bimagen', $this->bimagen]);

        return $dataProvider;
    }
}
