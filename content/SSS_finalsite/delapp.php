<?php 
//the id of which product to show starts up as a default:
$chosen_id = 8642;
//before it runs the query replace id# with what the user chose from the all appliances page
if(isset($_POST['deleteapp'])){
	$chosen_id = $_POST['deleteapp'];
	
}
//bring in the function code from an external document:
include('includes/functionLib.php');

//run a query 
$results = run_my_query('delete from appliances where id='.$chosen_id);
//redirect the user to another page
header('Location:allAppliance.php');
?>
