<html>
<head>
	<title>EXAM | NEW REGISTER</title>
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
@include('dbconn.php');
@include('menu.php');
if(isset($_SESSION["userid"])==TRUE)
     {
			echo"<center><h1 style='color:red;'>You are logged in .</h1></center>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=profile.php">';
			die();
	 }
?>
<div class="container">
	<form action="regvalid.php" method="post" id="myForm">
		<input type="hidden" value="2" name="usertype"/>
		<table>
			<tr>
				<td>Enter Full Name</td>
				<td>*: <input type="text" value="" name="uname" required/></td>
			</tr>
			<tr>
				<td>DOB</td>
				<td>*: <input type="date" value="" name="dob" required min="1970-01-01" max="2020-01-01"/></td>
			</tr>
			<tr>
				<td>Enter Mail</td>
				<td>*: <input type="mail" id="mail" value="" name="email" required/></td>
			</tr>
			<tr>
				<td>Enter Password</td>
				<td>*: <input type="password" id="pwd" value="" name="pwd" required/></td>
			</tr>
			<tr>
				<td>Re-Enter Password</td>
				<td>*: <input type="password" id="rpwd" value="" name="repwd" required/></td>
			</tr>
			<tr>
				<td>Enter Address</td>
				<td>*: <textarea name="address" rows="2" value="" required></textarea></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>*: <input type="number" id="phone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" min="10" name="phone" required/>
			</tr>
			<tr>
				<td>Batch</td>
				<td>*: <input type="number" value="" name="batch" required/></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>*: <input type="radio" value="M" name="gender" checked required/>Male <input type="radio" value="F" name="gender" required/>Female </td>
			</tr>
			<tr>
				<td></td>
				<td> &nbsp<br> <input type="submit" value="Register" name="submit" required/></td>
			</tr>
		</table>
	</form>

</div>

<script src="js/jquery.min.js"></script>
<script>
function isEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
$("#myForm").submit(function(e){
	var mail = $("#mail").val();
	var pass = $("#pwd").val();
	var rpass = $("#rpwd").val();
	var phone = $("#phone").val();
	var strength = 1;
	var arr = [/.{5,}/, /[a-z]+/, /[0-9]+/, /[A-Z]+/];
	jQuery.map(arr, function(regexp) {
	  if(pass.match(regexp))
		 strength++;
	});

	if(!isEmail(mail))
	{
		alert("Please provide valid email");
		e.preventDefault();
	}

	if(strength<5 || pass.length<8)
	{
		alert("Password strenght Must contain Min 8 characters \n \nOne small, \nOne capital,\nOne number, \nOne special character.");
		e.preventDefault();
	}

	if(pass != rpass)
	{
		alert("Password not matched");
		e.preventDefault();
	}

	if(phone.length<10)
	{
		alert("Phone number not correct");
		e.preventDefault();
	}
});
</script>

</body>
</html>