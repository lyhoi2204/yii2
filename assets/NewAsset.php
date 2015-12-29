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
class NewAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/css/superfish.css',
        'frontend/css/fontello/fontello.css',
        'frontend/css/flexslider.css',
        'frontend/css/ui.css',
        'frontend/css/base.css',
        'frontend/css/style.css',
        'frontend/css/960.css',
        'frontend/css/devices/1000.css',
        'frontend/css/devices/767.css',
        'frontend/css/devices/479.css',
        '//fonts.googleapis.com/css?family=Merriweather+Sans:400,300,700,800',
    ];
    public $js = [
        'frontend/js/jquery.js',
        'frontend/js/easing.min.js',
        'frontend/js/1.8.2.min.js',
        'frontend/js/ui.js',
        'frontend/js/carouFredSel.js',
        'frontend/js/superfish.js',
        'frontend/js/customM.js',
        'frontend/js/flexslider-min.js',
        'frontend/js/jtwt.min.js',
        'frontend/js/jflickrfeed.min.js',
        'frontend/js/mobilemenu.js',
        'frontend/js/mypassion.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
