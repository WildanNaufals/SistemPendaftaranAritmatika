<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%themes}}".
 *
 * @property integer $id
 * @property string $app_name
 * @property string $theme_name
 * @property string $theme_path
 * @property integer $is_active
 */
class Themes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%themes}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['app_name', 'theme_name', 'theme_path'], 'required'],
            [['is_active'], 'integer'],
            [['app_name', 'theme_name', 'theme_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'app_name' => 'App Name',
            'theme_name' => 'Theme Name',
            'theme_path' => 'Theme Path',
            'is_active' => 'Is Active',
        ];
    }
}
