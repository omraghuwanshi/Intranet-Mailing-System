<?php
session_start();
//error_reporting(1);
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

include_once('connection.php');



  // delete message from inbox
  @$inbdel=$_GET['inbdel'];
  if($inbdel>0)
  {
    $sql=mysqli_query($con,"SELECT * FROM usermail where rec_id='$id' and mail_id='$inbdel'");
    while($dd=mysqli_fetch_array($sql))
   {
	$rec=$dd['rec_id'];
	$sen=$dd['sen_id'];
	$sub=$dd['sub'];
	$msg=$dd['msg'];
	$att=$dd['attachement'];
	
	//store into trash table
	mysqli_query($con,"INSERT INTO trash (trash_id, rec_id, sen_id, sub, msg,attach, date) 
                       VALUES (NULL, '$rec', '$sen', '$sub', '$msg','$att', sysdate())");
	//delete form inbox
	mysqli_query($con,"DELETE FROM usermail WHERE rec_id='$id' and mail_id='$inbdel'");
    }
	

echo "<script>alert('message deleted from inbox');window.location='inbox_test.php'</script>";
 //echo "Success";
}
else{echo "<script>alert('select first');window.location='inbox_test.php'</script>";
}



 @$drafdel=$_GET['draftdel'];
  if($drafdel>0)
   {
    $sql=mysqli_query($con,"SELECT * FROM draft where user_id='$id' and draft_id='$drafdel'");
    while($dd=mysqli_fetch_array($sql))
	{
	$rec=$dd['user_id'];
	$sen="you";
	//$sen=$dd['user_id'];
	$sub=$dd['sub'];
	$msg=$dd['msg'];
	$att=$dd['attach'];
	//store into trash table
	//mysqli_query($con,"INSERT into trash values('','$rec','$sen','$sub','$msg',now())");
	mysqli_query($con,"INSERT INTO trash (trash_id, rec_id, sen_id, sub, msg,attach, date) VALUES (NULL, '$rec', '$sen', '$sub', '$msg','$att', sysdate())");
	//delete form inbox
	mysqli_query($con,"DELETE FROM draft where user_id='$id' and draft_id='$drafdel'");
    }
   
   echo "<script>alert('message deleted from draft');window.location='draft_test.php'</script>";
 }
 else{echo "<script>alert('select first');window.location='draft_test.php'</script>";}


if(isset($_POST['deletesent'])) 
{
	if($_POST['ch']>0)
{
foreach($_POST['ch'] as $v)
{
//echo $v;
$sql=mysqli_query($con,"SELECT * FROM usermail where sen_id='$id' and mail_id='$v'");
while($dd=mysqli_fetch_array($sql))
	{
	$rec=$dd['rec_id'];
	$sen=$dd['sen_id'];
	$sub=$dd['sub'];
	$msg=$dd['msg'];
	$att=$dd['attach'];
	//store into trash table
	//mysqli_query($con,"INSERT into trash values('','$rec','$sen','$sub','$msg',now())");
	mysqli_query($con,"INSERT INTO trash (trash_id, rec_id, sen_id, sub, msg, date) VALUES (NULL, '$rec', '$sen', '$sub', '$msg','$att', sysdate())");
	//delete form inbox
	
	mysqli_query($con,"DELETE FROM usermail where sen_id='$id' and mail_id='$v'");

	}
	
}
echo "<script>alert('message deleted');window.location='sent.php'</script>";
}
else{echo "<script>alert('select first');window.location='sent.php'</script>";}
}


if(isset($_POST['deletetrash'])) 
{
   if($_POST['ch']>0)
{
   foreach($_POST['ch'] as $v)
    {

	mysqli_query($con,"DELETE FROM trash where trash_id='$v'");

     }
	echo "<script>alert('message deleted');window.location='trash.php'</script>";
}
else{echo "<script>alert('select first');window.location='trash.php'</script>";}
}



?>