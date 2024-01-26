<?php

use app\models\Equipment;
use app\models\TechService;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use app\assets\StyleAsset;
use app\models\EquipmentComponent;
use app\models\FicTechService;
use app\models\EquipmentTechService;
use johnitvn\ajaxcrud\CrudAsset;
use timurmelnikov\widgets\LoadingOverlayPjax;
use yii\widgets\ActiveForm;

CrudAsset::register($this);

$this->registerCssFile('@web/css/techservice.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<section id="services" class="section specific-view">
    <div class="container">
        <div class="section-header">
            <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
            <h2 class="section-title">Tech Services</h2>

            <p class="section-subtitle">FIC's Services Offered</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="line-heading" data-aos="fade-up" style="text-align: center"> <b>CATEGORIES</b></div>

                <div class="btn-group-vertical btn-block">
                    <a class="filter btn btn-common btn-effect" data-filter="all" style="color: #fff; background-color:#0984e3; text-align:left" id="all">
                        All
                    </a>
                    <?php foreach (TechService::getServices() as $service) : ?>
                        <a class="filter btn btn-common btn-effect" style="font-size: 12px; color: #fff; background-color:#0984e3" data-filter=.<?= $service->id ?>>
                            <?= $service->name ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-lg-9 col-md-8">
                <?php yii\widgets\Pjax::begin(['id' => 'new_country']) ?>
                <?php $form = ActiveForm::begin([
                    'id' => 'pagination',

                ]); ?>
                <?php LoadingOverlayPjax::begin([
                    'color' => 'transparent',
                    'fontawesome' => 'fa fa-cog fa-spin',


                ]); ?>
                <div class="tab-content">
                    <div class="tab-pane fade show active">
                        <div class="product-items mt-30">
                            <div class="row product-items-active">

                                <?php
                                $counter = 0;
                                $totalItems = count($tech_category);
                                $items = FicTechService::find()->where(['is_public' => 1])->count();
                                if ($items >= 8) {
                                    $itemsPerPage = 6;
                                } else {
                                    $itemsPerPage = 3;
                                }
                                $totalPages = ceil($totalItems / $itemsPerPage);


                                $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;


                                $startIndex = ($currentPage - 1) * $itemsPerPage;
                                $endIndex = min($startIndex + $itemsPerPage - 1, $totalItems - 1);

                                $isFirstPage = ($currentPage == 1);


                          


                                foreach ($tech_category as $techservice) {

                                    if ($counter >= $startIndex && $counter <= $endIndex) {

                                        if (!empty($techservice->ficTechServices)) {
                                            foreach ($techservice->ficTechServices as $tech) {
                                                if ($tech->is_public == 1) {

                                    ?>

                                                    <div class="col-md-4 mix <?= $tech->techService->id ?>">
                                                        <li class="cards_item">
                                                            <div class="card">
                                                                <div class="product-image-wrapper">
                                                                    <div class="single-products">
                                                                        <div class="card_image">
                                                                            <?php if ($tech->equipment !== null && $tech->equipment->image !== null) : ?>
                                                                                <img src="<?= $tech->equipment->image->link ?>" alt="" style="height: 25vh" loading="lazy"/>

                                                                            <?php else : ?>
                                                                                <img src="<?= Yii::getAlias('@techtUrl') ?>" style="height: 25vh" loading="lazy">

                                                                            <?php endif; ?>

                                                                            <div class="product-overlay">
                                                                                <div class="overlay-content center" style="padding-bottom:95px">
                                                                                    <p style="font-size: large; color: white; padding-bottom: 10px">
                                                                                        <?= $tech->techService->name ?>
                                                                                    </p>
                                                                                    <button type="button" data-toggle="modal" data-target="#myTechservice-<?= $tech->id ?>" class="info btn-primary" style="font-size:medium">More Details</button>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card_content">
                                                                            <h3 class="card_title"><?php if ($tech->equipment !== null) : ?>
                                                                                    <?= $tech->equipment->model ?>
                                                                                <?php else : ?>
                                                                                    <span><b>Equipment:</b> N/A</span>

                                                                                <?php endif; ?>
                                                                            </h3>
                                                                            <div class="card_text hidden-sm hidden-xs">
                                                                                <ul class="nav nav-pills" style="font-size: 14px;">

                                                                                    <p>
                                                                                        <li><span class="pull-left"><b>Fee: </b><strong>₱

                                                                                                </strong><?= number_format($tech->charging_fee) ?>
                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                            </span>
                                                                                        </li>
                                                                                    </p>

                                                                                    <p>
                                                                                        <li><span class="pull-left"><b>Region: </b><?= $tech->fic->municipalityCity->region->code ?>, <?= $tech->fic->municipalityCity->name ?></span></li>
                                                                                    </p>
                                                                                    <p>
                                                                                    <button type="button" data-toggle="modal" data-target="#myTechservice-<?= $tech->id ?>" class="info btn-primary" style="font-size:small">More Details</button>
                                                                                    </p>
                                                                                </ul>
                                                                            </div>

                                                                            <div class="card_text hidden-lg hidden-md">
                                                                                <ul class="nav nav-pills" style="font-size: 14px;">

                                                                                    <p>
                                                                                        <li><span class="pull-left" style="font-size: 18px;"><b>Fee: </b><strong>₱

                                                                                                </strong><?= number_format($tech->charging_fee) ?>
                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                            </span>
                                                                                        </li>
                                                                                    </p>

                                                                                    <p>
                                                                                        <li><span class="pull-left"><b>Region: </b><?= $tech->fic->municipalityCity->region->code ?>, <?= $tech->fic->municipalityCity->name ?></span></li>
                                                                                    </p>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </div>

                                                    <!-- my modal -->
                                                    <div id="myTechservice-<?= $tech->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title" id="exampleModalLongTitle" style="color: #2f3640;"> <?= $tech->techService->name ?></h3>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body p-0">

                                                                    <body class="show" id="body_tab01">
                                                                        <div class="px-3">

                                                                            <div class="row">
                                                                                <div class="col-md-5">
                                                                                    <div class="card3">
                                                                                        <div class="shot-item">
                                                                                            <div class="card_image">
                                                                                                <?php if ($tech->equipment !== null && $tech->equipment->image !== null) : ?>
                                                                                                    <img src="<?= $tech->equipment->image->link ?>"/>

                                                                                                <?php else : ?>
                                                                                                    <img src="<?= Yii::getAlias('@techtUrl') ?>">

                                                                                                <?php endif; ?>

                                                                                                <?php if ($tech->equipment !== null && $tech->equipment->image !== null) : ?>
                                                                                                    <div class="single-content">
                                                                                                        <div class="fancy-table">
                                                                                                            <div class="table-cell">
                                                                                                                <div class="zoom-icon">
                                                                                                                    <a class="lightbox" href="<?= $tech->equipment->image->link ?>"> <i class="lni-zoom-in item-icon"></i></a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <?php else : ?>
                                                                                                    <div class="single-content">
                                                                                                        <div class="fancy-table">
                                                                                                            <div class="table-cell">
                                                                                                                <div class="zoom-icon">
                                                                                                                    <a class="lightbox" href="<?= Yii::getAlias('@techtUrl') ?>"> <i class="lni-zoom-in item-icon"></i></a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <?php endif; ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-7 portfolio-details" style="padding-top: 30px; padding-bottom: 20px">
                                                                                    <div class="portfolio-info" style="padding-bottom: 10px;">
                                                                                        <h3 style="margin-top: -20px;">
                                                                                            Equipment: <?php if ($tech->equipment !== null) : ?>
                                                                                                <?= $tech->equipment->model ?>
                                                                                            <?php else : ?>
                                                                                                <span class="pull-left"><b>Equipment:</b> N/A</span>

                                                                                            <?php endif; ?>
                                                                                        </h3>
                                                                                        <ul style="margin-top: -10px; color:#2f3640; font-size: 15px">
                                                                                            <li style="font-size: 40px;"><strong>₱</strong> <?= (number_format($tech->charging_fee)); ?></li>

                                                                                            <li><strong>Type:</strong> <?= $tech->charging_type ?></li>
                                                                                            <li><strong>Description:</strong> <?= $tech->description ?></li>
                                                                                            <li>
                                                                                                <span id="inquiry-button-<?= $tech->id ?>">
                                                                                                    <?= Html::a(
                                                                                                        'INQUIRE',
                                                                                                        ['create-inquiry', 'techServiceId' => $tech->id], // Pass techServiceId as a parameter
                                                                                                        [
                                                                                                            'id' => 'inquire-button-' . $tech->id, // Add an ID to the button
                                                                                                            'role' => 'modal-remote',
                                                                                                            'title' => 'Inquire',
                                                                                                            'class' => 'info btn-primary',
                                                                                                            'style' => 'text-align:center; background-color: #16a085',
                                                                                                            'type' => 'submit',
                                                                                                            'data-dismiss' => 'modal',
                                                                                                        ]
                                                                                                    ) ?>
                                                                                                </span>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="portfolio-info" style="padding-bottom: 10px; background-color: #2980b9">
                                                                                        <h3 style="margin-top: -20px; color: aliceblue;">FIC's Profile</h3>
                                                                                        <ul style="color: #fff;">
                                                                                            <li>
                                                                                                <div class="user">
                                                                                                    <img src="<?= Yii::getAlias('@avatarUrl') ?>" />
                                                                                                    <div class="user-info" style="margin-top: 5px;">
                                                                                                        <h5><span class="pull-left" style="color: aliceblue; font-size: 15px">
                                                                                                                <?= $tech->fic->contact_person  ?>
                                                                                                            </span></h5>
                                                                                                        <small><span class="pull-left" style="color: aliceblue; font-size: 12px;">Contact Person</span></small>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li><strong>Contact Number:</strong> <?= $tech->fic->contact_number ?></li>
                                                                                            <li><strong>Region:</strong> <?= $tech->fic->municipalityCity->region->code ?>, <?= $tech->fic->municipalityCity->name ?></li>
                                                                                            <li><strong>Located at:</strong> <?= $tech->fic->address ?>, (<?= $tech->fic->suc ?>)</li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </body>
                                                                </div>
                                                                <div class="modal-footer">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                <?php
                                                }
                                            }
                                        }
                                    }


                                    if ($items > 6) {
                                        $counter++;
                                    }
                                }
                                ?>
                            </div>
                            <?php
                            if ($items > 6) : ?>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination1 pagination-left">
                                        <?php if (!$isFirstPage) : ?>
                                            <li class="page-item"><a class="page-link" href="?page=<?= ($currentPage - 1)   ?>">Previous</a></li>
                                        <?php endif; ?>

                                        <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
                                            <li class="page-item <?= ($page == $currentPage) ? 'active' : '' ?>"><a class="page-link" href="?page=<?= ($page)  ?>"><?= $page ?></a></li>
                                        <?php endfor; ?>

                                        <?php if ($currentPage < $totalPages) : ?>
                                            <li class="page-item"><a class="page-link" href="?page=<?= ($currentPage + 1) . '#services' ?>">Next</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                                <?php

                            endif; ?>

                        </div>

                    </div>

                </div>


                <?php LoadingOverlayPjax::end(); ?>
                <?php ActiveForm::end(); ?>
                <?php yii\widgets\Pjax::end() ?>
            </div>

        </div>

    </div>

</section>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</html>



<?php

$script1 = <<< JS


    $(document).ajaxSend(function(event, jqxhr, settings){
        $("#pagination").LoadingOverlay("show");

    });
    $(document).ajaxComplete(function(event, jqxhr, settings){
        $("#pagination").LoadingOverlay("hide");

    });

     $(document).ready(function() {
       
        checkAndTogglePagination();

      
        function checkAndTogglePagination() {
            var isAllButtonActive = $('#all').hasClass('active');
            var paginationElement = $('.pagination1');

            if (isAllButtonActive) {
                paginationElement.show();
            } else {
                paginationElement.hide();
            }
        }

       
        $('.filter').click(function() {
           
            checkAndTogglePagination();
        });
    });

JS;
$this->registerJs($script1, yii\web\View::POS_READY);
?>


<?php Modal::begin([

    "id" => "ajaxCrudModal", //for form
    "footer" => "", // always need it for jquery plugin
    "headerOptions" => [
        "style" => "background-color: #0984e3; color: #fff;",
    ],
]) ?>
<?php Modal::end(); ?>

<?php Modal::begin([
    "id" => "notificationModal", // for notificatio
    "footer" => "", // always need it for jquery plugin
    "headerOptions" => [
        "style" => "background-color: #0984e3; color: #fff;",
    ],
]) ?>
<?php Modal::end(); ?>


<script>
    function openInquiryModal(techServiceId, modalId) {

        document.getElementById('inquiry-tech-service-id').value = techServiceId;
        $('#' + modalId).modal('show');
    }
</script>

<script>
    $(document).ready(function() {
        $('.col-sm-3').each(function() {
            var maxHeight = 0;
            $(this).find('.card').each(function() {
                var cardHeight = $(this).outerHeight();
                if (cardHeight > maxHeight) {
                    maxHeight = cardHeight;
                }
            });
            $(this).find('.card').outerHeight(maxHeight);
        });
    });
</script>
<!-- Services Section End -->
<style>
    .custom-close-button {
        background-color: transparent;

        color: red;

        font-size: 24px;

        font-weight: bold;

        border: none;

        outline: none;

        cursor: pointer;

    }


    .custom-close-button:hover {
        color: darkred;
        text-decoration: none;

    }

    /* Add this CSS to your stylesheet */
    .pagination1 {
        display: -ms-flexbox;
        display: flex;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
    }


    .modale-button {
        color: #7d695e;
        font-family: 'Nunito', sans-serif;
        font-size: 18px;
        cursor: pointer;
        border: 0;
        outline: 0;
        padding: 10px 40px;
        border-radius: 30px;
        background: white;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.16);
        transition: 0.3s;
    }

    .modale-button:hover {
        border-color: rgba(255, 255, 255, 0.2);
        background: rgba(255, 255, 255, 0.8);
    }



    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    .close-button:hover {
        color: red;

    }

    .btn-outline-primary:hover {
        color: #fff;
        background-color: #2980b9;
        border-color: #007bff;
    }

    .btn-primary {
        color: #fff;
        background-color: #337ab7;
        border-color: #2e6da4;
    }

    .btn-block {
        display: block;
        width: 100%;
    }

    .info {
        display: inline-block;
        margin-bottom: 0;
        font-weight: normal;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* product overlay end */
    .btn-group-vertical>.btn:last-child:not(:first-child) {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;
    }

    .btn-group-vertical>.btn,
    .btn-group-vertical>.btn-group,
    .btn-group-vertical>.btn-group>.btn {
        display: block;
        float: none;
        width: 100%;
        max-width: 100%;
    }

    .btn {
        display: inline-block;
        margin-bottom: 0;
        font-weight: normal;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid whitesmoke;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding-right: 80%;
    }


    .btn-inquiry {
        background-color: #3498db;

        color: #fff;

        border: none;

        padding: 6px 12px;

        font-size: 14px;

        transition: background-color 0.3s ease;

    }


    .btn-inquiry:hover {
        background-color: #2980b9;

        text-decoration: none;

        cursor: pointer;

    }
</style>