<?php 
session_start();

//bring in the function code from an external document:
include('includes/functionLib.php');

//initalize the default columm to order by
$ordercol = 'id';
//if user has click a culumn to order by do that instead
if(isset($_GET['sortcol'])){
	$ordercol = $_GET['sortcol'];
}



//run a query 
$results = run_my_query('select * from appliances order by ' .$ordercol);

?><!doctype html>
<html>
<head>
<meta charset="utf-8"><meta name="description" content="This is the Cook's Appliance Kitchen website. This site is here for the average homeowner to purchase reliable kitchen appliances">
  
<link href='http://fonts.googleapis.com/css?family=Gilda+Display|EB+Garamond|Playball' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Cook's Appliance Kitchen - All Products</title>
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
<?php if(isset($_SESSION['logged_in'])){?>
<h4 class="hello">Hello <?php echo $_SESSION['uname']; ?></h4>
<p class="hello"> Your have a security level of <?php echo $_SESSION['priv']; ?>.</p>
<?php }?>
<h4>All Appliances</h4>
<div class="sort">
<h4>Sort By:</h4>
<form action="allAppliance.php" method="get">
	<select name="sortcol">
	<option value=""></option>
    <option value="id">Stock Number</option>
    <option value="a_name">Name</option>    
    <option value="price">Price</option>
    <option value="star">Rating</option>    
    </select>
</form>
</div>

<?php
//pull info from $results to display a little about each appliance:

//set our search to the first row in $results
$results -> data_seek(0);
//this loop does whats in curly braces in each row retrieved by the my sql query above, stopping when it runs out of rows
while($row = $results->fetch_assoc()){
	//pick each value out of the row and store each in a var
	//store the name of app:
	$a_name = $row['a_name'];
	$a_id = $row['id'];
	$a_price = $row['price'];
	$a_star = $row['star'];
	$a_thumb = $row['thumb'];
	$a_large = $row['Limage'];
	$a_describe = $row['descrep']
	
	
	//display variables amid some HTML?>
    <div class="item">
    <form action="description.php" method="post">
    <input type="hidden" name="detail_id" value="<?php echo $a_id; ?>"/>
    <input type = "image" src="img/<?php /*display appliance image*/ echo $a_thumb;?>" class="small" alt="Photo of <?php /*display the name */ echo $a_name;?> class="img" "/>
       <h5 class="pg1"><?php /*display the price*/ echo $a_name;?></h5>
       <input type='submit' class="submit" value="learn more"/>
       
       <div id="star_box">
       <?php echo str_repeat(" <img src=\"img/star.png\" class=\"star\" alt=\"star\"/> ", $a_star ); ?>
       </div>
       
       </form> 
        <?php if(isset($_SESSION['logged_in'])){	
				if($_SESSION['priv']=='superuser'){?>	
	
    <form action="delapp.php" method="post">
    <input type="hidden" name="deleteapp" value="<?php echo $a_id; ?>"/>
     <span class="button del"><input type='submit' value="delete"/></span>
    
    </form>
    	<?php }}?>
    
    
    	
    
	</div>
<?php
}//close while looping through $results
?>

</main>
<footer class="clearfix">
	<h6 class="left">&copy;SheldonDavis. All products on this site are fictitious.</h6>
<h6 class="return"><a  href="http://www.sheldondavis.net/">Return To Sheldon Davis Portfolio</a></h6>
</footer>
<script>
	document.forms[0].sortcol.onchange=function(){
		document.forms[0].submit();
	}
</script>

</body>
</html>