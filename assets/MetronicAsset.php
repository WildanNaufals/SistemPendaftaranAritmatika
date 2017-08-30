<?php

namespace app\assets;

use yii\web\AssetBundle;

class MetronicAsset extends AssetBundle
{
  public $sourcePath = '@app/themes/metronic/assets';
  public $js = [
        'global/plugins/jquery.min.js',
        'global/plugins/bootstrap/js/bootstrap.min.js',
        'global/plugins/js.cookie.min.js',
        'global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'global/plugins/jquery.blockui.min.js',
        'global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
        'global/plugins/moment.min.js',
        'global/plugins/bootstrap-daterangepicker/daterangepicker.min.js',
        'global/plugins/morris/morris.min.js',
        'global/plugins/morris/raphael-min.js',
        'global/plugins/counterup/jquery.waypoints.min.js',
        'global/plugins/counterup/jquery.counterup.min.js',
        'global/plugins/amcharts/amcharts/amcharts.js',
        'global/plugins/amcharts/amcharts/serial.js',
        'global/plugins/amcharts/amcharts/pie.js',
        'global/plugins/amcharts/amcharts/radar.js',
        'global/plugins/amcharts/amcharts/themes/light.js',
        'global/plugins/amcharts/amcharts/themes/patterns.js',
        'global/plugins/amcharts/amcharts/themes/chalk.js',
        'global/plugins/amcharts/ammap/ammap.js',
        'global/plugins/amcharts/ammap/maps/js/worldLow.js',
        'global/plugins/amcharts/amstockcharts/amstock.js',
        'global/plugins/fullcalendar/fullcalendar.min.js',
        'global/plugins/horizontal-timeline/horizontal-timeline.js',
        'global/plugins/flot/jquery.flot.min.js',
        'global/plugins/flot/jquery.flot.resize.min.js',
        'global/plugins/flot/jquery.flot.categories.min.js',
        'global/plugins/jquery-easypiechart/jquery.easypiechart.min.js',
        'global/plugins/jquery.sparkline.min.js',
        'global/plugins/jqvmap/jqvmap/jquery.vmap.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js',
        'global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js',
        'global/scripts/app.min.js',
        'pages/scripts/dashboard.min.js',
        'layouts/layout/scripts/layout.min.js',
        'layouts/layout/scripts/demo.min.js',
        'layouts/global/scripts/quick-sidebar.min.js',
        'layouts/global/scripts/quick-nav.min.js',
  ];
  public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
        'global/plugins/font-awesome/css/font-awesome.min.css',
        'global/plugins/simple-line-icons/simple-line-icons.min.css',
        'global/plugins/bootstrap/css/bootstrap.min.css',
        'global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
        'global/plugins/bootstrap-daterangepicker/daterangepicker.min.css',
        'global/plugins/morris/morris.css',
        'global/plugins/fullcalendar/fullcalendar.min.css',
        'global/plugins/jqvmap/jqvmap/jqvmap.css',
        'global/css/components.min.css',
        'global/css/plugins.min.css',
        'layouts/layout/css/layout.min.css',
        'layouts/layout/css/themes/darkblue.min.css',
        'layouts/layout/css/custom.min.css',
  ];
  public $depends = [
  ];
}
