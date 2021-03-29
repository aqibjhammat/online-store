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
		   	<a href="#" class="btn btn-success btn-sm">
        
         <?php    
              if (!isset($_SESSION['customer_email'])) {
                echo "Wellcome Guest";
              }else{
                echo "Wellcome: " .$_SESSION['customer_email'] . "";
              }
 
         ?>

        </a>
		   	<a href="#">Shopping Cart Total Price: Rs.200, Total Items 2</a>
		   </div>
            

            <div class="col-md-6">
            	<ul class="menu">
            		<li>
            			<a href="../customer_registration.php">Registration</a>
            		</li>

            		<li>
            			<a href="../checkout.php">My Account </a>
            		</li>

            		<li>
            			<a href="../cart.php">Goto Cart</a>
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
  					<li   class="active">
  						<a href="index.php">Home</a>
                     </li>
                     <li>
                     	<a href="shop.php">Shop</a>
                     </li>
                     <li>
                     	<a href="checkout.php">My Account</a>
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
  					<span>4 Items In Cart</span>
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


<div id="content">
  <div class="container"><!---Container starts--->
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="home.php">Home</a></li>
        <li>Registration</li>
      </ul>
    </div>

    <div class="col-md-3"><!---col-md-3 starts--->
      <?php
      include("includes/sidebar.php");
      ?>
    </div><!---col-md-3 ends--->

    <div class="col-md-9"><!---col-md-9 starts---->
      <div class="box"><!---box starts---->
        <div class="box-header"><!---box-header starts---->
          <center><!---center starts---->
            <h2>Customer Registraton</h2>
           
          </center><!---center ends---->
        </div><!---box-header ends---->

        <form action="customer_registration.php" method="post" enctype="multipart/form-data"><!---form tag starts---->
          <div class="from-group">
            <label>Customer Name</label>
            <input type="text" name="name" class="form-control" required="">
          </div>
           
           <div class="from-group">
            <label>Customer Emsil</label>
            <input type="text" name="c_email" class="form-control" required="">
          </div>

          <div class="from-group">
            <label>Customer Password</label>
            <input type="password" name="c_password" class="form-control" required="">
          </div>

          <div class="from-group">
            <label>Country</label>
            <input type="text" name="c_country" class="form-control" required="">
          </div>

          <div class="from-group">
            <label>City</label>
            <input type="text" name="c_city" class="form-control" required="">
          </div>
          <div class="from-group">
            <label>Contact Number</label>
            <input type="text" name="c_contact" class="form-control" required="">
          </div>

          <div class="from-group">
            <label>Address</label>
            <input type="text" name="c_address" class="form-control" required="">
          </div>

          <div class="from-group">
            <label>Image</label>
            <input type="file" name="c_image" class="form-control" required="">
          </div>

          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">
              <i class="fa fa-user-md"></i>Registor
            </button>
          </div>
        </form><!---form tag ends---->
      </div><!---box ends---->
    </div><!---col-md-9 ends---->



      </div><!---Container ends--->
</div><!--Content ends--->



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

<?php
if (isset($_POST['submit'])) {
  $c_name=$_POST['c_name'];
  $c_email=$_POST['c_email'];
  $c_password=$_POST['c_password'];
  $c_country=$_POST['c_country'];
  $c_city=$_POST['c_city'];
  $c_contact=$_POST['c_contact'];
  $c_address=$_POST['c_address'];
  $c_image=$_FILES['c_image']['name'];
  $c_tmp_image=$_FILES['c_image']['tmp_name'];
  $c_ip=getUserIP();

  move_uploaded_file($c_tmp_image, "customer/customer_images/$c_image");
  $insert_customer="insert into customers(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
  $run_customer-mysqli_query($con,$insert_customer);
  $sel_cart="select * from cart where ip_add='$c_ip'";
  $run_cart=mysqli_query($con,$sel_cart);
  $check_cart=mysqli_num_rows($run_cart);
  if ($check_cart>0) {
      $_SESSION['customer_email']=$c_email;
      echo "<script>alert('You have been registered successfully')</script>";
      echo "<script>window.open('checkout.php','_self')</script>";
  }else{
    $_SESSION['customer_email']=$c_email;
    echo "<script>alert('You have been registered successfully')</script>";

    echo "<script>window.open('index.php','_self')</script>";
  }



}

?>