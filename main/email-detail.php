<?php
session_start();
include_once('connection.php');

$id=$_SESSION['sid'];
$email=$_SESSION['email'];
$photo=$_SESSION['photo'];

if(!isset($_SESSION['sid']))
{
//header("Location: login.php");
header("Location:error-404.html");
}
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header("Location:logout.php");
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


     
        
        @$coninb=$_GET['coninb'];
            
            if($coninb)
            {
            $inbox="active";
            $url="inbox.php";
            $draft=" ";
            $sent=" " ;
            $trash=" ";
            
            //for search message
            $sql="SELECT * FROM usermail where rec_id='$id' and mail_id='$coninb'";
            $dd=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($dd);
            $un=$row['sen_id'];
            $attcphoto=$row['attachement'];
           // $photoadd='userImages/'.$id.'/data/'.$attcphoto; 

            //for user info mail and full name
            $sqle="SELECT email,full_name,image FROM userinfo where user_name='$un' ";
            $dde=mysqli_query($con,$sqle);
            $rowe=mysqli_fetch_array($dde);
            $simg=$rowe['image'];

            //$smail=$rowe['user_name'];
            $smail=$un;
            $sfullname=$rowe['full_name'];

            //$row=mysqli_fetch_object($dd);
            //echo "Subject :".$row['sub']."<br/>";
            //echo "Message :".$row['msg'];
            //echo $coninb;
            //echo $mid;
            }

  
        
        @$consent=$_GET['consent'];
            
            if($consent)
            {
            $url="sent.php";
            $sent="active";
            $inbox=" ";
            $draft=" ";
            $trash=" ";
            $sql="SELECT * FROM usermail where sen_id='$id' and mail_id='$consent'";
            $dd=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($dd);
            $attcphoto=$row['attachement'];
            //$photoadd='userImages/'.$id.'/data/'.$attcphoto; 

            $un=$row['rec_id'];

            $sqle="SELECT email,full_name,image FROM userinfo where user_name='$un' ";
            $dde=mysqli_query($con,$sqle);
            $rowe=mysqli_fetch_array($dde);
           // $smail=$rowe['email'];
             $smail=$un;
              $simg=$rowe['image'];
            //$smail=$rowe['user_name'];
            $sfullname=$rowe['full_name'];
            //$row=mysqli_fetch_object($dd);
            //echo "Subject :".$row->sub."<br/>";
            //echo "Message :".$row->msg;
            }          

             
          @$condraft=$_GET['condraft'];
            
            if($condraft)
            {
               $url="draft.php";
               //$photo=" ";
               $inbox=" ";
               $sent=" ";
               $draft="active" ;
               $trash=" ";
            $sql="SELECT * FROM draft where user_id='$id' and draft_id='$condraft'";
            $dd=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($dd);
             $attcphoto=$row['attach'];
             //$photoadd='userImages/'.$id.'/data/'.$attcphoto; 

            $un=$row['user_id'];

            $sqle="SELECT email,full_name,image FROM userinfo where user_name='$un' ";
            $dde=mysqli_query($con,$sqle);
            $rowe=mysqli_fetch_array($dde);
           // $smail=$rowe['email'];
            //$smail=$rowe['user_name'];
             $smail=$un;
              $simg=$rowe['image'];
            $sfullname=$rowe['full_name'];
           // $photo=$row[attach];
            //$row=mysqli_fetch_object($dd);
            //echo "Subject :".$row->sub."<br/>";
            //echo "Message :".$row->msg;
            }

            @$contrash=$_GET['contrash'];
            
            if($contrash)
            {
            $url="trash.php";
            $sent=" ";
            $inbox=" ";
            $draft=" ";
            $trash="active";
            $sql="SELECT * FROM trash where rec_id='$id'and trash_id='$contrash'";
            $dd=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($dd);
            $attcphoto=$row['attach'];
//            $photoadd='userImages/'.$id.'/data/'.$attcphoto; 

            $un=$row['rec_id'];

            $sqle="SELECT email,full_name,image FROM userinfo where user_name='$un' ";
            $dde=mysqli_query($con,$sqle);
            $rowe=mysqli_fetch_array($dde);
             
            //$smail=$rowe['email'];
            //$smail=$rowe['user_name'];
             $smail=$un;
              $simg=$rowe['image'];
            $sfullname=$rowe['full_name'];
            //$row=mysqli_fetch_object($dd);
            //echo "Subject :".$row->sub."<br/>";
            //echo "Message :".$row->msg;
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
    <title>INTRANET MAILING SYSTEM</title>
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

<body class="fix-header card-no-border">
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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="inbox.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                         <!--End Logo icon -->
                        <!-- Logo text --><span> Intranet Mailing System
                         <!-- dark Logo text 
                         <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         
                         Light Logo text   
                         <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                         -->
                     </span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        
                        
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item hidden-sm-down">
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a> </form>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo 'userImages/'.$id.'/'.$photo; ?>" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?php echo 'userImages/'.$id.'/'.$photo; ?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $id; ?></h4>
                                                <p class="text-muted"><?php echo $email; ?></p><a href="profile.php" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="profile.php"><i class="ti-user"></i> My Profile</a></li>
                                    
                                    <li><a href="inbox.php"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="profile.php"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="logout.php?chk=logout"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                       
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-xlg-2 col-lg-4 col-md-4">
                                    <div class="card-block inbox-panel"><a href="compose.php" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">Compose</a>
                                        <ul class="list-group list-group-full">
                                            <li class="list-group-item <?php echo $inbox; ?>"> <a href="inbox.php"><i class="mdi mdi-gmail"></i> Inbox </a><span class="badge badge-success ml-auto"></span></li>
                                            <li class="list-group-item">
                                                <a href="javascript:void(0)"> <i class="mdi mdi-star"></i> Starred </a>
                                            </li>
                                            <li class="list-group-item <?php echo $draft; ?>">
                                                <a href="draft.php"> <i class="mdi mdi-send"></i> Draft </a><span class="badge badge-danger ml-auto"></span></li>
                                            <li class="list-group-item <?php echo $sent; ?> ">
                                                <a href="sent.php"> <i class="mdi mdi-file-document-box"></i> Sent Mail </a>
                                            </li>
                                            <li class="list-group-item <?php echo $trash; ?>" >
                                                <a href="trash.php"> <i class="mdi mdi-delete"></i> Trash </a>
                                            </li>
                                        </ul>
                                        <h3 class="card-title m-t-40">Labels</h3>
                                        <div class="list-group b-0 mail-list"> <a href="#" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>Work</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Family</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-purple m-r-10"></span>Private</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-danger m-r-10"></span>Friends</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-success m-r-10"></span>Corporate</a> </div>
                                    </div>
                                </div>
                                <div class="col-xlg-10 col-lg-8 col-md-8">
                                  <div class="card-block">
                                        <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                            <button type="button" class="btn btn-secondary font-18 text-dark"><a href="<?php echo $url ;?>"><i class="mdi mdi-arrow-left"></i></a></button>
                                           <!-- <button type="button" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-alert-octagon"></i></button>
                                            <button type="button" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-delete"></i></button> -->
                                        </div>
                                      <!--  <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary text-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-folder font-18 "></i> </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Dropdown link</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                                            </div>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn text-dark btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-label font-18"></i> </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Dropdown link</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                                            </div>
                                        </div> -->
                                     <!--   <button type="button " class="btn btn-secondary m-r-10 m-b-10 text-dark"><a href=""<i class="mdi mdi-reload font-18"></i></a></button>
                                        header("refresh:0; url=login.html"); -->
                                      <!--  <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn m-b-10 text-dark btn-secondary p-10 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Mark as all read</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                                        </div>
                                    </div> -->
                                    <div class="card-block p-t-0">
                                        <div class="card b-all shadow-none">
                                            
                                            <div class="card-block">
                                                
                                                <h3 class="card-title m-b-0">Sub:<span><?php echo $row['sub']; ?></span></h3>
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            <div class="card-block">
                                                <div class="d-flex m-b-40">
                                                    <div>
                                                        <a href="javascript:void(0)"><img src="<?php echo 'userImages/'.$un.'/'.$simg; ?>" alt="user" width="60" class="img-square" /></a>

                                                    </div>
                                                    <div class="p-l-10">
                                                        <h4 class="m-b-0"><?php echo $sfullname; ?></h4>
                                                        <a href="<?php echo 'view_profile.php?profile='.$smail ; ?> "><small class="text-muted">@<?php echo $smail; ?></small></a>

                                                    </div>

                                                </div>
                                              <!--  <div><p><b>Dear User</b></p> -->
                                                <hr class="m-t-0">
                                                <p>  <?php echo $row['msg']; ?></p></div>
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            <div class="card-block">
                                                <h4><i class="fa fa-paperclip m-r-10 m-b-10"></i> Attachments <span></span></h4>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <a href="<?php 
                                                            echo 'userImages/'.$id.'/data/'.$attcphoto;
                                                         ?>" target="_blank" > <img class="img-thumbnail img-responsive"  src="<?php if($attcphoto){
                                                            echo 'userImages/'.$id.'/data/'.$attcphoto;
                                                        } ?>"> </a>
                                                       
                                                    </div>
                                                    
                                                </div>
                                                <div class="b-all m-t-20 p-20">
                                                    <p class="p-b-20">click here to <a href="<?php echo 'compose.php?id='.rawurlencode($smail)."&sub=@reply to :".rawurlencode($row['sub'])."&msg=@msg:".rawurlencode($row['msg']);echo "@" ; ?> ">Reply</a> or <a href="<?php echo 'compose.php?sub=  '.rawurlencode($row['sub'])."&msg=  ".rawurlencode($row['msg']) ; ?> ">Forward</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <!--  forward=urlencode($smail)."&sub=".urlencode($row['sub'])."&msg=".urlencode($row['msg']) -->
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme working">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
<footer class="footer"> © 2019 INTRANET MAILING SYSTEM.<br><hr> DEVELOPED BY OM RAGHUWANSHI. </footer>             <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
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
