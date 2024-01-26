<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CounterUpAsset extends AssetBundle
{
    public $sourcePath = '@npm/counterup';

    public $js = [
        'jquery.counterup.js'
    ];

    // public $depends = [
    //     WaypointsAsset::class
    // ];
}
