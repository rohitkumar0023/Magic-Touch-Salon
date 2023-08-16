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
mysqli_query($conn,"delete from tblservices where ID ='$sid'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='manageservice.php'</script>";
          }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0" style="color:red;">Manage Services</h1>
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
               <h3 class="card-title">Manage Service</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <table class="table table-bordered table-striped" style="text-align:center;">
                 <thead>
                 <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Image</th>
                   <th>Edit</th>
                   <th>Delete</th>
                 </tr>
                 </thead>
                 <tbody>
                   <?php
                       $sql="SELECT * FROM `tblservices`";
                       $result=mysqli_query($conn, $sql);
                       if(mysqli_num_rows($result)>0) 
                       {
                        while ($row = mysqli_fetch_array($result)) {
                          ?>
                          <tr>
                            <td ><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['ServiceName']; ?></td>
                            <td><img src=upload/services/<?php echo $row['Image'] ?>  width='90px' height='100px'></td>
                            <td>
                                        <a href="editservices.php?editid=<?php echo $row['ID'];?>" class="btn btn-info btn-sm">Edit</a>
                           </td>
                           <td>
                                        <!-- <form action="code.php" method="POST">
                                        <input type="hidden" name="del_id" value="<?php //echo $row['ID']; ?>">
                                        <input type="hidden" name="del_image" value="<?php //echo $row['image']; ?>">
                                        <button type="submit" name="del_img" class="btn btn-sm btn-danger">Delete</button>
                                      </form> -->
                                      <a href="manageservice.php?delid=<?php echo $row['ID'];?>"
                                            class="btn btn-sm btn-danger"
                                            onClick="return confirm('Are you sure you want to delete?')">Delete</a>

                                    </td>
                              
                            </tr>
                    <?php
                      }   
                        }
                        else
                       {
                           ?>


<?php
                       }

                   ?>

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