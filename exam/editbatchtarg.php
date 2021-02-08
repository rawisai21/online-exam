<?php
@include('dbconn.php');
$id=$_REQUEST["id"];
$bn=$_REQUEST["batchname"];
$sd=$_REQUEST["startdate"];
$ed=$_REQUEST["enddate"];

$sql = "UPDATE batchorclass SET batchname='$bn', startdate='$sd', enddate='$ed' WHERE id=$id";

if(mysqli_query($conn, $sql)) {
 // echo "New record created successfully";
	header('location:addbatch.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>