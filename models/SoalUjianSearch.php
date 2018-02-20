<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SoalUjian;

/**
 * SoalUjianSearch represents the model behind the search form of `app\models\SoalUjian`.
 */
class SoalUjianSearch extends SoalUjian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_ujian'], 'integer'],
            [['soal'], 'safe'],
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
        $query = SoalUjian::find();

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
            'id_ujian' => $this->id_ujian,
        ]);

        $query->andFilterWhere(['like', 'soal', $this->soal]);

        return $dataProvider;
    }
}
