<html>
<head>
	<title>Login | Welcome</title>
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
@include('menu.php');
?>
<div class="container">
	<form action="loginvalid.php" method="post">
		<table>
			<tr>
				<td>Enter Mail</td>
				<td>: <input type="text" value="" name="email"/></td>
			</tr>
			<tr>
				<td>Enter Password</td>
				<td>: <input type="password" value="" name="pwd" required/></td>
			</tr>
			<tr>
				<td> </td>
				<td>&nbsp<br> <input type="submit" value="Login" name="submit" required/> </td>
			</tr>
		</table>
	</form>
</div>
	
</body>
</html>