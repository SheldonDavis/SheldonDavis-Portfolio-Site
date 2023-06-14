<?php

//store in a var the password the user typed 
$theiruser = $_POST['u_name'];
$theirpassword = $_POST['u_pass'];
//include run_my_query function definition
include('includes/functionLib.php');
//use the password in a query to see if there's anyone in the mySQL user table with that password:
$results = run_my_query("select * from users where password = \"$theirpassword\" and username = \"$theiruser\"");

//if itfound such a user in the table...
$results -> data_seek(0);
if($row = $results->fetch_assoc()){
	//..save some info about the user
	//echo 'Valid user';
	session_start();
	//echo session_id();
	//and redirect user to the allAppliances page
	$_SESSION['logged_in']=true;
	$_SESSION['uname'] = $row['username'];
	$_SESSION['priv'] = $row['slevel'];
	header('Location:allAppliance.php');
	exit();
//ifno such user in table 
}else{
	header('Location:login.php');
	//...send them back to login with querystring to trigger some text feedback there

}
?>