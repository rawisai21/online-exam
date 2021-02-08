<?php
@include('dbconn.php');
$ansvals=array();
$ansvals=$_REQUEST["ans"];
//Its index starts from 0
//print_r($ansvals);
$exid=$_REQUEST["examid"];
$subid=$_REQUEST["subid"];
$marked=array();
$k=0;
echo"
	<table style='position:relative; left:0px; top:0px; width:100%;'>
		<tr>
			<th>Marked </th>
			<th>Answers</th>
		</tr>
	";
for($i=1;$i<=sizeof($ansvals);$i++)
{
	if(isset($_REQUEST["a$i"])==true)
		$m=$marked[$i]=$_REQUEST["a$i"]; 
	else
		$m="-";
	//Its index starts from 1
	$a=$ansvals[$i-1];
	if($m==$a)
	{
		$k++;
	}
	echo"
	<tr>
		<th>$m</th>
		<th>$a</th>
	</tr>";
}
$total=$k*5;
//print_r($marked);

echo"
<tr><th style='color:red'>Total - </th><th style='color:red'>$total</th></tr>
</table>";
	$stuid=$_SESSION['userid'];
	$sql = "INSERT INTO result".
      "(sno,studentid,examid, subid, marks, timstmp,c1,c2,c3)".
      "VALUES (NULL, $stuid,$exid,$subid,$total,now(), '1', '-', '-')";      
   $retval = mysqli_query($conn,$sql);
   
   if(! $retval) {
      die('Could not enter data: ' . mysqli_error());
   }

?>
