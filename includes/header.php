<section class="header">
    <header class="absolute-top">
        <div class="container">
            <!--  Changing Color of Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <h1><a class="navbar-brand" href="index.php">
                        Magic Touch
                    </a>
                </h1>
                 <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.php">Services</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>


                        <?php if (strlen($_SESSION['bpmsuid']==0)) {?>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Signup</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin/login.php">Admin</a>
                        </li>
                        <?php }?>


                        <?php if (strlen($_SESSION['bpmsuid']>0)) {?>
                        <li class="nav-item">
                            <a class="nav-link" href="book-appointment.php">Book Salon</a>
                        </li>
                     
                         <li class="nav-item">
                            <a class="nav-link" href="invoicehistory.php">Invoice History</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="change-password.php">Setting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <?php }?>
                    </ul>

                </div>
        </div>

        </nav>
        </div>
    </header>
</section>