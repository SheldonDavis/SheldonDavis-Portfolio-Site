<?php 
//the id of which product to show starts up as a default:
$chosen_id = 8642;
//before it runs the query replace id# with what the user chose from the all appliance page
if(isset($_POST['detail_id'])){
	$chosen_id = $_POST['detail_id'];
	
}
//bring in the function code from an external document:
include('includes/functionLib.php');

//run a query 
$results = run_my_query('select * from appliances where id='.$chosen_id);
?><?php
//pull info from $results to display a little about each appliance:

//set our search to the first row in $results
$results -> data_seek(0);
//this loop does whats in curly braces in each row retrieved by the my sql query above, stopping when it runs out of rows
while($row = $results->fetch_assoc()){
	//pick each value out of the row and store each in a var
	//store the name of appliance:
	$a_name = $row['a_name'];
	$a_id = $row['id'];
	$a_price = $row['price'];
	$a_thumb = $row['thumb'];
	$a_star= $row['star'];
	$a_large = $row['Limage'];
	$a_describe = $row['descrep']
	
	//display variables amid some HTML?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href='http://fonts.googleapis.com/css?family=Gilda+Display|EB+Garamond|Playball' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title> <?php echo $a_name; ?> - Cook's Appliance Kitchen</title>
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

<main>
    <h3>Details on <?php echo $a_name; ?></h3>
    <div class="item2">
    <h4><?php /*display the name */ echo $a_name;?></h4>
    
    <div class="clearfix">
    <h5 class="price">$<?php /*display the price*/ echo $a_price;?></h5>
    <div id="2star_box">
       <?php echo str_repeat(" <img src=\"img/star.png\" class=\"star\" alt=\"star\"/> ", $a_star ); ?>       
       </div>
       </div>
	<article>
    	<h5>Description:<br/> <?php echo $a_describe;?></h5>
    </article>
    <img class="large" src="img/<?php /*display appliance image*/ echo $a_large;?>" alt="Photo of <?php /*display the name */ echo $a_name;?>"/>
    <h3><a href="allAppliance.php">Back to All Appliances page</a></h3>	
	</div>
    
    
<?php
}//close while loop in through $results
?>



</main>
<footer class="clearfix">
	<h6 class="left">&copy;SheldonDavis. All products on this site are fictitious.</h6>
<h6 class="return"><a  href="http://www.sheldondavis.net/">Return To Sheldon Davis Portfolio</a></h6>
</footer>
</body>
</html>