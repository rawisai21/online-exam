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
	<title>Batch results</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>
<div class="container">
<?php
echo"<br><br><br><center><h1 style='text-shadow:2px 2px 3px white;'>TOTAL STUDENTS</h1></center>";
?>
		<table>
			<tr>
				<th>Batch ID</th>
				<th>Batch name</th>
				<th>Student name</th>
				<th>Phone</th>
				<th>Address</th>
			</tr>
<?php
$sid=$_SESSION['userid'];
$sql = "SELECT * FROM reg where usertype='2' order by batch desc";
$result = mysqli_query($conn, $sql);
$sn=1;
if(mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	     $name=$row["name"];
		 $addr=$row["address"];
	     $batch=$row["batch"];
		 $phone=$row["phone"];
$b="";
$sqll = "SELECT * FROM batchorclass where id='$batch'";
$r = mysqli_query($conn, $sqll);
if (mysqli_num_rows($r) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($r)) {
		$b=$row["batchname"];		
  }
} 

	echo "<tr><td>$batch</td><td>$b</td> <td>$name</td><td>$phone</td>  <td>$addr</td></tr>";
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