<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 17:06:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 18:35:23
 */

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pengaturan}}".
 *
 * @property integer $id
 * @property string $judul
 * @property string $konten
 * @property string $status
 * @property string $bantuan
 */
class Pengaturan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pengaturan}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'konten', 'status', 'bantuan'], 'required'],
            [['konten', 'bantuan'], 'string'],
            [['judul', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'konten' => 'Konten',
            'status' => 'Status',
            'bantuan' => 'Bantuan',
        ];
    }
}
