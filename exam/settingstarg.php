<?php
require('dbconn.php');


	@$fullname=$_REQUEST["uname"];

	@$pwd=$_REQUEST["pwd"];

	@$address=$_REQUEST["address"];

	@$phone=$_REQUEST["phone"];

	@$date=date("Y-m-d");

 //echo"<br>e1 =  $e1 <BR> $mail<br>";

if(isset($_REQUEST["usertype"])==true)
{
 	 $_SESSION["sesn"]=1;
	 $m=$_SESSION["mail"];
	 $_SESSION['name']=$fullname;
	 $_SESSION['address']=$address;
	 $_SESSION['phone']=$phone;
	if($pwd=="")
		$sql = "UPDATE reg SET name='$fullname', address='$address', phone='$phone'  where mail='$m'";
	else
		$sql = "UPDATE reg SET name='$fullname', password='".md5($pwd)."', address='$address', phone='$phone'  where mail='$m'";
      
   $retval = mysqli_query($conn,$sql);
   
   if(! $retval ) {
      die('Could not enter data: ' . mysqli_error());
   }
	else
	{
		echo"<center><h1 style='color:green;'>Successfully updated.</h1></center>";
		echo '<META HTTP-EQUIV="Refresh" Content="2; URL=profile.php">';	
		//header("location:profile.php");
	}
}

?>


