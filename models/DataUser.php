<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $no_peserta
 * @property string $nisn
 * @property string $nama
 * @property string $hp
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $nama_sekolah
 * @property string $alamat_peserta
 * @property string $tingkat
 * @property string $panlok
 * @property string $jenis_pendaftaran
 * @property string $guru_pendamping
 * @property string $nip
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $foto
 * @property string $pengumuman
 * @property string $validasi
 * @property integer $menu
 *
 * @property RefPembahasan[] $refPembahasans
 */
class DataUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_peserta', 'nisn', 'nama', 'hp', 'tempat_lahir', 'tanggal_lahir', 'alamat_peserta', 'tingkat', 'panlok', 'jenis_pendaftaran', 'username', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['hp', 'validasi'], 'string'],
            [['tanggal_lahir'], 'safe'],
            [['status', 'created_at', 'updated_at', 'menu'], 'integer'],
            [['no_peserta'], 'string', 'max' => 10],
            [['nisn', 'tingkat', 'panlok', 'jenis_pendaftaran', 'pengumuman'], 'string', 'max' => 25],
            [['nama', 'tempat_lahir', 'nama_sekolah', 'alamat_peserta', 'guru_pendamping', 'nip', 'username', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key', 'foto'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['no_peserta'], 'unique'],
            [['nisn'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_peserta' => 'No Peserta',
            'nisn' => 'Nisn',
            'nama' => 'Nama',
            'hp' => 'Hp',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'nama_sekolah' => 'Nama Sekolah',
            'alamat_peserta' => 'Alamat Peserta',
            'tingkat' => 'Tingkat',
            'panlok' => 'Panlok',
            'jenis_pendaftaran' => 'Jenis Pendaftaran',
            'guru_pendamping' => 'Guru Pendamping',
            'nip' => 'Nip',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'foto' => 'Foto',
            'pengumuman' => 'Pengumuman',
            'validasi' => 'Validasi',
            'menu' => 'Menu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefPembahasans()
    {
        return $this->hasMany(RefPembahasan::className(), ['no_peserta' => 'no_peserta']);
    }
}
