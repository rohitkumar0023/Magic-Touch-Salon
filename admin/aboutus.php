<?php 
error_reporting(0);
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');
if(isset($_POST['edit_about']))
  {
    $pagetitle=$_POST['pagetitle'];
    $pagedes=$_POST['pagedes'];
    $sql="update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes' where  PageType='aboutus'";
    $query=mysqli_query($conn,$sql);
    if ($query) {
        $_SESSION['status']='About us has been updated';
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
                    <h1 class="m-0" style="color:red;">About Us</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
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
                            <h3 class="card-title">Update About Us</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="#" method="post">
                                <?php

  
  $query="SELECT * FROM tblpage WHERE PageType='aboutus'";
  $result=mysqli_query($conn,$query);
  foreach($result as $item):

  ?>
                                <input type="hidden" name="c_id" value="<?php echo $item['ID']; ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Page Title</label>
                                        <input type="text" name="pagetitle" value="<?php echo $item['PageTitle']; ?>"
                                            class="form-control" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Page Description</label>
                                        <textarea type="text" name="pagedes" rows="4" value="" class="form-control"
                                            placeholder="Description"><?php echo $item['PageDescription']; ?> </textarea>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" name="edit_about" class="btn btn-primary">Update</button>
                                    </div>
                                    <?php
     endforeach;
     
     


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