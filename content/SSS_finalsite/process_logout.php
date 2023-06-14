<?php
	session_start();
	session_destroy();
	$_SESSION['logged_in']=false;
	header('Location:allAppliance.php');
?>