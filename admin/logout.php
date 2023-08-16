<?php
session_set_cookie_params(0);
session_start();
session_destroy();
unset($_SESSION['auth']);
unset($_SESSION['auth_user']);
$_SESSION['status']="Logged out successfully";
header("location: login.php");
// exit(0);
?>