<?php

namespace app\assets;

use yii\web\AssetBundle;

class ModernAdminAsset extends AssetBundle {

    public $sourcePath = '@app/themes/modernadmin/assets';
    public $css = [
      'http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700',
      'plugins/pace-master/themes/blue/pace-theme-flash.css',
      'plugins/uniform/css/uniform.default.min.css',
      // 'plugins/bootstrap/css/bootstrap.min.css',
      // 'plugins/fontawesome/css/font-awesome.css',
      'plugins/line-icons/simple-line-icons.css',
      'plugins/waves/waves.min.css',
      'plugins/switchery/switchery.min.css',
      'plugins/3d-bold-navigation/css/style.css',
      'plugins/slidepushmenus/css/component.css',
      'plugins/weather-icons-master/css/weather-icons.min.css',
      'plugins/metrojs/MetroJs.min.css',
      // 'plugins/toastr/toastr.min.css',
      'plugins/jstree/themes/default/style.min.css',
      // Main
      'css/custom.min.css',
      'css/modern.min.css',
    ];
    public $js = [
        'plugins/3d-bold-navigation/js/modernizr.js',
        // 'plugins/jquery/jquery-2.1.4.min.js',
        'plugins/jquery-ui/jquery-ui.min.js',
        'plugins/pace-master/pace.min.js',
        'plugins/jquery-blockui/jquery.blockui.js',
        // 'plugins/bootstrap/js/bootstrap.min.js',
        'plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'plugins/switchery/switchery.min.js',
        'plugins/uniform/jquery.uniform.min.js',
        'plugins/classie/classie.js',
        'plugins/waves/waves.min.js',
        'plugins/3d-bold-navigation/js/main.js',

        'plugins/jstree/jstree.min.js',

        'plugins/waypoints/jquery.waypoints.min.js',
        'plugins/jquery-counterup/jquery.counterup.min.js',
        // 'plugins/toastr/toastr.min.js',
        'plugins/flot/jquery.flot.min.js',
        'plugins/flot/jquery.flot.time.min.js',
        'plugins/flot/jquery.flot.symbol.min.js',
        'plugins/flot/jquery.flot.resize.min.js',
        'plugins/flot/jquery.flot.tooltip.min.js',
        'plugins/curvedlines/curvedLines.js',
        'plugins/metrojs/MetroJs.min.js',
        'js/modern.min.js',

        'js/pages/dashboard.min.js',
        'js/pages/jstree.js',
        // 'js/pages/notifications.js',

        'js/custom.min.js',
    ];
    public $depends = [
        'rmrevin\yii\fontawesome\AssetBundle',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
