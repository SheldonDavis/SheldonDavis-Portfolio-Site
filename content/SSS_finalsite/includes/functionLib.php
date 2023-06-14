<?php 
/**
*function library: common functions
*all the documents will import
*
*@package frankfunctions
*@author Sheldon Davis
*@copyright 2014 Sheldon Davis
*/
/**
*function that cleans strings
*disabling code injections
*
*@param $usersrting the characters we want to clean
*@return $cleanstring same characters balh blah blah
*/
function rm_injections($userstring){
//Prepare an empty string. If it gets returned below, it won't give them security clearance.
   $cleanstring = '';
   if (isset($userstring)) {
      //trim space from left or right:
      $userstring = trim($userstring);
      //replace the empty string with the value the user typed if it contains non-quote characters (We're now confident it's clean):
      if (preg_match('/^[a-zA-Z0-9 ^$.*+\[\]{,}]{1,24}$/u', $userstring)){ 
         $cleanstring = $userstring;
      } 
   }
   //return the clean string (or the original empty string if it was dangerous).
   return $cleanstring;
}


/**
*function that runs mysql query & returns result
*@param $q the particular query we wanted to run
*@returns $results the reslts of the query as an array
*/

function run_my_query($q){
	//retrieve and store info from the database so we can display below in the body

	//1. make a connection to the server and the database.mysqli() takes 4 arguments: (servername, username, password, database name)
	$mysqli = new mysqli('localhost','root','','applianceDB');
	//  $mysqli = new mysqli('mariadb-063.wc1.dfw3.stabletransit.com','630057_applUSR','Facebook13','630057_applianceDB');
	//if there was an error with the previous line...
	if($mysqli->connect_errno){
		//show me a custom message
		echo 'Failed to connect to server/DB! '.$mysqli->connect_errno;
		die();//stop running code on thie page	
	}
	//2.run mySQL query, store the retrieved results in an object called $results. i something goes wrong 'die()' makes it stop running code
	$results = $mysqli->query($q) or die($q.'Problem with my Query! '.$mysqli->error);

	//3. close the connection
	mysqli_close($mysqli);
	//return the results to where the function is called:
	return $results;
}//ends fucntion run_my_query


?>