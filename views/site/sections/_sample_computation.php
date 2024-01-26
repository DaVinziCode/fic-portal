<?php

use app\models\Equipment;
use app\models\Fic;
use app\models\FicTechService;
use app\models\Region;
use app\models\TechService;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;

$ficList = Fic::getFics();
$techServiceModel = new FicTechService();
$equipments = Equipment::getEquipments();
$regions = Region::getRegions();
?>
<style>
    .modal-header {
        background-color: #59abcd;
    }

    .modal-title {
        text-align: center;
    }

    .modal-sample-computation-label {
        border-radius: 20rem;
    }

    #buttonFooter {
        border-radius: 2rem;
    }

    #map-select-contacts {
        border-radius: 4rem !important;
    }
</style>


<?php Modal::begin([
    'id' => 'modal-sample-computation',
    'title' => 'Fill out',
    'size' => 'modal-md',

])
?>
<div class="form-group">
    <?php $form = ActiveForm::begin([
        'id' => 'form-create',
        'action' => '/site/email-computation',
        'options' => [],
        'method' => 'POST',
    ]); ?>


    <p class="text-xl-center font-weight-bold text-uppercase">Contact Information</p>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <input type="text" placeholder="Your Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <input type="tel" placeholder="Contact Number" class="form-control" name="contact" required data-error="Please enter your contact number">
                <div class="help-block with-errors"></div>
            </div>
        </div>

    </div>

    <p class="text-xl-center font-weight-bold text-uppercase">Address</p>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <textarea class="form-control" id="message" placeholder="Address" name="message" rows="2" data-error="Address" required=""></textarea>
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>

    <p class="text-xl-center font-weight-bold text-uppercase">Select</p>

    <?php echo Select2::widget([
        'name' => 'state_7',
        'value' => 'Select Fic',
        'data' => ArrayHelper::map($ficList, 'id', 'name'),
        'options' => [
            'id' => 'map-select-contacts',
            'placeholder' => 'Select Fic ...',
            'multiple' => false,
        ],

    ])
    ?>

    <?= $form->field($techServiceModel, 'equipment_id')->widget(Select2::class, [
        'name' => 'state_8',
        'data' => ArrayHelper::map($equipments, 'id', 'model'),
        // 'theme' => Select2::THEME_BOOTSTRAP,
        'options' => [
            'placeholder' => 'Select an equipment...',
        ],
        'pluginOptions' => [
            'allowClear' => true,

        ]
    ])->label(' ') ?>
    <div class="form-group">
        <?= Html::submitButton('save', ['class' => 'btn btn-success btn-block', 'id' => 'buttonFooter']) ?>
    </div>





    <?php ActiveForm::end(); ?>

</div>


<?php Modal::end(); ?>

<?php
$this->registerJs(<<<JS

JS)
?>