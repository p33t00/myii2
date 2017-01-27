<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Departments;

/**
 * DepartmentsSearch represents the model behind the search form about `backend\models\Departments`.
 */
class DepartmentsSearch extends Departments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        // For search by branch_name, need to place "branch_id" from [...,integer] to [..., safe]
        return [
            [['dept_id', 'company_id', 'dept_status'], 'integer'],
            [['branch_id', 'dept_name', 'dept_created_date'], 'safe'],
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
        $query = Departments::find();

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

        // in order for search to join 2 model objects
        $query->joinWith('branch');

        // grid filtering conditions
        $query->andFilterWhere([
            'dept_id' => $this->dept_id,
//            'branch_id' => $this->branch_id,
//      replace with different filter
            'company_id' => $this->company_id,
            'dept_created_date' => $this->dept_created_date,
            'dept_status' => $this->dept_status,
        ]);

        $query->andFilterWhere(['like', 'dept_name', $this->dept_name]);

        //map 2 models to join properly
        $query->andFilterWhere(['like', 'branches.branch_name', $this->branch_id]);

        return $dataProvider;
    }
}
