<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JawabanPeserta;

/**
 * JawabanPesertaSearch represents the model behind the search form of `app\models\JawabanPeserta`.
 */
class JawabanPesertaSearch extends JawabanPeserta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_soal_ujian', 'id_peserta_test'], 'integer'],
            [['jawaban'], 'safe'],
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
        $query = JawabanPeserta::find();

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
            'id_soal_ujian' => $this->id_soal_ujian,
            'id_peserta_test' => $this->id_peserta_test,
        ]);

        $query->andFilterWhere(['like', 'jawaban', $this->jawaban]);

        return $dataProvider;
    }
}
