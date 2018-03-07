<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebVenue;

/**
 * WebVenueSearch represents the model behind the search form of `common\models\WebVenue`.
 */
class WebVenueSearch extends WebVenue
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['venueID'], 'integer'],
            [['venueNama', 'venueStatus'], 'safe'],
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = WebVenue::find()->orderBy(['venueStatus'=>SORT_ASC]);

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
            'venueID' => $this->venueID,
        ]);

        $query->andFilterWhere(['like', 'venueNama', $this->venueNama])
            ->andFilterWhere(['like', 'venueStatus', $this->venueStatus]);

        return $dataProvider;
    }
}
