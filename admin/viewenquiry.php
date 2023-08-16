<?php 
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
    header('location:logout.php');
    } else{
        $vid=$_GET['viewid'];
$isread=1;
$query=mysqli_query($conn, "update   tblcontact set IsRead ='$isread' where ID='$vid'");

  
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:red;">View Enquiry</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Enquiry</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                   if(isset($_SESSION['status'])){
                       echo "<h4>".$_SESSION['status']."</h4>";
                       unset($_SESSION['status']);
                   }
               ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View Enquiry</h3>
                        <a href="readenquiry.php" class="btn btn-danger btn-sm float-right">Back</a>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php

$s="select * from tblcontact where ID=$vid";
$ret=mysqli_query($conn,$s);
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <table class="table table-bordered">

                            <th>Name</th>
                            <td><?php  echo $row['FirstName']." ".$row['LastName'];?></td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td><?php  echo $row['Email'];?></td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <td><?php  echo $row['Phone'];?></td>
                            </tr>
                            <tr>
                                <th>Enquiry Date</th>
                                <td><?php  echo $row['EnquiryDate'];?></td>
                            </tr>

                            <tr>
                                <th>Message</th>
                                <td><?php  echo $row['Message'];?></td>
                            </tr>



                        </table>
                        <?php
                        $cnt+=1;
}
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
    }include('includes/script.php');
 include('includes/footer.php');
?>