<?php
error_reporting(1);
include_once('connection.php');
//error_reporting(1);
/*
$y=$_POST['y'];
$m=$_POST['m'];
$d=$_POST['d'];
$dob=$y."-".$m."-".$d;
$ch=$_POST['ch'];
$hobbies=implode(",",$ch);*/

$un=$_POST['un'];
$mob=$_POST['mob'];
$pwd=$_POST['pwd'];
$eid=$_POST['eid'];
$fullname=$_POST['fullname'];
$chk=$_POST['checklist'];
$confpwd=$_POST['confpwd'];
$imgpath=$_FILES['file']['name'];





if(isset($_POST['reg']))
{
	if ($fullname==' ') {
	# code...
	echo "<script>alert('First Fill Full Name');window.location='register.php'</script>";
    }
    if ($imgpath==' ') {
	# code...
	echo "<script>alert('Choose an image');window.location='register.php'</script>";
    }
    if ($confpwd!==$pwd) {
	# code...
	echo "<script>alert('Password Not Match');window.location='register.php'</script>";
    }
	if($_POST['un']==" " || $_POST['pwd']==" ")
	{
	echo "<script>alert('First Fill User Name and Password');window.location='register.php'</script>";}
	$ch=mysqli_query($con,"SELECT email FROM userinfo where email='$eid'");
	    $e=mysqli_num_rows($ch);
    if($e>=1)
		{
		//"user aleready exists choose another";
		echo "<script>alert('user Email already exists choose another Email');window.location='register.php'</script>";
		} 
	if ($chk=='') {
	# code...
	echo "<script>alert('First Accept Term&Condition');window.location='register.php'</script>";
    } 
	else
	{
		
	   $r=mysqli_query($con,"SELECT * FROM userinfo where user_name='{$_POST['un']}'");
	   $t=mysqli_num_rows($r);
	
		if($t==1)
		{
		//$err="user aleready exists choose another";
		echo "<script>alert('user aleready exists choose another username');window.location='register.php'</script>";
		}
		else
		{
		/*mysqli_query($con,"INSERT INTO userinfo values('','$un','$pwd','$mob','{$_POST['eid']}','{$_POST['gen']}','$hobbies','$dob',
		'$imgpath')");
        INSERT INTO userinfo (user_jd, user_name, password, mobile, email, gender, hobbies, dob, full_name, role, location, address, image) VALUES (NULL, 'rock', '12345', '8965421152', 'rock@gmail.com', 'm', 'circket', '19-05-2000', 'Rock Mobile', 'Seller', 'Bhopal', 'Bhopal', 'img');*/

         
        mysqli_query($con,"INSERT INTO userinfo (user_jd, user_name, password, mobile, email, gender, hobbies, dob, full_name, role, location, address, image, message) VALUES (NULL, '$un', '$pwd', '$mob', '$eid', NULL, NULL, NULL, '$fullname', NULL, NULL, NULL, '$imgpath', NULL)");
		
		
/*
        INSERT INTO userinfo (user_jd, user_name, password, mobile, email, gender, hobbies, dob, full_name, role, location, address, image) VALUES (NULL, '$un', '$pwd', '$mob', '$eid', NULL, NULL, NULL, '$fullname', NULL, NULL, NULL, '$imgpath');		


		mysqli_query($con,"INSERT INTO userinfo (user_jd, user_name, password, mobile, email, gender, hobbies, dob, image) VALUES (NULL, '$un', '$pwd', '$mob', 'om@gmail.com', '$gen', '$hobbies', '$dob', '$imgpath')");
*/		
		mkdir("userImages/$un");
		mkdir("userImages/$un/data");
		move_uploaded_file($_FILES["file"]["tmp_name"], "userImages/$un/" . $_FILES["file"]["name"]);
		//$_SESSION['sname']=$_POST['un'];
		//header('location:index.php?chk=5');
		//echo "<script>window.location='login.php'</script>";
		echo "<script>alert('Account Created Successfully');window.location='login.php'</script>";
		}
	}
}

?>