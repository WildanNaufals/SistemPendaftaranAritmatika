<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 17:06:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 18:34:52
 */

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sekolah}}".
 *
 * @property integer $id
 * @property string $tingkat
 * @property string $npsn
 * @property string $nama_sekolah
 * @property string $alamat_sekolah
 * @property string $panlok
 */
class Sekolah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sekolah}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tingkat', 'npsn', 'nama_sekolah'], 'required'],
            [['tingkat', 'panlok'], 'string', 'max' => 25],
            [['npsn', 'nama_sekolah', 'alamat_sekolah'], 'string', 'max' => 255],
            [['npsn'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tingkat' => 'Tingkat',
            'npsn' => 'Npsn',
            'nama_sekolah' => 'Nama Sekolah',
            'alamat_sekolah' => 'Alamat Sekolah',
            'panlok' => 'Panlok',
        ];
    }
}
