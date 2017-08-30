<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use app\models\User;
use app\models\Assignment;
use app\models\Pengaturan;

class Akses extends Component {

    public static function isUser($item_name = null) {
        if (Yii::$app->user->isGuest) {
          return false;
        }

        $model = Assignment::findOne(['user_id' => Yii::$app->user->identity->id]);
        $model === null ? $_item_name = null : $_item_name = $model->item_name;
        return $_item_name === $item_name;
    }

    public static function getPengaturan($judul, $status) {
        $model = Pengaturan::findOne(['judul' => $judul, 'status' => $status]);
        return $model;
    }

    public function ukuran($bytes, $decimals = 2) {
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f ", $bytes / pow(1024, $factor)) . @$sz[$factor];
    }

    public function berita() {
        if (($model = Post::find()) !== null) {
            return $model;
        }
    }

    public function romawi($integer) {
        $integer = intval($integer);
        $result = '';
        $lookup = [
          'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
        ];

        foreach($lookup as $roman => $value){
            $matches = intval($integer/$value);
            $result .= str_repeat($roman,$matches);
            $integer = $integer % $value;
        }
        return $result;
    }
}
