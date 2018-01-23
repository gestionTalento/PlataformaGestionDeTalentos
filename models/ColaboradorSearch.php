<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Colaborador;

/**
 * ColaboradorSearch represents the model behind the search form of `app\models\Colaborador`.
 */
class ColaboradorSearch extends Colaborador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutColaborador', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'westadoJefe', 'idperfil', 'idperfilRed', 'idestadisticas', 'idestado', 'idCC'], 'integer'],
            [['dvColaborador', 'pass', 'nombreColaborador', 'apellidosColaborador'], 'safe'],
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
        $query = Colaborador::find();

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
            'rutColaborador' => $this->rutColaborador,
            'idSucursal' => $this->idSucursal,
            'idArea' => $this->idArea,
            'idCargo' => $this->idCargo,
            'idRol' => $this->idRol,
            'idGerencia' => $this->idGerencia,
            'westadoJefe' => $this->westadoJefe,
            'idperfil' => $this->idperfil,
            'idperfilRed' => $this->idperfilRed,
            'idestadisticas' => $this->idestadisticas,
            'idestado' => $this->idestado,
            'idCC' => $this->idCC,
        ]);

        $query->andFilterWhere(['like', 'dvColaborador', $this->dvColaborador])
            ->andFilterWhere(['like', 'pass', $this->pass])
            ->andFilterWhere(['like', 'nombreColaborador', $this->nombreColaborador])
            ->andFilterWhere(['like', 'apellidosColaborador', $this->apellidosColaborador]);

        return $dataProvider;
    }
}
