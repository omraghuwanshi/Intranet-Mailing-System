<?php
session_start();
$id=$_SESSION['sid'];
$logintime=$_SESSION['logintime'];

if(!isset($_SESSION['sid']))
{
//header("Location: login.php");
	header("Location:error-404.html");
}

	include_once('connection.php');

	
	error_reporting(1);
    
    
    //mysqli_query($con,"SELECT * FROM login_info where user_id='$id' and login_time='$logintime'  ");
    if(function_exists('date_default_timezone_set')) {
             date_default_timezone_set("Asia/Kolkata");
          }
        $logouttime=date("d/M/Y_h:i:s_A");
    mysqli_query($con,"UPDATE login_info SET logout_time = '$logouttime' where user_id='$id' and login_time='$logintime'  ");









	session_destroy();
	header("refresh:0; url=login.php");
	
	
?>