<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class OwlCarouselAsset extends AssetBundle
{
    public $sourcePath = '@npm/owl-carousel/owl-carousel';

    public $css = [
        'owl.carousel.css',
        'owl.theme.css',
    ];

    public $js = [
        'owl.carousel.js'
    ];

    // public $depends = [
    //     // 'yii\web\YiiAsset',
    //     // 'yii\bootstrap4\BootstrapAsset',
    // ];
}
