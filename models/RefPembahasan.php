<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ref_pembahasan}}".
 *
 * @property integer $id
 * @property string $no_peserta
 * @property integer $downloaded
 *
 * @property User $noPeserta
 */
class RefPembahasan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ref_pembahasan}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_peserta', 'downloaded'], 'required'],
            [['downloaded'], 'integer'],
            [['no_peserta'], 'string', 'max' => 10],
            [['no_peserta'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['no_peserta' => 'no_peserta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_peserta' => 'No Peserta',
            'downloaded' => 'Downloaded',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoPeserta()
    {
        return $this->hasOne(User::className(), ['no_peserta' => 'no_peserta']);
    }
}
