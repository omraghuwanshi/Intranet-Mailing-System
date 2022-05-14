<?php
error_reporting(1);
session_start();
include_once('connection.php');

if(isset($_SESSION['sid']))
{
//header("Location: login.php");
header("Location:inbox.php");
}


if(isset($_POST['signIn']))
{
    if($_POST['id']=="" || $_POST['pwd']=="")
    {
    $err="fill your id and password first";
    }
    else
    {
    $d=mysqli_query($con,"SELECT * FROM userinfo where user_name='{$_POST['id']}'");
    $row=mysqli_fetch_object($d);
        $fid=$row->user_name;
        $fpass=$row->password;
        $fmail=$row->email;
        $photo=$row->image;

        if($fid==$_POST['id'] && $fpass==$_POST['pwd'])
        {
        $_SESSION['sid']=$_POST['id'];
        $_SESSION['email']=$fmail;
        $_SESSION['photo']=$photo;
        if(function_exists('date_default_timezone_set')) {
             date_default_timezone_set("Asia/Kolkata");
          }
        $date=date("d/M/Y_h:i:s_A");
        $_SESSION['logintime']=$date;
        
        //header('location:HomePage.php');\
        $logintime=$_SESSION['logintime'];
        $ipaddress = $_SERVER['REMOTE_ADDR'];
         $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
         $logouttime='';
       //$ipaddress= getenv('HTTP_CLIENT_IP');
       
        
        //$browserAgent = $_SERVER['HTTP_USER_AGENT'];
       // echo $browserAgent;
       // echo $ipaddress ." ";
        //echo$hostname;
      // echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
//--------------------------------------------------------------------------------------------------        
    $browser="";
if(strrpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("MSIE")))
{
$browser="Internet Explorer";
}
else if(strrpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("Presto")))
{
$browser="Opera";
}
else if(strrpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("CHROME")))
{
$browser="Google Chrome";
}
else if(strrpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("SAFARI")))
{
$browser="Safari";
}
else if(strrpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("FIREFOX")))
{
$browser="FIREFOX";
}
else
{
$browser="OTHER";
}
//echo "Your Browser is :" .$browser;
//--------------------------------------------------------------------------------------------------

mysqli_query($con,"INSERT INTO login_info (sno, user_id, email, ip, browser, host_address, login_time, logout_time) VALUES (NULL, '$fid', '$fmail', '$ipaddress', '$browser', '$hostname', '$logintime', '$logouttime')");
//INSERT INTO login_info (sno, user_id, email, ip, browser, host_address, login_time, logout_time) VALUES (NULL, '$fid', '$fmail', '$ipaddress', '$browser', '$hostname', 'logintime', 'logouttime');

echo "<script>window.location='inbox.php'</script>";
//----------------------------------------------------------------------    
      
    




//-------------------------------------------------------------------
        }
        else
        {
        echo "<script>alert('Invalid Username or Password');window.location='login.php'</script>";
        
        //$err="invalid id or pass";
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Intranet Mailing system</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/green.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">

        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">  
        <br><br><br><br>      
            <div class="login-box card">
            <div class="card-block">
                <form class="form-horizontal form-material" id="loginform" action=" " method="POST" >
                    <h3 class="box-title m-b-20">Sign In</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Username"name="id" > </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password"  name="pwd" required="" placeholder="Password"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                         <!--       <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label> --> 
                            </div> <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot Password?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" value="SignIn" name="signIn">Log In</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Don't have an account? <a href="register.html" class="text-info m-l-5"><b>Sign Up</b></a></p>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" method="post" action="recover_password.php">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="username" required="" placeholder="@username">
                             </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            
                            <input class="form-control" type="text" name="email" required="" placeholder="Email">
                             </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="reset_password">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
        
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>