<?php
session_start();

include_once('connection.php');
error_reporting(1);
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

$id=$_SESSION['sid'];
$email=$_SESSION['email'];
$photo=$_SESSION['photo'];


if(isset($_POST['updateprofile']))
{
       // $user=$_POST['username'];
       // $ueid=$_POST['email'];
        $upassword=$_POST['password'];
        $uemail=$_POST['email'];
        
        $umobile=$_POST['mobile'];
        $ufullname=$_POST['fullname'];
       
        $urole=$_POST['role'];
        $ulocation=$_POST['location'];
        
        $uaddress=$_POST['address'];
        $umessage=$_POST['message'];
        
        $ugender=$_POST['gender'];
        $uhobbies=$_POST['hobbies'];
        $udob=$_POST['dob'];
       // $uimage=$_POST['image'];
        $file=$_FILES['file']['name'];

            $fileName=$_FILES["file"]["name"];
            $fileSize=$_FILES["file"]["size"]/1024;
            //$fileSize=$_FILES["file"]["size"];
           // $fileType=$_FILES["file"]["type"];
            $fileTmpName=$_FILES["file"]["tmp_name"];
           // $fileTmpNameTo=$_FILES["file"]["tmp_name"];  
   
            $filenm= pathinfo($file);
            $fileType =$filenm['extension'];
        
        if($photo==$fileName)
        {
           $final_name=$photo;
        }
        else{

            if($fileType=="jpeg" || $fileType=="jpg" || $fileType=="png" || $fileType=="gif")
               {
                    //file size in kb 4000=4mb approx.
                  if($fileSize<=10000)
                    {
                      $date=date("MdY_hisA");
                      $append="profile".$date;
                      $original_name= pathinfo($file);
                      $final_name = $original_name['filename'] . $append . '.' . $original_name['extension'];
                     // $uploadPathFrom="userImages/".$id."/data/".$final_name;
                     // $uploadPathTo="userImages/".$un."/data/".$final_name;
                    $uploadPathFrom="userImages/$id/$final_name";
                    unset($_SESSION['photo']);
                    $_SESSION['photo']=$final_name;
                    //$uploadPathTo="userImages/$to/data/$final_name";
                    }
                  else
                    {
                      echo '<script type="text/javascript">alert("File size is >10mb ")</script>';
                    }
                }
        


 move_uploaded_file($fileTmpName,$uploadPathFrom);
    
    $d=mysqli_query($con,"UPDATE userinfo SET password='$upassword',mobile='$umobile',email='$uemail',gender='$ugender',hobbies='$uhobbies',dob='$udob',full_name='$ufullname',role='$urole',location='$ulocation',address='$uaddress',image='$final_name',message='$umessage' WHERE user_name='$id'");
    
     
    

    echo "<script>alert('Profile Updated');window.location='profile.php'</script>";

    
  }
}