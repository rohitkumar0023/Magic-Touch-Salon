<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html lang="en">

<head>


    <title>Invoice History</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/new.css">

    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <?php include_once('includes/header.php');?>

    <!-- breadcrumbs -->
    <section class="about1">
        <div class="about-inner contact ">
            <div class="container">
                <div class="main-titles-head text-center">
                    <h3 class="header-name ">

                        Invoice History
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
                        Invoice History</li>
                </ul>
            </div>
        </div>
        </div>
    </section>
    <!-- breadcrumbs //-->
    <section class="w3l-contact-info-main" id="contact">
        <div class="contact-sec	">
            <div class="container">

                <div>
                    <div class="cont-details">
                        <div class="table-content table-responsive cart-table-content">
                            <h4 style="padding-bottom: 20px;text-align: center;color: blue;">Invoice History</h4>
                            <table class="table" border="1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Invoice Id</th>
                                        <th>Customer Name</th>
                                        <th>Customer Mobile Number</th>
                                        <th>Invoice Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <?php
                                   $userid= $_SESSION['bpmsuid'];
 $query=mysqli_query($con,"select distinct tbluser.ID as uid, tbluser.FirstName,tbluser.LastName,tbluser.Email,tbluser.MobileNumber,tblinvoice.BillingId,date(tblinvoice.PostingDate) as PostingDate  from  tbluser   
    join tblinvoice on tbluser.ID=tblinvoice.Userid where tbluser.ID='$userid'order by tblinvoice.ID desc");
$cnt=1;
              while($row=mysqli_fetch_array($query))
              { ?>
                                    <tr>
                                        <th scope="row"><?php echo $cnt;?></th>
                                        <td><?php  echo $row['BillingId'];?></td>
                                        <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
                                        <td><?php  echo $row['MobileNumber'];?></td>
                                        <td><?php  echo $row['PostingDate'];?></td>
                                        <td><a href="view-invoice.php?invoiceid=<?php  echo $row['BillingId'];?>"
                                                class="btn btn-info">View</a></td>

                                    </tr><?php $cnt=$cnt+1; } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <?php include_once('includes/footer.php');?>

</body>

</html><?php } ?>