<?php
@include('dbconn.php');
$id=$_REQUEST["id"];
$sub=$_REQUEST["subject"];
$amt=$_REQUEST["amount"];

//echo"$id , $sub, $amt";
$sql = "UPDATE sub SET sub='$sub', payment='$amt' WHERE userid='$id'";

if(mysqli_query($conn, $sql)) {
 // echo "New record created successfully";
	header('location:addsubject.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>