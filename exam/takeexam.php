<?php
@include('dbconn.php');
@include('menu.php');
if(isset($_SESSION["userid"])==FALSE)
{
	echo"<center><h1 style='color:red;'>You are logged in .</h1></center>";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
}
$id=$_REQUEST["id"];
$subid=$_REQUEST["subid"];
$sub=$_REQUEST["sub"];
$exid=$_REQUEST["examid"];
$Stuidnt=$_SESSION["userid"];
$done=0;
$sqll1 = "SELECT * FROM result where studentid='$Stuidnt' and examid='$exid' and c1='1'";
$r1 = mysqli_query($conn, $sqll1);
if (mysqli_num_rows($r1) > 0) {
		$done=1;
		echo"<center><h1>You have already compled this exam! <br> Check <a href='results.php' >results</a></h1></center>";
		die();
} 
//echo"$Stuidnt - $done";
//die();

?>
<html>
<head>
	<title>Write Exam</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
<style>
table,tr,td,th
{
	border:none;
}
table
{
    width:25%;
}
</style>
</head>

<body>
<div class="" style="position:relative;padding:50px;top:100px;border:1px solid black; background-color:white; width:65%; height:500px;">
<form name="myForm" id="myForm" method="post" action='takeexamtarg.php' >
<Input type="hidden" name="examid" value="<?php echo $exid; ?>" />
<Input type="hidden" name="subid" value="<?php echo $subid; ?>" />
<table style="position:relative;top:0px;left:0px;width:100%;border:none;">
<?php
			$sql1 = "SELECT * FROM qanda where subjid='$subid' order by RAND() limit 20";
			$sno=1;
			$x=0;
			$ans=array();
			$result1 = mysqli_query($conn, $sql1);
			if(mysqli_num_rows($result1) > 0) {
			  // output data of each row
			  while($row1 = mysqli_fetch_assoc($result1)) 
				{
					 $q=$row1["question"];
					 $a1=$row1["a1"];
					 $a2=$row1["a2"];
					 $a3=$row1["a3"];
					 $a4=$row1["a4"];
					 $ca1=$row1["ca1"];
					$ans[$x]=$ca1;
					echo"<tr>
						<th colspan='6' align='left'>$sno. $q <input type='hidden' value='$ca1' name='ans[]' /></th>
					</tr>
					<tr>
						<th colspan='3' align='left'>
						  A) $a1<br> 
						  B) $a2 
						</th>
						<th colspan='3' align='left'>
						  C) $a3<br> 
						  D) $a4
						</th>
					</tr>";
				 $sno++;
			  }
			}

?>
</table>
</div>
<div class="choices" style="position:fixed;right:0px;top:108px; background-color:white; width:25%; height:80%; border:1px solid black;padding:17px;overflow-y:auto;">
	<div>
			<b>
			Time: <span id="time">20:00</span> minutes!
			<br>
			Subject : - <?php echo $sub; ?></b>
	</div>
	<table style="width:100%;position:relative;left:0px;" class="displayrestab">

		<tr><th>S.No</th><th>A</th><th>B</th><th>C</th><th>D</th></tr>
		<?php
		for($i=1;$i<$sno;$i++)
		{
			echo"
			<tr>
				<td align='center'>$i</td>
				<td align='center'><input type='radio' value='1' name='a$i'/></td>
				<td align='center'><input type='radio' value='2' name='a$i'/></td>
				<td align='center'><input type='radio' value='3' name='a$i'/></td>
				<td align='center'><input type='radio' value='4' name='a$i'/></td>
			</tr>";
		}
		?>
	<tr><td colspan="5" align='center'> <br><br><input type="button" value="SUBMIT" onclick="ajx();" /></td></tr>
	</table>
	</form>
</div>
<script type="text/javascript">
var id="";
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var id = setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
			clearInterval(id);
			ajx();
        }
    }, 1000);
}

window.onload = function() {
    var fiveMinutes = 60 * 20,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
</script>
<script src="js/jquery.min.js"></script>
<script>
function ajx(){
alert('Exam submitted');
var form=$("#myForm");
$.ajax({
        type:"POST",
        url:form.attr("action"),
        data:form.serialize(),
        success: function(response){
				$(".choices").html(response);
        }
    });
};
</script>
</body>
</html>