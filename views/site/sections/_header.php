<?php


use yii\helpers\Html;

$this->registerCssFile('@web/css/icomoon.css');

?>
<style>
    video {
        position: static;
        width: 100%;
        height: auto;
        padding-left: 0%;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
    }

    .image img {
        max-width: 80%;
        height: 80%;
        display: block;
        margin: 0 auto;
        opacity: 0;

    }

    .header {
        position: relative;
        /* Ensure positioning context for child elements */
        /* Replace with your header background image */
        background-size: cover;
        color: #fff;
        /* Text color for the header content */
        /* padding: 100px 0; */
        /* Adjust the padding to your preference */
    }

    .header::before main {
        content: '';
        /* Create an empty pseudo-element */
        position: absolute;
        /* Position it absolutely within the header */
        top: 0;
        left: 0;
        width: 100%;
        /* Cover the entire header */
        height: 100%;
        /* Cover the entire header */
        background-color: rgba(0, 0, 0, 0.5);
        /* Semi-transparent black overlay */
        z-index: 1;
        color: #fff;
        /* Place it above the header content */
    }

    .header-content main {
        position: absolute;
        top: 50%;
        /* Adjust vertical positioning */
        left: 50%;
        /* Adjust horizontal positioning */
        transform: translate(-50%, -50%);
        /* Center the content */
        text-align: center;
        /* Center the text horizontally */
        color: #fff;
        z-index: 2;
        /* Place it above the overlay */
    }

    .header-content h1 {
        font-size: 80px;
        font-family: Arial, sans-serif;
        color: #fff;
    }

    .header-content p {
        font-size: 80px;
        font-family: Arial, sans-serif;

    }

    .header-content a {
        color: #fff;

    }

    .header-content a:hover {
        color: red;

    }



    @media (min-width: 992px) and (max-width: 1199px) {
        .hidden-md {
            display: none !important;
        }
    }

    @media (min-width: 1200px) {
        .hidden-lg {
            display: none !important;
        }
    }

    @media (max-width: 767px) {
        .hidden-xs {
            display: none !important;
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .hidden-sm {
            display: none !important;
        }
    }

    .menu.is-open .menu__content {
        visibility: visible;
    }

    .menu.is-open .menu__list {
        transform: translateY(0);
    }

    .menu__control {
        background: #0984e3;
        border: none;
        color: #fff;
        cursor: pointer;
        font: inherit;
    }

    .menu__control:hover,
    .menu__control:active,
    .menu__control:focus {
        opacity: 0.9;
        outline: none;
    }

    .menu__content {
        visibility: hidden;
        overflow: hidden;
        width: 100%;
        position: absolute;
        top: 100%;
        right: 0;
    }

    .menu__list {
        background: #0984e3;
        color: #fff;
        font-size: 24px;
        transition: 0.5s ease-out;
        transform: translateY(-100%);
    }

    .menu__list li+li {
        border-top: 1px solid;
    }

    .menu__list a {
        color: inherit;
        text-decoration: none;
        transition: 0.5s background ease-out;
        display: block;
        padding: 0.3em 0.5em;
    }

    .menu__list a:hover {
        background: #dedede;
    }

    body {
        font-family: Helvetica, sans-serif;
        margin: 0;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }



    .content-wrapper {
        text-align: justify;
        font-size: 0;
    }

    .content-wrapper>* {
        font-size: 32px;
        display: inline-block;
        margin: 0;
    }

    .content-wrapper:after {
        content: "";
        display: inline-block;
        width: 100%;
    }
</style>
<!-- Header Section Start -->
<header id="slider-area">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <nav class="navbar navbar-expand-md fixed-top scrolling-navbar bg-white hidden-xs hidden-md hidden-sm">
        <div class="container">
            <a class="navbar-brand page-scroll" href="#slider-area">
                <?= Html::img("@web/img/logo/DOST_LOGO_updated-removebg-preview.png") ?>
                <?= Html::img("@web/img/logo/ITDI_updated-removebg-preview (1).png") ?>
            </a>
            <div>Department of Science and Technology</div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="lni-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#slider-area">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#services">Services</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#portfolios">Product</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#equipment">Equipment</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#contact">Inquiry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#map">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="header" style="display: block;">
        <div class="image hidden-sm hidden-xs">
            <div class="header-content">
                <!-- Your text goes here -->
                <h1 class="wow bounceIn" data-wow-delay="0.2s">Food Innovation Center</h1>
                <div class="video-promo-content text-center">
                    <p class="wow fadeInUp " data-wow-delay="1.2s" data-animate-effect="fadeIn">
                        <a href="../img/slider/fic-video.mp4" class="video-popup" title="play video">
                            <i class="icon-controller-play"></i>
                        </a>
                    </p>
                </div>

            </div>
            <!-- <img src="../img/slider/facility2.jpg" type="image"> -->
            <div class="carousel" id="imageCarousel">
                <img src="../img/slider/facility2.jpg" alt="Image 1">
                <!-- Add more image elements as needed -->
            </div>
        </div>
    </div>

    <!-- for phone viewing -->
    <nav class="navbar navbar-expand-md fixed-top scrolling-navbar bg-white hidden-lg">
        <div class="container">
            <a class="navbar-brand page-scroll" href="#slider-area">
                <?= Html::img("@web/img/logo/DOST_LOGO_updated-removebg-preview.png") ?>
                <?= Html::img("@web/img/logo/ITDI_updated-removebg-preview (1).png") ?>
            </a>
            <div class="content-wrapper">
                <nav class="menu">
                    <button type="button" class="menu__control">
                        &#9776;
                    </button>
                    <div class="menu__content">
                        <ul class="menu__list">
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#slider-area">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#services">Services</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#portfolios">Product</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#equipment">Equipment</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#contact">Inquiry</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#map">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

        </div>
    </nav>

    <video autoplay="" muted="" loop="auto" id="myVideo" class="hidden-lg hidden-md" style="padding-top: 85px;">
        <source src="../img/slider/fic-banner.webm" type="video/webM">
    </video>

</header>
<main class="hidden-sm hidden-xs">
    <ul class='slider'>
        <li class='items' style="background-image: url('../img/slider/1.jpg')">
            <div class='contents'>
                <h2 class='title float-left'>Food Innovation Center</h2>
                <p class='description'>
                    "Shelf life, Product Development and more..."
                </p>
                <a href="../img/slider/fic-video.mp4" class="video-popup" title="play video">
                    <button>Play Video</button>
                </a>
            </div>
        </li>
        <li class='items' style="background-image: url('../img/slider/facility2.jpg')">
            <div class='contents'>
                <h2 class='title float-left'>Food Innovation Center</h2>
                <p class='description'>"Transforming concepts into products"</p>
                <a href="../img/slider/fic-video.mp4" class="video-popup" title="play video">
                    <button>Play Video</button>
                </a>
            </div>
        </li>
        <li class='items' style="background-image: url('../img/slider/3.jpg')">
            <div class='contents'>
                <h2 class='title float-left'>Food Innovation Center</h2>
                <p class='description'>"Hub for Innovation, R&D and Support services"</p>
                <a href="../img/slider/fic-video.mp4" class="video-popup" title="play video">
                    <button>Play Video</button>
                </a>
            </div>
        </li>
        <li class='items' style="background-image: url('../img/slider/2.jpg')">
            <div class='contents'>
                <h2 class='title float-left'>Food Innovation Center</h2>
                <p class='description'>
                    "Shelf life, Product Development and more..."
                </p>
                <a href="../img/slider/fic-video.mp4" class="video-popup" title="play video">
                    <button>Play Video</button>
                </a>
            </div>
        </li>
        <li class='items' style="background-image: url('../img/slider/6.jpg')">
            <div class='contents'>
                <h2 class='title float-left'>Food Innovation Center</h2>
                <p class='description'>"Transforming concepts into products"</p>

                <a href="../img/slider/fic-video.mp4" class="video-popup" title="play video">
                    <button>Play Video</button>
                </a>
            </div>
        </li>
        <li class='items' style="background-image: url('../img/slider/5.jpg')">
            <div class='contents'>
                <h2 class='title float-left'>Food Innovation Center</h2>
                <p class='description'>"Hub for Innovation, R&D and Support services"</p>
                <a href="../img/slider/fic-video.mp4" class="video-popup" title="play video">
                    <button>Play Video</button>
                </a>
            </div>
        </li>
    </ul>
    <nav class='navs'>
        <ion-icon class='btn prev' name="arrow-back-outline"></ion-icon>
        <ion-icon class='btn next' name="arrow-forward-outline"></ion-icon>
    </nav>
</main>
<!-- Header Section End -->

<?php
//menu for mobile view
$script = <<<JS

      $(document).ready(function() {

        $('.menu__control').click(function(e) {
            e.stopPropagation();
            $(this).closest('.menu').toggleClass('is-open');
        });

        $(document).click(function() {
            $('.menu__control').closest('.menu').removeClass('is-open');
        });

    });
JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>
<script>
    const slider = document.querySelector('.slider');

    function activate(e) {
        const items = document.querySelectorAll('.items');
        e.target.matches('.next') && slider.append(items[0])
        e.target.matches('.prev') && slider.prepend(items[items.length - 1]);
    }

    document.addEventListener('click', activate, false);
</script>

<style>
    header main {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .items {
        width: 200px;
        height: 300px;
        list-style-type: none;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1;
        background-position: center;
        background-size: cover;
        border-radius: 20px;
        box-shadow: 0 30px 50px rgba(0, 122, 207, 0.4) inset;
        transition: transform 0.1s, left 0.75s, top 0.75s, width 0.75s, height 0.75s;

        &:nth-child(1),
        &:nth-child(2) {
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            transform: none;
            border-radius: 0;
            box-shadow: none;
            opacity: 1;
            box-shadow: 500px 500px 500px rgba(0, 122, 207, 0.4) inset;
        }

        &:nth-child(3) {
            left: 50%;
        }

        &:nth-child(4) {
            left: calc(50% + 220px);
        }

        &:nth-child(5) {
            left: calc(50% + 440px);
        }

        &:nth-child(6) {
            left: calc(50% + 660px);
            opacity: 0;
        }
    }

    .contents {
        width: min(30vw, 1000px);
        position: absolute;
        top: 50%;
        left: 4rem;
        transform: translateY(-50%);
        font: 400 0.85rem helvetica, sans-serif;
        color: white;
        text-shadow: 0 3px 8px rgba(0, 0, 0, 0.5);
        opacity: 0;
        display: none;

        & .title {
            font-family: Arial, sans-serif;
            text-transform: uppercase;
            color: white;
        }

        & .description {
            line-height: 1.7;
            margin: 1rem 0 1.5rem;
            font-size: 20px;
            color: white;
        }

        & a button {
            width: fit-content;
            background-color: rgba(0, 0, 0, 0.1);
            color: white;
            border: 2px solid white;
            border-radius: 0.25rem;
            padding: 0.75rem;
            cursor: pointer;

        }
    }

    .items:nth-of-type(2) .contents {
        display: block;
        animation: show 0.75s ease-in-out 0.3s forwards;
    }

    @keyframes show {
        0% {
            filter: blur(5px);
            transform: translateY(calc(-50% + 75px));
        }

        100% {
            opacity: 1;
            filter: blur(0);
        }
    }

    .navs {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 5;
        user-select: none;

        & .btn {
            background-color: rgba(255, 255, 255, 0.5);
            color: rgba(0, 0, 0, 0.7);
            border: 2px solid rgba(0, 0, 0, 0.6);
            margin: 0 0.25rem;
            padding: 0.75rem;
            border-radius: 50%;
            cursor: pointer;

            &:hover {
                background-color: rgba(255, 255, 255, 0.3);
            }
        }
    }

    @media (width > 650px) and (width < 900px) {
        .contents {
            & .title {
                font-size: 1rem;
            }

            & .description {
                font-size: 0.7rem;
            }

            & button {
                font-size: 0.7rem;
            }
        }

        .items {
            width: 160px;
            height: 270px;

            &:nth-child(3) {
                left: 50%;
            }

            &:nth-child(4) {
                left: calc(50% + 170px);
            }

            &:nth-child(5) {
                left: calc(50% + 340px);
            }

            &:nth-child(6) {
                left: calc(50% + 510px);
                opacity: 0;
            }
        }
    }

    @media (width < 650px) {
        .contents {
            & .title {
                font-size: 0.9rem;
            }

            & .description {
                font-size: 0.65rem;
            }

            & button {
                font-size: 0.7rem;
            }
        }

        .items {
            width: 130px;
            height: 220px;

            &:nth-child(3) {
                left: 50%;
            }

            &:nth-child(4) {
                left: calc(50% + 140px);
            }

            &:nth-child(5) {
                left: calc(50% + 280px);
            }

            &:nth-child(6) {
                left: calc(50% + 420px);
                opacity: 0;
            }
        }
    }
</style>