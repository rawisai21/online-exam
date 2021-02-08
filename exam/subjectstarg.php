<?php
require('dbconn.php');
@$sub=$_REQUEST["subject"];
@$price=$_REQUEST["price"];
if($_REQUEST["subject"]==true)
{
	$uid=$_SESSION["userid"];
	$un=$_SESSION["name"];
	$pn=$_SESSION["phone"];
	$loc=$_SESSION["presentworkat"];
	$dt=date("Y-m-d");
	
		$sql = "INSERT INTO sub"."(userid,sub, username,location,phone, payment, timee,c1,c2,c3)"."VALUES ( $uid,'".$sub."','".$un."','".$loc."','".$pn."', ".$price.", '".$dt."', '-', '-', '-')";
	   mysql_select_db('haz');
	   $retval = mysql_query( $sql, $conn );

		echo"<center><h1 style='color:green;'>Subject added successfully <br><br>Pay using phone pay or google pay.</h1></center>";
		echo '<META HTTP-EQUIV="Refresh" Content="2; URL=subjects.php">';
}
else
{
		echo"<center><h1 style='color:green;'>Some thing worng.</h1></center>";
		echo '<META HTTP-EQUIV="Refresh" Content="2; URL=subjects.php">';
}

?>