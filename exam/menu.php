<div class='menudiv'>
	<?php
	$r=$_SESSION['utype'];	
	     if(isset($_SESSION["userid"])==FALSE)
			 {
				 	echo"<a href='index.php' class='menuitem'>Home</a>";
					echo"<a href='register.php' class='menuitem'>Register</a>";
			}
			else
			{
				$r=$_SESSION['utype'];
				if($r!=1)
				{
					echo"<a href='profile.php' class='menuitem'>Profile</a>";
					echo"<a href='exam.php' class='menuitem'>Exam</a>";
					echo"<a href='results.php' class='menuitem'>Result</a>";
					echo"<a href='settings.php' class='menuitem'>Settings</a>";
				}
				else
				{
					echo"<a href='profile.php' class='menuitem'>Profile</a>";
					echo"<a href='addbatch.php' class='menuitem'>Add Batch</a>";
					echo"<a href='addsubject.php' class='menuitem'>Add Subject</a>";
					echo"<a href='addexam.php' class='menuitem'>Add Exam</a>";
					echo"<a href='addqa.php' class='menuitem'>Add Q/A</a>";
				}
			}

	if(isset($_SESSION["userid"])==TRUE)
			echo"<a href='logout.php' class='menuitem'>Logout</a>";
		 else
			echo"<a href='login.php' class='menuitem'>Login</a>";

	?>
</div>

