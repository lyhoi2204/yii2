<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'admin/css/bootstrap.min.css',
        'admin/css/nifty.min.css',
        'admin/plugins/font-awesome/css/font-awesome.min.css',
        'admin/plugins/animate-css/animate.min.css',
        'admin/plugins/morris-js/morris.min.css',
        'admin/plugins/switchery/switchery.min.css',
        'admin/plugins/bootstrap-select/bootstrap-select.min.css',
        'admin/css/demo/nifty-demo.min.css',
        'admin/plugins/pace/pace.min.css',
        '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin',
        
    ];
    public $js = [
        'admin/plugins/pace/pace.min.js',
        //'admin/js/jquery-2.1.1.min.js',
        'admin/js/bootstrap.min.js',
        //'admin/plugins/fast-click/fastclick.min.js',
        'admin/js/nifty.min.js',
        'admin/plugins/morris-js/morris.min.js',
        'admin/plugins/morris-js/raphael-js/raphael.min.js',
        'admin/plugins/sparkline/jquery.sparkline.min.js',
        'admin/plugins/skycons/skycons.min.js',
        'admin/plugins/switchery/switchery.min.js',
        'admin/plugins/bootstrap-select/bootstrap-select.min.js',
        'admin/js/demo/nifty-demo.min.js',
        'admin/js/demo/dashboard.js',
        
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
