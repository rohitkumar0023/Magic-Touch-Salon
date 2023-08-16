<?php 
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit</h3>
                <a href="registered.php" class="btn btn-danger float-right">Back</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                  <form action="code.php" method="post">
      <div class="modal-body">
        <?php
        if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="SELECT * FROM `users` WHERE id='$id'";
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            foreach($result as $row)
            {
              ?>
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="">Phone Number</label>
            <input type="int" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" placeholder="Phone Number">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" name="edit" class="btn btn-info">Edit</button>
      </div>


          <?php
            }
        }
        else{
          echo "No record found";
        }
        }
        ?>
        
      
</form>

                  </div>
                </div>
                
</div>

    
              </div>
</div>
</div>
</div>
                      </div>
                      </section> 
</div>

</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>