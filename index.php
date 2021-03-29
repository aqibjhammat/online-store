<?php
session_start();
 include("includes/db.php");
 include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-Commerece Store</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!---Font-Awesome--->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<!--Css File-->
<link rel="stylesheet" type="text/css" href="styles/style.css">



</head>
<body>
<!--Top Bar Starts--->
<div id="top">

<!--Top container Starts--->
	<div class="container">  
		   <!--col-md-6 Starts--->
		   <div class="col-md-6 offer">
		   	<a href="#" class="btn btn-success btn-sm"> <?php    
              if (!isset($_SESSION['customer_email'])) {
                echo "Wellcome Guest";
              }else{
                echo "Wellcome: " .$_SESSION['customer_email'] . "";
              }
 
         ?></a>
		   	<a href="#">Shopping Cart Total Price: Rs.<?php totalPrice(); ?>, Total Items  <?php item();?></a>
		   </div>
            

            <div class="col-md-6">
            	<ul class="menu">
            		<li>
            			<a href="customer_registration.php">Registration</a>
            		</li>

            		<li>
            			<a href="customer/my_account.php">My Account </a>
            		</li>

            		<li>
            			<a href="cart.php">Goto Cart</a>
            		</li>

            		<li>
            			<?php
                  if (!isset($_SESSION['customer_email'])) {
                     echo "<a href='checkout.php'>Login</a>";
                   } else{
                    echo "<a href='logout.php'>Logout</a>";
                   }

                   ?>
            		</li>
            	</ul>
                
            </div>
            <!--col-md-6 Ends--->
	</div>  
	 <!--Top container Ends--->

</div>
<!--Top Bar Ends--->

<!------Header Section Starts------>
  
  <div class="navbar navbar-default" id="navbar">
  	
  	<div class="container"><!---container class starts---->
  		<div class="navbar-header"><!---navbar-header starts--->
  			<!----Logo Section Starts---->
  			<a class="navbar-brand home" href="index.php">
  				<img src="images/logog.png" alt="t-shirtsblend" class="hidden-xs" height="45px">
  				<img src="images/logog2.png" alt="t-shirtsblend" class="visible-xs" height="35px">
  			</a>
  			<!----Logo Section Ends---->

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
            	<span class="sr-only">Toggle Navigation</span>
            	<i class="fa fa-align-justify"></i>

            </button>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
            	<span class="sr-only"></span>
            	<i class="fa fa-search"></i>

            </button>
  		</div><!---navbar-header ends--->

  		<div class="navbar-collapse collapse" id="navigation"><!------navbar-collapse collapse starts---->
  			
  			<div class="padding-nav"><!---padding nav starts--->
  				<ul class="nav navbar-nav navbar-left">
  					<li class="active">
  						<a href="index.php">Home</a>
                     </li>
                     <li>
                     	<a href="shop.php">Shop</a>
                     </li>
                     <li>
                     	<a href="customer/my_account.php">My Account</a>
                     </li>
                     <li>
                     	<a href="cart.php">Shopping Cart</a>
                     </li>
                     <li>
                     	<a href="about.php">About Us</a>
                     </li>
                     <li>
                     	<a href="services.php">Services</a>
                     </li>
                     <li>
                     	<a href="contactus.php">Contact Us</a>
                     </li>
  				</ul>
  			</div><!---padding nav ends--->

  			<a href="cart.php" class="btn btn-primary navbar-btn right">
  				<i class="fa fa-shopping-cart"></i>
  					<span><?php item();?> Items In Cart</span>
            </a>

            <div class="navbar-collapse collapse right">
            	<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
            		<span class="sr-only">Toggle Search</span>
            		<i class="fa fa-search"></i>
            	</button>
            </div>

             <div class="collapse clearfix" id="search">
             	
             	<form class="navbar-form" method="get" action="result.php">
             		<div class="input-group">
             		<input type="text" name="user_query" placeholder="Search" class="form-control" required="">
                    <span class="input-group-btn">
                      <button type="submit" value="Search" name="Search" class="btn btn-primary">
                      	<i class="fa fa-search"></i>
                      </button>
                    </span>
             		</div>
             	</form>
             </div>
  		</div><!------navbar-collapse collapse ends---->

  	</div><!---container class Ends---->

  </div>
<!------Header Section Ends------>

<!-----Slider Section Starts------->
<div class="container" id="slider">
	<div class="col-md-12">
		<div class="carousel slide" id="myCarousel" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="myCarousel" data-slide-to="1"></li>
                <li data-target="myCarousel" data-slide-to="2"></li>
                <li data-target="myCarousel" data-slide-to="3"></li>
			</ol>
            <div class="carousel-inner"><!--carousel-inner starts-->
            	<?php

                    $get_slider="select * from slider LIMIT 0,1";
                    $run_slider=mysqli_query($con,$get_slider);
                    while ($row=mysqli_fetch_array($run_slider)) {
                    	$slider_name=$row['slider_name'];
                    	$slider_image=$row['slider_image'];

                        echo "<div class='item active'>
                        <img src='admin_area/slider_images/$slider_image'>
                        </div>";
                    }
            	?>
            	 
            	 <?php
                    $get_slider="select * from slider LIMIT 1,3";
                    $run_slider=mysqli_query($con,$get_slider);
                    while($row=mysqli_fetch_array($run_slider)){
                    	$slider_name=$row['slider_name'];
                    	$slider_image=$row['slider_image'];

                    	echo "<div class='item'>
                         <img src='admin_area/slider_images/$slider_image'>
                    	</div>";
                    }
  
            	 ?>
                    


            </div><!--carousel-inner ends-->
            <a href="#myCarousel" class="left carousel-control" data-slide="prev">
            	
            	<span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a href="#myCarousel" class="right carousel-control" data-slide="next">
            	
            	<span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
		</div>
	</div>

</div>
<!-----Slider Section Ends------->

<!-----Advantage Section Starts------->
<div id="advantage">
	<div class="container">
		<div class="same-height-row">
			<div class="col-sm-4">
				<div class="box same-height">
					<div class="icon">
						<i class="fa fa-heart"></i>
					</div>
					<h3><a href="#">BEST PRICES</a></h3>
					<p>You can check on all others sites about the prices and then compare with us.</p>
				</div>
			</div>


			<div class="col-sm-4">
				<div class="box same-height">
					<div class="icon">
						<i class="fa fa-heart"></i>
					</div>
					<h3><a href="#">100% SATISFACTION GUARANTEED FROM US</a></h3>
					<p>Free returns on everything for 3 months.</p>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="box same-height">
					<div class="icon">
						<i class="fa fa-heart"></i>
					</div>
					<h3><a href="#">WE LOVE OUR CUSTOMERS</a></h3>
					<p>We are known to provide best possible service ever</p>
				</div>
			</div>
		</div>
	</div>
.</div>
<!-----Advantage Section Ends------->

<!-----Latest this Week Starts------>
<div id="hot">

	<div class="box">
		<div class="container">
			<div class="col-md-12">
				<h2>Latest this Week</h2>
			</div>
		</div>
	</div>
</div>
<!-----Latest this Week Ends------>

<!-----Content or Product Section Starts------>

<div id="content" class="container">
	<div class="row"><!---row class starts---->

    <?php
     getPro();
    ?>

	</div><!---row class ends---->
</div>
<!-----Content or Product Section Starts------>

<!-----Footer Starts----->

<?php
     include("includes/footer.php");
?>

<!-----Footer Ends------->

<!-- jQuery library & Javascripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>