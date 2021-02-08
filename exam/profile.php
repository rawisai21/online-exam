<?php
@include('dbconn.php');
@include('menu.php');
?>
<html>
<head>
	<title>Welcome to profile</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
<style>
table,tr,td,th
{
	border:none;
	background-color:transparent;
}
table
{
    width:500px;
	left:30%;
	top:100px;
}
</style>
</head>

<body>
<?php
if(isset($_SESSION["userid"])==FALSE)
{
	echo"<center><h1 style='color:red;'>You are logged in .</h1></center>";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
}
?>
<div class="container">
<?php
echo"<br><br><br><center><h1>WELCOME TO ".$_SESSION["name"]."</h1></center>";		
?>
		<table>
			<tr>
				<td>Name</td>
				<td>: <?php echo"".$_SESSION["name"]; ?></td>
			</tr>
			<tr>
				<td>DOB</td>
				<td>: <?php echo"".$_SESSION["dob"]; ?></td>
			</tr>
			<tr>
				<td>Mail</td>
				<td>: <?php echo"".$_SESSION["mail"]; ?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td>: <?php echo"".$_SESSION["address"]; ?></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>: <?php echo"".$_SESSION["phone"]; ?></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>: <?php echo"".$_SESSION["gender"]; ?></td>
			</tr>

			<tr>
				<td></td>
				<td> <?php echo""; ?></td>
			</tr>
		</table>

</div>
	

</body>
</html>