<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 17:06:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-10 22:36:11
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class OtsForm extends Model
{
    public $no_peserta;
    public $nisn;
    public $nama;
    public $hp;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $nama_sekolah;
    public $alamat_peserta;
    public $tingkat;
    public $panlok;
    public $guru_pendamping;
    public $nip;
    public $password;
    public $ulangi_password;

    public function rules()
    {
        return [
            [['no_peserta', 'nisn', 'nama', 'hp', 'tempat_lahir', 'tanggal_lahir', 'alamat_peserta', 'tingkat', 'panlok', 'nama_sekolah', 'password', 'ulangi_password'], 'required', 'message' => 'Wajib diisi'],
            [['nisn', 'hp', 'nip'], 'integer', 'message' => 'Hanya Angka.'],
            [['tanggal_lahir'], 'safe'],
            [['tanggal_lahir'], 'tidakMungkin'],
            [['no_peserta'], 'string', 'max' => 10],
            [['hp'], 'string', 'min' => 5, 'max' => 25, 'message' => '5 - 25 karakter.'],
            [['nama', 'tempat_lahir', 'nama_sekolah', 'alamat_peserta', 'guru_pendamping', 'nip'], 'string', 'max' => 255, 'message' => 'Maksimum 255 karakter.'],
            ['nisn', 'trim'],
            ['nisn', 'unique', 'targetClass' => '\app\models\User', 'message' => 'NISN sudah terdaftar.'],
            ['nisn', 'string', 'min' => 6, 'max' => 25, 'message' => '6 - 25 karakter.'],
            ['password', 'string', 'min' => 6, 'message' => 'Minimum 6 karakter.'],
            ['ulangi_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Harus sama dengan kata sandi.'],
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

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $id     = (User::find()->max('id')) + 1;
        $data   = Sekolah::findOne($this->panlok);

        $user                    = new User();
        $user->id                = $id;
        $user->no_peserta        = strtoupper($this->no_peserta);
        $user->username          = $this->nisn;
        $user->nisn              = $this->nisn;
        $user->nama              = ucwords(strtolower($this->nama));
        $user->hp                = $this->hp;
        $user->tempat_lahir      = ucwords(strtolower($this->tempat_lahir));
        $user->tanggal_lahir     = $this->tanggal_lahir;
        $user->alamat_peserta    = strtoupper($this->alamat_peserta);
        $user->nama_sekolah      = $data->nama_sekolah;
        $user->panlok            = $data->panlok;
        $user->guru_pendamping   = $this->guru_pendamping;
        $user->nip               = $this->nip;
        $user->tingkat           = $data->tingkat;
        $user->jenis_pendaftaran = 'OTS';
        $user->status            = 10;

        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->foto              = 'null.png';

        return $user->save() ? $user : null;
    }

    public function attributeLabels()
    {
        return [
            'no_peserta'      => '*NO PESERTA',
            'nisn'            => '* NISN',
            'nama'            => '* NAMA LENGKAP',
            'hp'              => '* NO. HP',
            'tempat_lahir'    => '* TEMPAT LAHIR',
            'tanggal_lahir'   => '* TANGGAL LAHIR',
            'nama_sekolah'    => '* SEKOLAH ASAL',
            'alamat_peserta'  => '* ALAMAT RUMAH',
            'tingkat'         => '* JENJANG',
            'panlok'          => '* LOKASI LOMBA',
            'guru_pendamping' => 'NAMA GURU PENDAMPING',
            'nip'             => 'NIP GURU PENDAMPING',
            'password'        => '* KATA SANDI',
            'ulangi_password' => '* ULANGI KATA SANDI',
        ];
    }
}
