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
            $cid=$_GET['viewid'];
      $remark=$_POST['remark'];
      $status=$_POST['status'];
      $sql="update tblbook set Remark='$remark', Status='$status' where ID='$cid'";
   $query=mysqli_query($conn,$sql);
    if ($query) {
    
    echo '<script>alert("All remark has been updated.")</script>';
    echo "<script type='text/javascript'> document.location ='allappoint.php'; </script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
        }
  
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:red;">View appointment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Appointment</li>
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
                        <h3 class="card-title">View appointment</h3>
                        <a href="allappoint.php" class="btn btn-danger btn-sm float-right">Back</a>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <?php
$cid=$_GET['viewid'];
$s="select * from tblbook where ID=$cid";
$sql="select tbluser.FirstName,tbluser.LastName,tbluser.Email,tbluser.MobileNumber,tblbook.ID as bid,tblbook.AptNumber,tblbook.AptDate,tblbook.AptTime,tblbook.Message,tblbook.BookingDate,tblbook.Remark,tblbook.Status,tblbook.RemarkDate from tblbook join tbluser on tbluser.ID=tblbook.UserID where tblbook.ID='$cid'";
$ret=mysqli_query($conn,$sql);
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
						<table class="table table-bordered">
							<tr>
    <th>Appointment Number</th>
    <td><?php  echo $row['AptNumber'];?></td>
  </tr>
  <tr>
<th>Name</th>
    <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
  </tr>

<tr>
    <th>Email</th>
    <td><?php  echo $row['Email'];?></td>
  </tr>
   <tr>
    <th>Mobile Number</th>
    <td><?php  echo $row['MobileNumber'];?></td>
  </tr>
   <tr>
    <th>Appointment Date</th>
    <td><?php  echo $row['AptDate'];?></td>
  </tr>
 
<tr>
    <th>Appointment Time</th>
    <td><?php  echo $row['AptTime'];?></td>
  </tr>
  
  
  <tr>
    <th>Apply Date</th>
    <td><?php  echo $row['BookingDate'];?></td>
  </tr>
  

<tr>
    <th>Status</th>
    <td> <?php  
if($row['Status']=="")
{
  echo "Not Updated Yet";
}

if($row['Status']=="Selected")
{
  echo "Selected";
}

if($row['Status']=="Rejected")
{
  echo "Rejected";
}

     ;?></td>
  </tr>
						</table>
                        <br>
						<table class="table table-bordered">
							<?php if($row['Status']==""){ ?>


<form name="submit" method="post" enctype="multipart/form-data"> 

<tr>
    <th>Remark :</th>
    <td>
    <input name="remark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></td>
   </tr>

  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     <option value="Selected" selected="true">Selected</option>
     <option value="Rejected">Rejected</option>
   </select></td>
  </tr>

  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button></td>
  </tr>
  </form>
<?php } else { ?>
						</table>
						<table class="table table-bordered">
							<tr>
    <th>Remark</th>
    <td><?php echo $row['Remark']; ?></td>
  </tr>
<tr>
    <th>Status</th>
    <td><?php echo $row['Status']; ?></td>
  </tr>

<tr>
<th>Remark date</th>
<td><?php echo $row['RemarkDate']; ?>  </td></tr>

						</table>
						<?php } }?>
					</div>
				</div>
			</div>
		</div>
</div>
</div>
	</div>
</div>
        
<?php
    }include('includes/script.php');
//  include('includes/footer.php');
?>