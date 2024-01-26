<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>


<div class="line-heading"><b>
        <center><?= $tech_category->category ?></center>
    </b></div>
<div id="portfolio" class="portfolio">
    <?php foreach ($technologies as $tech) : ?>
        <div class="col-sm-4" data-aos="fade-up">


            <p><?= $tech->charging_type ?></p>

        </div>

    <?php endforeach; ?>
</div>

<script type="text/javascript">
    $(function() {
        $('.main_content, .main_navi').hide();
        $(window).load(function() {
            $('#loader').fadeOut();
            $('.main_content, .main_navi').fadeIn(2000);
        });
    });
</script>


<?php
