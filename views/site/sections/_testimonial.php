  <?php

    use app\models\Equipment;
    use app\models\TechService;
    use yii\bootstrap4\Modal;
    use yii\helpers\Html;
    use app\assets\StyleAsset;

    use johnitvn\ajaxcrud\CrudAsset;

    // StyleAsset::register($this);
    // $this->registerCssFile('@web/css/style.css');

    ?>

  <!-- Testimonial Section Start -->
  <section class="testimonial section">
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-md-4">
                  <div class="line-heading" data-aos="fade-up" style="text-align: center"> <b>CATEGORIES</b></div>
                  <!-- Portfolio Controller/Buttons -->
                  <div class="btn-group-vertical btn-block">
                      <a class="filter btn btn-common btn-effect" data-filter="all">
                          All
                      </a>
                      <?php foreach (TechService::getServices() as $service) : ?>
                          <a class="filter btn btn-common btn-effect" style="font-size: 12px" data-filter=.<?= $service->id ?>>
                              <?= $service->name ?>
                          </a>
                      <?php endforeach; ?>
                  </div>
              </div>
              <div class="col-lg-9 col-md-8">
                  <div id="testimonials" class="touch-slider owl-carousel">
                      <?php foreach ($tech_category as $techservice) : ?>
                          <?php if (!empty($techservice->ficTechServices)) : ?>
                              <?php foreach ($techservice->ficTechServices as $tech) : ?>
                                  <?php if ($tech->is_public == 1) : ?> <!-- Check the is_public status -->
                                      <div class=" mix <?= $tech->techService->id ?> ">
                                          <div class="item">
                                              <div class="testimonial-item">
                                                  <div class="author">
                                                      <div class="img-thumb">
                                                          <?php if ($tech->equipment !== null && $tech->equipment->image !== null) : ?>
                                                              <img src="<?= $tech->equipment->image->link ?>" alt="" />
                                                              <!-- <span class="card_price"><span>₱</span><?= number_format($tech->charging_fee) ?></span> -->
                                                          <?php else : ?>
                                                              <img src="<?= Yii::getAlias('@techtUrl') ?>">
                                                              <!-- <span class="card_price"><span>₱</span><?= number_format($tech->charging_fee) ?></span> -->
                                                          <?php endif; ?>
                                                      </div>
                                                      <div class="author-info">
                                                          <?php if ($tech->equipment !== null) : ?>
                                                              <li><span class="pull-left"><b>Equipment: </b><?= $tech->equipment->model ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
                                                          <?php else : ?>
                                                              <li><span class="pull-left"><b>Equipment: </b>N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
                                                          <?php endif; ?>
                                                          <!-- <h2><a href="#">Johnathan Doe</a></h2>
                                                      <span>Marketing Head Matrix media</span> -->
                                                      </div>
                                                  </div>
                                                  <div class="content-inner">
                                                      <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quidem, excepturi facere magnam illum, at accusantium doloremque odio.</p>
                                                      <span><i class="lni-star-filled"></i></span>
                                                      <span><i class="lni-star-filled"></i></span>
                                                      <span><i class="lni-star-filled"></i></span>
                                                      <span><i class="lni-star"></i></span>
                                                      <span><i class="lni-star"></i></span>
                                                  </div>
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
  </section>

  <?php Modal::begin([
        "id" => "ajaxCrudModal", //for form
        "footer" => "", // always need it for jquery plugin
    ]) ?>
  <?php Modal::end(); ?>

  <?php Modal::begin([
        "id" => "notificationModal", // for notificatio
        "footer" => "", // always need it for jquery plugin
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