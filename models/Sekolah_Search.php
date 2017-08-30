<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 17:06:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 18:34:45
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SekolahSearchController represents the model behind the search form about `app\models\Sekolah`.
 */
class Sekolah_Search extends Sekolah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tingkat', 'npsn', 'nama_sekolah', 'alamat_sekolah', 'panlok'], 'safe'],
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
        $query = Sekolah::find();

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
        ]);

        $query->andFilterWhere(['like', 'tingkat', $this->tingkat])
            ->andFilterWhere(['like', 'npsn', $this->npsn])
            ->andFilterWhere(['like', 'nama_sekolah', $this->nama_sekolah])
            ->andFilterWhere(['like', 'alamat_sekolah', $this->alamat_sekolah])
            ->andFilterWhere(['like', 'panlok', $this->panlok]);

        return $dataProvider;
    }
}
