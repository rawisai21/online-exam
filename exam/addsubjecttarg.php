<?php
@include('dbconn.php');
$sn=$_REQUEST["subname"];
$amt=$_REQUEST["amount"];
$yr=date("Y");
$subid=1;
//echo $yr;
$tim=date("Y-m-d h:s:i");
//echo "<br>".$tim;

$sql = "INSERT INTO sub(userid, sub, payment, timee,c1, c2, c3)
VALUES (NULL,'".$sn."', ".$amt.", '".$tim."','-','-','-')";

if(mysqli_query($conn, $sql)) {
 // echo "New record created successfully";
	header('location:addsubject.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>