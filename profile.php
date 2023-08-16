<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $uid=$_SESSION['bpmsuid'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $s="update tbluser set FirstName='$fname', LastName='$lname' where ID='$uid'";
    $query=mysqli_query($con,$s);


    if ($query) {
 echo '<script>alert("Profile updated successully.")</script>';
echo '<script>window.location.href=profile.php</script>';
  }
  else
    {

      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

}


  ?>
<!doctype html>
<html lang="en">

<head>


    <title>Profile</title>
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
        <div class="about-inner profile ">
            <div class="container">
                <div class="main-titles-head text-center">
                    <h3 class="header-name ">

                        Profile
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
                        profile</li>
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
                        <h3>User Profile!!</h3>
                        <form method="post" name="signup" onsubmit="return checkpass();">
                            <?php
$uid=$_SESSION['bpmsuid'];
$s1="select * from tbluser where ID='$uid'";
$ret=mysqli_query($con,$s1);
while ($row=mysqli_fetch_array($ret)) {

?>
                            <div style="padding-top: 30px;">
                                <label>First Name</label>

                                <input type="text" class="form-control" name="firstname"
                                    value="<?php  echo $row['FirstName'];?>" required="true">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Last Name</label>

                                <input type="text" class="form-control" name="lastname"
                                    value="<?php  echo $row['LastName'];?>" required="true">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Mobile Number</label>

                                <input type="text" class="form-control" name="mobilenumber"
                                    value="<?php  echo $row['MobileNumber'];?>" readonly="true">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Email address</label>

                                <input type="text" class="form-control" name="email"
                                    value="<?php  echo $row['Email'];?>" readonly="true">
                            </div>
                        
                            <?php }?>
                            <button type="submit" class="btn btn-contact" name="submit">Save Change</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php include_once('includes/footer.php');?>

</body>

</html><?php } ?>