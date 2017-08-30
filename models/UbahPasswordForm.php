<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 17:06:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-09 00:22:40
 */

namespace app\models;

use Yii;
use yii\base\Model;

class UbahPasswordForm extends Model
{
    public $old;
    public $new;
    public $repeat;

    public function rules() {
        return [
            [['old', 'new', 'repeat'], 'required', 'message' => ''],            
            [['new', 'repeat'], 'string', 'min' => 6, 'message' => 'Minimum 6 karakter.'],
            ['old', 'findPasswords'],
            ['new', 'samePasswords'],
            ['repeat', 'compare', 'compareAttribute' => 'new', 'message' => 'Harus sama dengan kata sandi baru.'],
        ];
    }
       
    public function findPasswords($attribute, $params) {
        $user = User::findOne(Yii::$app->user->identity->id);
        $password = $user->password_hash;
        if (!Yii::$app->security->validatePassword($this->old, $password)) {
            $this->addError($attribute, 'Kata Sandi Lama Salah.');
        }
    }

    public function samePasswords($attribute, $params) {        
        $user = User::findOne(Yii::$app->user->identity->id);
        if ($this->old == $this->new) {
            $this->addError($attribute, 'Kata sandi baru tidak boleh sama dengan kata sandi lama.');
        }
    }

    public function change() {
        if (!$this->validate()) {
            return null;
        }
        $user = User::findOne(Yii::$app->user->identity->id);
        $user->setPassword($this->new);
        return $user->save() ? $user : null;
    }
   
    public function attributeLabels() {
        return [
            'old' => (Yii::$app->user->identity->jenis_pendaftaran == '_OFFLINE') ? '* KODE AKSES' : '* KATA SANDI LAMA',
            'new' => (Yii::$app->user->identity->jenis_pendaftaran == '_OFFLINE') ? '* KATA SANDI' : '* KATA SANDI BARU',
            'repeat' => (Yii::$app->user->identity->jenis_pendaftaran == '_OFFLINE') ? '* ULANGI KATA SANDI' : '* ULANGI KATA SANDI BARU',
        ];
    }
}