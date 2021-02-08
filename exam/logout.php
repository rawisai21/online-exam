<?php
@include("dbconn.php");
	session_destroy();
	header('Location:index.php');	 
?>
