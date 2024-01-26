<!-- Contact Section Start -->

<?php

use app\models\Fic;
use app\models\Inquiry;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use dominus77\sweetalert2\Alert;
use kartik\growl\Growl;
use timurmelnikov\widgets\LoadingOverlayPjax;

Alert::widget(['useSessionFlash' => true]);

// $ficListing = FIC::getFics();
// $inquire = new Inquiry();

?>


<section id="contact" class="section">
    <div class="contact-form">
        <?php
        yii\widgets\Pjax::begin(['id' => 'dynamic-form']) ?>
        <?php $form = ActiveForm::begin(
            ['options' => ['data-pjax' => true]]
        ); ?>
        <?php
        LoadingOverlayPjax::begin([
            'color' => 'rgba(255, 102, 255, 0.3)',
            'fontawesome' => 'fa fa-cog fa-spin'

        ]);
        ?>

        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Get In Touch</h2>

                <p class="section-subtitle" style="color:#fff">Get answers to your queries</p>
            </div>

            <div class="row">

                <div class="col-lg-5 col-md-9 col-xs-12">
                    <div class="contact-block">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-top: -20px;">
                                    <?=
                                        $form->field($inquire, 'name')->textInput(['placeholder' => 'Your Name', 'class' => "form-control", 'id' => "name", 'type' => "text"])
                                        ?>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group" style="margin-top: -20px;">
                                    <?=
                                        $form->field($inquire, 'email')->textInput(['placeholder' => 'Your Email', 'class' => "form-control", 'id' => "email", 'type' => "email"])
                                        ?>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>


                            <div class="col-md-12" style="margin-top: -20px;">
                                <div class="form-group">
                                    <?=
                                        $form->field($inquire, 'subject')->textInput(['placeholder' => 'Your Subject', 'class' => "form-control", 'id' => "subject", 'type' => "text"])
                                        ?>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <?=
                                        $form->field($inquire, 'message')->textarea(['placeholder' => 'Your Message', 'class' => "form-control", 'id' => "message", 'type' => "text", 'rows' => "3"])
                                        ?>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="submit-button">
                                    <button class="btn3 btn-common btn-effect" id="submit" type="submit">Send
                                        Message</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>

                        <?php
                        if ($submittedSuccessfully) {
                            Growl::widget([
                                'type' => Growl::TYPE_SUCCESS,
                                'title' => 'Details Sent!',
                                'icon' => 'glyphicon glyphicon-ok-sign',
                                'body' => 'Kindly check your email for further instructions. Thank you!',
                                'showSeparator' => true,
                                'delay' => 0,
                                'pluginOptions' => [
                                    'showProgressbar' => true,
                                    'placement' => [
                                        'from' => 'top',
                                        'align' => 'right',
                                    ]
                                ]
                            ]);
                        }
                        ?>


                    </div>

                </div>
                <div class="col-lg-7 col-md-12 col-xs-12 videos">
                    <video autoplay="" muted="" loop="auto" id="myVideo">
                        <source src="../img/slider/fic-banner.webm" type="video/webM">
                    </video>
                </div>

            </div>
        </div>
        <!-- Modal - END-->

        <?php LoadingOverlayPjax::end(); ?>
        <?php ActiveForm::end(); ?>
        <?php yii\widgets\Pjax::end() ?>
    </div>
</section>


<?php
//LOADING OVERLAY
$script = <<<JS

    
    $(document).ajaxSend(function(event, jqxhr, settings){
        $("#dynamic-form").LoadingOverlay("show");
        
    });

   
    $(document).ajaxComplete(function(event, jqxhr, settings){
        $("#dynamic-form").LoadingOverlay("hide");
        
    });

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>

<style>
    .btn3 {
        border: 0;
        background: #0984e3;
        color: #fff;
        border-radius: 100px;
        width: 200px;
        height: 49px;
        font-size: 16px;
        /* Remove the "position: absolute; top: 90%;" properties */
        margin: 0 auto;
        /* Add this line to center the button horizontally */
        /* display: block; */
        /* Add this line to make the button take up the full width */
        transition: 0.3s;
        cursor: pointer;
    }

    .btn3:hover {
        background: #5d33e6;
        color: #fff;
    }

    #contact {
        background-color: #82ccdd;

    }
</style>