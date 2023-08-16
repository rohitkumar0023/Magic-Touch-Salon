<?php 
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');
?>
 <!-- <meta http-equiv="refresh" content="30;url=login.php"> -->
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
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <?php
            include('message.php');
            ?>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php
                $sql="SELECT * FROM `tbluser`";
                $q=mysqli_query($conn, $sql);
                $row=mysqli_num_rows($q);
                echo $row;
                ?></h3>

                <p>Customer</p>
              </div>
              <div class="icon">
              <i class="ionicons ion-person"></i>
                          </div>
              <a href="custlist.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php
                $sql="SELECT * FROM `tblbook`";
                $q=mysqli_query($conn, $sql);
                $row=mysqli_num_rows($q);
                echo $row;
                ?></h3>

                <p>Appointment</p>
              </div>
              <div class="icon">
              <i class="ionicons ion-android-clipboard"></i>
                                      </div>
              <a href="allappoint.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php
                $sql="SELECT * FROM `tblservices`";
                $q=mysqli_query($conn, $sql);
                $row=mysqli_num_rows($q);
                echo $row;
                ?>
                </h3>

                <p>Services</p>
              </div>
              <div class="icon">
              <i class="ionicons ion-woman"></i>
                          </div>
              <a href="manageservice.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php
                $sql="select tblinvoice.ServiceId, tblservices.Cost from tblinvoice
                join tblservices on 
                tblservices.ID=tblinvoice.ServiceId";
                $query=mysqli_query($conn,$sql);
                $totalsale=0;
               while($row=mysqli_fetch_array($query))
               {
               $total_sale=$row['Cost'];
               $totalsale+=$total_sale;
               
               }
               if($totalsale=="")
               {
                echo "0";
               } else
               { 
                echo $totalsale;
               }
  // endif;
                ?></h3>

                <p>Total sales</p>
              </div>
              <div class="icon">
              <i class="ionicons ion-social-usd"></i>
                          </div>
              <a href="invoice.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

</div>
</section>
</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>
