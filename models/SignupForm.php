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

class SignupForm extends Model
{
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
    public $foto;
    public $ulangi_password;

    public function rules()
    {
        return [
            [['nisn', 'nama', 'hp', 'tempat_lahir', 'tanggal_lahir', 'alamat_peserta', 'tingkat', 'panlok', 'nama_sekolah', 'foto', 'password', 'ulangi_password'], 'required', 'message' => 'Wajib diisi'],
            [['nisn', 'hp', 'nip'], 'integer', 'message' => 'Hanya Angka.'],
            [['tanggal_lahir'], 'safe'],
            [['tanggal_lahir'], 'tidakMungkin'],
            [['hp'], 'string', 'min' => 5, 'max' => 25, 'message' => '5 - 25 karakter.'],
            [['nama', 'tempat_lahir', 'nama_sekolah', 'alamat_peserta', 'guru_pendamping', 'nip'], 'string', 'max' => 255, 'message' => 'Maksimum 255 karakter.'],
            ['nisn', 'trim'],
            ['nisn', 'unique', 'targetClass' => '\app\models\User', 'message' => 'NISN sudah terdaftar.'],
            ['nisn', 'string', 'min' => 6, 'max' => 25, 'message' => '6 - 25 karakter.'],
            ['password', 'string', 'min' => 6, 'message' => 'Minimum 6 karakter.'],
            [['foto'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, jpeg, gif', 'maxSize' => 204800, 'tooBig' => 'Foto maksimal berukuran 200 KB'],
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

        $random = Yii::$app->getSecurity()->generateRandomString(10);
        $data   = Sekolah::findOne($this->panlok);
        $id     = (User::find()->max('id')) + 1;
        $no     = sprintf("%'05d", $id - 1400);
        $kode   = 'ON'.$no;

        $user                    = new User();
        $user->id                = $id;
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
        $user->jenis_pendaftaran = 'ONLINE';
        $user->status            = 0;

        if ($data->tingkat == 'MENENGAH ATAS' && $data->panlok == 'KEDU')
            {$user->no_peserta = 'A1-' . $kode;}
        if ($data->tingkat == 'MENENGAH PERTAMA' && $data->panlok == 'KEDU')
            {$user->no_peserta = 'P1-' . $kode;}
        if ($data->tingkat == 'MENENGAH ATAS' && $data->panlok == 'PATI')
            {$user->no_peserta = 'A2-' . $kode;}
        if ($data->tingkat == 'MENENGAH PERTAMA' && $data->panlok == 'PATI')
            {$user->no_peserta = 'P2-' . $kode;}
        if ($data->tingkat == 'MENENGAH ATAS' && $data->panlok == 'PEKALONGAN')
            {$user->no_peserta = 'A3-' . $kode;}
        if ($data->tingkat == 'MENENGAH PERTAMA' && $data->panlok == 'PEKALONGAN')
            {$user->no_peserta = 'P3-' . $kode;}
        if ($data->tingkat == 'MENENGAH ATAS' && $data->panlok == 'PURWOKERTO')
            {$user->no_peserta = 'A4-' . $kode;}
        if ($data->tingkat == 'MENENGAH PERTAMA' && $data->panlok == 'PURWOKERTO')
            {$user->no_peserta = 'P4-' . $kode;}
        if ($data->tingkat == 'MENENGAH ATAS' && $data->panlok == 'SEMARANG')
            {$user->no_peserta = 'A5-' . $kode;}
        if ($data->tingkat == 'MENENGAH PERTAMA' && $data->panlok == 'SEMARANG')
            {$user->no_peserta = 'P5-' . $kode;}
        if ($data->tingkat == 'MENENGAH ATAS' && $data->panlok == 'SURAKARTA')
            {$user->no_peserta = 'A6-' . $kode;}
        if ($data->tingkat == 'MENENGAH PERTAMA' && $data->panlok == 'SURAKARTA')
            {$user->no_peserta = 'P6-' . $kode;}
        if ($data->tingkat == 'MENENGAH ATAS' && $data->panlok == 'YOGYAKARTA')
            {$user->no_peserta = 'A7-' . $kode;}
        if ($data->tingkat == 'MENENGAH PERTAMA' && $data->panlok == 'YOGYAKARTA')
            {$user->no_peserta = 'P7-' . $kode;}


        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->foto                      = $kode . $random . '.' . $this->foto->extension;
        $this->foto->saveAs('img/user/' .  $kode . $random . '.' . $this->foto->extension);

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
            'tingkat'         => '* JENJANG',
            'panlok'          => '* LOKASI LOMBA',
            'guru_pendamping' => 'NAMA GURU PENDAMPING',
            'nip'             => 'NIP GURU PENDAMPING',
            'password'        => '* KATA SANDI',
            'ulangi_password' => '* ULANGI KATA SANDI',
            'foto'            => '* FOTO DIRI',
        ];
    }
}
