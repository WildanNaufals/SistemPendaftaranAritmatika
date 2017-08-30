<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%faq}}".
 *
 * @property integer $id
 * @property string $pertanyaan
 * @property string $jawaban
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $view
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faq}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pertanyaan', 'jawaban', 'created_at', 'updated_at', 'view'], 'required'],
            [['jawaban'], 'string'],
            [['created_at', 'updated_at', 'view'], 'integer'],
            [['pertanyaan'], 'string', 'max' => 255],
            [['pertanyaan'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pertanyaan' => 'Pertanyaan',
            'jawaban' => 'Jawaban',
            'created_at' => 'Dibuat',
            'updated_at' => 'Diperbarui',
            'view' => 'Dilihat',
        ];
    }
}
