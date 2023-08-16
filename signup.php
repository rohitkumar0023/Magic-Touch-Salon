<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['mobilenumber'])|| empty($_POST['email']) || empty($_POST['password']) || empty($_POST['repeatpassword']) )
    {

        echo "<script>alert('All fields are required')</script>";
    }
    else
    {
        if(!ctype_alpha($_POST['firstname']) || !ctype_alpha($_POST['lastname']))
        {
            echo "<script>alert('Only Alphabets are required in Name')</script>";

        }
        else
        {
            if(!is_numeric($_POST['mobilenumber']) || strlen($_POST['mobilenumber']) < 10 )
            {
                echo "<script>alert('Only 10 digit phone number required')</script>";

            }
            else
            {
                if(strlen($_POST['password']) < 4 )
                {
                    echo "<script>alert('length of password is too short')</script>";
    
                }
                else{
                    if($_POST['password'] == $_POST['repeatpassword'])
                    {
                        $fname=$_POST['firstname'];
                        $lname=$_POST['lastname'];
                        $contno=$_POST['mobilenumber'];
                        $email=$_POST['email'];
                        $password=$_POST['password'];
                        $s="select Email from tbluser where Email='$email' || MobileNumber='$contno'";
                        $ret=mysqli_query($con, $s);
                        $result=mysqli_fetch_array($ret);
                        if($result>0)
                        {
                            echo "<script>alert('This email or Contact Number already associated with another account!.');</script>";
                        }
                        else{
                            $query=mysqli_query($con, "insert into tbluser(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password' )");
                            if ($query) 
                            {           
                                echo "<script>alert('You have successfully registered.');</script>";
                            } 
                            else
                            {
                                echo "<script>alert('Something Went Wrong. Please try again.');</script>";
                            }
                        }
                    }
                    else
                    {
                        echo "<script>alert('Password and repeat password donot match');</script>";
                    }
                }
            }
        }
    }
  }
?>
<!doctype html>
<html lang="en">

<head>


    <title>Signup</title>
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
        <div class="about-inner signup ">
            <div class="container">
                <div class="main-titles-head text-center">
                    <h3 class="header-name ">

                        Signup
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
                        Signup</li>
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
$c="select * from tblpage where PageType='contactus' ";
$ret=mysqli_query($con,$c);
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
                        <h3>Register with us!!</h3>
                        <form method="post" name="signup" onsubmit="return checkpass();">

                            <div style="padding-top: 30px;">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="firstname" id="firstname"
                                    placeholder="First Name">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="lastname"
                                    placeholder="Last Name">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Mobile Number</label>
                                <input type="text" class="form-control" placeholder="Mobile Number" name="mobilenumber">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Email address</label>
                                <input type="email" class="form-control" class="form-control"
                                    placeholder="Email address" name="email">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div style="padding-top: 30px;">
                                <label>Repeat password</label>
                                <input type="password" class="form-control" name="repeatpassword"
                                    placeholder="Repeat password">
                            </div>

                            <button type="submit" class="btn btn-contact" name="submit">Signup</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php include_once('includes/footer.php');?>
</body>

</html>