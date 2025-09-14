<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Applicants;

/**
 * ApplicantsSearch represents the model behind the search form of `common\models\Applicants`.
 */
class ApplicantsSearch extends Applicants
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vacancy_id', 'created_at', 'status'], 'integer'],
            [['full_name', 'phone', 'address', 'where_get_from', 'image'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Applicants::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'vacancy_id' => $this->vacancy_id,
            'created_at' => $this->created_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'where_get_from', $this->where_get_from])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
