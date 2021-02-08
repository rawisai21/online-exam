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
	<title>Admin | add batch</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<div class="container">
<?php
echo"<br><br><br><center><h1 style='text-shadow:2px 2px 3px white;'>ADD NEW BATCH</h1></center>";
?>
<div class="form-group row">
<center class="col col-md-12">
	<form action="addbatchtarg.php" method="post">
		<br><br><input class="input" type="text" name="batchname"value="" placeholder="Enter Batch Name" required/>
		<br><br><input class="input" type="date" name="startdate" value="" required/>
		<br><br><input class="input" type="date" name="enddate" value="" required/>
		<br><br>
		<input type="submit"/>
	</form>
</center>
<a href="Batchstudents.php">Students of all batches</a> 
<br>
</div>
		<table>
			<tr>
				<th>S no</th>
				<th>B ID</th>
				<th>Batch</th>
				<th>Start date</th>
				<th>End date</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
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
    echo "<tr><td>$sn</td><td>$id</td> <td>$bch</td> <td>$sd</td> <td>$ed</td><td><a href='editbatch.php?id=$id'> Edit </a> </td> <td> <a href='deletebatch.php?id=$id' >Delete</a> </td> </tr>";
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
