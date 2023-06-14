<?php 
//bring in the function code from an external document:
include('includes/functionLib.php');

//store the appliance name that the user chose on addapp.php
$newname = rm_injections($_POST['a_name']);
$newprice = rm_injections($_POST['a_price']);
$newdescript =$_POST['a_describe'];
$newstar = rm_injections($_POST['a_star']);


//preparing a var to store the next availible id #
$nextid = 0;
//run a query to get the highest id # currently used in the table
$results = run_my_query('
	select id from appliances 
	order by id desc
	limit 1
');
//pull info from $results to display a little about each appliance:

//set our search to the first row in $results
$results -> data_seek(0);
//this loop does whats in curly braces in each row retrieved by the my sql query above, stopping when it runs out of rows
while($row = $results->fetch_assoc()){
	$nextid = $row['id']+1;//stores highest row id and adds one
}
//if the user doesnt provide a thumbnail image the inout my missing image
if($_FILES['a_thumb']['name']==""){
	$newthumbname = "missing.png";
}else{
//cerate a new unique name for the uploaded image
$newthumbname = 't'.$nextid.$_FILES['a_thumb']['name'];}
//copy the user uploads into a folder
move_uploaded_file($_FILES['a_thumb']['tmp_name'],'img/'.$newthumbname);

//if the user doesnt provide a large image the inout my missing image
if($_FILES['a_large']['name']==""){
	$newlargename = "missing.png";
}else{
//cerate a new unique name for the uploaded image
$newlargename = 'l'.$nextid.$_FILES['a_large']['name'];}
//copy the user uploads into a folder
move_uploaded_file($_FILES['a_large']['tmp_name'],'img/'.$newlargename);

//run a query 
$results = run_my_query("

	insert into appliances
	Values
	(null,'$newname', $newprice, '$newdescript', '$newstar', '$newthumbname',  '$newlargename')





");

//redirect the user to another page
header('Location:allAppliance.php');

?>