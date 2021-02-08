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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Admin | add exam</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<div class="container">
<?php

echo"<br><br><br><center><h1 style='text-shadow:2px 2px 3px white;'>ADD EXAM</h1></center>";
?>
<div class="form-group row">
<center class="col col-md-12">
	<form action="addexamtarg.php" method="post">
		<br><br>
		<select class="input" style="height:40px;width:250px;border:solid 3px #666;font-size:16px;border-radius:10px;" type="text" name="batchname"value="">
		<option value="">Select Batch</option>
					<?php
					$sql = "SELECT * FROM batchorclass";
					$result = mysqli_query($conn, $sql);
					$sn=1;
					if(mysqli_num_rows($result) > 0) {
					  // output data of each row
					  while($row = mysqli_fetch_assoc($result)) {
							 $id=$row["id"];
							 $bch=$row["batchname"];
							 $sd=$row["startdate"];
							 $ed=$row["enddate"];
							echo "<option value='$id'>$bch</option>";
							 $sn++;
					  }
					} else {
					  //echo "0 results";
					}
				?>
		</select>
		<br><br>
		<select class="input" style="height:40px;width:250px;border:solid 3px #666;font-size:16px;border-radius:10px;" type="text" name="examsub"value="">
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
		<br><br><input class="input" type="date" name="examdate" value="" required/>
		<br><br><input style="height:40px;width:250px;border:solid 3px #666;font-size:16px;border-radius:10px;" class="input" type="time" placeholder="Enter Time of exam" name="examtime" value="" required/>
		<br><br>
		<input type="submit"/>
	</form>
</center>
</div>
		<table>
			<tr>
				<th>S no</th>
				<th>Batch</th>
				<th>Subject</th>
				<th>Exam date</th>
				<th>Time</th>
				<th>Delete</th>
			</tr>
<?php
$sql = "SELECT * FROM examtable";
$result = mysqli_query($conn, $sql);
$sn=1;
if(mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	     $id=$row["sno"];
	     $en=$row["examname"];
		 $subid=$row["subjid"];
		 $bid=$row["batchid"];
	     $timeofex=$row["timeofexam"];
		 $dateofex=$row["dateofexam"];
		 $marks=$row["maxmarks"];

$s="";
$sqll = "SELECT * FROM sub where userid='$subid'";
$r = mysqli_query($conn, $sqll);
if (mysqli_num_rows($r) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($r)) {
		$s=$row["sub"];		
  }
} 

$b="";
$sqll1 = "SELECT * FROM batchorclass where id='$bid'";
$r1 = mysqli_query($conn, $sqll1);
if(mysqli_num_rows($r1) > 0) {
  // output data of each row
  while($row1 = mysqli_fetch_assoc($r1)) {
		$b=$row1["batchname"];		
  }
} 
    echo "<tr> <td>$sn</td> <td>$b</td> <td>$s</td>  <td>$dateofex</td> <td>$timeofex</td>  <td><a href='deletetexam.php?id=$id' > Delete </a> </td> </tr>";
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