<?php
session_start();

include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {

    $uid=$_SESSION['bpmsuid'];
    $adate=$_POST['adate'];
    $atime=$_POST['atime'];
    $msg=$_POST['message'];
    $aptnumber = mt_rand(1000, 99999);
  $s="insert into tblbook(UserId,AptNumber, AptDate, AptTime,Message) values('$uid','$aptnumber','$adate','$atime','$msg')";
    $query=mysqli_query($con,$s);

    if ($query) {
        $s1="select AptNumber from tblbook where tblbook.UserID='$uid' order by ID desc limit 1;";
$ret=mysqli_query($con,$s1);
$result=mysqli_fetch_array($ret);
$_SESSION['aptno']=$result['AptNumber'];
 echo "<script>window.location.href='thank-you.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }


}
?>
<!doctype html>
<html lang="en">

<head>


    <title>Appointment</title>
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
        <div class="about-inner booksalon ">
            <div class="container">
                <div class="main-titles-head text-center">
                    <h3 class="header-name ">

                        Book Appointment
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
                        Book Appointment</li>
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
                            <div style="padding-top: 30px;">
                                <label>Appointment Date</label>

                                <input type="date" class="form-control appointment_date" placeholder="Date" name="adate"
                                    id='adate' required="true">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Appointment Time</label>

                                <input type="time" class="form-control appointment_time" placeholder="Time" name="atime"
                                    id='atime' required="true">
                            </div>

                            <div style="padding-top: 30px;">
                                <textarea class="form-control" id="message" name="message" placeholder="Message"
                                    required=""></textarea>
                            </div>
                            <button type="submit" class="btn btn-contact" name="submit">Make an Appointment</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php include_once('includes/footer.php');?>

</body>

</html><?php } ?>