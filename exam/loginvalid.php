<?php
require('dbconn.php');
if(isset($_REQUEST['email']))
{
	$email= trim($_REQUEST['email']);
	$password = trim($_REQUEST['pwd']);
	$query = mysqli_query($conn,"SELECT * FROM reg WHERE mail = '$email'");
	$row = mysqli_fetch_array($query);
		$maill=$row['mail'];
		$pwd=$row['password'];
		$type=$row['usertype']+0;

if( $email==$maill and $pwd==md5($password))
     {
		 $_SESSION['userid']=$row['userid'];
		 $_SESSION['utype']=$row['usertype'];
		 $_SESSION['name']=$row['name'];
		 $_SESSION['dob']=$row['dob'];
		 $_SESSION['gender']=$row['gender'];
		 $_SESSION['mail']=$row['mail'];
		 $_SESSION['subjects']=$row['subjects'];
		 $_SESSION['e1']=$row['e1'];
		 $_SESSION['address']=$row['address'];
		 $_SESSION['batch']=$row['batch'];
		 $_SESSION['phone']=$row['phone'];
		 $_SESSION['timee']=$row['timee'];
		 $_SESSION['pwd']=$pwd;
				 header("Location: profile.php");
	  }
  else
     {
			echo"<center><h1 style='color:red;'>User name  and password not matched.</h1></center>";
			echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
	 }
 }
?>
