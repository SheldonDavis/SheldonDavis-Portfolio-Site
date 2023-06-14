<?php 

session_start();

	//make a var to store where the XMl file is
	$file = 'data/distributors.xml';
?><!doctype html>
<html>
<head>
<meta charset="utf-8">  
<link href='http://fonts.googleapis.com/css?family=Gilda+Display|EB+Garamond|Playball' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Cook's Appliance Kitchen - Distributors</title>
</head>

<body class="clearfix">
<header>

<h1>Cook's Appliance Kitchen</h1>
<a class="logo-link" href="about.php">
    <img src="img/logo.png" class="logo"alt="Cook's kitchen Appliance Logo"/>
    </a>

<nav class="main clearfix">
	<ul class="main">
    	<li><a href="distributors.php">Store Locations</a></li>
    	<li><a href="about.php">About Us</a></li>
    	<li><a href="allAppliance.php">All Products</a></li>
        <?php if(!isset($_SESSION['logged_in'])) { ?><li><a href="login.php">Login</a></li><?php } ?>
        <?php if(isset($_SESSION['logged_in'])) { ?><li><a href="process_logout.php">Logout</a></li><?php } ?>
    </ul>
</nav>
</header>


<span class="clearfix subnav">
<nav class="sub-nav">
<ul>
	
    <?php if(isset($_SESSION['logged_in'])){	
			if($_SESSION['priv']=='superuser'){
	?>
    <li><a href="addapp.php">Add Product</a></li>
    <?php } }?>
    <?php if(isset($_SESSION['logged_in'])){    
            if($_SESSION['priv']=='user'){
    ?>
    <li><a href="addapp.php">Add Product</a></li>
    <?php } }?>
</ul>
</nav>
</span>


<main class="clearfix">
	<h4 class="stores">Store Locations</h4>

<?php

//load the xml data var $staff, which will be an object
$staff = simplexml_load_file($file) or die('Error: simplexml_load_file failed');

//loop through the child elements of our XML <staff> root element, doing wha's in {} to each <employee>. We'll refer to the chunk of data in each <employee> element as '$e_data'->is the object operator. => id the double arrow operator for accessing array values
foreach($staff->children() as $store=> $e_data){
	//store into cars each bit of data from the employee
	$s_id = $e_data['id'];
	$s_name = $e_data->name;
	$s_phone = $e_data->phone;
	$s_address = $e_data->address;
	$s_city = $e_data->city;
	$s_zipcode = $e_data->zipcode;
	
	//displa an appealing HTML content structure and output vars where appropriate
	?>
    
    <div class="itemcustom">
		<h3 class="store"><?php echo $s_name; ?></h3>
        <p><strong>Store Number: </strong><?php echo $s_id; ?></p>
        <p><strong>Phone Number: </strong><?php echo $s_phone; ?></p> 
        <p><strong>Store Address: </strong><?php echo $s_address; ?></p> 
        <p><strong>City: </strong><?php echo $s_city; ?></p>
        <p><strong>Store Zipcode: </strong><?php echo $s_zipcode; ?></p> 
    </div>
    <?php
}//closes 'foreach'

?>

<footer class="clearfix">
	<h6 class="left">&copy;SheldonDavis. All products on this site are fictitious.</h6>
<h6 class="return"><a  href="http://www.sheldondavis.net/">Return To Sheldon Davis Portfolio</a></h6>
</footer>
</main>


</body>
</html>