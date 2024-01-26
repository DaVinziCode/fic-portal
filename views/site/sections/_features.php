<?php

use app\models\Equipment;
use app\models\TechService;
use yii\helpers\Html;


?>
<!-- Services Section Start -->
<section id="services" class="section">
    <div class="container">
        <div class="section-header">
            <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
            <h2 class="section-title">Tech Services</h2>
            <!-- <span>Services</span> -->
            <p class="section-subtitle">FIC's Services Offered</p>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <!-- Portfolio Controller/Buttons -->
                <div class="btn-group-vertical btn-block">

                    <a class="filter active btn btn-common btn-effect" data-filter="all">
                        All
                    </a>
                    <?php foreach (TechService::getServices() as $service) : ?>
                        <a class="btn btn-common btn-effect" style="font-size: 12px" data-filter=.<?= $service->id ?>>
                            <?= $service->name ?>
                        </a>

                    <?php endforeach; ?>
                </div>
                <!-- Portfolio Controller/Buttons Ends-->
            </div>
        </div>


    </div>
</section>

<script>
    function one() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }

    function two() {
        var dot = document.getElementById("dot2");
        var more1Text = document.getElementById("more2");
        var btn1Text = document.getElementById("myBtn2");

        if (dot.style.display === "none") {
            dot.style.display = "inline";
            btn1Text.innerHTML = "Read more";
            more1Text.style.display = "none";
        } else {
            dot.style.display = "none";
            btn1Text.innerHTML = "Read less";
            more1Text.style.display = "inline";
        }
    }

    function three() {
        var dots2 = document.getElementById("dot3");
        var more2Text = document.getElementById("more3");
        var btn2Text = document.getElementById("myBtn3");

        if (dots2.style.display === "none") {
            dots2.style.display = "inline";
            btn2Text.innerHTML = "Read more";
            more2Text.style.display = "none";
        } else {
            dots2.style.display = "none";
            btn2Text.innerHTML = "Read less";
            more2Text.style.display = "inline";
        }
    }





    function four() {
        var dots2 = document.getElementById("dot4");
        var more2Text = document.getElementById("more4");
        var btn2Text = document.getElementById("myBtn4");

        if (dots2.style.display === "none") {
            dots2.style.display = "inline";
            btn2Text.innerHTML = "Read more";
            more2Text.style.display = "none";
        } else {
            dots2.style.display = "none";
            btn2Text.innerHTML = "Read less";
            more2Text.style.display = "inline";
        }
    }

    function five() {
        var dots2 = document.getElementById("dot5");
        var more2Text = document.getElementById("more5");
        var btn2Text = document.getElementById("myBtn5");

        if (dots2.style.display === "none") {
            dots2.style.display = "inline";
            btn2Text.innerHTML = "Read more";
            more2Text.style.display = "none";
        } else {
            dots2.style.display = "none";
            btn2Text.innerHTML = "Read less";
            more2Text.style.display = "inline";
        }
    }

    function six() {
        var dots2 = document.getElementById("dot6");
        var more2Text = document.getElementById("more6");
        var btn2Text = document.getElementById("myBtn6");

        if (dots2.style.display === "none") {
            dots2.style.display = "inline";
            btn2Text.innerHTML = "Read more";
            more2Text.style.display = "none";
        } else {
            dots2.style.display = "none";
            btn2Text.innerHTML = "Read less";
            more2Text.style.display = "inline";
        }
    }
</script>
<!-- Services Section End -->