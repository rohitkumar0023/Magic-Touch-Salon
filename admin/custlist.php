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
  
  if($_GET['deltid']){
  $sid=$_GET['deltid'];
  mysqli_query($conn,"delete from tbluser where ID ='$sid'");
  echo "<script>alert('Data Deleted');</script>";
  echo "<script>window.location.href='custlist.php'</script>";
            }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:red;">Customer List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Customers</li>
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
                        <h3 class="card-title">Customer List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped" style="text-align:center;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mobile Number</th>
                                    <th>Email</th>
                                    <th>RegistrationDate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                       $sql="SELECT * FROM `tbluser`";
                       $result=mysqli_query($conn, $sql);
                       $cnt=1;
                       
                        while ($row = mysqli_fetch_array($result)) {
                          ?>
                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
                                    <td><?php  echo $row['MobileNumber'];?></td>
                                    <td><?php  echo $row['Email'];?></td>
                                    <td><?php  echo $row['RegDate'];?></td>
                                    <td>
                                        <a href="addcustservice.php?addid=<?php echo $row['ID'];?>"
                                            class="btn btn-sm btn-primary">Assign Services</a>
                                    </td>
                                </tr>
                                <?php 
$cnt=$cnt+1;
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
    }include('includes/script.php');
include('includes/footer.php');
?>