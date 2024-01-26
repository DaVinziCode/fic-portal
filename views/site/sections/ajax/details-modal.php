   <?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use app\models\backend\Seminars;
    use yii\widgets\Pjax;
    use timurmelnikov\widgets\LoadingOverlayPjax;
    use aryelds\sweetalert\SweetAlert;

    ?>


   <div class="popup" id="popup">

       <div class="popup-inner">

           <?php yii\widgets\Pjax::begin(['id' => 'new_country']) ?>
           <?php $form = ActiveForm::begin(
                [
                    'id' => 'modal-form',
                    'action' => ['training-details'],
                    'options' => ['data-pjax' => true]
                ]
            ); ?>

           <?php LoadingOverlayPjax::begin([
                'color' => 'rgba(255, 102, 255, 0.3)',
                'fontawesome' => 'fa fa-cog fa-spin'
            ]); ?>
           <div class="popup__photo">
               <?= Html::hiddenInput('id', $_GET['id']); ?>
               <img src=<?= $product->productMedias[0]->media->link ?> alt="" />
           </div>
           <div class="popup__text">
               <h1><?= $product->name ?></h1>
               <p><?= $product->name ?></p>
               <a class="popup__close" href="#">X</a>
               <p class="button">Inquire</p>
           </div>

           <?php LoadingOverlayPjax::end(); ?>
           <?php ActiveForm::end(); ?>
           <?php yii\widgets\Pjax::end() ?>

       </div>
   </div>