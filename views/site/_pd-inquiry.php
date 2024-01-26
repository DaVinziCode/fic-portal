<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use timurmelnikov\widgets\LoadingOverlayPjax;


?>

<style>
    .modal-body {
        padding: 1px 16px;
    }
</style>

<div class="modal-container">

    <?php yii\widgets\Pjax::begin(['id' => 'new_country']) ?>

    <?php $form = ActiveForm::begin([
        'id' => 'modal-form',
        'action' => ['inquire-product'], // Adjust the action as needed
        'options' => ['data-pjax' => true]
    ]); ?>

    <?php LoadingOverlayPjax::begin([
        'color' => 'rgba(255, 102, 255, 0.3)',
        'fontawesome' => 'fa fa-cog fa-spin'
    ]); ?>

    <div class="panel panel-success">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<b>Please enter your basic information:</b>
        </div>
        <div style="padding: 10px 20px; margin-top:10px;">
            <div class="contact-block">
                <?= Html::hiddenInput('productId', $_GET['productId']); ?>
                <div class="form-group" style="margin-top: -20px;">
                    <?=
                    $form->field($model, 'name')->textInput(['placeholder' => 'Your Name', 'class' => "form-control", 'id' => "name", 'type' => "text"])
                    ?>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group" style="margin-top: -20px;">

                    <?=
                    $form->field($model, 'email')->input('email', ['placeholder' => 'Your Email', 'class' => "form-control", 'id' => "email", 'type' => "email"])
                    ?>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group" style="margin-top: -20px;">
                    <?=
                    $form->field($model, 'subject')->textInput(['placeholder' => 'Your Subject', 'class' => "form-control", 'id' => "subject", 'type' => "text"])
                    ?>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group" style="margin-top: -20px;">
                    <?=
                    $form->field($model, 'message')->textarea(['placeholder' => 'Your Message', 'class' => "form-control", 'id' => "message", 'type' => "text", 'rows' => "7"])
                    ?>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
    </div>



    <div class="center" style="padding-bottom: 20px;">
        <?= Html::submitButton('Submit', [
            'class' => 'btn2 btn-common btn-effect',
        ]) ?>
    </div>

</div>

<?php LoadingOverlayPjax::end(); ?>
<?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>
</div>

<?php
//LOADING OVERLAY
$script = <<< JS

    
    $(document).ajaxSend(function(event, jqxhr, settings){
        $("#modal-form").LoadingOverlay("show");
        
    });

   
    $(document).ajaxComplete(function(event, jqxhr, settings){
        $("#modal-form").LoadingOverlay("hide");
        
    });

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>

<!-- Include jQuery library -->

<script>
    $(document).ready(function() {
        $('#modal-form').on('beforeSubmit', function(e) {
            e.preventDefault();
            var form = $(this);

            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    try {
                        // Close the current modal
                        $('#ajaxCrudModal').modal('hide'); // Replace 'myModal' with your modal's ID

                        // Show another modal notification
                        var notificationModal = $('#notificationModal'); // Replace with your notification modal's ID
                        notificationModal.modal('show');

                        // Populate the notification area in the new modal
                        var notificationArea = notificationModal.find('.modal-body');
                        notificationArea.html('<div class="alert alert-success">Inquiry submitted successfully. Please check your email for further instructions. Thank you!</div>');
                    } catch (error) {
                        // Handle the error, you can show a different error modal or take other actions
                        console.error('Error:', error);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors if necessary

                    // Populate the notification area in the current modal with an error message
                    $('#notification-area').html('<div class="alert alert-danger">An error occurred while submitting the form.</div>');
                }
            });

            return false;
        });
    });;
</script>

<style>
    .modal-container .btn2 {
        border: 0;
        background: #79a6fe;
        color: #2c3e50;
        border-radius: 100px;
        width: 420px;
        height: 49px;
        font-size: 16px;
        /* Remove the "position: absolute; top: 90%;" properties */
        margin: 0 auto;
        /* Add this line to center the button horizontally */
        display: block;
        /* Add this line to make the button take up the full width */
        transition: 0.3s;
        cursor: pointer;
    }

    /* Media query for screens with a maximum width of 768px */
    @media (max-width: 768px) {
        .modal-container .btn2 {
            width: 100%;
            /* Make the button take up 100% of the available width */
            max-width: 300px;
            /* Set a maximum width to prevent it from becoming too wide on larger screens */
            height: auto;
            /* Let the height adjust to content */
            font-size: 14px;
            /* Adjust font size for smaller screens */
        }
    }

    .modal-container .btn2:hover {
        background: #5d33e6;
        color: #fff;
    }

    .modal-container .form-control {
        /* margin-bottom: -5px; */
        width: 100%;
        margin-bottom: 20px;
        padding: 15px 30px;
        font-size: 14px;
        border-radius: 30px;
        border: 1px solid transparent;
        background: #f5f5f5;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        transition: all 0.3s;
    }




    .modal-title {
        color: #fff;
    }

    /* for required field  */
    /* .required:before {
        content: ' *';
        color: red;
    } */
</style>