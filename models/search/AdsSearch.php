<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Adslinks;

/**
 * AdsSearch represents the model behind the search form about `app\models\Adslinks`.
 */
class AdsSearch extends Adslinks
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'view_count', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'title', 'images', 'url', 'location'], 'safe'],
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
        $query = Adslinks::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'view_count' => $this->view_count,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'location', $this->location]);

        return $dataProvider;
    }
}
