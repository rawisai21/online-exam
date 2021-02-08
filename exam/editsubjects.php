<?php
@include('dbconn.php');
$id=$_REQUEST["id"];
$sql = "SELECT * FROM sub where userid=$id";
$result = mysqli_query($conn, $sql);
$sn=1;
$id="";
$sub="";
$amt="";
if(mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	     $id=$row["userid"];
	     $sub=$row["sub"];
		 $amt=$row["payment"];
  }
}
?>

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
	<title>Admin | Edit subject</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>
<div class="container">
<?php
echo"<br><br><br><center><h1 style='text-shadow:2px 2px 3px white;'>EDIT SUBJECT</h1></center>";
?>
<div style="position:relative;left:300px;background-color:white;
height:280px;width:750px;">
	<center>
		<form action="editsubjectstarg.php" method="post">
			<br><br>
			<input type="hidden" value="<?php echo $id; ?>" name="id" />
			<input class="input" type="text" name="subject" value="<?php echo $sub;?>" placeholder="Enter Batch Name"/>
			<br><br><input class="input" type="text" name="amount" placeholder="Enter amount" value="<?php echo $amt;?>"/>
			<br><br>
			<input type="submit"/>
		</form>
	</center>
</div>
	

</body>
</html>	