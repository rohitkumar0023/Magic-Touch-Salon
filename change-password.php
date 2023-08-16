<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['change']))
{
    if($_POST['confirmpassword']==$_POST['newpassword'])
    {
        
$userid=$_SESSION['bpmsuid'];
$cpassword=$_POST['currentpassword'];
$newpassword=$_POST['newpassword'];
$query1=mysqli_query($con,"select ID from tbluser where ID='$userid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query1);
if($row>0){
$ret=mysqli_query($con,"update tbluser set Password='$newpassword' where ID='$userid'");

echo '<script>alert("Your password successully changed.")</script>';
} else {
echo '<script>alert("Your current password is wrong.")</script>';

}
    }
    else
    {
        echo '<script>alert("Password and confirm password do not match")</script>';
    }



}


  ?>
<!doctype html>
<html lang="en">

<head>


    <title>Password</title>
    <link rel="stylesheet" href="assets/css/new.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <?php include('includes/header.php');?>

  

    <!-- breadcrumbs -->
    <section class="about1">
        <div class="about-inner setting ">
            <div class="container">
                <div class="main-titles-head text-center">
                    <h3 class="header-name ">

                        Change Password
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
                    <li class="active ">
                        Change Password</li>
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

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
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
                        <h3>Password change!!</h3>
                        <form method="post" name="changepassword" onsubmit="return checkpass();">

                            <div style="padding-top: 30px;">
                                <label>Current Password</label>

                                <input type="password" class="form-control" placeholder="Current Password"
                                    id="currentpassword" name="currentpassword" value="" required="true">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>New Password</label>

                                <input type="password" class="form-control" placeholder="New Password" id="newpassword"
                                    name="newpassword" value="" required="true">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm Password"
                                    id="confirmpassword" name="confirmpassword" value="" required="true">
                                <button type="submit" class="btn btn-contact" name="change">Save Change</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php include_once('includes/footer.php');?>
</body>

</html><?php } ?>