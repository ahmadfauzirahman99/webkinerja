<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebEvents;

/**
 * WebEventsSearch represents the model behind the search form of `common\models\WebEvents`.
 */
class WebEventsSearch extends WebEvents
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['eventsID'], 'integer'],
            [['eventsJudul', 'eventsTanggalMulai', 'eventsTanggalSelesai', 'eventsLokasi', 'eventsKeterangan', 'eventsThumbnails', 'eventsStatus'], 'safe'],
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
        $query = WebEvents::find();

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
            'eventsID' => $this->eventsID,
            'eventsTanggalMulai' => $this->eventsTanggalMulai,
            'eventsTanggalSelesai' => $this->eventsTanggalSelesai,
        ]);

        $query->andFilterWhere(['like', 'eventsJudul', $this->eventsJudul])
            ->andFilterWhere(['like', 'eventsLokasi', $this->eventsLokasi])
            ->andFilterWhere(['like', 'eventsKeterangan', $this->eventsKeterangan])
            ->andFilterWhere(['like', 'eventsThumbnails', $this->eventsThumbnails])
            ->andFilterWhere(['like', 'eventsStatus', $this->eventsStatus]);

        return $dataProvider;
    }
}
