<?php

use app\models\EquipmentType;
use yii\helpers\Html;

$equipmentTypes = EquipmentType::getEquipmentTypes();
$randomIndices = array_rand($equipmentTypes, 4);
$randomTypes = array_intersect_key($equipmentTypes, array_flip($randomIndices));
?>
<!-- Start Pricing Table Section -->
<div id="pricing" class="section pricing-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Pricing Plans</h2>
            <!-- <span>Pricing</span> -->
            <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos debitis.</p>
        </div>

        <div class="row pricing-tables">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="pricing-table">
                    <div class="pricing-details">
                        <h2>Starter Plan</h2>
                        <div class="price">49$ <span>/mo</span></div>
                        <ul>
                            <li>Consectetur adipiscing</li>
                            <li>Nunc luctus nulla et tellus</li>
                            <li>Suspendisse quis metus</li>
                            <li>Vestibul varius fermentum erat</li>
                            <li> - </li>
                        </ul>
                    </div>
                    <div class="plan-button">
                        <!-- <a href="#" class="btn btn-common btn-effect">Get Plan</a> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="pricing-table pricing-big">
                    <div class="pricing-details">
                        <h2>Equipment Rental</h2>
                        <div class="price">99$ <span>/mo</span></div>
                        <ul>
                            <?php foreach ($randomTypes as $randomType) : ?>
                                <li><?= $randomType->name ?></li>
                            <?php endforeach;
                            ?>
                            <li> - </li>
                        </ul>
                    </div>
                    <div class="plan-button">
                        <?=
                        Html::a('Get Sample Computation', [' '], ["class" => "btn btn-common btn-effect", 'data-toggle' => 'modal', 'data-target' => '#modal-sample-computation'])
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="pricing-table">
                    <div class="pricing-details">
                        <h2>Premium Plan</h2>
                        <div class="price">199$ <span>/mo</span></div>
                        <ul>
                            <li>Consectetur adipiscing</li>
                            <li>Nunc luctus nulla et tellus</li>
                            <li>Suspendisse quis metus</li>
                            <li>Vestibul varius fermentum erat</li>
                            <li>Suspendisse quis metus</li>
                        </ul>
                    </div>
                    <div class="plan-button">
                        <?=
                        Html::a('Get Sample Computation', [' '], ["class" => "btn btn-common btn-effect", 'data-toggle' => 'modal', 'data-target' => '#modal-sample-computation'])
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
// $this->render('_sample_computation')
?>
<?php
$this->registerJs(<<<JS

//$('.form-group.field-fictechservice-equipment_id label').text(' ');




JS)

?>
<!-- End Pricing Table Section -->