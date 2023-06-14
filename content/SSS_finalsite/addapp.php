<?php
session_start();
//if the user hasnt logged in..
if(!isset($_SESSION['logged_in'])){

	//send user to login
	header('Location:login.php');
exit();

}
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href='http://fonts.googleapis.com/css?family=Gilda+Display|EB+Garamond|Playball' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Cook's Appliance Kitchen - Add a Product</title>
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
	
    <li><a href="addapp.php">Add Product</a></li>
</ul>
</nav>
</span>

<main class="clearfix add">
<div class="addmid">
<h3>Add an Appliance</h3>


	<form action="process-app.php" method="post" enctype="multipart/form-data" >
    	<p>Name of new Appliance: <input type="text" name="a_name" /><span id="feedname"></span></p>
        
    	<p>Price of new Appliance: $<input type="text" name="a_price" /><span id="feedprice"></span></p>
    	
    	<p>Star rating of new Appliance (pick a number 1-5): <select name="a_star" ><span id="feedstar">
    		<option value="1">1</option>
    		<option value="2">2</option>
    		<option value="3">3</option>
    		<option value="4">4</option>
    		<option value="5">5</option>
    	</span></select></p>
        
        <p>Write a descrition for this product: <br/><br/><textarea cols="25" rows="4" name="a_describe"></textarea><span id="feeddesc"></span></p>
        
		<p>Thumbnail Image of the new Appliance (150x150 jpg please):<input type="file" name="a_thumb" /><span id="feedthumb"></span></p>
        
        <p>Large Image on the new Appliance (500x500 jpg please):<input type="file" name="a_large" /><span id="feedlarge"></span></p>

    		<input type="submit" value="Add this Appliance">
    </form>
</div>

</main>
<footer class="clearfix">
	<h6 class="left">&copy;SheldonDavis. All products on this site are fictiticious.</h6>
<h6 class="return"><a  href="http://www.sheldondavis.net/">Return To Sheldon Davis Portfolio</a></h6>
</footer>
<script src="js/add-app-java.js"></script>
</body>
</html>