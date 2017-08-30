<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 17:06:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-09 22:01:26
 */

namespace app\models;

use Yii;
use yii\base\Model;

class OfflineForm extends Model
{
    public $nisn;
    public $nama;
    public $hp;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $nama_sekolah;
    public $alamat_peserta;
    public $guru_pendamping;
    public $nip;
    // public $password;
    // public $ulangi_password;

    public function rules()
    {
        return [
            [['nisn', 'nama', 'hp', 'tempat_lahir', 'tanggal_lahir', 'alamat_peserta', 'nama_sekolah'], 'required', 'message' => 'Wajib Diisi'],
            [['hp', 'nip', 'nisn'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['tanggal_lahir'], 'tidakMungkin'],
            [['hp'], 'string', 'min' => 5, 'max' => 25, 'message' => '5 - 25 karakter.'],
            [['nama', 'tempat_lahir', 'nama_sekolah', 'alamat_peserta', 'guru_pendamping', 'nip'], 'string', 'max' => 255, 'message' => 'Maksimum 255 karakter.'],
            ['nisn', 'trim'],
            ['nisn', 'unique', 'targetClass' => '\app\models\User', 'message' => 'NISN sudah terdaftar.'],
            ['nisn', 'string', 'min' => 3, 'max' => 25, 'message' => '3 - 25 karakter.'],
            [['nisn'], 'string', 'min' => 6, 'message' => 'Minimum 6 karakter.'],
            // ['ulangi_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Harus sama dengan kata sandi.'],
        ];
    }

    public function tidakMungkin($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if ($this->tanggal_lahir >= date('2007-01-01') || $this->tanggal_lahir <= date('1990-01-01')) {
                $this->addError($attribute, 'Tanggal Lahir bermasalah.');
            }
        }
    }

    public function update()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = User::findOne(Yii::$app->user->identity->id);

        $user->username          = $this->nisn;
        $user->nisn              = $this->nisn;
        $user->nama              = ucwords(strtolower($this->nama));
        $user->hp                = $this->hp;
        $user->tempat_lahir      = ucwords(strtolower($this->tempat_lahir));
        $user->tanggal_lahir     = $this->tanggal_lahir;
        $user->alamat_peserta    = strtoupper($this->alamat_peserta);
        $user->nama_sekolah      = $this->nama_sekolah;
        $user->guru_pendamping   = $this->guru_pendamping;
        $user->nip               = $this->nip;
        $user->jenis_pendaftaran = 'OFFLINE';
        $user->validasi          = '# offline #';
        $user->created_at        = strtotime(date('Y-m-d H:i:s'));
        $user->updated_at        = strtotime(date('Y-m-d H:i:s'));

        // $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }

    public function attributeLabels()
    {
        return [
            'nisn'            => '* NISN',
            'nama'            => '* NAMA LENGKAP',
            'hp'              => '* NO. HP',
            'tempat_lahir'    => '* TEMPAT LAHIR',
            'tanggal_lahir'   => '* TANGGAL LAHIR',
            'nama_sekolah'    => '* SEKOLAH ASAL',
            'alamat_peserta'  => '* ALAMAT RUMAH',
            'guru_pendamping' => 'NAMA GURU PENDAMPING',
            'nip'             => 'NIP GURU PENDAMPING',
            // 'password'        => '* KATA SANDI',
            // 'ulangi_password' => '* ULANGI KATA SANDI',
        ];
    }
}
