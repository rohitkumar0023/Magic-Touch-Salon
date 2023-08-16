<?php 
error_reporting(0);
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
    header('location:logout.php');
    } else{
        if($_GET['delid']){
            $sid=$_GET['delid'];
            mysqli_query($conn,"delete from tblcontact where ID ='$sid'");
            echo "<script>alert('Data Deleted');</script>";
            echo "<script>window.location.href='readenquiry.php'</script>";
                      }
  
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:red;">Read Enquiry</h1>
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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped" style="text-align:center;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Enquiry Date</th>
                                    <th>Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                $s="select * from tblcontact where IsRead='1'";
                           $ret=mysqli_query($conn,$s);

                            $cnt=1;
                            if(mysqli_num_rows($ret)>0)
                            {
                            while ($row=mysqli_fetch_array($ret)) {

?>

                                <tr>
                                    <th><?php echo $cnt;?></th>
                                    <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
                                    <td><?php  echo $row['Email'];?></td>
                                    <td><?php  echo $row['EnquiryDate'];?></td>
                                    <td><a href="viewenquiry.php?viewid=<?php echo $row['ID'];?>"
                                            class="btn btn-sm btn-primary">View</a>
                                        <a href="readenquiry.php?delid=<?php echo $row['ID'];?>"
                                            class="btn btn-sm btn-danger"
                                            onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                                    </td>

                                </tr>
                                <?php 
$cnt=$cnt+1;}
}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
      }  include('includes/script.php');
include('includes/footer.php');
?>