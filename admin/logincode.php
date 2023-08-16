<?php
session_set_cookie_params(0);
session_start();
include('config/dbconnection.php');
if(isset($_POST['login']))
  {
    if(empty($_POST['uname']) || empty($_POST['password']) )
    {          
      $_SESSION['status']="All fields are required!";
      header('location:login.php');
    }
    else
    {
      if(strlen($_POST['password']) < 4 )
      {
        $_SESSION['status']="Password Length too short";
        header('location:login.php');
      }
      else{
        $adminuser=$_POST['uname'];
        $password=$_POST['password'];
        $query=mysqli_query($conn,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
        $ret=mysqli_fetch_array($query);
        if($ret>0)
        {
          $name=$ret['UserName'];
          $email=$ret['Email'];
          $phone=$ret['MobileNumber'];
          $_SESSION['auth'] = true;
          $_SESSION['auth_user'] = [
            'user_name'=>$name,
            'email'=>$email,
            'phone'=>$phone
          ];
          $_SESSION['bpmsaid']=$ret['ID'];
          header('location:index.php');
        }
        else
        {
          $_SESSION['status']="Invalid Email or Password";
          header("location: login.php");   
        }
      }
    }
  }
else
{
    $_SESSION['status']="Access Denied";
    header("location: login.php");
}

?>

