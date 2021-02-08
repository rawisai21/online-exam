<?php
@include('dbconn.php');
@include('menu.php');
?>
<html>
<head>
	<title>Faculty Edit</title>
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
<div class="container">
	<form action="settingstarg.php" method="post">
		<input type="hidden" value="2" name="usertype"/>
		<table>
			<tr>
				<td>Enter Full Name</td>
				<td>*: <input type="text" value="<?php echo $_SESSION["name"] ;?>" name="uname" required/></td>
			</tr>
			<tr>
				<td>Enter Password</td>
				<td>*: <input type="password" value="" name="pwd" required/></td>
			</tr>
			<tr>
				<td>Enter Address</td>
				<td>*: <textarea name="address" rows="2" value="" required><?php echo"".$_SESSION["address"]; ?></textarea></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>*: <input type="number" value="<?php echo"".$_SESSION["phone"]; ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" name="phone" required/>
			</tr>
			<tr>
				<td></td>
				<td> &nbsp<br> <input type="submit" value="Update" name="submit" required/></td>
			</tr>
		</table>
	</form>

</div>
</body>
</html>
