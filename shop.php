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
		   	<a href="#">Shopping Cart Total Price: Rs.<?php totalPrice(); ?>, Total Items <?php item();?></a>
		   </div>
            

            <div class="col-md-6">
            	<ul class="menu">
            		<li>
            			<a href="customer_registration.php">Registration</a>
            		</li>

            		<li>
            			<a href="checkout.php">My Account </a>
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
  					<li>
  						<a href="index.php">Home</a>
                     </li>
                     <li class="active">
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


<div id="content">
  <div class="container"><!---Container starts--->
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="home.php">Home</a></li>
        <li>Shop</li>
      </ul>
    </div>

    <div class="col-md-3"><!---col-md-3 starts--->
      <?php
      include("includes/sidebar.php");
      ?>
    </div><!---col-md-3 ends--->
    <div class="col-md-9"><!---col-md-9 starts--->
      
     <?php
           if(!isset($_GET['p_cat'])){

            if (!isset($_GET['cat_id'])) {
              echo "<div class='box'>
                 <h1>Shop</h1>
                <p>If you have any question, please feel free to contact us, our customer service center is working for you 24/7.</p>
              </div>";
            }
           }
       
       ?>

      <div class="row"><!--row starts--->
               <?php
                     if(!isset($_GET['p_cat'])){
                        if (!isset($_GET['cat_id'])) {
                          
                       $per_page=6;
                       if(isset($_GET['page'])){

                        $page=$_GET['page'];
                       }else {
                        $page=1;
                       }
                       $start_from=($page-1) * $per_page;
                       $get_product="select * from products order by 1 DESC LIMIT $start_from, $per_page";
                       $run_pro=mysqli_query($con,$get_product);
                       while ($row=mysqli_fetch_array($run_pro)) {
                         $pro_id=$row['product_id'];
                         $pro_title=$row['product_title'];
                         $pro_price=$row['product_price'];
                         $pro_img1=$row['product_img1'];


                         echo "<div class='col-md-4 col-sm-6 center-responsive'>
                             <div class='product'>
                              <a href='details.php?pro_id=$pro_id'>
                                <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                                </a>

                              <div class='text'>
                               <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                               <p class='price'>Rs. $pro_price</p>
                               <p class='buttons'>
                               <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View details </a>
                               <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                               <i class='fa fa-shopping-cart'></i>Add to Cart</a>
                               </p>
                              </div> 
                             </div>
                         </div>
                         ";
                       }



               ?>
     

      </div><!---row ends--->

      <center><!--Center section Starts..--->
        <ul class="pagination">
          <?php
             $query="select * from products";
             $result=mysqli_query($con,$query);
             $total_record=mysqli_num_rows($result);
             $total_pages=ceil($total_record / $per_page);
                     echo "
                      <li><a href='shop.php?page=1'>".'First Page'."</a></li>
                     ";
                     for ($i=1; $i<=$total_pages; $i++) { 
                       echo "
                      <li><a href='shop.php?page=".$i."'>".$i."</a></li>
                     ";
                     };
                    
                       echo "
                      <li><a href='shop.php?page=$total_pages'>".'Last Page'."</a></li>
                     
                     ";

              }

                     }
          ?>
        </ul>
      </center><!--Center section ends--->
     
       <?php
           getPcatPro();
           getCatPro();


       ?>
    
    

    </div><!---col-md-9 ends--->

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