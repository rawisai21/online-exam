<?php
@include('dbconn.php');
$id=$_REQUEST["id"];

$sql = "DELETE FROM examtable WHERE sno=$id";

if(mysqli_query($conn, $sql)) {
 // echo "New record created successfully";
	header('location:addexam.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
