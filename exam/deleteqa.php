
<?php
@include('dbconn.php');
$id=$_REQUEST["id"];

$sql = "DELETE FROM qanda WHERE sno=$id";

if(mysqli_query($conn, $sql)) {
 // echo "New record created successfully";
	header('location:addqa.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
