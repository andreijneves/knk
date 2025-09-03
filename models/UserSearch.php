<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['use_id'], 'integer'],
            [['use_email', 'use_pass', 'use_nome', 'use_tipo', 'use_telefone'], 'safe'],
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
        $query = User::find();

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
            'use_id' => $this->use_id,
        ]);

        $query->andFilterWhere(['like', 'use_email', $this->use_email])
            ->andFilterWhere(['like', 'use_pass', $this->use_pass])
            ->andFilterWhere(['like', 'use_nome', $this->use_nome])
            ->andFilterWhere(['like', 'use_tipo', $this->use_tipo])
            ->andFilterWhere(['like', 'use_telefone', $this->use_telefone]);

        return $dataProvider;
    }
}
