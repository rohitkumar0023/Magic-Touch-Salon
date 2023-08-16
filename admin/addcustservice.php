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
  
  if(isset($_POST['submit']))
  {
  
$uid=intval($_GET['addid']);
$invoiceid=mt_rand(100000000, 999999999);
$sid=$_POST['sids'];
for($i=0;$i<count($sid);$i++){
   $svid=$sid[$i];
$ret=mysqli_query($conn,"insert into tblinvoice(Userid,ServiceId,BillingId) values('$uid','$svid','$invoiceid');");


echo '<script>alert("Invoice created successfully. Invoice number is "+"'.$invoiceid.'")</script>';
echo "<script>window.location.href ='invoice.php'</script>";
}
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:red;">Assign Services</h1>
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
                        <h3 class="card-title">Assign Services</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post">
                            <table class="table table-bordered table-striped" style="text-align:center;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Service Name</th>
                                        <th>Service Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                       $sql="SELECT * FROM `tblservices`";
                       $result=mysqli_query($conn, $sql);
                       $cnt=1;
                       if(mysqli_num_rows($result)>0) 
                       {
                        while ($row = mysqli_fetch_array($result)) {
                          ?>
                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php  echo $row['ServiceName'];?></td>
                                        <td><?php  echo $row['Cost'];?></td>
                                        <td><input type="checkbox" name="sids[]" value="<?php  echo $row['ID'];?>"></td>
                                    </tr>
                                    <?php 
$cnt=$cnt+1;}
}?>
                                    <tr>
                                        <td colspan="4" align="center">
                                            <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </form>
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