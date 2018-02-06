<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\wtarea;
use app\controllers\BuscarController;
/**
 * TareasSearch represents the model behind the search form of `app\models\wtarea`.
 */
class TareasSearch extends wtarea
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['widtarea', 'westado', 'idDependencias', 'westadofeed'], 'integer'],
            [['wnombreTarea', 'wdescripcion', 'wfechainicio', 'wfechafin', 'wfeedback'], 'safe'],
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
        $query = wtarea::find();

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
            'widtarea' => $this->widtarea,
            'wfechainicio' => $this->wfechainicio,
            'wfechafin' => $this->wfechafin,
            'westado' => $this->westado,
            'idDependencias' => $this->idDependencias,
            'westadofeed' => $this->westadofeed,
        ]);

        $query->andFilterWhere(['like', 'wnombreTarea', $this->wnombreTarea])
            ->andFilterWhere(['like', 'wdescripcion', $this->wdescripcion])
            ->andFilterWhere(['like', 'wfeedback', $this->wfeedback]);

        return $dataProvider;
    }
}
