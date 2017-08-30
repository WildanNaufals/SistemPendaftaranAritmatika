<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-04 18:13:52
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 18:33:12
 */

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE  = 10;

    public static function tableName()
    {
        return '{{%user}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function findByNama($nama)
    {
        return static::findOne(['nama' => $nama, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByNamaSekolah($nama_sekolah)
    {
        return static::findOne(['nama_sekolah' => $nama_sekolah, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByFoto($foto)
    {
        return static::findOne(['foto' => $foto, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByNoPeserta($no_peserta)
    {
        return static::findOne(['no_peserta' => $no_peserta, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByTingkat($tingkat)
    {
        return static::findOne(['tingkat' => $tingkat, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByPengumuman($pengumuman)
    {
        return static::findOne(['pengumuman' => $pengumuman, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByNisn($nisn)
    {
        return static::findOne(['nisn' => $nisn, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByCreatedAt($created_at)
    {
        return static::findOne(['created_at' => $created_at, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByMenu($menu)
    {
        return static::findOne(['menu' => $menu, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByJenisPendaftaran($jenis_pendaftaran)
    {
        return static::findOne(['jenis_pendaftaran' => $jenis_pendaftaran, 'status' => self::STATUS_ACTIVE]);
    }
}
