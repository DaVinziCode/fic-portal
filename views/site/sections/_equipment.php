<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Equipment;
use app\models\EquipmentComponent;

/* @var $this View */
/* @var $content string */

AppAsset::register($this); // Assuming you already have this line for your main assets

// Include Swiper.js CSS and JavaScript using CDN links
$this->registerCssFile('https://unpkg.com/swiper/swiper-bundle.min.css');
$this->registerCssFile('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
$this->registerJsFile('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js');
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js');
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
$this->registerJsFile('https://unpkg.com/swiper/swiper-bundle.min.js', [
    'depends' => [\yii\web\JqueryAsset::className()],
]);

$equipment = Equipment::find()->orderBy(['id' => SORT_ASC])->all();
$equipments = Equipment::find()->all();
$components = EquipmentComponent::find()->all();

$one = $two = $three = $four = $five = null; // Initialize the variables

foreach ($equipment as $index => $equipmentItem) {
    // Use $index to determine which variable to assign to
    switch ($index) {
        case 0:
            $one = $equipmentItem->id;
            $freeze = $equipmentItem->model;
            break;
        case 1:
            $two = $equipmentItem->id;
            $spray = $equipmentItem->model;
            break;
        case 2:
            $three = $equipmentItem->id;
            $water = $equipmentItem->model;
            break;
        case 3:
            $four = $equipmentItem->id;
            $vacuum = $equipmentItem->model;
            break;
        case 4:
            $five = $equipmentItem->id;
            $cabinet = $equipmentItem->model;
            break;
        default:
            // Handle additional items if needed
            break;
    }
}

// Now, $one, $two, $three, $four, and $five contain the IDs of the first five equipment items

?>
<style>
    .modal-toggle-button {
        /* position: absolute; */
        top: 0;
        left: 0;
        width: 100%;

        /* Cover the entire container width */
        height: 20%;
        /* Cover the entire container height */
        background: transparent;
        /* Make it transparent so it doesn't obscure the image */
        border: none;
        /* Remove any border or outline */
        cursor: pointer;
        /* Show a pointer cursor on hover if needed */
    }

    h5 {
        font-size: 15px;
    }

    fieldset {
        display: none;
    }

    fieldset.show {
        display: block;
    }

    figcaption {
        display: none;
    }

    figcaption.show {
        display: block;
    }

    article {
        display: none;
    }

    article.show {
        display: block;
    }

    legend {
        display: none;
    }

    legend.show {
        display: block;
    }

    figure {
        display: none;
    }

    figure.show {
        display: block;
    }

    select:focus,
    input:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #2196F3 !important;
        outline-width: 0 !important;
        font-weight: 400;
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0;
    }

    .tabs {
        margin: 2px 5px 0px 5px;
        padding-bottom: 10px;
        cursor: pointer;
    }

    .tabs:hover,
    .tabs.active {
        border-bottom: 1px solid #2196F3;
    }

    a:hover {
        text-decoration: none;
        color: #1565C0;
    }

    .box {
        margin-bottom: 10px;
        border-radius: 5px;
        padding: 10px;
    }


    .line {
        background-color: #CFD8DC;
        height: 1px;
        width: 100%;
    }

    /* body {
        height: 100%;
    } */
</style>

<section id="equipment" class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Equipment</h2>
            <!-- <span>Equipment</span> -->
            <p class="section-subtitle">DOST Food Processing Equipment</p>
        </div>


        <div class="swiper">
            <div class="swiper-wrapper" style="padding-bottom: 40px;">

                <div class="swiper-slide swiper-slide--one">
                    <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalFreeze" title="more details"></button>

                    <span type="button" data-toggle="modal" data-target="#myModalFreeze" class="btn btn-primary py-2 px-4" title="more details"><?= $freeze ?></span>

                    <div>
                        <h2>High Impact Technology Solution (HITS equipment)</h2>
                        <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalFreeze" title="more details"></button>
                    </div>
                </div>

                <div class="swiper-slide swiper-slide--two">
                    <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalSpray" title="more details"></button>
                    <span type="button" data-toggle="modal" data-target="#myModalSpray" class="btn btn-primary py-2 px-4" title="more details"><?= $spray ?></span>
                    <div>
                        <h2>High Impact Technology Solution (HITS equipment)</h2>
                        <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalSpray" title="more details"></button>

                    </div>
                </div>

                <div class="swiper-slide swiper-slide--three">
                    <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalWater" title="more details"></button>
                    <span type="button" data-toggle="modal" data-target="#myModalWater" class="btn btn-primary py-2 px-4" title="more details"><?= $water ?></span>
                    <div>
                        <h2>High Impact Technology Solution (HITS equipment)</h2>
                        <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalWater" title="more details"></button>
                    </div>
                </div>

                <div class="swiper-slide swiper-slide--four">
                    <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalCabinet" title="more details"></button>
                    <span type="button" data-toggle="modal" data-target="#myModalCabinet" class="btn btn-primary py-2 px-4" title="more details"><?= $cabinet ?></span>
                    <div>
                        <h2>High Impact Technology Solution (HITS equipment)</h2>
                        <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalCabinet" title="more details"></button>
                    </div>
                </div>

                <div class="swiper-slide swiper-slide--five">
                    <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalVacuum" title="more details"></button>
                    <span type="button" data-toggle="modal" data-target="#myModalVacuum" class="btn btn-primary py-2 px-4" title="more details"><?= $vacuum ?></span>>
                    <div>
                        <h2>High Impact Technology Solution (HITS equipment)</h2>
                        <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalVacuum" title="more details"></button>
                    </div>
                </div>

                <div class="swiper-slide swiper-slide--six">
                    <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalFreeze" title="more details"></button>
                    <span type="button" data-toggle="modal" data-target="#myModalFreeze" class="btn btn-primary py-2 px-4" title="more details"><?= $freeze ?></span>
                    <div>
                        <h2>High Impact Technology Solution (HITS equipment)
                            <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalFreeze" title="more details"></button>
                        </h2>
                        <p>

                        </p>
                    </div>
                </div>

                <div class="swiper-slide swiper-slide--seven">
                    <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalSpray" title="more details"></button>
                    <span type="button" data-toggle="modal" data-target="#myModalSpray" class="btn btn-primary py-2 px-4" title="more details"><?= $spray ?></span>
                    <div>
                        <h2>High Impact Technology Solution (HITS equipment)</h2>
                        <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalSpray" title="more details"></button>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide--eight">
                    <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalWater" title="more details"></button>
                    <span type="button" data-toggle="modal" data-target="#myModalWater" class="btn btn-primary py-2 px-4" title="more details"><?= $water ?></span>
                    <div>
                        <h2>High Impact Technology Solution (HITS equipment)</h2>
                        <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalWater" title="more details"></button>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide--nine">
                    <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalCabinet" title="more details"></button>
                    <span type="button" data-toggle="modal" data-target="#myModalCabinet" class="btn btn-primary py-2 px-4" title="more details"><?= $cabinet ?></span>
                    <div>
                        <h2>High Impact Technology Solution (HITS equipment)</h2>
                        <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalCabinet" title="more details"></button>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide--ten">
                    <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalVacuum" title="more details"></button>
                    <span type="button" data-toggle="modal" data-target="#myModalVacuum" class="btn btn-primary py-2 px-4" title="more details"><?= $vacuum ?></span>
                    <div>
                        <h2>High Impact Technology Solution (HITS equipment)</h2>
                        <button class="modal-toggle-button" data-toggle="modal" data-target="#myModalVacuum" title="more details"></button>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <!-- Modal-->

        <div id="myModalFreeze" class="modal fade text-left">
            <div role="document" class="modal-dialog modal-lg">
                <div class="modal-content">
                    <button type="button" class="close custom-close-button ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0" style="background-color:#fff; color:#34495e">
                        <div class="tabs active" id="tab01">
                            <h6 class="font-weight-bold">Specification</h6>
                        </div>
                        <!-- <div class="tabs" id="tab02">
                            <h6 class="text-muted">Components & Parts</h6>
                        </div> -->
                        <div class="tabs" id="tab03">
                            <h6 class="text-muted">Tech Service</h6>
                        </div>
                        <div class="tabs" id="tab04">
                            <h6 class="text-muted">FIC Equipment Listing</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="modal-body p-0">

                        <figure id="figure_tab01" class="show">
                            <div class="px-3">

                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span><strong> <?= $freeze ?></strong> </h6>
                                <!-- /.card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Specification</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <?php foreach ($equipments as $equip) : ?>
                                                <?php foreach ($equip->equipmentSpecs as $spec) : ?>
                                                    <thead style="font-size: 12px; background:#087ac4; color:#fff">
                                                        <tr>
                                                            <?php if ($spec->equipment_id == $one) : ?>
                                                                <th><?= $spec->specKey->name ?></th>
                                                            <?php endif; ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 12px;">

                                                        <tr>
                                                            <?php if ($spec->equipment_id == $one) : ?>
                                                                <td> <?= $spec->value ?></td>
                                                            <?php endif; ?>
                                                        </tr>

                                                    <?php endforeach; ?>


                                                <?php endforeach; ?>
                                                    </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </figure>
                        <figure id="figure_tab02">

                            <div class="px-3">

                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span><strong> <?= $freeze ?></strong> </h6>
                                <!-- /.card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Components & Parts</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <?php foreach ($equipments as $equip) : ?>
                                                <?php foreach ($equip->equipmentComponents as $component) : ?>
                                                    <thead style="font-size: 12px; background:#087ac4; color:#fff">

                                                        <tr>

                                                            <?php if ($component->equipment_id == $one) : ?>

                                                                <th><?= $component->component->name ?></th>

                                                            <?php endif; ?>


                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 12px;">
                                                        <?php foreach ($component->equipmentComponentParts as $part) : ?>
                                                            <tr>
                                                                <?php if ($component->equipment_id == $one) : ?>
                                                                    <td> <?= $part->part->name ?></td>
                                                                <?php endif; ?>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                                    </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </figure>
                        <figure id="figure_tab03">
                            <div class="px-3">
                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span><strong> <?= $freeze ?></strong> </h6>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Technology Service</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <?php foreach ($equipments as $equip) : ?>
                                            <?php foreach ($equip->technologyServices as $tech) : ?>

                                                <?php if ($equip->id == $one) : ?>

                                                    <li style="font-size: 12px;"><?= $tech->name ?></li>

                                                    <!-- <label></label> -->
                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </figure>
                        <figure id="figure_tab04">
                            <div class="px-3">
                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span><strong> <?= $freeze ?></strong> </h6>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Food Innovation Center Equipment Listing</h5>
                                    </div>

                                    <div class="card-body">

                                        <table class="table table-bordered">

                                            <thead style="font-size: 12px; background:#087ac4; color:#fff">

                                                <tr>
                                                    <th>Agencies</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 12px;">
                                                <?php foreach ($equipments as $equip) : ?>
                                                    <?php foreach ($equip->ficEquipments as $fic) : ?>
                                                        <tr>
                                                            <?php if ($fic->equipment_id == $one) : ?>
                                                                <td><?= $fic->fic->name ?></td>
                                                                <td><?= $fic->statusDisplay ?></td>
                                                            <?php endif; ?>
                                                        </tr>

                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </figure>

                    </div>
                    <div class="line"></div>

                </div>
            </div>
        </div>

        <div id="myModalSpray" class="modal fade text-left">
            <div role="document" class="modal-dialog modal-lg">
                <div class="modal-content">
                    <button type="button" class="close custom-close-button ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                        <div class="tabs active" id="tab01">
                            <h6 class="font-weight-bold">Specification</h6>
                        </div>
                        <!-- <div class="tabs" id="tab02">
                            <h6 class="text-muted">Components & Parts</h6>
                        </div> -->
                        <div class="tabs" id="tab03">
                            <h6 class="text-muted">Tech Service</h6>
                        </div>
                        <div class="tabs" id="tab04">
                            <h6 class="text-muted">FIC Equipment Listing</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="modal-body p-0">

                        <fieldset class="show" id="fieldset_tab01">
                            <div class="px-3">

                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"> </span> <?= $spray ?></h6>
                                <!-- /.card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Specification</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered">

                                            <?php foreach ($equipments as $equip) : ?>
                                                <?php $equip->id = $two ?>

                                                <?php foreach ($equip->equipmentSpecs as $spec) : ?>
                                                    <thead style="font-size: 12px; background:#087ac4; color:#fff">
                                                        <tr>

                                                            <?php if ($spec->equipment_id == $two) : ?>
                                                                <th><?= $spec->specKey->name ?></th>

                                                            <?php endif; ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 12px;">

                                                        <tr>
                                                            <?php if ($spec->equipment_id == $two) : ?>
                                                                <td> <?= $spec->value ?></td>

                                                            <?php endif; ?>
                                                        </tr>

                                                    <?php endforeach; ?>
                                                    <?php break; // Stop the inner loop when the condition is met 
                                                    ?>
                                                <?php endforeach; ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </fieldset>
                        <fieldset id="fieldset_tab02">

                            <div class="px-3">

                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $spray ?></h6>
                                <!-- /.card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Components & Parts</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <?php foreach ($equipments as $equip) : ?>
                                                <?php foreach ($equip->equipmentComponents as $component) : ?>
                                                    <thead style="font-size: 12px; background:#087ac4; color:#fff">

                                                        <tr>
                                                            <?php $spec->equipment_id = $two ?>
                                                            <?php if ($component->equipment_id == $two) : ?>

                                                                <th><?= $component->component->name ?></th>

                                                            <?php endif; ?>


                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 12px;">
                                                        <?php foreach ($component->equipmentComponentParts as $part) : ?>
                                                            <tr>
                                                                <?php $spec->equipment_id = $two ?>
                                                                <?php if ($component->equipment_id == $two) : ?>
                                                                    <td> <?= $part->part->name ?></td>
                                                                <?php endif; ?>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                    <?php break; // Stop the inner loop when the condition is met 
                                                    ?>
                                                <?php endforeach; ?>
                                                    </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </fieldset>
                        <fieldset id="fieldset_tab03">
                            <div class="px-3">
                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $spray ?></h6>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Technology Service</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <?php foreach ($equipments as $equip) : ?>
                                            <?php foreach ($equip->technologyServices as $tech) : ?>

                                                <?php if ($equip->id == $two) : ?>

                                                    <li style="font-size: 12px;"><?= $tech->name ?></li>

                                                    <!-- <label></label> -->
                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                            <?php break; // Stop the inner loop when the condition is met 
                                            ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </fieldset>
                        <fieldset id="fieldset_tab04">
                            <div class="px-3">
                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $spray ?></h6>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Food Innovation Center Equipment Listing</h5>
                                    </div>

                                    <div class="card-body">

                                        <table class="table table-bordered">

                                            <thead style="font-size: 12px; background:#087ac4; color:#fff">

                                                <tr>
                                                    <th>Agencies</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 12px;">
                                                <?php foreach ($equipments as $equip) : ?>
                                                    <?php foreach ($equip->ficEquipments as $fic) : ?>
                                                        <tr>
                                                            <?php if ($fic->equipment_id == $two) : ?>
                                                                <td><?= $fic->fic->name ?></td>
                                                                <td><?= $fic->statusDisplay ?></td>
                                                            <?php endif; ?>
                                                        </tr>

                                                    <?php endforeach; ?>
                                                    <?php break; // Stop the inner loop when the condition is met 
                                                    ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </fieldset>

                    </div>
                    <div class="line"></div>

                </div>
            </div>
        </div>

        <div id="myModalWater" class="modal fade text-left">
            <div role="document" class="modal-dialog modal-lg">
                <div class="modal-content">
                    <button type="button" class="close custom-close-button ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                        <div class="tabs active" id="tab01">
                            <h6 class="font-weight-bold">Specification</h6>
                        </div>
                        <!-- <div class="tabs" id="tab02">
                            <h6 class="text-muted">Components & Parts</h6>
                        </div> -->
                        <div class="tabs" id="tab03">
                            <h6 class="text-muted">Tech Service</h6>
                        </div>
                        <div class="tabs" id="tab04">
                            <h6 class="text-muted">FIC Equipment Listing</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="modal-body p-0">

                        <legend class="show" id="legend_tab01">
                            <div class="px-3">

                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $water ?></h6>
                                <!-- /.card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Specification</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered">

                                            <?php foreach ($equipments as $equip) : ?>
                                                <?php $equip->id = $three ?>

                                                <?php foreach ($equip->equipmentSpecs as $spec) : ?>
                                                    <thead style="font-size: 12px; background:#087ac4; color:#fff">
                                                        <tr>

                                                            <?php if ($spec->equipment_id == $three) : ?>
                                                                <th><?= $spec->specKey->name ?></th>

                                                            <?php endif; ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 12px;">

                                                        <tr>
                                                            <?php if ($spec->equipment_id == $three) : ?>
                                                                <td> <?= $spec->value ?></td>

                                                            <?php endif; ?>
                                                        </tr>

                                                    <?php endforeach; ?>
                                                    <?php break; // Stop the inner loop when the condition is met 
                                                    ?>
                                                <?php endforeach; ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </legend>
                        <legend id="legend_tab02">

                            <div class="px-3">

                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $water ?></h6>
                                <!-- /.card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Components & Parts</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <?php foreach ($equipments as $equip) : ?>
                                                <?php foreach ($equip->equipmentComponents as $component) : ?>
                                                    <thead style="font-size: 12px; background:#087ac4; color:#fff">

                                                        <tr>
                                                            <?php $spec->equipment_id = $three ?>
                                                            <?php if ($component->equipment_id == $three) : ?>

                                                                <th><?= $component->component->name ?></th>

                                                            <?php endif; ?>


                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 12px;">
                                                        <?php foreach ($component->equipmentComponentParts as $part) : ?>
                                                            <tr>
                                                                <?php $spec->equipment_id = $three ?>
                                                                <?php if ($component->equipment_id == $three) : ?>
                                                                    <td> <?= $part->part->name ?></td>
                                                                <?php endif; ?>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                    <?php break; // Stop the inner loop when the condition is met 
                                                    ?>
                                                <?php endforeach; ?>
                                                    </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </legend>
                        <legend id="legend_tab03">
                            <div class="px-3">
                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $water ?></h6>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Technology Service</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <?php foreach ($equipments as $equip) : ?>
                                            <?php foreach ($equip->technologyServices as $tech) : ?>

                                                <?php if ($equip->id == $three) : ?>

                                                    <li style="font-size: 12px;"><?= $tech->name ?></li>

                                                    <!-- <label></label> -->
                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                            <?php break; // Stop the inner loop when the condition is met 
                                            ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </legend>
                        <legend id="legend_tab04">
                            <div class="px-3">
                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $water ?></h6>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Food Innovation Center Equipment Listing</h5>
                                    </div>

                                    <div class="card-body">

                                        <table class="table table-bordered">

                                            <thead style="font-size: 12px; background:#087ac4; color:#fff">

                                                <tr>
                                                    <th>Agencies</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 12px;">
                                                <?php foreach ($equipments as $equip) : ?>
                                                    <?php foreach ($equip->ficEquipments as $fic) : ?>
                                                        <tr>
                                                            <?php if ($fic->equipment_id == $three) : ?>
                                                                <td><?= $fic->fic->name ?></td>
                                                                <td><?= $fic->statusDisplay ?></td>
                                                            <?php endif; ?>
                                                        </tr>

                                                    <?php endforeach; ?>
                                                    <?php break; // Stop the inner loop when the condition is met 
                                                    ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </legend>
                    </div>
                    <div class="line"></div>

                </div>
            </div>
        </div>

        <div id="myModalCabinet" class="modal fade text-left">
            <div role="document" class="modal-dialog modal-lg">
                <div class="modal-content">
                    <button type="button" class="close custom-close-button ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                        <div class="tabs active" id="tab01">
                            <h6 class="font-weight-bold">Specification</h6>
                        </div>
                        <!-- <div class="tabs" id="tab02">
                            <h6 class="text-muted">Components & Parts</h6>
                        </div> -->
                        <div class="tabs" id="tab03">
                            <h6 class="text-muted">Tech Service</h6>
                        </div>
                        <div class="tabs" id="tab04">
                            <h6 class="text-muted">FIC Equipment Listing</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="modal-body p-0">

                        <article class="show" id="article_tab01">
                            <div class="px-3">

                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $cabinet ?></h6>
                                <!-- /.card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Specification</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered">

                                            <?php foreach ($equipments as $equip) : ?>
                                                <?php $equip->id = $five ?>

                                                <?php foreach ($equip->equipmentSpecs as $spec) : ?>
                                                    <thead style="font-size: 12px; background:#087ac4; color:#fff">
                                                        <tr>

                                                            <?php if ($spec->equipment_id == $five) : ?>
                                                                <th><?= $spec->specKey->name ?></th>

                                                            <?php endif; ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 12px;">

                                                        <tr>
                                                            <?php if ($spec->equipment_id == $five) : ?>
                                                                <td> <?= $spec->value ?></td>

                                                            <?php endif; ?>
                                                        </tr>

                                                    <?php endforeach; ?>
                                                    <?php break; // Stop the inner loop when the condition is met 
                                                    ?>
                                                <?php endforeach; ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </article>
                        <article id="article_tab02">

                            <div class="px-3">

                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $cabinet ?></h6>
                                <!-- /.card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Components & Parts</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <?php foreach ($equipments as $equip) : ?>
                                                <?php foreach ($equip->equipmentComponents as $component) : ?>
                                                    <thead style="font-size: 12px; background:#087ac4; color:#fff">

                                                        <tr>
                                                            <?php $spec->equipment_id = $five ?>
                                                            <?php if ($component->equipment_id == $five) : ?>

                                                                <th><?= $component->component->name ?></th>

                                                            <?php endif; ?>


                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 12px;">
                                                        <?php foreach ($component->equipmentComponentParts as $part) : ?>
                                                            <tr>
                                                                <?php $spec->equipment_id = $five ?>
                                                                <?php if ($component->equipment_id == $five) : ?>
                                                                    <td> <?= $part->part->name ?></td>
                                                                <?php endif; ?>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                    <?php break; // Stop the inner loop when the condition is met 
                                                    ?>
                                                <?php endforeach; ?>
                                                    </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </article>
                        <article id="article_tab03">
                            <div class="px-3">
                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $cabinet ?></h6>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Technology Service</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <?php foreach ($equipments as $equip) : ?>
                                            <?php foreach ($equip->technologyServices as $tech) : ?>

                                                <?php if ($equip->id == $five) : ?>

                                                    <li style="font-size: 12px;"><?= $tech->name ?></li>

                                                    <!-- <label></label> -->
                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                            <?php break; // Stop the inner loop when the condition is met 
                                            ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </article>
                        <article id="article_tab04">
                            <div class="px-3">
                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $cabinet ?></h6>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Food Innovation Center Equipment Listing</h5>
                                    </div>

                                    <div class="card-body">

                                        <table class="table table-bordered">

                                            <thead style="font-size: 12px; background:#087ac4; color:#fff">

                                                <tr>
                                                    <th>Agencies</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 12px;">
                                                <?php foreach ($equipments as $equip) : ?>
                                                    <?php foreach ($equip->ficEquipments as $fic) : ?>
                                                        <tr>
                                                            <?php if ($fic->equipment_id == $five) : ?>
                                                                <td><?= $fic->fic->name ?></td>
                                                                <td><?= $fic->statusDisplay ?></td>
                                                            <?php endif; ?>
                                                        </tr>

                                                    <?php endforeach; ?>
                                                    <?php break; // Stop the inner loop when the condition is met 
                                                    ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="line"></div>

                </div>
            </div>
        </div>

        <div id="myModalVacuum" class="modal fade text-left">
            <div role="document" class="modal-dialog modal-lg">
                <div class="modal-content">
                    <button type="button" class="close custom-close-button ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                        <div class="tabs active" id="tab01">
                            <h6 class="font-weight-bold">Specification</h6>
                        </div>
                        <!-- <div class="tabs" id="tab02">
                            <h6 class="text-muted">Components & Parts</h6>
                        </div> -->
                        <div class="tabs" id="tab03">
                            <h6 class="text-muted">Tech Service</h6>
                        </div>
                        <div class="tabs" id="tab04">
                            <h6 class="text-muted">FIC Equipment Listing</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="modal-body p-0">

                        <figcaption class="show" id="figcaption_tab01">
                            <div class="px-3">

                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $vacuum ?></h6>
                                <!-- /.card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Specification</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered">

                                            <?php foreach ($equipments as $equip) : ?>
                                                <?php $equip->id = $four ?>

                                                <?php foreach ($equip->equipmentSpecs as $spec) : ?>
                                                    <thead style="font-size: 12px; background:#087ac4; color:#fff">
                                                        <tr>

                                                            <?php if ($spec->equipment_id == $four) : ?>
                                                                <th><?= $spec->specKey->name ?></th>

                                                            <?php endif; ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 12px;">

                                                        <tr>
                                                            <?php if ($spec->equipment_id == $four) : ?>
                                                                <td> <?= $spec->value ?></td>

                                                            <?php endif; ?>
                                                        </tr>

                                                    <?php endforeach; ?>
                                                    <?php break; // Stop the inner loop when the condition is met 
                                                    ?>
                                                <?php endforeach; ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </figcaption>
                        <figcaption id="figcaption_tab02">

                            <div class="px-3">

                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $vacuum ?></h6>
                                <!-- /.card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Components & Parts</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <?php foreach ($equipments as $equip) : ?>
                                                <?php foreach ($equip->equipmentComponents as $component) : ?>
                                                    <thead style="font-size: 12px; background:#087ac4; color:#fff">

                                                        <tr>
                                                            <?php $spec->equipment_id = $four ?>
                                                            <?php if ($component->equipment_id == $four) : ?>

                                                                <th><?= $component->component->name ?></th>

                                                            <?php endif; ?>


                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 12px;">
                                                        <?php foreach ($component->equipmentComponentParts as $part) : ?>
                                                            <tr>
                                                                <?php $spec->equipment_id = $four ?>
                                                                <?php if ($component->equipment_id == $four) : ?>
                                                                    <td> <?= $part->part->name ?></td>
                                                                <?php endif; ?>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                    <?php break; // Stop the inner loop when the condition is met 
                                                    ?>
                                                <?php endforeach; ?>
                                                    </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </figcaption>
                        <figcaption id="figcaption_tab03">
                            <div class="px-3">
                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $vacuum ?></h6>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Technology Service</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <?php foreach ($equipments as $equip) : ?>
                                            <?php foreach ($equip->technologyServices as $tech) : ?>

                                                <?php if ($equip->id == $four) : ?>

                                                    <li style="font-size: 12px;"><?= $tech->name ?></li>

                                                    <!-- <label></label> -->
                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                            <?php break; // Stop the inner loop when the condition is met 
                                            ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </figcaption>
                        <figcaption id="figcaption_tab04">
                            <div class="px-3">
                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-sitemap"></span> <?= $vacuum ?></h6>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Food Innovation Center Equipment Listing</h5>
                                    </div>

                                    <div class="card-body">

                                        <table class="table table-bordered">

                                            <thead style="font-size: 12px; background:#087ac4; color:#fff">

                                                <tr>
                                                    <th>Agencies</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 12px;">
                                                <?php foreach ($equipments as $equip) : ?>
                                                    <?php foreach ($equip->ficEquipments as $fic) : ?>
                                                        <tr>
                                                            <?php if ($fic->equipment_id == $four) : ?>
                                                                <td><?= $fic->fic->name ?></td>
                                                                <td><?= $fic->statusDisplay ?></td>
                                                            <?php endif; ?>
                                                        </tr>

                                                    <?php endforeach; ?>
                                                    <?php break; // Stop the inner loop when the condition is met 
                                                    ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </figcaption>
                    </div>
                    <div class="line"></div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php
//for figure
$script = <<< JS


$(document).ready(function() {

    $(".tabs").click(function() {

        // Remove the "active" class from all tabs and adjust their styles
        $(".tabs").removeClass("active");
        $(".tabs h6").removeClass("font-weight-bold");
        $(".tabs h6").addClass("text-muted");

        // Set the clicked tab as "active" and adjust its styles
        $(this).children("h6").removeClass("text-muted");
        $(this).children("h6").addClass("font-weight-bold");
        $(this).addClass("active");

        // Get the ID of the clicked tab and construct the ID of the corresponding content (figure)
        current_fs = $(".active");
        next_fs = $(this).attr('id');
        next_fs = "#figure_" + next_fs;

        // Hide the currently displayed content (figure) by removing the "show" class from all figures
        $("figure").removeClass("show");

        // Show the new content (figure) by adding the "show" class to the selected figure
        $(next_fs).addClass("show");

        // Debug statements


        // Example condition based on the current figure
        if (current_fs.attr("id") === "figure_tab01") {
            console.log("Figure with ID 'figure_tab01' is displayed.");
            // Do something when the figure with ID "figure_tab01" is displayed
        } else if (current_fs.attr("id") === "figure_tab02") {
            console.log("Figure with ID 'figure_tab02' is displayed.");
            // Do something when the figure with ID "figure_tab02" is displayed
        } else {
            console.log("Default action: No specific figure is displayed.");
            // Default action if none of the specific figures are displayed
        }

    });

});

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>



<?php
//for article
$script = <<< JS


$(document).ready(function() {

    $(".tabs").click(function() {

        // Remove the "active" class from all tabs and adjust their styles
        $(".tabs").removeClass("active");
        $(".tabs h6").removeClass("font-weight-bold");
        $(".tabs h6").addClass("text-muted");

        // Set the clicked tab as "active" and adjust its styles
        $(this).children("h6").removeClass("text-muted");
        $(this).children("h6").addClass("font-weight-bold");
        $(this).addClass("active");

        // Get the ID of the clicked tab and construct the ID of the corresponding content (figure)
        current_fs = $(".active");
        next_fs = $(this).attr('id');
        next_fs = "#article_" + next_fs;

        // Hide the currently displayed content (figure) by removing the "show" class from all figures
        $("article").removeClass("show");

        // Show the new content (figure) by adding the "show" class to the selected figure
        $(next_fs).addClass("show");

        // Debug statements


        // Example condition based on the current figure
        if (current_fs.attr("id") === "article_tab01") {
            // console.log("Figure with ID 'figure_tab01' is displayed.");
            // Do something when the figure with ID "figure_tab01" is displayed
        } else if (current_fs.attr("id") === "article_tab02") {
            // console.log("Figure with ID 'form_tab02' is displayed.");
            // Do something when the figure with ID "figure_tab02" is displayed
        } else {
            // console.log("Default action: No specific figure is displayed.");
            // Default action if none of the specific figures are displayed
        }

    });

});

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>

<?php
//for fielset
$script = <<< JS


$(document).ready(function() {

    $(".tabs").click(function() {

        // Remove the "active" class from all tabs and adjust their styles
        $(".tabs").removeClass("active");
        $(".tabs h6").removeClass("font-weight-bold");
        $(".tabs h6").addClass("text-muted");

        // Set the clicked tab as "active" and adjust its styles
        $(this).children("h6").removeClass("text-muted");
        $(this).children("h6").addClass("font-weight-bold");
        $(this).addClass("active");

        // Get the ID of the clicked tab and construct the ID of the corresponding content (fieldset)
        current_fs = $(".active");
        next_fs = $(this).attr('id');
        next_fs = "#fieldset_" + next_fs;

        // Hide the currently displayed content (fieldset) by removing the "show" class from all fieldsets
        $("fieldset").removeClass("show");

        // Show the new content (fieldset) by adding the "show" class to the selected fieldset
        $(next_fs).addClass("show");

        // Debug statements
        console.log("Clicked tab ID:", $(this).attr("id"));
        console.log("Current Fieldset ID:", current_fs.attr("id"));

        // Example condition based on the current fieldset
        if (current_fs.attr("id") === "fieldset_tab01") {
            console.log("Fieldset with ID 'fieldset_tab01' is displayed.");
            // Do something when the fieldset with ID "fieldset_tab01" is displayed
        } else if (current_fs.attr("id") === "fieldset_tab02") {
            console.log("Fieldset with ID 'fieldset_tab02' is displayed.");
            // Do something when the fieldset with ID "fieldset_tab02" is displayed
        } else {
            console.log("Default action: No specific fieldset is displayed.");
            // Default action if none of the specific fieldsets are displayed
        }

    });

});


JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>

<?php
//for legend
$script = <<< JS


$(document).ready(function() {

    $(".tabs").click(function() {

        // Remove the "active" class from all tabs and adjust their styles
        $(".tabs").removeClass("active");
        $(".tabs h6").removeClass("font-weight-bold");
        $(".tabs h6").addClass("text-muted");

        // Set the clicked tab as "active" and adjust its styles
        $(this).children("h6").removeClass("text-muted");
        $(this).children("h6").addClass("font-weight-bold");
        $(this).addClass("active");

        // Get the ID of the clicked tab and construct the ID of the corresponding content (fieldset)
        current_fs = $(".active");
        next_fs = $(this).attr('id');
        next_fs = "#legend_" + next_fs;

        // Hide the currently displayed content (fieldset) by removing the "show" class from all fieldsets
        $("legend").removeClass("show");

        // Show the new content (fieldset) by adding the "show" class to the selected fieldset
        $(next_fs).addClass("show");

        // Debug statements
        console.log("Clicked tab ID:", $(this).attr("id"));
        console.log("Current Legend ID:", current_fs.attr("id"));

        // Example condition based on the current fieldset
        if (current_fs.attr("id") === "legend_tab01") {
            console.log("Legend with ID 'legend_tab01' is displayed.");
            // Do something when the fieldset with ID "fieldset_tab01" is displayed
        } else if (current_fs.attr("id") === "legend_tab02") {
            console.log("Legend with ID 'legend_tab02' is displayed.");
            // Do something when the fieldset with ID "fieldset_tab02" is displayed
        } else {
            console.log("Default action: No specific fieldset is displayed.");
            // Default action if none of the specific fieldsets are displayed
        }

    });

});


JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>

<?php
//for figcaption
$script = <<< JS


$(document).ready(function() {

    $(".tabs").click(function() {

        // Remove the "active" class from all tabs and adjust their styles
        $(".tabs").removeClass("active");
        $(".tabs h6").removeClass("font-weight-bold");
        $(".tabs h6").addClass("text-muted");

        // Set the clicked tab as "active" and adjust its styles
        $(this).children("h6").removeClass("text-muted");
        $(this).children("h6").addClass("font-weight-bold");
        $(this).addClass("active");

        // Get the ID of the clicked tab and construct the ID of the corresponding content (figure)
        current_fs = $(".active");
        next_fs = $(this).attr('id');
        next_fs = "#figcaption_" + next_fs;

        // Hide the currently displayed content (figure) by removing the "show" class from all figures
        $("figcaption").removeClass("show");

        // Show the new content (figure) by adding the "show" class to the selected figure
        $(next_fs).addClass("show");

        // Debug statements


        // Example condition based on the current figure
        if (current_fs.attr("id") === "figcaption_tab01") {
            // console.log("Figure with ID 'figure_tab01' is displayed.");
            // Do something when the figure with ID "figure_tab01" is displayed
        } else if (current_fs.attr("id") === "figcaption_tab02") {
            // console.log("Figure with ID 'form_tab02' is displayed.");
            // Do something when the figure with ID "figure_tab02" is displayed
        } else {
            // console.log("Default action: No specific figure is displayed.");
            // Default action if none of the specific figures are displayed
        }

    });

});

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>
<?php
$this->registerJsFile('@web/path/to/swiper.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs(
    '
  var swiper = new Swiper(".swiper", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 2,
    slideShadows: true
  },
  keyboard: {
    enabled: true
  },
  mousewheel: {
    thresholdDelta: 70
  },
  spaceBetween: 60,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  }
});


',


    \yii\web\View::POS_READY
);
?>
<style>
    .swiper {
        width: 100%;

    }

    .swiper-slide {
        width: 300px;
        height: 400px;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
        filter: blur(1px);
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        justify-content: end;
        align-items: self-start;
    }

    .swiper-slide-active {
        filter: blur(0px);
    }

    .swiper-pagination-bullet,
    .swiper-pagination-bullet-active {
        background: #0984e3;

    }

    .swiper-slide span {
        text-transform: uppercase;
        color: #fff;
        background: #1b7402;
        padding: 7px 18px 7px 25px;
        display: inline-block;
        border-radius: 0 20px 20px 0px;
        letter-spacing: 2px;
        font-size: 0.8rem;
        font-family: "Open Sans", sans-serif;
    }

    .swiper-slide--one span {
        background: #087ac4;
    }

    .swiper-slide--two span {
        background: #087ac4;
    }

    .swiper-slide--three span {
        background: #087ac4;
    }

    .swiper-slide--four span {
        background: #087ac4;
    }

    .swiper-slide--five span {
        background: #087ac4;
    }

    .swiper-slide--six span {
        background: #087ac4;
    }

    .swiper-slide--seven span {
        background: #087ac4;
    }

    .swiper-slide--eight span {
        background: #087ac4;
    }

    .swiper-slide--nine span {
        background: #087ac4;
    }

    .swiper-slide--ten span {
        background: #087ac4;
    }



    .swiper-slide h2 {
        color: #fff;
        font-family: "Roboto", sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 1.4;
        margin-bottom: 15px;
        padding: 25px 45px 0 25px;
    }

    .swiper-slide p {
        color: #fff;
        font-family: "Roboto", sans-serif;
        font-weight: 300;
        display: flex;
        align-items: center;
        padding: 0 25px 35px 25px;
    }

    .swiper-slide svg {
        color: #fff;
        width: 22px;
        height: 22px;
        margin-right: 7px;
    }

    .swiper-slide--one {
        /* freeze dryer */
        background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url(https://test.ficphil.com/uploads/equipments/1098238017650009ecc256d2.69894653.jpg) no-repeat 50% 50% / cover;
        height: 50vh;

    }

    .swiper-slide--two {
        /* spray dryer */
        background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url(https://test.ficphil.com/uploads/equipments/130069900465000a2d695b50.02744678.jpg) no-repeat 50% 50% / cover;
        height: 50vh;
    }

    .swiper-slide--three {
        /* water retort */
        background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url(https://test.ficphil.com/uploads/equipments/66981956765000a80239614.01062275.jpg) no-repeat 50% 50% / cover;
        height: 50vh;
    }

    .swiper-slide--four {
        /* cabinet dryer */
        background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url(https://test.ficphil.com/uploads/equipments/126956168965000aa1a1c759.05210899.jpg) no-repeat 50% 50% / cover;
        height: 50vh;
    }

    .swiper-slide--five {
        /* vacuum fryer */
        background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url(https://test.ficphil.com/uploads/equipments/57097045965000a54570a67.44367432.jpg) no-repeat 50% 50% / cover;
        height: 50vh;
    }

    .swiper-slide--six {
        /* freeze dryer */
        background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url(https://test.ficphil.com/uploads/equipments/1098238017650009ecc256d2.69894653.jpg) no-repeat 50% 50% / cover;
        height: 50vh;
    }

    .swiper-slide--seven {
        /* spray dryer */
        background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url(https://test.ficphil.com/uploads/equipments/130069900465000a2d695b50.02744678.jpg) no-repeat 50% 50% / cover;
        height: 50vh;
    }

    .swiper-slide--eight {
        /* water retort */
        background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url(https://test.ficphil.com/uploads/equipments/66981956765000a80239614.01062275.jpg) no-repeat 50% 50% / cover;
        height: 50vh;
    }

    .swiper-slide--nine {
        /* cabinet dryer */
        background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url(https://test.ficphil.com/uploads/equipments/126956168965000aa1a1c759.05210899.jpg) no-repeat 50% 50% / cover;
        height: 50vh;
    }


    .swiper-slide--ten {
        /* vacuum fryer */
        background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url(https://test.ficphil.com/uploads/equipments/57097045965000a54570a67.44367432.jpg) no-repeat 50% 50% / cover;
        height: 50vh;
    }

    .swiper-3d .swiper-slide-shadow-left,
    .swiper-3d .swiper-slide-shadow-right {
        background-image: none;
    }
</style>