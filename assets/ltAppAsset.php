<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 22.04.2019
 * Time: 22:52
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class ltAppAsset extends AssetBundle
    /**
     * Main application asset bundle.
     *
     * @author Qiang Xue <qiang.xue@gmail.com>
     * @since 2.0
     */
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/html5shiv.js',
        'js/respond.min.js'
    ];
    public $jsOptions =[
        'condition' => 'lt IE 9',
        'position' => View::POS_HEAD
    ];
}