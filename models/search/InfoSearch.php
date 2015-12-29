<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Info;

/**
 * InfoSearch represents the model behind the search form about `app\models\Info`.
 */
class InfoSearch extends Info
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'images', 'facebook', 'fanpagefb', 'skype', 'email', 'phonenumber', 'andress', 'description', 'website'], 'safe'],
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
        $query = Info::find();

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
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'fanpagefb', $this->fanpagefb])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phonenumber', $this->phonenumber])
            ->andFilterWhere(['like', 'andress', $this->andress])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'website', $this->website]);

        return $dataProvider;
    }
}
