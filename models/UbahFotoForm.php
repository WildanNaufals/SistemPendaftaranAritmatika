<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 17:06:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 18:34:16
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UbahFotoForm extends Model
{
    public $foto;

    public function rules()
    {
        return [
            [['foto'], 'required', 'message' => ''],
            [['foto'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, jpeg, gif', 'maxSize' => 204800, 'tooBig' => 'Foto maksimal berukuran 200 KB'],
        ];
    }

    public function foto($id)
    {
        if (!$this->validate()) {
            return null;
        }

        $user     = User::findOne($id);
        $file     = $user->foto;
        
        if ($file == 'null.png') {
            $random = Yii::$app->getSecurity()->generateRandomString(10);
            $kode   = substr(date('md') . substr($user->no_peserta, -4), -7);
            $img    = $kode . $random;
        } else {
            $path = pathinfo($file);
            $img  = $path['filename'];
            unlink('img/user/' . $file);
        }

        $user->foto = $img . '.' . $this->foto->extension;
        $this->foto->saveAs('img/user/' . $img . '.' . $this->foto->extension);

        return $user->save();
    }

    public function attributeLabels()
    {
        return [
            'foto'            => '* UBAH FOTO DIRI',
        ];
    }
}