<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 17:06:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-08 15:50:41
 */

namespace app\models;

use yii\base\Model;

class InputForm extends Model
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

    public function rules()
    {
        return [
            [['nisn', 'nama', 'hp', 'tempat_lahir', 'tanggal_lahir', 'alamat_peserta', 'tingkat', 'panlok', 'nama_sekolah'], 'required', 'message' => ''],
            [['hp', 'nip'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['hp'], 'string', 'min' => 5, 'max' => 25, 'message' => '5 - 25 karakter.'],
            [['nama', 'tempat_lahir', 'nama_sekolah', 'alamat_peserta', 'guru_pendamping', 'nip'], 'string', 'max' => 255, 'message' => 'Maksimum 255 karakter.'],
            ['nisn', 'trim'],
            ['nisn', 'unique', 'targetClass' => '\app\models\User', 'message' => 'NISN hanya dapat didaftarkan sekali.'],
            ['nisn', 'string', 'min' => 3, 'max' => 25, 'message' => '3 - 25 karakter.']
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $id     = (User::find()->max('id')) + 1;
        $no     = sprintf("%'04d", $id);
        $kode   = substr(date('md').$no, -7);
        
        $user                    = new User();
        $user->id                = $id;
        $user->username          = $this->nisn;
        $user->nisn              = $this->nisn;
        $user->nama              = ucwords($this->nama);
        $user->hp                = $this->hp;
        $user->tempat_lahir      = ucwords($this->tempat_lahir);
        $user->tanggal_lahir     = $this->tanggal_lahir;
        $user->alamat_peserta    = strtoupper($this->alamat_peserta);
        $user->nama_sekolah      = $this->nama_sekolah;
        $user->panlok            = $this->panlok;
        $user->guru_pendamping   = ucwords($this->guru_pendamping);
        $user->nip               = $this->nip;
        $user->tingkat           = $this->tingkat;
        $user->foto              = 'null.png';
        $user->jenis_pendaftaran = '_OFFLINE';
        $user->status            = 10;

        if ($this->tingkat == 'MENENGAH ATAS' && $this->panlok == 'KEDU')
            {$user->no_peserta = 'A1-' . $kode;}
        if ($this->tingkat == 'MENENGAH PERTAMA' && $this->panlok == 'KEDU')
            {$user->no_peserta = 'P1-' . $kode;}
        if ($this->tingkat == 'MENENGAH ATAS' && $this->panlok == 'PATI')
            {$user->no_peserta = 'A2-' . $kode;}
        if ($this->tingkat == 'MENENGAH PERTAMA' && $this->panlok == 'PATI')
            {$user->no_peserta = 'P2-' . $kode;}
        if ($this->tingkat == 'MENENGAH ATAS' && $this->panlok == 'PEKALONGAN')
            {$user->no_peserta = 'A3-' . $kode;}
        if ($this->tingkat == 'MENENGAH PERTAMA' && $this->panlok == 'PEKALONGAN')
            {$user->no_peserta = 'P3-' . $kode;}
        if ($this->tingkat == 'MENENGAH ATAS' && $this->panlok == 'PURWOKERTO')
            {$user->no_peserta = 'A4-' . $kode;}
        if ($this->tingkat == 'MENENGAH PERTAMA' && $this->panlok == 'PURWOKERTO')
            {$user->no_peserta = 'P4-' . $kode;}
        if ($this->tingkat == 'MENENGAH ATAS' && $this->panlok == 'SEMARANG')
            {$user->no_peserta = 'A5-' . $kode;}
        if ($this->tingkat == 'MENENGAH PERTAMA' && $this->panlok == 'SEMARANG')
            {$user->no_peserta = 'P5-' . $kode;}
        if ($this->tingkat == 'MENENGAH ATAS' && $this->panlok == 'SURAKARTA')
            {$user->no_peserta = 'A6-' . $kode;}
        if ($this->tingkat == 'MENENGAH PERTAMA' && $this->panlok == 'SURAKARTA')
            {$user->no_peserta = 'P6-' . $kode;}
        if ($this->tingkat == 'MENENGAH ATAS' && $this->panlok == 'YOGYAKARTA')
            {$user->no_peserta = 'A7-' . $kode;}
        if ($this->tingkat == 'MENENGAH PERTAMA' && $this->panlok == 'YOGYAKARTA')
            {$user->no_peserta = 'P7-' . $kode;}
        
        $user->setPassword(substr($kode, -4).substr($this->nisn, 1, 3).substr($this->nisn, 2, 3));
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
            'tingkat'         => '* JENJANG',
            'panlok'          => '* LOKASI LOMBA',
            'guru_pendamping' => 'NAMA GURU PENDAMPING',
            'nip'             => 'NIP GURU PENDAMPING'
        ];
    }
}