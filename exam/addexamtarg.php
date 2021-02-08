<?php
@include('dbconn.php');
$bn=$_REQUEST["batchname"];
$es=$_REQUEST["examsub"];
$ed=$_REQUEST["examdate"];
$et=$_REQUEST["examtime"];
$yr=date("Y");
$subid=1;
//echo $yr;
$tim=date("Y-m-d h:s:i");
//echo "<br>".$tim;

$sql = "INSERT INTO examtable(sno, examname, subjid, batchid, timeofexam, dateofexam, maxmarks, timestmp, c1, c2, c3)
VALUES (NULL,'exam',".$es.", ".$bn.", '".$et."','".$ed."', 100, '".$tim."', '-','-','-')";

if(mysqli_query($conn, $sql)) {
 // echo "New record created successfully";
	header('location:addexam.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>