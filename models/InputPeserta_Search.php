<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 17:06:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 19:31:26
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class InputPeserta_Search extends User
{
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at', 'pengumuman', 'menu'], 'integer'],
            [['no_peserta', 'nisn', 'nama', 'hp', 'tempat_lahir', 'tanggal_lahir', 'nama_sekolah', 'alamat_peserta', 'tingkat', 'panlok', 'jenis_pendaftaran', 'guru_pendamping', 'nip', 'username', 'auth_key', 'password_hash', 'password_reset_token', 'foto', 'validasi'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function input($params, $panlok, $tingkat)
    {
        $query = User::find()->where(['tingkat' => $tingkat, 'panlok' => $panlok, 'status' => 10,
            'jenis_pendaftaran' => ['_OFFLINE', 'OFFLINE']]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        
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
