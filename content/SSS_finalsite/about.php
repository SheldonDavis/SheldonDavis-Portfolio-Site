<?php 
session_start();


//bring in the function code from an external document:
include('includes/functionLib.php');


?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href='http://fonts.googleapis.com/css?family=Gilda+Display|EB+Garamond|Playball' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Cook's Appliance Kitchen - Login</title>
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



<main class="clearfix add">


	<H3>About Us</H3>

    <img  class="woman" src="img/woman.jpg" alt="Woman baking"/>
    <p class="float-p">Welcome the Cook's Appliance Kitchen website!
     We are the brand new catalog and research website for the kitchen consumer.
    As the company striving to bring you the latest and greatest information on new kitchen appliances, we suggest you take a look at all of our appliance reviews by visiting our all products tab.
    If you are looking for a list of locations as to where you can buy these amazing products, visit our store locator page.
    As a company, we like to keep all kitchens safe and up to date with all the latest in cooking and safety technology.  </p>
	




</main>
<footer class="clearfix">
	<h6 class="left">&copy;SheldonDavis. All products on this site are fictitious.</h6>
<h6 class="return"><a  href="http://www.sheldondavis.net/">Return To Sheldon Davis Portfolio</a></h6>
</footer>
</body>
</html>