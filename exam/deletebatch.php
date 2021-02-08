<?php
@include('dbconn.php');
$id=$_REQUEST["id"];

$sql = "DELETE FROM batchorclass WHERE id=$id";

if(mysqli_query($conn, $sql)) {
 // echo "New record created successfully";
	header('location:addbatch.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>