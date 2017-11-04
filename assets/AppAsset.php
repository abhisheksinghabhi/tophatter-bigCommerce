<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\modules\tophatter\assets;

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
        'frontend/modules/tophatter/assets/css/creative.css',
        'frontend/modules/tophatter/assets/css/jquery.datetimepicker.css',
        'frontend/modules/tophatter/assets/css/site.css',
        'frontend/modules/tophatter/assets/css/font-awesome.min.css',
        'frontend/modules/tophatter/assets/css/jQuery-plugin-progressbar.css',
        'frontend/modules/tophatter/assets/css/bootstrap-material-design.css',
        'frontend/modules/tophatter/assets/css/bootstrap.css',
        'frontend/modules/tophatter/assets/css/pie-chart.css',
        'frontend/modules/tophatter/assets/css/owl.carousel.css',
        //'css/slick.css',
        //'css/slick-theme.css',
        'frontend/modules/tophatter/assets/css/style.css',
        'frontend/modules/tophatter/assets/css/introjs.css',
        'frontend/modules/tophatter/assets/css/intro-themes/introjs-nazanin.css',
        'frontend/modules/tophatter/assets/css/litebox.css',
        'frontend/modules/tophatter/assets/css/jquery-ui.css',
        'frontend/modules/tophatter/assets/css/jquery-ui-timepicker-addon.css',
        'frontend/modules/tophatter/assets/css/alertify/alertify.css'
    ];
    public $js = [
        //'js/jquery.touchSwipe.min.js',
        //'js/jquery-1.10.2.min.js',
        //['js/jquery.js', ['position'=>1]],
        'frontend/modules/tophatter/assets/js/bootstrap.min.js',
        'frontend/modules/tophatter/assets/js/owl.carousel.js',
        'frontend/modules/tophatter/assets/js/owl.carousel.min.js',
        //'js/jQuery-plugin-progressbar.js',
        'frontend/modules/tophatter/assets/js/custom.js',
        //'js/slick.js',
        'frontend/modules/tophatter/assets/js/intro.js',
        'frontend/modules/tophatter/assets/js/pie-chart.js',
        //'js/images-loaded.min.js',
        //'js/litebox.min.js',
        //'js/alertify/alertify.js',
        'frontend/modules/tophatter/assets/js/jquery-ui.js',
        'frontend/modules/tophatter/assets/js/alertify/alertify.js',
        'frontend/modules/tophatter/assets/js/jquery-ui-timepicker-addon.js',
        'frontend/modules/tophatter/assets/js/moment.min.js',
        'frontend/modules/tophatter/assets/js/combodate.js',
        'frontend/modules/tophatter/assets/js/nicEdit.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
