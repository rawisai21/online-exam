<?php
@include('dbconn.php');
$qu=$_REQUEST["question"];
$subjid=$_REQUEST["subjid"];
$o1=$_REQUEST["o1"];
$o2=$_REQUEST["o2"];
$o3=$_REQUEST["o3"];
$o4=$_REQUEST["o4"];
$ans=$_REQUEST["ans"];
$desc=$_REQUEST["de"];
$yr=date("Y");
$subid=1;
//echo $yr;
$tim=date("Y-m-d h:s:i");
//echo "<br>".$tim;

$sql = "INSERT INTO qanda(sno, question, subjid, a1, a2, a3, a4, ca1, description)
VALUES (NULL,'".$qu."', ".$subjid.", '".$o1."','".$o2."', '".$o3."', '".$o4."', '".$ans."', '".$desc."')";

if(mysqli_query($conn, $sql)) {
 // echo "New record created successfully";
	header('location:addqa.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>