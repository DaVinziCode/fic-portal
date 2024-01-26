<?php

use app\assets;
use app\assets\AppAsset;
use app\assets\JQueryEasingAsset;
use app\assets\LeafletAsset;
use yii\helpers\Html;

AppAsset::register($this);
$this->title = 'Customer Portal';
$iconPath = \yii\helpers\Url::home() . '@web/favicon.ico'; // Change the path accordingly

// Add the favicon link tag
echo Html::tag('link', '', [
    'rel' => 'icon',
    'type' => 'image/x-icon',
    // 'href' => $iconPath,
]);

JQueryEasingAsset::register($this);
// app\assets\LeafletAsset::register($this);

?>
<?= $this->render('sections/_header'); ?>
<?php
require('sections/_services.php');
?>
<?php
require('sections/_portfolio.php');
?>
<?php
require('sections/_equipment.php');
?>
<?php
require('inquiry.php');
?>


<?=
    $this->render('sections/_map');
?>
<?= $this->render('sections/_footer'); ?>