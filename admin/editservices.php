<?php 
error_reporting(0);
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');
if(isset($_POST['edit_service']))
  {
    $sername=$_POST['sername'];
    $serdesc=$_POST['serdesc'];
    $cost=$_POST['cost'];
    $id=$_GET['editid'];
     $sql="update  tblservices set ServiceName='$sername',ServiceDescription='$serdesc',Cost='$cost' where ID='$id' ";
    $query=mysqli_query($conn,$sql);
    if ($query) {
        $_SESSION['status']='Service updated successfully';
        // header("location: manageservice.php");
    // echo "<script>alert('Service has been Updated.');</script>";
  }
  else
    {
      
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";
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
                    <h1 class="m-0" style="color:red;">Services</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Service</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content mt-4">
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
                            <h3 class="card-title">Update Service</h3>
                            <a href="manageservice.php" class="btn btn-danger btn-sm float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="#" method="post" enctype="multipart/form-data">
                                <?php
if(isset($_GET['editid']))
{
  $c_id=$_GET['editid'];
  $query="SELECT * FROM tblservices WHERE ID='$c_id'";
  $result=mysqli_query($conn,$query);
  foreach($result as $item):

  ?>
                                <input type="hidden" name="c_id" value="<?php echo $item['ID']; ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Service Name</label>
                                        <input type="text" name="sername" value="<?php echo $item['ServiceName']; ?>"
                                            class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Service Description</label>
                                        <textarea type="text" name="serdesc" value="" class="form-control"
                                            placeholder="Name"><?php echo $item['ServiceDescription']; ?>  </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cost</label>
                                        <input type="text" name="cost" value="<?php echo $item['Cost']; ?>"
                                            class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <img src="upload/services/<?php echo $item['Image']?>" width=120>
                                            <a href="updateimage.php?lid=<?php echo $item['ID'];?>">Update Image</a>
                                            <!-- <input type="file" name="image" class="form-control">
                                        <input type="hidden" name="image_old" value="<?php echo $item['image']; ?>"> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="edit_service" class="btn btn-sm btn-primary">Update</button>
                                    </div>
                                    <?php
     endforeach;
     }
     else{
      echo "No ID found";

     }


?>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include('includes/script.php');
include('includes/footer.php');
?>