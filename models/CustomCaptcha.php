<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-11 17:06:23
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-18 18:36:34
 */

namespace app\models;

use Yii;
use yii\base\Model;

class CustomCaptcha extends Model {

    public function captcha() {
        $text = [
          'ARIT',
          'MATIK',
          'ARITMATIK',
          'HIMMA',
          'VIP',
          'MATIKA',
          'FIND',
          'YOUR',
          'LOGIC',
          'DIKA',
          'XYZ',
          'KEREN',
          'LOMBA',
          '2017'
        ];
        $captcha = $text[rand(0, 13)];
        return $captcha;
    }
}
