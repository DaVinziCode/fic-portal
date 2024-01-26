<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Fic;
use app\models\FicSns;

$ficList =  Fic::getFics();
$ficSns = FicSns::getFicSns();

?>
<footer>
    <!-- Footer Area Start -->
    <section class="footer-Content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                    <div class="section-header">
                        <h2 class="section-title" style="text-align: left;">Food Innovation Center</h2>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-6 ">
                    <div class="widget">
                        <h3 class="block-title">Located At: </h3>
                        <ul class="contact-footer">

                            <li>
                                <strong>Address :</strong> <span id="addr">Find FIC near me</span>
                            </li>
                        </ul>
                    </div>
                </div> -->
                <div class="col-lg-4 col-xs-6 col-sm-6 col-xs-6 col-mb-12">
                    <div class="widget">
                        <h3 class="block-title">Contact Us:</h3>
                        <ul style="text-align: left;">

                            <li>
                                <strong>Contact Person :</strong> <span id="person"></span>
                            </li>
                            <li>
                                <strong>Phone :</strong> <span id="contactNum"></span>
                            </li>
                            <li>
                                <strong>E-mail :</strong> <span id="mail"> </span>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-5 col-xs-6 col-sm-6 col-xs-6 col-mb-12">
                    <div class="widget">
                        <h3 class="block-title">Select FIC:</h3>


                        <ul>
                            <li style="padding-bottom: 10px;">
                                <?php
                                echo Select2::widget([
                                    'name' => 'state_10',
                                    'value' => 'Select FIC',
                                    'data' => ArrayHelper::map($ficList, 'id', 'name'),
                                    'options' => [
                                        'id' => 'map-select',
                                        'placeholder' => 'Select provinces ...',
                                        'multiple' => false
                                    ],
                                ]);
                                ?>
                            </li>
                            <li><strong>Address :</strong> <span id="addr">Find FIC near me</span></li>


                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Footer area End -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
        <i class="icon-arrow-up"></i>
    </a>

    <!-- <div id="loader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div> -->

    <!-- Copyright Start  -->
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-info float-left">
                        <p>DOST - FIC</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->
</footer>
<?php
$this->registerJsVar('ficSns', $ficSns);
$this->registerJsVar('ficList', $ficList);
$this->registerJs(<<<JS
    let personElement = document.querySelector('#person');
    let mailElement = document.querySelector('#mail');
    let contactNumElement = document.querySelector('#contactNum');
    let addrElement = document.querySelector('#addr');
    // let map = L.map('map').setView([0, 0], 1); // Initialize map

    $('#map-select').on('change', (e) => {
        let val = $('#map-select').select2('data');
        console.log("Selected value:", val);
        let output = val[0].id;
        console.log("Output:", output);

        let valOutput = ficList.filter(e => {
            return e.id == output;
        });
        console.log("Filtered ficList:", valOutput);

        if (valOutput.length > 0) {
            let addr = valOutput[0].address;
            let person = valOutput[0].contact_person;
            let mail = valOutput[0].email;
            let contactNum = valOutput[0].contact_number;
            let lat = valOutput[0].latitude;
            let lng = valOutput[0].longitude;
            let latLng = [lat, lng];
            let header = valOutput[0].name;

            console.log("Address:", addr);
            console.log("Contact Person:", person);
            console.log("Email Contact:", mail);
            console.log("Contact Number:", contactNum);
            console.log("LatLng:", latLng);
            console.log("Header:", header);

            add(addr, person, mail, contactNum, latLng, header);
        }
    });

    function add(addr, person, mail, contactNum, latLng, header) {
        addrElement.textContent = addr;
        personElement.textContent = person;
        mailElement.textContent = mail;
        contactNumElement.textContent = contactNum;

        // Clear existing markers
        map.eachLayer(layer => {
            if (layer instanceof L.Marker) {
                map.removeLayer(layer);
            }
        });

        let marker = L.marker(latLng).addTo(map);
        marker.bindPopup(header).openPopup();
        map.setView(latLng, 13);
    }
JS);
?>