<?php 
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
    header('location:logout.php');
    } else{
        
  
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:red;">View Invoice</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
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
                        <a href="invoice.php" class="btn btn-danger btn-sm float-right">Back</a>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php

$invid=intval($_GET['invoiceid']);
$ret=mysqli_query($conn,"select DISTINCT  date(tblinvoice.PostingDate) as invoicedate,tbluser.FirstName,tbluser.LastName,tbluser.Email,tbluser.MobileNumber,tbluser.RegDate
	from  tblinvoice 
	join tbluser on tbluser.ID=tblinvoice.Userid 
	where tblinvoice.BillingId='$invid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <h3 class="card-title">Invoice #<?php echo $invid; ?></h3>
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
                                <td><?php  echo $row['MobileNumber'];?></td>
                            </tr>
                            <tr>
                                <th>Registration Date</th>
                                <td><?php  echo $row['RegDate'];?></td>
                            </tr>

                            <tr>
                                <th>Invoice Date</th>
                                <td><?php  echo $row['invoicedate'];?></td>
                            </tr>
<?php } ?>
                        </table>
                        <table class="table table-bordered" width="100%" border="1">
                            <tr>
                                <th colspan="3">Services Details</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Service</th>
                                <th>Cost</th>
                            </tr>

                            <?php
                            $gtotal=0;
                            $sql="select tblservices.ServiceName,tblservices.Cost  
                            from  tblinvoice 
                            join tblservices on tblservices.ID=tblinvoice.ServiceId 
                            where tblinvoice.BillingId='$invid'";
$ret=mysqli_query($conn,$sql);
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
	?>

                            <tr>
                                <th><?php echo $cnt;?></th>
                                <td><?php echo $row['ServiceName']?></td>
                                <td><?php echo $subtotal=$row['Cost']?></td>
                            </tr>
                            <?php 
$cnt=$cnt+1;
$gtotal+=$subtotal;
} ?>

                            <tr>
                                <th colspan="2" style="text-align:center">Grand Total</th>
                                <th><?php echo $gtotal?></th>

                            </tr>
                        </table>

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