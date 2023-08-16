<?php 
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');
if(isset($_POST['add_service']))
{
    if(empty($_POST['sername']) || empty($_POST['serdesc']) || empty($_POST['cost']))
    {
        $_SESSION['status']='All fields are required';
        header('location: addservice.php');
    }
    else
    {
        if(!ctype_alpha($_POST['sername']) || !ctype_alpha($_POST['serdesc']))
        {
            $_SESSION['status']='Only Alphabets are required in service Name ad description';
            header('location: addservice.php');
        }
        else{
            if(!ctype_digit($_POST['cost']))
            {
                echo "<script>alert('Only digits required in cost')</script>";

            }
            else{
                $name=$_POST['sername'];
                $desc=$_POST['serdesc'];
                $cost=$_POST['cost'];
                $filename = $_FILES['simg']['name'];
                $tempname = $_FILES['simg']['tmp_name'];
                $folder = "upload/services/".$filename;
                $sql="INSERT INTO `tblservices`(`ServiceName`, `ServiceDescription`, `Cost`, `Image`) VALUES('$name','$desc','$cost','$filename')";
                $query=mysqli_query($conn,$sql);
                if(move_uploaded_file($tempname, $folder))
                {
                    $_SESSION['status']='Service added successfully';
                    // header("location: addservice.php");
                }
                else
                {
                    $_SESSION['status']='Failed';
                    header("location: addservice.php");

                }
            }
        }
    }
    
}
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:red;">Services</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Service</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
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
                        <h3 class="card-title">Add Service</h3>
                    </div>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="s_id" value="<?php echo $row['id']; ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Service Name</label>
                                <input type="text" name="sername" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="">Service Description</label>
                                <textarea type="text" name="serdesc" class="form-control" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Cost</label>
                                <input type="text" name="cost" class="form-control" placeholder="Cost">
                            </div>
                            <div class="form-group">
                            <input type="file" accept="image/*" name="simg" id="file" onchange="loadFile(event)"
                                style="display: none;">
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
                                <button type="submit" name="add_service" class="btn btn-primary">Add</button>
                            </div>

                    </form>
                </div>



                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<?php
include('includes/script.php');
include('includes/footer.php');
?>