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
<div class="addmid">

	<H3>Log In</H3>
	<form class="clearfix" action="process_login.php" method="post">
    	<p>Username: <input type="text" name="u_name" /></p>
    	<p>Password: <input type="password" name="u_pass" /></p>
        <input class="login" type="submit" value="Log In">
    </form>
    
    <p class="log">Development - Testers are invited to log in with username 'user' 
        and password 'user' for the privilage to add, giving you the ability input 
        items to the database</p>
</div>

</main>
<footer class="clearfix">
	<h6 class="left">&copy;SheldonDavis. All products on this site are fictitious.</h6>
<h6 class="return"><a  href="http://www.sheldondavis.net/">Return To Sheldon Davis Portfolio</a></h6>
</footer>
</body>
</html>