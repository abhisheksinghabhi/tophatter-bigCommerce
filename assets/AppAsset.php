<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\modules\walmart\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
  
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'web/css/site.css',
        //'css/jquery.treeview.css',
        //'css/jquery-checktree.css',
        'frontend/modules/walmart/assets/css/creative.css',
        'frontend/modules/walmart/assets/css/jquery.datetimepicker.css',
        'frontend/modules/walmart/assets/css/site.css',
        'frontend/modules/walmart/assets/css/font-awesome.min.css',
        'frontend/modules/walmart/assets/css/jQuery-plugin-progressbar.css',
        'frontend/modules/walmart/assets/css/bootstrap-material-design.css',
        'frontend/modules/walmart/assets/css/bootstrap.css',
        'frontend/modules/walmart/assets/css/pie-chart.css',
        'frontend/modules/walmart/assets/css/owl.carousel.css',
        //'css/slick.css',
        //'css/slick-theme.css',
        'frontend/modules/walmart/assets/css/style.css',
        'frontend/modules/walmart/assets/css/introjs.css',
        'frontend/modules/walmart/assets/css/intro-themes/introjs-nazanin.css',
        'frontend/modules/walmart/assets/css/litebox.css',
        'frontend/modules/walmart/assets/css/jquery-ui.css',
        'frontend/modules/walmart/assets/css/jquery-ui-timepicker-addon.css',
        'frontend/modules/walmart/assets/css/alertify/alertify.css'
    ];
    public $js = [
        //'js/jquery.touchSwipe.min.js',
        //'js/jquery-1.10.2.min.js',
        //['js/jquery.js', ['position'=>1]],
        'frontend/modules/walmart/assets/js/bootstrap.min.js',
        'frontend/modules/walmart/assets/js/owl.carousel.js',
        'frontend/modules/walmart/assets/js/owl.carousel.min.js',
        //'js/jQuery-plugin-progressbar.js',
        'frontend/modules/walmart/assets/js/custom.js',
        //'js/slick.js',
        'frontend/modules/walmart/assets/js/intro.js',
        'frontend/modules/walmart/assets/js/pie-chart.js',
        //'js/images-loaded.min.js',
        //'js/litebox.min.js',
        //'js/alertify/alertify.js',
        'frontend/modules/walmart/assets/js/jquery-ui.js',
        'frontend/modules/walmart/assets/js/alertify/alertify.js',
        'frontend/modules/walmart/assets/js/jquery-ui-timepicker-addon.js',
        'frontend/modules/walmart/assets/js/moment.min.js',
        'frontend/modules/walmart/assets/js/combodate.js',
        'frontend/modules/walmart/assets/js/nicEdit.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
