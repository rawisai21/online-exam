<?php
@include('dbconn.php');
$bn=$_REQUEST["batchname"];
$sd=$_REQUEST["startdate"];
$ed=$_REQUEST["enddate"];
$yr=date("Y");
$subid=1;
//echo $yr;
$tim=date("Y-m-d h:s:i");
//echo "<br>".$tim;

$sql = "INSERT INTO batchorclass (id, batchname, year, startdate, enddate, subjid, timstmp, c1, c2, c3)
VALUES (NULL,'".$bn."', ".$yr.", '".$sd."','".$ed."', ".$subid.", '".$tim."', '-','-','-')";

if(mysqli_query($conn, $sql)) {
 // echo "New record created successfully";
	header('location:addbatch.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>