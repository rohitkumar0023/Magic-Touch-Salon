<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    if(empty($_POST['email']) || empty($_POST['password']) )
    {
        echo "<script>alert('Email and password required')</script>";
    }
    else
    {
        if(strlen($_POST['password']) < 4 )
        {
            echo "<script>alert('length of password is too short')</script>";
        }
        else{
            $email=$_POST['email'];
            $password=$_POST['password'];
            $s="select ID from tbluser where Email='$email' && Password='$password' ";
            $query=mysqli_query($con,$s);
            $ret=mysqli_fetch_array($query);
            if($ret>0){
                $_SESSION['bpmsuid']=$ret['ID'];
                header('location:index.php');
            }
            else{
                echo "<script>alert('Invalid Details.');</script>";
            }
        }
    }
  }
?>
<!doctype html>
<html lang="en">

<head>


    <title>Login</title>
    <link rel="stylesheet" href="assets/css/new.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body >
    <?php include('includes/header.php');?>

    <!-- breadcrumbs -->
    <section class="about1">
        <div class="about-inner login ">
            <div class="container">
                <div class="main-titles-head text-center">
                    <h3 class="header-name ">

                        Login 
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
                    <li class="active ">
                        Login</li>
                </ul>
            </div>
        </div>
        </div>
    </section>
    <!-- breadcrumbs //-->
    <section class="contactinfo" id="contact">
        <div class="contact-sec	">
            <div class="container">

                <div class="d-grid contact-view">
                    <div class="cont-details">
                        <?php
$s="select * from tblpage where PageType='contactus' ";
$ret=mysqli_query($con,$s);

while ($row=mysqli_fetch_array($ret)) {

?>
                        <div class="cont-top">
                            <div class="cont-left text-center">
                                <span class="fa fa-phone text-primary"></span>
                            </div>
                            <div class="cont-right">
                                <h6>Call Us</h6>
                                <p class="para"><?php  echo $row['MobileNumber'];?></p>
                            </div>
                        </div>
                        <div class="cont-top margin-up">
                            <div class="cont-left text-center">
                                <span class="fa fa-envelope-o text-primary"></span>
                            </div>
                            <div class="cont-right">
                                <h6>Email Us</h6>
                                <p class="para"><?php  echo $row['Email'];?></p>
                            </div>
                        </div>
                        <div class="cont-top margin-up">
                            <div class="cont-left text-center">
                                <span class="fa fa-map-marker text-primary"></span>
                            </div>
                            <div class="cont-right">
                                <h6>Address</h6>
                                <p class="para"> <?php  echo $row['PageDescription'];?></p>
                            </div>
                        </div>
                        <div class="cont-top margin-up">
                            <div class="cont-left text-center">
                                <span class="fa fa-map-marker text-primary"></span>
                            </div>
                            <div class="cont-right">
                                <h6>Time</h6>
                                <p class="para"> <?php  echo $row['Timing'];?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="map-content-9 mt-lg-0 mt-4">
                        <form method="post">
                            <div>
                                <input type="email" class="form-control" name="email" 
                                    placeholder="Registered Email" >

                            </div>
                            <div style="padding-top: 30px;">
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    >

                            </div>

                        
                            <button type="submit" class="btn btn-contact" name="login">Login</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php include_once('includes/footer.php');?>
</body>

</html>