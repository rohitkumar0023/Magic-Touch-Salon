<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/new.css">
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family= Roboto+Slab ">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family= Red+Hat+Display ">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family= Overpass ">
</head>

<body>
    <?php include_once('includes/header.php');?>

    <div class="header1">
        <div class="css-slider">
            <input id="slide-1" type="radio" name="slides" checked>
            <section class="slide slide-one">
                <div class="container">
                    <div class="slider-text">
                        <h4>Creative Styling</h4>
                        <h3>beauty salon<br>
                            fashion for women</h3>

                        <a href="book-appointment.php" class="btn logo-button top-margin">Get An Appointment</a>
                    </div>
                </div>
            </section>
            <input id="slide-2" type="radio" name="slides">
            <section class="slide slide-two">
                <div class="container">
                    <div class="slider-text">
                        <h4>Creative Styling</h4>
                        <h3>beauty salon<br>
                            fashion for women</h3>
                        <a href="book-appointment.php" class="btn logo-button top-margin">Get An Appointment</a>
                    </div>
                </div>
            </section>
            <header>
                <label for="slide-1" id="slide-1"></label>
                <label for="slide-2" id="slide-2"></label>
            </header>
        </div>
    </div>
    <section class="sec1">
        <div class="a ">
            <div class="container">
                <div class="grids">
                    <div class="grids-content row">
                        <div class="column col-lg-4 col-md-6 color-2 ">
                            <div>
                                <h4>Our Salon is Most Popular</h4>
                                <p class="para">Various Hair and Beauty Salon Offers - Beauty Services</p>
                                <a href="about.php" class="action-button btn mt-md-4 mt-3">Read more</a>
                            </div>
                        </div>
                        <div class="column col-lg-4 col-md-6 col-sm-6 back-image">
                            <img src="assets/images/new1.jpg" height="100%" alt="product">
                        </div>
                        <div class="column col-lg-4 col-md-6 col-sm-6 back-image2 ">
                            <img src="assets/images/best2.jpg" alt="product">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sec2">
        <div class="s1 ">
            <div class="container">
                <div class="column2">
                    <h3 class="team-head ">Come experience the secrets of relaxation</h3>
                    <p class="para  text ">
                        Provides beauty salon at home. Well
                        trained beauty professionals for beauty services at home including Facial, Clean Up, Bleach,
                        Waxing,Pedicure, Manicure, etc.</p>
                    <a href="book-appointment.php" class="btn logo-button top-margin mt-4">Get An Appointment</a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="sec3">
        <div class="layout">
            <div class="container">
                <div class=" row">
                    <div class="col-lg-6 back-image">
                        <img src="assets/images/bg1.jpg" alt="product">
                    </div>
                    <div class="col-lg-6 about-right-faq align-self">
                        <h3 class="title-big"><a href="about.html">Clean and Recommended Hair Salon</a></h3>
                        <p class="mt-3 para"> Array of beauty parlour services include haircuts, hair spas,
                            colouring, texturing, styling, waxing, pedicures, manicures, threading, body spa, natural
                            facials and more.</p>
                        <div class="hair-cut">
                            <div>
                                <ul class="list">
                                    <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.html">Hair
                                            cut with Blow dry</a></li>
                                    <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.html">Face
                                            Massage</a></li>
                                    <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.html">Skin
                                            Care</a></li>
                                    <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.html">Body
                                            Therapies</a></li>
                                    <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.html">Blow
                                            Dry & Curl</a></li>

                                </ul>
                            </div>
                            <div>
                                <ul class="list">
                                    <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.html">Advance
                                            Hair Color</a></li>
                                    <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.html">Back
                                            Massage</a></li>
                                    <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.html">Color &
                                            highlights</a></li>
                                    <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.html">Hair
                                            Treatment</a></li>
                                    <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.html">Shampoo
                                            & Set</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
    </section>
    <?php include('includes/footer.php');?>
</body>

</html>