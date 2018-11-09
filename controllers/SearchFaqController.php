<?php

namespace wscvua\faq\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use wscvua\faq\models\Faq;

/**
 * SearchFaqController represents the model behind the search form of `common\module\faq\models\Faq`.
 */
class SearchFaqController extends Faq
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'position', 'active'], 'integer'],
            [['lang', 'ask', 'answer'], 'safe'],
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
        $query = Faq::find();

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
            'id' => $this->id,
            'position' => $this->position,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'lang', $this->lang])
            ->andFilterWhere(['like', 'ask', $this->ask])
            ->andFilterWhere(['like', 'answer', $this->answer]);

        return $dataProvider;
    }
}
