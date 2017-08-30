<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use app\models\Themes;

class Theme extends Component {

    public static function version() {
        echo '2.0';
    }

    public function isActive() {
        $theme = new Themes();
        $is_active = $theme->findOne([
            'app_name' => Yii::$app->name,
            'is_active' => 1
        ]);

        if ($is_active === null || $is_active->theme_path === '@app/views/layouts') {
            return false;
        }

        return $is_active->theme_path . '/main';
    }
}
