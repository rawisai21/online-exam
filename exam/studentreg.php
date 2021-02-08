<?php
@include('dbconn.php');
@include('menu.php');
?>
<html>
<head>
	<title>Student login</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>
<?php
if(isset($_SESSION["userid"])==TRUE)
     {
			echo"<center><h1 style='color:red;'>You are logged in .</h1></center>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=profile.php">';
			die();
	 }
?>
<div class="container">
<form action="regvalid.php" method="post">
		<input type="hidden" value="1" name="usertype"/>
		<table>
			<tr>
				<td>Enter Full Name</td>
				<td>: <input type="text" value="" name="uname"/></td>
			</tr>
			<tr>
				<td>Enter Mail</td>
				<td>: <input type="text" value="" name="email"/></td>
			</tr>
			<tr>
				<td>Enter Password</td>
				<td>: <input type="password" value="" name="pwd"/></td>
			</tr>
			<tr>
				<td>Re-Enter Password</td>
				<td>: <input type="password" value="" name="repwd"/></td>
			</tr>
			<tr>
				<td></td>
				<td> &nbsp<br> <input type="submit" value="Register" name="submit"/></td>
			</tr>
		</table>
	</form>

</div>
	

</body>
</html>