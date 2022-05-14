<?php
//error_reporting(1);
session_start();
include_once('connection.php');

if(isset($_POST['reset_password']))
{
    $user=$_POST['username'];
    $ueid=$_POST['email'];

    if($_POST['username']==" " || $_POST['email']==" ")
    {
    
      echo "<script>alert('fill your username and email first');window.location='login.php'</script>";
    }
    else
    {
    $d=mysqli_query($con,"SELECT * FROM userinfo where user_name='$user' and email='$ueid' ");
    $row=mysqli_fetch_object($d);
        $fid=$row->user_name;
       // $fpass=$row->password;
        $fmail=$row->email;
        //$photo=$row->image;

        if($fid==$_POST['username'] && $fmail==$_POST['email'])
        {
        $_SESSION['sid']=$_POST['username'];
        $_SESSION['email']=$fmail;
        }
        else
        {
        //$err="invalid id or pass";
        echo "<script>alert('Invalid Username or Password');window.location='login.php'</script>";
        }
    }
}

if(isset($_POST['savepassword']))
{
    //$user=$_POST['username'];
    //$ueid=$_POST['email'];
    $user=$_SESSION['sid'];
    $ueid=$_SESSION['email'];
    $newpass=$_POST['newpassword'];
    $confirmpass=$_POST['confirmpassword'];
    if($_POST['newpassword']==" " || $_POST['confirmpassword']==" ")
    {
    
      echo "<script>alert('Enter your Password Correctly');window.location='recover_password.php'</script>";
    }
    if($_POST['confirmpassword'] !== $_POST['newpassword'] )
    {
     echo "<script>alert('Password Not Match');window.location='recover_password.php'</script>";
    }
    else
    {
    $d=mysqli_query($con,"UPDATE userinfo SET password='$newpass' WHERE user_name='$user' and email='$ueid' ");

    echo "<script>alert('Password Successfully Changed');window.location='login.php'</script>";

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
    <title>Intranet Mailing System</title>
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
            <div class="login-box card">
            <div class="card-block">
                <form class="form-horizontal form-material" id="loginform" action="" method="post">
                    <h3 class="box-title m-b-20">Change Password</h3>
                    <div class="form-group ">
                      <div class="col-xs-12">
                        <input class="form-control" type="text" name="newpassword" required="" placeholder="New Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12">
                        <input class="form-control" type="text" name="confirmpassword" required="" placeholder="Confirm Password">
                      </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                      <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="savepassword">Save</button>
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