<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vendor;

/**
 * VendorSearch represents the model behind the search form about `common\models\Vendor`.
 */
class VendorSearch extends Vendor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mobile', 'opt_mobileno'], 'integer'],
            [['date', 'shop_name', 'shop_address', 'time_from', 'time_to', 'shop_owner', 'description', 'email', 'opt_email', 'collected_by', 'webingeer_coupon'], 'safe'],
            [['map_location'], 'number'],
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
        $query = Vendor::find();

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
            'date' => $this->date,
            'time_from' => $this->time_from,
            'time_to' => $this->time_to,
            'mobile' => $this->mobile,
            'opt_mobileno' => $this->opt_mobileno,
            'map_location' => $this->map_location,
        ]);

        $query->andFilterWhere(['like', 'shop_name', $this->shop_name])
            ->andFilterWhere(['like', 'shop_address', $this->shop_address])
            ->andFilterWhere(['like', 'shop_owner', $this->shop_owner])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'opt_email', $this->opt_email])
            ->andFilterWhere(['like', 'collected_by', $this->collected_by])
            ->andFilterWhere(['like', 'webingeer_coupon', $this->webingeer_coupon]);

        return $dataProvider;
    }
}
