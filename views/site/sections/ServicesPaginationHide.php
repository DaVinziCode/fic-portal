<?php

use app\models\Equipment;
use app\models\TechService;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use app\assets\StyleAsset;
use app\models\FicTechService;
use johnitvn\ajaxcrud\CrudAsset;
use timurmelnikov\widgets\LoadingOverlayPjax;
use yii\widgets\ActiveForm;

CrudAsset::register($this);


?>
<!--====== SERVICES PART START ======-->
<style>
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

    .line-heading {
        overflow: hidden;
        margin: 0px 2px 2px 2px;
        color: #65534c;
        font-weight: 300;
        line-height: 30px;
        border-top: 4px solid #636e72;
        border-bottom: 1px solid #636e72;
        text-shadow: 0px 1px 0 rgba(255, 255, 255, 0.5);
    }
</style>
<section id="services" class="section product-area pt-100 pb-130">
    <div class="container">
        <div class="section-header">
            <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
            <h2 class="section-title">Tech Services</h2>
            <!-- <span>Services</span> -->
            <p class="section-subtitle">FIC's Services Offered</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="line-heading" data-aos="fade-up" style="text-align: center"> <b>CATEGORIES</b></div>
                <!-- Portfolio Controller/Buttons -->
                <div class="btn-group-vertical btn-block">
                    <a class="filter btn btn-common btn-effect active" data-filter="all" style="color: #fff;" id="all">
                        All
                    </a>
                    <?php foreach (TechService::getServices() as $service) : ?>
                        <a class="filter btn btn-common btn-effect" style="font-size: 12px; color: #fff" data-filter=.<?= $service->id ?>>
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

                                // Initialize a counter variable for pagination.
                                $counter = 0;


                                $totalItems = count($tech_category);
                                $items = FicTechService::find()->where(['is_public' => 1])->count();

                                // Define the number of items to display per page.
                                if ($items >= 8) {
                                    $itemsPerPage = 8;
                                } else {
                                    $itemsPerPage = 6;
                                }
                                $totalPages = ceil($totalItems / $itemsPerPage);

                                // Get the current page number from the query string.
                                $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

                                // Calculate the starting and ending indices for the current page.
                                $startIndex = ($currentPage - 1) * $itemsPerPage;
                                $endIndex = min($startIndex + $itemsPerPage - 1, $totalItems - 1);
                                // $endIndex = min($startIndex + $itemsPerPage - 1, $items - 1);

                                // Check if the current page is the first page.
                                $isFirstPage = ($currentPage == 1);
                                // Conditionally display pagination based on item count

                                if ($items > 6) {
                                    // Display pagination if there are 6 or more items
                                ?>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination pagination-left">
                                            <?php if (!$isFirstPage) : ?>
                                                <li class="page-item"><a class="page-link" href="?page=<?= ($currentPage - 1) . '#services'  ?>">Previous</a></li>
                                            <?php endif; ?>

                                            <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
                                                <li class="page-item <?= ($page == $currentPage) ? 'active' : '' ?>"><a class="page-link" href="?page=<?= ($page) . '#services' ?>"><?= $page ?></a></li>
                                            <?php endfor; ?>

                                            <?php if ($currentPage < $totalPages) : ?>
                                                <li class="page-item"><a class="page-link" href="?page=<?= ($currentPage + 1) . '#services' ?>">Next</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </nav>
                                    <?php
                                }

                                // Loop through your data, taking into account the pagination.

                                foreach ($tech_category as $techservice) {
                                    // Check if the counter is within the current page's range.
                                    if ($counter >= $startIndex && $counter <= $endIndex) {

                                        if (!empty($techservice->ficTechServices)) {
                                            foreach ($techservice->ficTechServices as $tech) {
                                                if ($tech->is_public == 1) {
                                                    // Display your item content here
                                    ?>
                                                    <div class="col-md-4 mix <?= $tech->techService->id ?>">
                                                        <li class="cards_item">
                                                            <div class="card">
                                                                <div class="card_image">
                                                                    <?php if ($tech->equipment !== null && $tech->equipment->image !== null) : ?>
                                                                        <img src="<?= $tech->equipment->image->link ?>" alt="" style="height: 20vh" />
                                                                        <span class="card_price"><span>₱</span><?= number_format($tech->charging_fee) ?></span>
                                                                    <?php else : ?>
                                                                        <img src="<?= Yii::getAlias('@techtUrl') ?>" style="height: 20vh">
                                                                        <span class="card_price"><span>₱</span><?= number_format($tech->charging_fee) ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="card_content">
                                                                    <h2 class="card_title"><?= $tech->techService->name ?></h2>
                                                                    <div class="card_text">
                                                                        <ul class="nav nav-pills" style="font-size: 12px;">
                                                                            <!-- Other list items here -->

                                                                            <?php if ($tech->equipment !== null) : ?>
                                                                                <li><span class="pull-left"><b>Equipment: </b><?= $tech->equipment->model ?></span></li>
                                                                            <?php else : ?>
                                                                                <li><span class="pull-left"><b>Equipment: </b>N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
                                                                            <?php endif; ?>
                                                                            <p>
                                                                                <li><span class="pull-left"><b>Type: </b><?= $tech->charging_type ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
                                                                            </p>
                                                                            <p>
                                                                                <li><span class="pull-left"><b>Fee: </b><?= number_format($tech->charging_fee) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
                                                                            </p>

                                                                            <p>
                                                                                <li><span class="pull-left"><b>Region: </b><?= $tech->fic->municipalityCity->region->code ?>, <?= $tech->fic->municipalityCity->name ?></span></li>
                                                                            </p>

                                                                            <li style="padding-bottom: 10px;"><span class="pull-left"><b>Description: </b><?= $tech->description ?></span></li>

                                                                            <li style="padding-bottom: 10px;">
                                                                                <span><b>Located at: </b><?= $tech->fic->address ?>, (<?= $tech->fic->suc ?>)</span>
                                                                            </li>
                                                                            <li>
                                                                                <span id="inquiry-button-<?= $tech->techService->id ?>">
                                                                                    <?= Html::a(
                                                                                        'Inquire',
                                                                                        ['create-inquiry', 'techServiceId' => $tech->techService->id], // Pass techServiceId as a parameter
                                                                                        [
                                                                                            'id' => 'inquire-button-' . $tech->techService->id, // Add an ID to the button
                                                                                            'role' => 'modal-remote',
                                                                                            'title' => 'Inquire',
                                                                                            'class' => 'btn btn-inquiry btn-default',
                                                                                            'type' => 'submit'
                                                                                        ]
                                                                                    ) ?>
                                                                                </span>
                                                                            </li>

                                                                        </ul>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

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

                        </div>
                        <!-- row -->
                    </div>
                    <!-- product items -->
                </div>

                <!-- tab content -->
                <?php LoadingOverlayPjax::end(); ?>
                <?php ActiveForm::end(); ?>
                <?php yii\widgets\Pjax::end() ?>
            </div>

        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>


<!--====== PRODUCT PART ENDS ======-->
<?php
//LOADING OVERLAY
$script = <<< JS

    
    $(document).ajaxSend(function(event, jqxhr, settings){
        $("#pagination").LoadingOverlay("show");
        
    });

   
    $(document).ajaxComplete(function(event, jqxhr, settings){
        // setTimeout(() => {
            
        // }, 10000);
        $("#pagination").LoadingOverlay("hide");
        
    });

 $(document).ready(function() {
        // Initial check on page load
        checkAndTogglePagination();

        // Function to check and toggle pagination based on the active filter
        function checkAndTogglePagination() {
            var isAllButtonActive = $('#all').hasClass('active');
            var paginationElement = $('.pagination');

            if (isAllButtonActive) {
                paginationElement.show();
            } else {
                paginationElement.hide();
            }
        }

        // Event handler for clicking on filter buttons
        $('.filter').click(function() {
            // Assuming that clicking on a filter button changes its active state
            checkAndTogglePagination();
        });
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
    "footer" => "", // always need it for jquery plugin
    "headerOptions" => [
        "style" => "background-color: #0984e3; color: #fff;",
    ],
]) ?>
<?php Modal::end(); ?>





<script>
    function openInquiryModal(techServiceId, modalId) {
        // Populate the hidden input field in the modal with the techServiceId
        document.getElementById('inquiry-tech-service-id').value = techServiceId;

        // Trigger the modal
        $('#' + modalId).modal('show');
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

<!-- Services Section End -->
<style>
    /*HOMEPAGE*/
    /* Add this CSS to your stylesheet */
    .pagination.pagination-left {
        text-align: left;
        margin-left: 0;
        position: absolute;
        left: 0;
        top: 105%;
        /* Adjust top position as needed */
        transform: translateY(-50%);
        z-index: 1000;
        /* Optional: Adjust the z-index as needed */
        /* Optional: Adjust margin if needed */
    }


    .card-read-more {
        border-top: 1px solid #D4D4D4;
    }

    .card-read-more .details span {
        font-size: 10px;
        color: #718096;
        display: block;
        margin-top: 16px;
        margin-right: 200px;

    }

    .details {
        margin-top: 10px;
    }

    /* Add a frame around the card_image */
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



    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }



    .cards {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .cards_item {
        display: flex;
        padding: .5rem;
    }

    .card_image {
        position: relative;
        max-height: 250px;
    }

    .card_image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card_price {
        position: absolute;
        top: 8px;
        right: 8px;
        display: flex;
        color: #fff;
        justify-content: center;
        align-items: center;
        width: 68px;
        height: 45px;
        border-radius: 0.25rem;
        background-color: #c89b3f;
        font-size: 18px;
        font-weight: 700;
    }

    .card_price span {
        font-size: 12px;
        margin-top: -2px;
    }

    .note {
        position: absolute;
        top: 8px;
        left: 8px;
        padding: 4px 8px;
        border-radius: 0.25rem;
        background-color: #c89b3f;
        font-size: 14px;
        font-weight: 700;
    }

    .card {
        background-color: white;
        border-radius: 0.25rem;
        box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .card_content {
        position: relative;
        padding: 16px 12px 32px 24px;
        margin: 16px 8px 8px 0;
        max-height: 120px;
        overflow-y: scroll;
    }

    .card_content::-webkit-scrollbar {
        width: 8px;
    }

    .card_content::-webkit-scrollbar-track {
        box-shadow: 0;
        border-radius: 0;
    }

    .card_content::-webkit-scrollbar-thumb {
        background: #c89b3f;
        border-radius: 15px;
    }

    .card_title {
        position: relative;
        margin: 0 0 20px;
        padding-bottom: 10px;
        text-align: center;
        font-size: 15px;
        font-weight: 700;
    }

    .card_title::after {
        position: absolute;
        display: block;
        width: 50px;
        height: 2px;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: #c89b3f;
        content: "";
    }

    hr {
        margin: 24px auto;
        width: 50px;
        border-top: 2px solid #c89b3f;
    }

    .card_text p {
        margin: 0 0 24px;
        font-size: 14px;
        line-height: 1.5;
    }

    .card_text p:last-child {
        margin: 0;
    }
</style>