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
    use yii\widgets\LinkPager;
    use yii\helpers\Url;

    CrudAsset::register($this);


    ?>


 <?php foreach ($technologies as $techservice) : ?>
     <?php if ($techservice->is_public == 1) : ?> <!-- Check the is_public status -->
         <div class="col-md-4 mix <?= $techservice->id ?>">
             <li class="cards_item">
                 <div class="card">
                     <div class="card_image">
                         <?php if ($techservice->equipment !== null && $techservice->equipment->image !== null) : ?>
                             <img src="<?= $techservice->equipment->image->link ?>" alt="" style="height: 20vh" />
                             <span class="card_price"><span>₱</span><?= number_format($techservice->charging_fee) ?></span>
                         <?php else : ?>
                             <img src="<?= Yii::getAlias('@techtUrl') ?>" style="height: 20vh">
                             <span class="card_price"><span>₱</span><?= number_format($techservice->charging_fee) ?></span>
                         <?php endif; ?>
                     </div>
                     <div class="card_content">
                         <h2 class="card_title"><?= $techservice->techService->name ?></h2>
                         <div class="card_text">
                             <ul class="nav nav-pills" style="font-size: 12px;">
                                 <!-- Other list items here -->

                                 <?php if ($techservice->equipment !== null) : ?>
                                     <li><span class="pull-left"><b>Equipment: </b><?= $techservice->equipment->model ?></span></li>
                                 <?php else : ?>
                                     <li><span class="pull-left"><b>Equipment: </b>N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
                                 <?php endif; ?>
                                 <p>
                                     <li><span class="pull-left"><b>Type: </b><?= $techservice->charging_type ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
                                 </p>
                                 <p>
                                     <li><span class="pull-left"><b>Fee: </b><?= number_format($techservice->charging_fee) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
                                 </p>

                                 <p>
                                     <li><span class="pull-left"><b>Region: </b><?= $techservice->fic->municipalityCity->region->code ?>, <?= $techservice->fic->municipalityCity->name ?></span></li>
                                 </p>

                                 <li style="padding-bottom: 10px;"><span class="pull-left"><b>Description: </b><?= $techservice->description ?></span></li>

                                 <li style="padding-bottom: 10px;">
                                     <span><b>Located at: </b><?= $techservice->fic->address ?>, (<?= $tech->fic->suc ?>)</span>
                                 </li>
                                 <li>
                                     <span id="inquiry-button-<?= $techservice->techService->id ?>">
                                         <?= Html::a(
                                                'Inquire',
                                                ['create-inquiry', 'techServiceId' => $techservice->techService->id], // Pass techServiceId as a parameter
                                                [
                                                    'id' => 'inquire-button-' . $techservice->techService->id, // Add an ID to the button
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
     <?php endif; ?>
 <?php endforeach; ?>





 <!-- tab content -->


 <div class="col-sm-9" data-aos="fade-up">
     <?php
        echo LinkPager::widget([
            'pagination' => $pages,
            'linkOptions' => ['class' => 'lnk']
        ]);
        ?>
 </div>