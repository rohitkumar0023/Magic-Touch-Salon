<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>About us</title>
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/new.css">

    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <?php include('includes/header.php');?>

    <!-- breadcrumbs -->
    <section class="about1">
        <div class="about-inner about">
            <div class="container">
                <div class="text-center">
                    <h3 class="header-name ">
                        About Us
                    </h3>
                </div>
            </div>
        </div>
        <div class="breadcrumbs-sub">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li class="right-side"><a href="index.php" class="">Home <span class="fa fa-angle-right"
                                aria-hidden="true"></span></a>
                        <p>
                    </li>
                    <li class="active ">About</li>
                </ul>
            </div>
        </div>
        </div>
    </section>
    <!-- breadcrumbs //-->
    <section class="about2" id="about">
        <div class="content">
            <div class="container">
                <div class="cwp4-two row">
                    <div class="cwp4-image col-xl-6">
                        <img src="assets/images/brush.jpg" alt="product">
                    </div>
                    <div class="cwp4-text col-xl-6 ">
                        <div>
                            <h3>Beauty and success starts here</h3>
                            <div class="hair-two-colums">
                                <div class="hair-left">
                                    <h5>
                                        Waxing</h5>
                                </div>
                                <div class="hair-left">
                                    <h5>Facial</h5>
                                </div>
                                <div class="hair-left">
                                    <h5>Hair makeup</h5>

                                </div>
                                <div class="hair-left">
                                    <h5>Massage</h5>

                                </div>
                                <div class="hair-left">
                                    <h5>Menicure</h5>
                                </div>

                                <div class="hair-left">
                                    <h5>Pedicure</h5>
                                </div>
                                <div class="hair-left">
                                    <h5>Hair Cut</h5>
                                </div>

                                <div class="hair-left">
                                    <h5>Body Spa</h5>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec">
        <div class="jst-two-col">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hair-make">
                            <?php
                            $sql="select * from tblpage where PageType='aboutus' ";
                            $ret=mysqli_query($con,$sql);
                            while ($row=mysqli_fetch_array($ret)) {
                            ?>
                            <h5><?php  echo $row['PageTitle'];?></h5>
                            <p class="para mt-2" style="text-align:justify;"><?php  echo $row['PageDescription'];?></p>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="col-lg-6 ">
                        <img src="assets/images/q.jpg" alt="product">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('includes/footer.php');?>

</body>

</html>