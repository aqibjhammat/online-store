<?php
session_start();
 include("includes/db.php");
 include("functions/functions.php");
?>
<?php
     if (isset($_GET['pro_id'])) {
       $pro_id=$_GET['pro_id'];
       $get_product="select * from products where product_id='$pro_id'";
       $run_product=mysqli_query($con,$get_product);
       $row_product=mysqli_fetch_array($run_product);
       $p_cat_id=$row_product['p_cat_id'];
       $p_title=$row_product['product_title'];
       $p_price=$row_product['product_price'];
       $p_desc=$row_product['product_desc'];
       $p_img1=$row_product['product_img1'];
       $p_img2=$row_product['product_img2'];
       $p_img3=$row_product['product_img3'];

        $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
        $run_p_cat=mysqli_query($con,$get_p_cat);
        $row_p_cat=mysqli_fetch_array($run_p_cat);
        $p_cat_id=$row_p_cat['p_cat_id'];
        $p_cat_title=$row_p_cat['p_cat_title'];
       
     }

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
        <li><a href="shop.php?p_cat=<?php echo $p_cat_id;?>"><?php echo $p_cat_title ?></a></li>
            <li>
              <?php
                echo  $p_title;
              ?>
            </li>
      </ul>
    </div>

    <div class="col-md-3"><!---col-md-3 starts--->
      <?php
      include("includes/sidebar.php");
      ?>
    </div><!---col-md-3 ends--->

<div class="col-md-9"><!---col md-9 starts--->
  <div class="row" id="productmain"><!---row productmain starts--->
    <div class="col-sm-6"><!---col-sm-6 start--->
      
      <div id="mainimage"><!---mainimage start--->
        <div id="mycarousel" class="carousel slide" data-ride="carousel"><!---mycarousel  start--->
        <ol class="carousel-indicators"><!---ordered list carousel-indecators--->
          <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
           <li data-target="#mycarousel" data-slide-to="1"></li>
            <li data-target="#mycarousel" data-slide-to="2"></li>
        </ol><!----orderded list carousel-indecators ends---->
          
          <div class="carousel-inner"><!----carousel-inner starts--->
            <div class="item active">
              <center>
                <img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive">
              </center>
            </div>

            <div class="item">
              <center>
                <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive">
              </center>
            </div>
            <div class="item">
              <center>
                <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive">
              </center>
            </div>

          </div><!----carousel-inner ends--->

          <a href="#mycarousel" class="left carousel-control" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
           <span class="sr-only">Previous</span>
          </a>

           <a href="#mycarousel" class="right carousel-control" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
           <span class="sr-only">Next</span>
          </a>

        </div><!---mycarousel ends--->

      </div><!---mainimage ends--->
    </div><!---col-sm-6 end--->

    <div class="col-sm-6"><!--col-sm-6 starts--->
      <div class="box"><!--box div starts-->
        <h1 class="text-center"><?php echo $p_title ?></h1>
        <!---form div starts-->
        <?php
        addCart();

        ?>
        <form action="details.php?add_cart=<?php echo $pro_id ?>" method="post" class="form-horizontal">
          <div class="form-group"><!--form-group div starts-->
            <label class="col-md-5 control-label">Product Quantity</label>
            <div class="col-md-7"><!--col-md-7 div starts-->
              <select name="product_qty" class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div><!--col-md-7 div ends-->
          </div><!--form-group div ends-->

          <div class="form-group"><!--form-group starts-->
            <label class="col-md-5 control-label">Product Size</label>
            <div class="col-md-7"><!--col-md-7 starts-->
              <select name="product_size" class="form-control">
                <option>Select a size</option>
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
                <option>Extra Large</option>
              </select>
            </div><!--col-md-7  ends-->
          </div><!--form-group ends-->

          <p class="price">Rs <?php echo $p_price; ?></p>
          <p class="text-center buttons">
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-shopping-cart"></i>Add to cart
            </button>
          </p>
        </form><!--form div ends-->
      </div><!--box div ends-->

      <div class="col-xs-4">
        <a href="#" class="thumb">
          <img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive">
        </a>
      </div>
       <div class="col-xs-4">
        <a href="#" class="thumb">
          <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive">
        </a>
      </div>
       <div class="col-xs-4">
        <a href="#" class="thumb">
          <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive">
        </a>
      </div>
       
    </div><!---col-sm-6 ends---->
  </div><!---row productmain ends--->

  <div class="box" id="details"><!-- box details starts--->
    <h4>Product Details</h4>
    <p><?php echo $p_desc ?></p>
    <h4>Size</h4>
    <ul>
      <li>Small</li>
       <li>Medium</li>
        <li>Large</li>
         <li>Extra Large </li>
    </ul>
  </div><!--box details ends--->

<div id="row same-height-row"><!----row same-height-row starts-->
  
  <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 starts-->
    <div class="box same-height-headline"><!--box same-height-headline starts-->
      <h3 class="text-center">You Also Like These Products</h3>
    </div><!--box same-height-headline ends-->
  </div><!--col-md-3 col-sm-6 ends-->

<?php
    $get_product="select * from products order by 1 LIMIT 0,3";
    $run_product=mysqli_query($con,$get_product);
    while($row=mysqli_fetch_array($run_product)){
      $pro_id=$row['product_id'];
       $product_title=$row['product_title'];
        $product_price=$row['product_price']; 
         $product_img1=$row['product_img1'];

         echo "
               <div class='center-responsive col-md-3 col-sm-6'>
                <div class='product same-height'>
                <a href='details.php?pro_id=$pro_id'>
                <img src='admin_area/product_images/$product_img1' class='img-responsive'>
                </a>
                <div class='text'>
                <h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
                <p class='price'>Rs.$product_price</p>

                </div>
                </div>
               </div>
                   ";
    }
?>
</div><!---row same-height-row ends--->
</div><!---col md-9 ends--->



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