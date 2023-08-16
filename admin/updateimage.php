<?php 
error_reporting(0);
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');
if(isset($_POST['edit_img']))
  {
    $c_id=$_GET['lid'];
    $old_image=$_POST['image_old'];
    $new_image = $_FILES['simg']['name'];
    $tempname = $_FILES['simg']['tmp_name'];
    if($new_image!='')
    {
        $update_fname=$_FILES['simg']['name'];
    }
    else{
        $update_fname=$old_image;
    }
    $folder = "upload/services/".$new_image;
    $sql="UPDATE tblservices SET Image='$update_fname' WHERE id='$c_id'";
    $query=mysqli_query($conn,$sql);
    if(move_uploaded_file($tempname, $folder))
    {
        unlink("upload/services/".$old_image);
        $_SESSION['status']='Image updated successfully';
       header("location: manageservice.php");
    }
    else
    {
        $_SESSION['status']='Failed';
        header("location: updateimage.php");

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
if(isset($_GET['lid']))
{
  $c_id=$_GET['lid'];
  $query="SELECT * FROM tblservices WHERE ID='$c_id'";
  $result=mysqli_query($conn,$query);
  foreach($result as $item):

  ?>
                                <input type="hidden" name="c_id" value="<?php echo $item['ID']; ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Service Name</label>
                                        <input type="text" name="sername" value="<?php echo $item['ServiceName']; ?>"
                                            class="form-control" readonly="true" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Old Image</label>
                                        <input type="hidden" name="image_old" value="<?php echo $item['Image']; ?>"> 

                                        <img src="upload/services/<?php echo $item['Image']?>" width=120>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" accept="image/*" name="simg" id="file"
                                            onchange="loadFile(event)" style="display: none;">
                                        <label for="file" style="cursor: pointer;">Upload Image</label>
                                        <img id="output" width="200" />
                                        <script>
                                        var loadFile = function(event) {
                                            var image = document.getElementById('output');
                                            image.src = URL.createObjectURL(event.target.files[0]);
                                        };
                                        </script>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="edit_img"
                                            class="btn btn-sm btn-primary">Update</button>
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