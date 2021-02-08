<?php
@include('dbconn.php');
$id=$_REQUEST["id"];
$sql = "SELECT * FROM batchorclass where id='$id'";
$result = mysqli_query($conn, $sql);
$sn=1;
$bch="";
$sd="";
$ed="";
if(mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	     $id=$row["id"];
	     $bch=$row["batchname"];
		 $sd=$row["startdate"];
		 $ed=$row["enddate"];
  }
}
?>

<?php
@include('menu.php');
if(isset($_SESSION["userid"])==FALSE)
{
	echo"<center><h1 style='color:red;'>You are logged in .</h1></center>";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
}
?>
<html>
<head>
	<title>Admin | Edit batch</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>
<div class="container">
<?php
echo"<br><br><br><center><h1 style='text-shadow:2px 2px 3px white;'>EDIT BATCH</h1></center>";
?>
<div style="position:relative;left:300px;background-color:white;
height:280px;width:750px;">
	<center>
		<form action="editbatchtarg.php" method="post">
			<br><br>
			<input type="hidden" value="<?php echo $id; ?>" name='id' />
			<input class="input" type="text" name="batchname"value="<?php echo $bch;?>" placeholder="Enter Batch Name"/>
			<br><br><input class="input" type="date" name="startdate" value="<?php echo $sd;?>" />
			<br><br><input class="input" type="date" name="enddate" value="<?php echo $ed;?>"/>
			<br><br>
			<input type="submit"/>
		</form>
	</center>
</div>
	

</body>
</html>	