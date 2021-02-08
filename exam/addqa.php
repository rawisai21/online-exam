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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<title>Admin | Add Q/A</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>
<div class="container">
<?php

echo"<br><br><br><center><h1 style='text-shadow:2px 2px 3px white;'>ADD Question / Answers</h1></center>";
?>
<div class="form-group row">
<center class="col col-md-12">
	<form action="addqatarg.php" method="post">
		<br><br><input class="input" style="width:500px;" type="text" name="question"value="" placeholder="Enter Question"/>
		<br><br><input class="input" type="text" name="o1"value="" placeholder="Enter Option 1"/>
		<input class="input" type="text" name="o2"value="" placeholder="Enter Option 2"/>
		<br><br><input class="input" type="text" name="o3"value="" placeholder="Enter Option 3"/>
		<input class="input" type="text" name="o4"value="" placeholder="Enter Option 4"/>
		<br><br><input class="input" type="number" name="ans"value="" placeholder="Enter Answer(only number)"/>
		<select class="input" style="height:40px;width:250px;border:solid 3px #666;font-size:16px;border-radius:10px;" type="text" name="subjid" value="">
				<option value="">Select Subject</option>
				<?php
				$sql = "SELECT * FROM sub";
				$result = mysqli_query($conn, $sql);
				$sn=1;
				if(mysqli_num_rows($result) > 0) {
				  // output data of each row
				  while($row = mysqli_fetch_assoc($result)) {
						 $id=$row["userid"];
						 $sub=$row["sub"];
						 $py=$row["payment"];
					echo "<option value='$id'>$sub</option>";
				  }
				} else {
				  //echo "0 results";
				}
				?>		
		</select>
		<br><br><textarea placeholder="Enter Description" name="de" style="width:500px;height:70px;"></textarea>	
		<br><br>
		<input type="submit"/>
	</form>
</center>
</div>
		<table>
			<tr>
				<th>S no</th>
				<th>Subject</th>
				<th>Question</th>
				<th>Answer</th>
				<th>Description</th>
				<th>Delete</th>
			</tr>
<?php
$sql = "SELECT * FROM qanda";
$result = mysqli_query($conn, $sql);
$sn=1;
if(mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	     $id=$row["sno"];
	     $sub=$row["subjid"];
	     $qu=$row["question"];
		 $ans=$row["ca1"];
		 $des=$row["description"];

				$sql1 = "SELECT * FROM sub where userid='$sub'";
				$result1 = mysqli_query($conn, $sql1);
				if(mysqli_num_rows($result1) > 0) {
				  // output data of each row
				  while($row1 = mysqli_fetch_assoc($result1)) {
						 $sub=$row1["sub"];
				  }
				} else {
				  //echo "0 results";
				}
	echo "<tr><td>$sn</td><td>$sub</td> <td>$qu</td> <td>$ans</td> <td>$des</td><td> <a href='deleteqa.php?id=$id' >Delete</a> </td> </tr>";
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