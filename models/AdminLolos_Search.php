<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 17:06:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-09 23:16:06
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ValidasiDataSearchController represents the model behind the search form about `app\models\User`.
 */
class AdminLolos_Search extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at', 'pengumuman', 'menu'], 'integer'],
            [['no_peserta', 'nisn', 'nama', 'hp', 'tempat_lahir', 'tanggal_lahir', 'nama_sekolah', 'alamat_peserta', 'tingkat', 'panlok', 'jenis_pendaftaran', 'guru_pendamping', 'nip', 'username', 'auth_key', 'password_hash', 'password_reset_token', 'foto', 'validasi'], 'safe'],
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
    public function search($params, $pengumuman, $tingkat)
    {
        if ($pengumuman == 'all' && $tingkat == 'ADMIN') {
            $query = User::find()->where(['!=', 'tingkat' ,$tingkat])->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])
                ->andWhere(['status' => 10]);
        } elseif ($pengumuman == 'LOLOS') {
            $query = User::find()->where(['tingkat' => $tingkat])->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])
                ->andWhere(['status' => 10])->andWhere(['pengumuman' => 'LOLOS'])->orderBy('nama ASC');
        } elseif ($pengumuman <= 1) {
            $query = User::find()->where(['tingkat' => $tingkat])->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])
                ->andWhere(['status' => 10])->andWhere(['pengumuman' => 'LOLOS']);
        } elseif ($pengumuman >= 2) {
            $query = User::find()->where(['tingkat' => $tingkat])->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])
                ->andWhere(['status' => 10])->andWhere(['pengumuman' => 'TIDAK LOLOS']);
        } elseif ($pengumuman == '-') {
            $query = User::find()->where(['tingkat' => $tingkat])->andWhere(['!=', 'jenis_pendaftaran', '_OFFLINE'])
                ->andWhere(['status' => 10]);
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 500
            ],
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
            'tanggal_lahir' => $this->tanggal_lahir,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'pengumuman' => $this->pengumuman,
            'menu' => $this->menu,
        ]);

        $query->andFilterWhere(['like', 'no_peserta', $this->no_peserta])
            ->andFilterWhere(['like', 'nisn', $this->nisn])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'hp', $this->hp])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'nama_sekolah', $this->nama_sekolah])
            ->andFilterWhere(['like', 'alamat_peserta', $this->alamat_peserta])
            ->andFilterWhere(['like', 'tingkat', $this->tingkat])
            ->andFilterWhere(['like', 'panlok', $this->panlok])
            ->andFilterWhere(['like', 'jenis_pendaftaran', $this->jenis_pendaftaran])
            ->andFilterWhere(['like', 'guru_pendamping', $this->guru_pendamping])
            ->andFilterWhere(['like', 'nip', $this->nip])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'validasi', $this->validasi]);

        return $dataProvider;
    }
}
