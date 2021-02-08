
<?php
@include('dbconn.php');
$id=$_REQUEST["id"];

$sql = "DELETE FROM sub WHERE userid=$id";

if(mysqli_query($conn, $sql)) {
 // echo "New record created successfully";
	header('location:addsubject.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
