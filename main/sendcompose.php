<?php
session_start();
//error_reporting(1);
include_once('connection.php');

if(!isset($_SESSION['sid']))
{
//header("Location: login.php");
header("Location:error-404.html");
}
$id=$_SESSION['sid'];



if(isset($_POST['send']))
{
    $to=$_POST['to'];
    $sub=$_POST['sub'];
    $msg=$_POST['msg'];
    $file=$_FILES['file']['name'];

            $fileName=$_FILES["file"]["name"];
            $fileSize=$_FILES["file"]["size"]/1024;
           
           // $fileType=$_FILES["file"]["type"];
            $fileTmpName=$_FILES["file"]["tmp_name"];
            $fileTmpNameTo=$_FILES["file"]["tmp_name"];  
   
            $filenm= pathinfo($file);
            $fileType =$filenm['extension'];





    if($to=="" || $sub=="" || $msg=="")
    {
   // $err= "<h3 style='color:red'>fill the related data first</h3>";
     echo '<script type="text/javascript">alert("fill subject and msg first..! ")</script>';
    }
    else
    {
         if($file=="")
           {
             $final_name=NULL;
           }
         else
           {
              if($fileType=="jpeg" || $fileType=="jpg" || $fileType=="png" || $fileType=="gif" || $fileType=="pdf" || $fileType=="docx" || $fileType=="pptx")
               {
                    //file size in kb 4000=4mb approx.
                  if($fileSize<=15000)
                    {
                      $append=date("MdY_hisA");
                      $original_name= pathinfo($file);
                      $final_name = $original_name['filename'] . $append . '.' . $original_name['extension'];
                     // $uploadPathFrom="userImages/".$id."/data/".$final_name;
                     // $uploadPathTo="userImages/".$un."/data/".$final_name;
                    $uploadPathFrom="userImages/$id/data/$final_name";
                    $uploadPathTo="userImages/$to/data/$final_name";
                    }
                  else
                    {
                      echo '<script type="text/javascript">alert("File size is >4mb ")</script>';
                    }
               }
              else
                {
                   echo '<script type="text/javascript">alert("File Type Not Supported ")</script>';
                }
            }  
        
     $d=mysqli_query($con,"SELECT * FROM userinfo where user_name='$to'");
     $row=mysqli_num_rows($d);
     if($row==1)
        {
           
        copy($fileTmpNameTo,$uploadPathTo);
        move_uploaded_file($fileTmpName,$uploadPathFrom);
        //move_uploaded_file($fileTmpName,$uploadPathTo);
        

        mysqli_query($con,"INSERT INTO usermail (mail_id, rec_id, sen_id, sub, msg, attachement, recDT) VALUES (NULL, '$to', '$id', '$sub', '$msg', '$final_name', sysdate())");
        //mysqli_query($con,"INSERT INTO usermail values('','$to','$id','$sub','$msg','',sysdate())");
        
        
       // echo '<script type="text/javascript">alert("Message Send Successfully ")</script>';
               // header("refresh:0; url=compose.php");
        echo "<script>alert('Message Send Successfully ');window.location='compose.php'</script>";
        
        }
    else
        {
        // echo '<script type="text/javascript">alert("Message Send Failed.. ")</script>';
                //header("refresh:0; url=compose.php");
         echo "<script>alert('Message Send Failed..! ');window.location='compose.php'</script>";
        }   
    }
}   


if(isset($_POST['save']))
{
    $to=$_POST['to'];
    $sub=$_POST['sub'];
    $msg=$_POST['msg'];
    $file=$_FILES['file']['name'];

            $fileName=$_FILES["file"]["name"];
            $fileSize=$_FILES["file"]["size"]/1024;
           
           // $fileType=$_FILES["file"]["type"];
            $fileTmpName=$_FILES["file"]["tmp_name"];
            $fileTmpNameTo=$_FILES["file"]["tmp_name"];  
   
            $filenm= pathinfo($file);
            $fileType =$filenm['extension'];
       


    if($sub=="" || $msg=="")
    {
    $err= "<h3 style='color:red'>fill subject and msg first</h3>";
     echo '<script type="text/javascript">alert("fill subject and msg first..! ")</script>';
                //header("refresh:0; url=compose.php");
    }
    
    else
    {
      if($file=="")
           {
             $final_name=NULL;
           }
         else
           {
              if($fileType=="jpeg" || $fileType=="jpg" || $fileType=="png" || $fileType=="gif" || $fileType=="pdf" || $fileType=="docx" || $fileType=="pptx")
               {
                    //file size in kb 4000=4mb approx.
                  if($fileSize<=4000)
                    {
                      if(function_exists('date_default_timezone_set')) {
                         date_default_timezone_set("Asia/Kolkata");
                        }
                      $append=date("MdY_hisA");
                      $original_name= pathinfo($file);
                      $final_name = $original_name['filename'] . $append . '.' . $original_name['extension'];
                     // $uploadPathFrom="userImages/".$id."/data/".$final_name;
                     // $uploadPathTo="userImages/".$un."/data/".$final_name;
                    $uploadPathFrom="userImages/$id/data/$final_name";
                    //$uploadPathTo="userImages/$to/data/$final_name";
                    }
                  else
                    {
                      echo '<script type="text/javascript">alert("File size is >4mb ")</script>';
                    }
               }
              else
                {
                   echo '<script type="text/javascript">alert("File Type Not Supported ")</script>';
                }
            }  
    
     //$query="INSERT INTO draft values('','$id','$sub','$file','$msg',sysdate())";
    move_uploaded_file($fileTmpName,$uploadPathFrom);
    $query="INSERT INTO draft (draft_id, user_id, sub, attach, msg, date) VALUES (NULL, '$id', '$sub', '$final_name', '$msg', sysdate())";
    mysqli_query($con,$query);
     //echo '<script type="text/javascript">alert("Message saved Successfully ")</script>';
                //header("refresh:0; url=compose.php");
    echo "<script>alert(' Message saved Successfully');window.location='compose.php'</script>";
        
    }
}
?>
<?php   

    
//mysqli_query($con,"INSERT INTO usermail  values('','$to','$id','$sub','$msg','',sysdate())");
            //INSERT INTO usermail (mail_id, rec_id, sen_id, sub, msg, attachement, recDT) VALUES (NULL, 'om', 'omraghu', 'testing', 'hello om', 'llo', 'yyyy');
        //mkdir("userImages/$un/data");
        //move_uploaded_file($_FILES["file"]["tmp_name"], "userImages/$un/" . $_FILES["file"]["name"]);
         //move_uploaded_file($fileTmpNameTo,$uploadPathTo);


 //$final_name = $original_name['filename'] . $append . '.' . $original_name['extension'];

   /*      
         
 if($fileType=="application/msword" || $fileType=="application/pdf" || $fileType=="application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $fileType=="jpeg" || $fileType=="jpg" || $fileType=="png" || $fileType=="gif"){
    if($fileSize<=4000){

      //New file name
      $random=rand(1111,9999);
      $newFileName=$random.$fileName;

      //File upload path
      $uploadPath="testUpload/".$newFileName;

      //function for upload file
      if(move_uploaded_file($fileTmpName,$uploadPath)){
        echo "Successful"; 
        echo "File Name :".$newFileName; 
        echo "File Size :".$fileSize." kb"; 
        echo "File Type :".$fileType; 
      }
    }
    else{
      echo "Maximum upload file size limit is 200 kb";
    }
  }
  else{
    echo "You can only upload a Word doc file.";
  }    


die();
*/

//New file name
      //$random=rand(1111,9999);
     // $newFileName=$random.$fileName;

      //File upload path
      //$uploadPath="testUpload/".$newFileName;

      //function for upload file
     
      //  echo "Successful: ".$fileTmpName; 
       // echo "File Name :".$newFileName; 
       // echo "File Size :".$fileSize." kb"; 
       // echo "File Type :".$fileType; 


?>