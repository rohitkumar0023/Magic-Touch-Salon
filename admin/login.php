<?php 
session_set_cookie_params(0);
session_start();
include('includes/header.php');
if(isset($_SESSION['auth']))
{
    $_SESSION['status']="You are already logged in!";
    header("location: index.php");
    exit(0);
}
?>

<div class="section">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 my-5">
            <div class="card my-5">
                <div class="card-header bg-light">
                    <h5>LOGIN FORM</h5>
                </div>
            <?php
            include('message.php');
            ?>
                <div class="card-body">
                <form action="logincode.php" method="post">
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input type="text" name="uname" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <div class="form-group">
                        <a href="../index.php">Back to HOME</a>
</div>
</form>


                </div>

            </div>

        </div>
</div>
    </div>
</div>

<?php
include('includes/script.php');
// include('includes/footer.php');
?>