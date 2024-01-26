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
class NivoLightboxAsset extends AssetBundle
{
    public $sourcePath = '@bower/nivo-lightbox/dist';
    public $css = [
        'nivo-lightbox.min.css',
    ];

    public $js = [
        'nivo-lightbox.min.js'
    ];

    public $depends = [
        // 'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset'
    ];
}
