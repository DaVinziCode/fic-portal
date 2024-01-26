<?php

use app\models\Equipment;
use app\models\FicProduct;
use app\models\Metadata;
use app\models\Product;

use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;


use johnitvn\ajaxcrud\CrudAsset;
use timurmelnikov\widgets\LoadingOverlayPjax;
use yii\bootstrap4\ActiveForm;

$this->registerCssFile('@web/css/techservice.css');
CrudAsset::register($this);

?>

<section id="portfolios" class="section product-area pt-100 pb-130">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Products</h2>
            <p class="section-subtitle">Products Made by Food Innovation Center</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="line-heading" data-aos="fade-up" style="text-align: center"> <b>CATEGORIES</b></div>
                <ul>
                    <li class="dropdown">

                        <a class="filter2 btn1 btn-common btn-effect" data-filter="all" style="color: #fff;">All</a>

                    </li>
                    <li class="dropdown">
                        <input type="checkbox" onclick="toggleCheckboxes(this)" />
                        <a href="#" data-toggle="dropdown">Freeze Dried</a>
                        <ul class="dropdown-menu">
                            <?php foreach (Product::getProducts() as $product) : ?>
                                <?php foreach ($product->productEquipments as $productEquipment) : ?>
                                    <?php if ($productEquipment->equipment_id == 75) : //need to change to 1 in liveserver 
                                    ?>
                                        <li>
                                            <a class="filter2 btn1 btn-common btn-effect" style="color: #0984e3;" data-filter=.<?= $productEquipment->product_id ?>>
                                                <?= $product->name ?>
                                            </a>
                                        </li>
                                        <?php break; // Exit the inner loop once equipment_id is found 
                                        ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <input type="checkbox" onclick="toggleCheckboxes(this)" />
                        <a href="#" data-toggle="dropdown">Vacuum Fried</a>
                        <ul class="dropdown-menu">
                            <?php foreach (Product::getProducts() as $product) : ?>
                                <?php foreach ($product->productEquipments as $productEquipment) : ?>
                                    <?php if ($productEquipment->equipment_id == 80) : //need to change to 3 in liveserver 
                                    ?>
                                        <li>
                                            <a class="filter2 btn1 btn-common btn-effect" style="color: #0984e3;" data-filter=.<?= $productEquipment->product_id ?>>
                                                <?= $product->name ?>
                                            </a>
                                        </li>
                                        <?php break; // Exit the inner loop once equipment_id is found 
                                        ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <input type="checkbox" onclick="toggleCheckboxes(this)" />
                        <a href="#" data-toggle="dropdown">Spray Dried</a>
                        <ul class="dropdown-menu">
                            <?php foreach (Product::getProducts() as $product) : ?>
                                <?php foreach ($product->productEquipments as $productEquipment) : ?>
                                    <?php if ($productEquipment->equipment_id == 76) : //need to change to 2 in liveserver 
                                    ?>
                                        <li>
                                            <a class="filter2 btn1 btn-common btn-effect" style="color: #0984e3;" data-filter=.<?= $productEquipment->product_id ?>>
                                                <?= $product->name ?>
                                            </a>
                                        </li>
                                        <?php break; // Exit the inner loop once equipment_id is found 
                                        ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <input type="checkbox" onclick="toggleCheckboxes(this)" />
                        <a href="#" data-toggle="dropdown">Cabinet Dried</a>
                        <ul class="dropdown-menu">
                            <?php foreach (Product::getProducts() as $product) : ?>
                                <?php foreach ($product->productEquipments as $productEquipment) : ?>
                                    <?php if ($productEquipment->equipment_id == 86) : //need to change to 6 in liveserver 
                                    ?>
                                        <li>
                                            <a class="filter2 btn1 btn-common btn-effect" style="color: #0984e3;" data-filter=.<?= $productEquipment->product_id ?>>
                                                <?= $product->name ?>
                                            </a>
                                        </li>
                                        <?php break; // Exit the inner loop once equipment_id is found 
                                        ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <input type="checkbox" onclick="toggleCheckboxes(this)" />
                        <a href="#" data-toggle="dropdown">Thermally Processed</a>
                        <ul class="dropdown-menu">
                            <?php foreach (Product::getProducts() as $product) : ?>
                                <?php foreach ($product->productEquipments as $productEquipment) : ?>
                                    <?php if ($productEquipment->equipment_id == 79) : //need to change to 4 in liveserver 
                                    ?>
                                        <li>
                                            <a class="filter2 btn1 btn-common btn-effect" style="color: #0984e3;" data-filter=.<?= $productEquipment->product_id ?>>
                                                <?= $product->name ?>
                                            </a>
                                        </li>
                                        <?php break; // Exit the inner loop once equipment_id is found 
                                        ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Portfolio Recent Projects -->
            <div class="col-lg-9 col-md-8">
                <?php yii\widgets\Pjax::begin(['id' => 'new_country']) ?>
                <?php $form = ActiveForm::begin([
                    'id' => 'pagination-product',

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
                                $count = 0;

                                $productItems = count($product_category);
                                $itemsproduct = FicProduct::find()->where(['is_public' => 1])->count();

                                // Define the number of items to display per page.
                                if ($itemsproduct >= 8) {
                                    $productsPerPage = 8;
                                } else {
                                    $productsPerPage = 6;
                                }
                                // Calculate the total number of pages.
                                // $totalPages = ceil($productItems / $productsPerPage);
                                $sumPages = ceil($productItems / $productsPerPage);

                                // Get the current page number from the query string.
                                $presentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
                                // Calculate the starting and ending indices for the current page.
                                $beginIndex = ($presentPage - 1) * $productsPerPage;
                                $endIndex = min($beginIndex + $productsPerPage - 1, $productItems - 1);
                                // $endIndex = min($startIndex + $itemsPerPage - 1, $items - 1);
                                if ($items > 6) {
                                    // Display pagination if there are 6 or more items
                                ?>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination pagination-left">
                                            <?php if (!$isFirstPage) : ?>
                                                <li class="page-item"><a class="page-link" href="?page=<?= ($currentPage - 1) . '#services' ?>">Previous</a></li>
                                            <?php endif; ?>

                                            <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
                                                <li class="page-item <?= ($page == $currentPage) ? 'active' : '' ?>"><a class="page-link " href="?page=<?= ($page) . '#services' ?>"><?= $page ?></a></li>
                                            <?php endfor; ?>

                                            <?php if ($currentPage < $totalPages) : ?>
                                                <li class="page-item"><a class="page-link" href="?page=<?= ($currentPage + 1) . '#services' ?>">Next</a></li>
                                            <?php endif; ?>
                                        </ul>

                                    </nav>
                                <?php
                                }

                                foreach ($product_category as $productname) : ?>
                                    <?php if (!empty($productname->ficProducts)) : ?>
                                        <?php foreach ($productname->ficProducts as $ficproduct) : ?>
                                            <?php if ($ficproduct->is_public == 1) : ?> <!-- Check the is_public status -->
                                                <div class="col-md-4 mix  <?= $ficproduct->product->id ?>"> <!-- product id -->
                                                    <li class="cards_item">
                                                        <div class="card">
                                                            <div class="product-image-wrapper">
                                                                <div class="single-products">
                                                                    <div class="card_image">
                                                                        <?php if ($ficproduct->localMedia != null) : ?>
                                                                            <img src=<?= $ficproduct->localMedia->link ?> alt="" style="height: 25vh" />
                                                                        <?php endif;   ?>
                                                                        <?php if ($ficproduct->localMedia == null) : ?>
                                                                            <img src=<?= Yii::getAlias('@productUrl') ?> style="height: 25vh">
                                                                        <?php endif;   ?>
                                                                        <div class="product-overlay">
                                                                            <div class="overlay-content center" style="padding-bottom:95px">
                                                                                <span id="inquiry-button-<?= $ficproduct->product->id ?>">
                                                                                    <?= Html::a(
                                                                                        'INQUIRE',
                                                                                        ['product-inquiry', 'productId' => $ficproduct->product->id], // Pass techServiceId as a parameter
                                                                                        [
                                                                                            'id' => 'inquire-product-' . $ficproduct->product->id, // Add an ID to the button
                                                                                            'role' => 'modal-remote',
                                                                                            'title' => 'Inquire',
                                                                                            'class' => 'info btn-primary',
                                                                                            'type' => 'submit'
                                                                                        ]
                                                                                    ) ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card_content">
                                                                        <h2 class="card_title"><?= $ficproduct->name ?></h2>
                                                                        <div class="card_text">
                                                                            <ul class="nav nav-pills" style="font-size: 12px;">
                                                                                <!-- Other list items here -->
                                                                                <li style="padding-bottom: 10px;"><span class="pull-left"><b>Category: </b><?= $productname->name ?></span></li>
                                                                                <li style="padding-bottom: 10px;"><span class="pull-left"><b>Equipment: </b><?= $productname->productEquipments[0]->equipment->model ?></span></li>

                                                                                <p>
                                                                                    <li style="padding-bottom: 10px;"><span class="pull-left"><b>Region: </b><?= $ficproduct->fic->municipalityCity->region->code ?>, <?= $ficproduct->fic->municipalityCity->name ?></span></li>
                                                                                </p>
                                                                                <li style="padding-bottom: 10px;"><span class="pull-left"><b>Description: </b><?= $ficproduct->description ?>&nbsp;&nbsp;&nbsp;</span></li>
                                                                                <button type="button" data-toggle="modal" data-target="#myProduct-<?= $ficproduct->product->id ?>" class="btn-block btn-outline-primary modale-button" style="font-size:medium">More Details</button>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </li>
                                                </div>
                                                <div id="myProduct-<?= $ficproduct->product->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">

                                                    <div role="document" class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title" id="exampleModalLongTitle"></h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-0">

                                                                <body class="show" id="body_tab01">
                                                                    <div class="px-3">
                                                                        <!-- /.card -->
                                                                        <!-- display image -->
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <div class="card2">
                                                                                    <div class="card_image">
                                                                                        <?php if ($ficproduct->localMedia !== null) : ?>
                                                                                            <img src="<?= $productname->productEquipments[0]->equipment->image->link ?>" alt="" class="first" />
                                                                                            <img src=<?= $ficproduct->localMedia->link ?> alt="second image" class="second" id="secondImage" onclick="switchImage()" />

                                                                                        <?php else : ?>
                                                                                            <img src="<?= Yii::getAlias('@productUrl') ?>">
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- col-s7 -->
                                                                            <div class="col-md-7 portfolio-details" style="padding-top: 30px; padding-bottom: 20px">
                                                                                <div class="portfolio-info" style="padding-bottom: 10px;">
                                                                                    <h2 style="margin-top: -20px; ">
                                                                                        <?= $ficproduct->name ?>
                                                                                    </h2>
                                                                                    <ul style="margin-top: -10px; color:#2f3640; font-size: 15px">
                                                                                        <li><strong>Category:</strong> <?= $productname->name ?></li>
                                                                                        <li><strong>Equipment:</strong> <?= $productname->productEquipments[0]->equipment->model ?></li>
                                                                                        <li><strong>Description:</strong> <?= $ficproduct->description ?></li>

                                                                                    </ul>
                                                                                </div>
                                                                                <div class="portfolio-info" style="padding-bottom: 10px; background-color: #2980b9">
                                                                                    <h3 style="margin-top: -20px; color: aliceblue;">FIC's Profile</h3>
                                                                                    <ul style="color: #fff; text-align:left">
                                                                                        <li>
                                                                                            <div class="user">
                                                                                                <img src="<?= Yii::getAlias('@avatarUrl') ?>" />
                                                                                                <div class="user-info" style="margin-top: 5px;">
                                                                                                    <h5><span class="pull-left" style="color: aliceblue; font-size: 15px">
                                                                                                            <?= $ficproduct->fic->contact_person  ?>
                                                                                                        </span></h5>
                                                                                                    <small><span class="pull-left" style="color: aliceblue; font-size: 12px;">Contact Person</span></small>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                        <li><strong>Contact Number:</strong> <?= $ficproduct->fic->contact_number ?></li>
                                                                                        <li><strong>Region:</strong> <?= $ficproduct->fic->municipalityCity->region->code ?>, <?= $ficproduct->fic->municipalityCity->name ?></li>
                                                                                        <li><strong>Located at:</strong> <?= $ficproduct->fic->address ?>, (<?= $ficproduct->fic->suc ?>)</li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.card -->
                                                                    </div>
                                                                </body>
                                                            </div>
                                                            <div class="line"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

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
<!-- Your HTML and CSS code here -->

<!-- Your HTML and CSS code here -->


<!--====== PRODUCT PART ENDS ======-->
<?php
//LOADING OVERLAY
$script = <<< JS

    
    $(document).ajaxSend(function(event, jqxhr, settings){
        $("#pagination-product").LoadingOverlay("show");
        
    });
    $(document).ajaxComplete(function(event, jqxhr, settings){
        $("#pagination-product").LoadingOverlay("hide");
        
    });

JS;
$this->registerJs($script, yii\web\View::POS_READY);
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
    "headerOptions" => [
        "style" => "background-color: #0984e3; color: #fff;",
    ],
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>


<script>
    //for dropdown function
    function toggleCheckboxes(clickedCheckbox) {
        var checkboxes = document.getElementsByTagName('input');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] !== clickedCheckbox && checkboxes[i].type === 'checkbox') {
                checkboxes[i].disabled = clickedCheckbox.checked;
            }
        }
    }
</script>
<script>
    // After the dynamic content has been loaded
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

<style>
    /* How to float one image over another  */
    .first {
        position: absolute;
        z-index: 1;
        width: 100%;
        /* Adjust the width as needed */
        height: auto;
        /* Automatically calculate the height to maintain aspect ratio */
    }

    .second {
        position: absolute;
        top: 60%;
        /* Adjust this value to control the vertical position */
        left: 30%;
        /* Adjust this value to control the horizontal position */
        z-index: 2;
        transform: scale(0.4);
        width: 100;
        height: 40%;
        border: 4px solid #c89b3f;
        cursor: pointer;

    }



    /* Custom styles for the close button */
    .custom-close-button {
        background-color: transparent;
        /* Transparent background */
        color: red;
        /* Change the color to red (or your preferred color) */
        font-size: 24px;
        /* Adjust the font size */
        font-weight: bold;
        /* Bold text */
        border: none;
        /* Remove the border */
        outline: none;
        /* Remove the outline */
        cursor: pointer;
        /* Add a pointer cursor on hover */
    }

    /* Hover effect */
    .custom-close-button:hover {
        color: darkred;
        /* Change color on hover */
        text-decoration: none;
        /* Remove underline on hover (optional) */
    }

    /* Modal close button styles */
    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    .close-button:hover {
        color: red;
        /* Change color on hover (optional) */
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

    /* Styling for the inquiry button */
    .btn-inquiry {
        background-color: #3498db;
        /* Button background color */
        color: #fff;
        /* Button text color */
        border: none;
        /* No border */
        padding: 6px 12px;
        /* Adjust padding to make the button smaller */
        font-size: 14px;
        /* Adjust font size for smaller text */
        /* Font size */
        /* border-radius: 5px; */
        /* Rounded corners */
        transition: background-color 0.3s ease;
        /* Smooth transition for hover effect */
    }

    .btn-inquiry:hover {
        background-color: #2980b9;
        /* Button background color on hover */
        text-decoration: none;
        /* Remove underline on hover */
        cursor: pointer;
        /* Change cursor to pointer on hover */
    }

    body {
        font-family: "Lato", Helvetica, Arial;
        font-size: 16px;
    }

    *,
    *:before,
    *:after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .btn1 {
        /* display: inline-block; */
        margin-bottom: 0;
        font-weight: normal;
        text-align: center;
        white-space: nowrap;
        /* vertical-align: middle; */
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid whitesmoke;
        /* padding: -24px 32px; */
        font-size: 14px;
        line-height: 1.42857143;
        border-radius: 2px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding-right: 80%;
        text-align: left;
        /* Align text to the left */
        display: block;
        padding: 10px 10px;
        padding-right: 109px;

    }


    /* Variables */
    :root {
        --orange: #C0392B;
        --blue: #2980B9;
        --gray: #EEE;
    }

    /* Mixins */
    ul-nostyle {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .double-shadow {
        box-shadow: 0 1px 0 rgba(var(--orange), 1) inset, 0 -1px 0 rgba(var(--orange), 1) inset;
    }

    .hover-style:hover {
        background: rgba(var(--orange), 1);
    }

    .animation {
        animation: var(--content);
        -moz-animation: var(--content);
        -webkit-animation: var(--content);
    }

    .keyframes {
        @keyframes var(--name) {
            @content;
        }

        @-moz-keyframes var(--name) {
            @content;
        }

        @-webkit-keyframes var(--name) {
            @content;
        }
    }

    /* Classes */
    .title {
        font-family: 'Pacifico';
        font-weight: normal;
        font-size: 40px;
        text-align: center;
        line-height: 1.4;
        color: var(--orange);
    }

    .dropdown {
        position: relative;
    }

    .dropdown a {
        text-decoration: none;
    }

    .dropdown [data-toggle="dropdown"] {
        display: block;
        color: white;
        background: #0984e3;
        padding: 10px;
        border: 1px solid whitesmoke;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3);
    }

    .dropdown [data-toggle="dropdown"]:before {
        position: absolute;
        display: block;
        content: '\25BC';
        font-size: 0.7em;
        color: #fff;
        top: 13px;
        right: 10px;
    }

    .dropdown>.dropdown-menu {
        max-height: 0;
        overflow: hidden;
        list-style: none;
        transform: scaleY(0);
        transform-origin: 50% 0%;
        transition: max-height 0.6s ease-out;
        animation: hideAnimation 0.4s ease-out;

    }

    .dropdown>.dropdown-menu li {
        padding: 0;

    }

    .dropdown>.dropdown-menu a {
        display: block;
        background: var(--gray);
        box-shadow: 0 1px 0 rgba(238, 238, 238, 1) inset, 0 -1px 0 rgba(238, 238, 238, 1) inset;
        padding: 10px 10px;
        padding-right: 109px;
        font-size: 13px;

    }

    /* Apply styles when hovering over a dropdown menu item */
    .dropdown>.dropdown-menu a:hover {
        background-color: var(--your-hover-color);
        /* Change to your desired hover color */
        color: var(--your-hover-text-color);
        /* Change to your desired hover text color */
        /* Additional styles if needed */
    }

    /* Rest of your existing styles */
    .dropdown>.dropdown-menu a {
        display: block;
        background: var(--gray);
        box-shadow: 0 1px 0 rgba(238, 238, 238, 1) inset, 0 -1px 0 rgba(238, 238, 238, 1) inset;
        padding: 10px 15px;
        padding-right: 109px;
        /* Other styles for normal state */
    }


    .dropdown>input[type="checkbox"] {
        opacity: 0;
        display: block;
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .dropdown>input[type="checkbox"]:checked~.dropdown-menu {
        max-height: 9999px;
        display: block;
        transform: scaleY(1);
        animation: showAnimation 0.5s ease-in-out;
    }

    .dropdown>input[type="checkbox"]:checked+[data-toggle="dropdown"]:before {
        transform: rotate(-180deg);
        transition: transform 0.6s;
    }

    @keyframes showAnimation {
        0% {
            transform: scaleY(0.1);
        }

        /* ... (rest of the keyframes) ... */
        100% {
            transform: scaleY(1);
        }
    }

    @keyframes hideAnimation {
        0% {
            transform: scaleY(1);
        }

        /* ... (rest of the keyframes) ... */
        100% {
            transform: scaleY(0);
        }
    }
</style>