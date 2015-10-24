<?php

/**
 * Этот файл является частью проекта Inely.
 *
 * @link http://github.com/hirootkit/inely
 *
 * @author hirootkit <admiralexo@gmail.com>
 */

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class HelpAsset extends AssetBundle
{
    public $basePath = '/';
    public $baseUrl  = '@backendUrl';

    public $css = [

        // Font CSS (Via CDN)
        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,cyrillic',

        // Theme CSS
        'css/skin/theme.css',
        'css/animate.css',
        'css/res/styles.css'
    ];

    public $js = [

        // Theme Javascript
        'js/utility.js',
        'js/main.js'

    ];

    public $jsOptions = ['position' => View::POS_END];

    public $depends   = [
        'yii\web\JqueryAsset',
        'common\assets\FontAwesome',
        'common\assets\BootstrapJsAsset'
    ];
}