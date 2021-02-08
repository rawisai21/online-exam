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
	<title>Take exam</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>
<div class="container">
<?php
echo"<br><br><br><center><h1 style='text-shadow:2px 2px 3px white;'>Take EXAM</h1></center>";
?>
			<table>
				<tr>
					<th>S no</th>
					<th>Subject</th>
					<th>Date of exam</th>
					<th>Time of exam</th>
					<th>Status</th>
				</tr>
	<?php
	$bch=$_SESSION['batch'];
	$uid=$_SESSION['userid'];
	$sql = "SELECT * FROM examtable where batchid='".$bch."' order by dateofexam";
	$result = mysqli_query($conn, $sql);
	$sn=1;
	$exid="";
	if(mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
			 $exid=$id=$row["sno"];
			 $subid=$row["subjid"];
			 $sub="";
			 $bid=$row["batchid"];
			$dateofex=$row["dateofexam"];
			 $timeofex=$row["timeofexam"];
			 $c1=$row["c1"]; //Status of exam completed or not
			 //if completed it wont show start button. Instead it ask for check result
			
			$sql1 = "SELECT * FROM sub where userid='$subid'";
			$result1 = mysqli_query($conn, $sql1);
			if(mysqli_num_rows($result1) > 0) {
			  // output data of each row
			  while($row1 = mysqli_fetch_assoc($result1)) {
					 $sub=$row1["sub"];
			  }
			}
			$today=date("Y-m-d");
			$now=date("H:i", strtotime("1:30 PM"));
//			echo "<br> $today and $dateofex - ok".($today>$dateofex);			
			if($today>=$dateofex)
			{
					echo "<tr><td>$sn</td> <td>$sub</td> <td>$dateofex</td> <td>$timeofex</td> ";
					//echo "<br> $now - ".($now>$timeofex);
					$c1="-";
					$Stuidnt=$_SESSION['userid'];
					$sqll1 = "SELECT * FROM result where studentid='$Stuidnt' and examid='$exid' and c1='1'";
					$r1 = mysqli_query($conn, $sqll1);
					if (mysqli_num_rows($r1) > 0) {
							$c1=1;
					} 
					if($c1=="-")
						  {
							echo"<td> 
								<a href='takeexam.php?id=$uid&subid=$subid&sub=$sub&examid=$exid' target='_blank'>START EXAM </a> 
							</td>"; 
						  }	
					else
						  {
							echo"<td> 
								<a href='results.php?id=$uid' >Check results</a> 
							</td>"; 
						  }
						echo"	</tr>";
				}
				else
					{
							echo "<tr><td>$sn</td> <td>$sub</td> <td>$dateofex</td> <td>$timeofex</td><td>Future exam</td> ";
					}
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