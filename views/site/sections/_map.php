<?php

use app\assets\LeafletAsset;

LeafletAsset::register($this);
?>
<!-- Map Section Start -->
<section id="google-map-area">
    <div class="container-fluid">
        <div class="section-header">
            <h2 class="section-title"></h2>
        </div>
        <div class="row">
            <div class="col-12 padding-0">
                <div id="map" style="height:400px"></div>
                <!-- <object style="border:0; height: 450px; width: 100%;" data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d34015.943594576835!2d-106.43242624069771!3d31.677719472407432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86e75d90e99d597b%3A0x6cd3eb9a9fcd23f1!2sCourtyard+by+Marriott+Ciudad+Juarez!5e0!3m2!1sen!2sbd!4v1533791187584"></object> -->
            </div>
        </div>
    </div>
</section>
<!-- Map Section End -->
<?php
$this->registerJs(<<<JS
    var map = L.map('map').setView([14.491168127433735, 121.05203801440267], 5);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 22,
        attribution: '© OpenStreetMap',
    }).addTo(map);
JS);
