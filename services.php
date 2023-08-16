<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
  ?>
<!doctype html>
<html lang="en">

<head>


    <title>Services</title>
    <link rel="stylesheet" href="assets/css/new.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <?php include_once('includes/header.php');?>

    <!-- breadcrumbs -->
    <section class="about1">
        <div class="about-inner services ">
            <div class="container">
                <div class="main-titles-head text-center">
                    <h3 class="header-name ">
                        Our Services
                    </h3>
                </div>
            </div>
        </div>
        <div class="breadcrumbs-sub">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right"
                                aria-hidden="true"></span></a>
                        <p>
                    </li>
                    <li class="active ">Services</li>
                </ul>
            </div>
        </div>
        </div>
    </section>
    <!-- breadcrumbs //-->
    <section class="w3l-recent-work-hobbies">
        <div class="recent-work ">
            <div class="container">
                <div class="row about-about">
                    <?php
                $sql="select * from  tblservices";

$ret=mysqli_query($con,$sql);
// $cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    <div class="col-lg-4 col-md-6 col-sm-6 propClone">
                        <img src="admin/upload/services/<?php echo $row['Image']?>" alt="product" height="300" width="400"
                            class="img-responsive about-me">
                        <div class="about-grids ">
                            <hr>
                            <h5 class="para"><?php  echo $row['ServiceName'];?></h5>
                            <p class="para " style="text-align:justify;"><?php  echo $row['ServiceDescription'];?> </p>
                            <p class="para " style="color: #7d1128;"> Cost of Service: Rs <?php  echo $row['Cost'];?>
                            </p>

                        </div>
                    </div>
                    <br><?php
// $cnt=$cnt+1;
}?>

                </div>
            </div>
        </div>
    </section>


    <?php include_once('includes/footer.php');?>

</body>

</html>