<?php
require('dbconn.php');

if(isset($_REQUEST["usertype"])==true)
	@$usertype=$_REQUEST["usertype"];
else
	@$usertype="-";

if(isset($_REQUEST["uname"])==true)
	@$fullname=$_REQUEST["uname"];
else
	@$fullname="-";

if(isset($_REQUEST["dob"])==true)
	@$dob=$_REQUEST["dob"];
else
	@$dob="-";

if(isset($_REQUEST["gender"])==true)
	@$gender=$_REQUEST["gender"];
else
	@$gender="-";

if(isset($_REQUEST["email"])==true)
	@$mail=$_REQUEST["email"];
else
	@$mail="-";

if(isset($_REQUEST["exp"])==true)
	@$exp=$_REQUEST["exp"];
else
	@$exp="-";

@$pwd=$_REQUEST["pwd"];
@$repwd=$_REQUEST["repwd"];

if(isset($_REQUEST["address"])==true)
	@$address=$_REQUEST["address"];
else
	@$address="-";

if(isset($_REQUEST["phone"])==true)
	@$phone=$_REQUEST["phone"];
else
	@$phone="-";

if(isset($_REQUEST["batch"])==true)
	@$presentwork=$_REQUEST["batch"];
else
	@$presentwork="-";
@$date=date("Y-m-d");
// echo"$reguid <br>$regmail <br>$regpwd";

$querye = mysqli_query($conn,"SELECT * FROM reg where mail='$mail'") or die(mysqli_error());
$row = mysqli_fetch_array($querye);
$mailin=$row['mail'];
if($mailin == $mail)
{
	echo"<center><h1>User already exist.</h1></center>";
	echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
}
else if($pwd != $repwd)
{
	echo"<center><h1>password not matched.</h1></center>";
	echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
}
else
{
	$_SESSION["sesn"]=1;
	$_SESSION["umail"]=$mail;
	$sql = "INSERT INTO reg".
      "(sno,userid,usertype, name, dob, gender, mail, subjects, password, address, batch, phone, timee, e1,e2,e3)".
      "VALUES (1,NULL, $usertype, '".$fullname."', '".$dob."', '".$gender."','".$mail."', '".$exp."', '".md5($pwd)."', '".$address."', '".$presentwork."', '".$phone."', '".$date."', '-', '-', '-')";
      
   $retval = mysqli_query($conn,$sql);
   
   if(! $retval) {
      die('Could not enter data: ' . mysqli_error());
   }
	else
	{
		echo"<center><h1 style='color:green;'>Successfully registerd.</h1></center>";
		echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
	
	}
}

?>
