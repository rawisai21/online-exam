<?php
@include('dbconn.php');
@include('menu.php');
if(isset($_SESSION["userid"])==FALSE)
{
	echo"<center><h1 style='color:red;'>You are logged in .</h1></center>";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
}
?>
<html>
<head>
	<title>Exam results</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>
<div class="container">
<?php
echo"<br><br><br><center><h1 style='text-shadow:2px 2px 3px white;'>RESULTS</h1></center>";
?>
		<table>
			<tr>
				<th>S no</th>
				<th>Subject</th>
				<th>Exam date</th>
				<th>Marks</th>
			</tr>
<?php
$sid=$_SESSION['userid'];
$sql = "SELECT * FROM result where studentid='$sid'";
$result = mysqli_query($conn, $sql);
$sn=1;
if(mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	     $id=$row["sno"];
	     $stuid=$row["studentid"];
		 $examid=$row["examid"];
		 $subid=$row["subid"];
		 $marks=$row["marks"];
$s="";
$sqll = "SELECT * FROM sub where userid='$subid'";
$r = mysqli_query($conn, $sqll);
if (mysqli_num_rows($r) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($r)) {
		$s=$row["sub"];		
  }
} 

$exdate="";
$sqll1 = "SELECT * FROM examtable where sno='$examid'";
$r1 = mysqli_query($conn, $sqll1);
if (mysqli_num_rows($r1) > 0) {
  // output data of each row
  while($row1 = mysqli_fetch_assoc($r1)) {
		$exdate=$row1["dateofexam"];		
  }
} 
    echo "<tr> <td>$sn</td> <td>$s</td> <td>$exdate</td><td>$marks</td>  </tr>";
		 $sn++;
  }
} else {
  //echo "0 results";
}
?>

</table>

</div>
	

</body>
</html>