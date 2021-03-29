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
                     <li>
                     	<a href="shop.php">Shop</a>
                     </li>
                     <li>
                     	<a href="checkout.php">My Account</a>
                     </li>
                     <li class="active">
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
    <div class="col-md-12"><!---col-md-12 starts--->
      <ul class="breadcrumb"><!---breadcrumb starts--->
        <li><a href="home.php">Home</a></li>
        <li>Cart</li>
      </ul><!---breadcrumb ends--->
    </div><!---col-md-12 end--->

<div class="col-md-9" id="cart"><!---col-md-9 cart starts--->
  <div class="box"><!---box starts--->
    <form action="cart.php" method="post" enctype="multipart-form-data"><!---form starts--->
      <h1>Shopping Cart</h1>
      <?php
           $ip_add=getUserIP();
           $select_cart="select * from cart where ip_add='$ip_add'";
           $run_cart=mysqli_query($con,$select_cart); 
           $count=mysqli_num_rows($run_cart);
            
            ?>

      <p class="text=muted"> Currently you have <?php echo $count ?> item's in your cart</p>
      <div class="table-responsive"><!----Table Responsive starts--->
        <table class="table"><!----table starts--->
          <thead><!---thead starts --->
            <tr>
              <th colspan="2">Product</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Size</th>
              <th colspan="1">Delete</th>
              <th colspan="1">Sub Total</th>
            </tr>
          </thead><!---thead end --->
          <tbody><!---tbody starts --->
           <?php
           $total=0;
           while ($row=mysqli_fetch_array($run_cart)) {
             $pro_id=$row['p_id'];
             $pro_size=$row['size'];
             $pro_qty=$row['qty'];
             $get_product="select * from products where product_id='$pro_id'"; 
             $run_pro=mysqli_query($con, $get_product);
             while ($row=mysqli_fetch_array($run_pro)) {
               
             $p_title=$row['product_title'];
             $p_img1=$row['product_img1'];
             $p_price=$row['product_price'];
             $sub_total=$row['product_price'] * $pro_qty;
             $total +=$sub_total;
           

            ?>

            <tr>
              <td><img src="admin_area/product_images/ <?php echo $p_img1 ?>"></td>
              <td><?php echo $p_title  ?></td>
              <td><?php echo $pro_qty ?></td>
              <td><?php echo $p_price ?></td>
              <td><?php echo $pro_size ?></td>
              <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
              <td><?php echo $sub_total ?></td>
            </tr>
            

            <?php

            }
            }


            ?>
            <!--<tr>
              <td><img src="admin_area/product_images/24.webp" class="img-responsive"></td>
              <td>Manchester City Sports T-Shirts </td>
              <td>2</td>
              <td>Rs.900</td>
              <td>Large</td>
              <td><input type="checkbox" name="remove[]"></td>
              <td>Rs.1800</td>
            </tr>
          </tbody><-tbody end 
          
          <tfoot>-tfoot starts 
            <tr>
              <th colspan="6">Total</th>
              <th colspan="1">Rs.1800</th>
            </tr>-->
          </tfoot><!---tfoot end --->

        </table><!----table end--->

      </div><!----Table Responsive end--->

        <div class="box-footer"><!---box-footer starts --->
         <div class="pull-left"><!---pull-left starts--->
           <h4>Total Price</h4>
         </div><!---pull-left end--->
         <div class="pull-right"><!---pull-right starts--->
          <h4>Rs.<?php echo $total;?></h4>
         </div><!---pull-right end--->
       </div><!---box-footer end --->


       <div class="box-footer"><!---box-footer starts --->
         <div class="pull-left"><!---pull-left starts--->
           <a href="index.php" class="btn btn-default">
             <i class="fa fa-chevron-left"></i>Continue Shopping
           </a>
         </div><!---pull-left end--->
         <div class="pull-right"><!---pull-right starts--->
           <button class="btn btn-default" type="submit" name="update" value="Update Cart"><!---button starts--->
             <i class="fa fa-refresh">Update Cart</i>
           </button><!---button end--->
        <a href="checkout.php" class="btn btn-primary">Proceed to checkout<i class="fa fa-chevron-right"></i>
        </a>
         </div><!---pull-right end--->
       </div><!---box-footer end --->


      </form><!---form end--->
  </div><!---box end--->
 <?php
 function update_cart(){
  global $con;
  if(isset($_POST['update'])){

    foreach ($_POST['remove'] as $remove_id) {
      $delete_product="delete from cart where p_id='$remove_id'";
      $run_del=mysqli_query($con,$delete_product);
      if ($run_del) {
      echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
 }

echo @$up_cart=update_cart();

 ?>


  <div id="row same-height-row"><!----row same-height-row starts-->
  <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 starts-->
    <div class="box same-height-headline"><!--box same-height-headline starts-->
      <h3 class="text-center">You Also Like These Products</h3>
    </div><!--box same-height-headline ends-->
  </div><!--col-md-3 col-sm-6 ends-->
  <div class="center-responsive col-md-3"><!--center-responsive col-md-3 starts-->
    <div class="product same-height"><!--product same-height starts-->
      <a href="">
        <img src="admin_area/product_images/19.webp" class="img-responsive">
      </a>
      <div class="text">
        <h3>
          <a href="details.php">Pink Manchester T-Shirts</a>
        </h3>
        <p class="price">Rs 1000</p>
      </div>
    </div><!--product same-height ends-->
  </div><!--center-responsive col-md-3 ends-->

  <div class="center-responsive col-md-3"><!--center-responsive col-md-3 starts-->
    <div class="product same-height"><!--product same-height starts-->
      <a href="">
        <img src="admin_area/product_images/19.webp" class="img-responsive">
      </a>
      <div class="text">
        <h3>
          <a href="details.php">Pink Manchester T-Shirts</a>
        </h3>
        <p class="price"><?php echo $total ?></p>
      </div>
    </div><!--product same-height ends-->
  </div><!--center-responsive col-md-3 ends-->

  <div class="center-responsive col-md-3"><!--center-responsive col-md-3 starts-->
    <div class="product same-height"><!--product same-height starts-->
      <a href="">
        <img src="admin_area/product_images/19.webp" class="img-responsive">
      </a>
      <div class="text">
        <h3>
          <a href="details.php">Pink Manchester T-Shirts</a>
        </h3>
        <p class="price">Rs.900</p>
      </div>
    </div><!--product same-height ends-->
  </div><!--center-responsive col-md-3 ends-->
</div><!---row same-height-row ends--->
</div><!---col-md-9 end--->
    
    <div class="col-md-3"><!---col-md-3 starts-->
      <div class="box" id="order-summary"><!---order-summary starts-->
        <div class="box-header"><!---box-header starts-->
          <h3>Order Summary</h3>
        </div><!---box-header ends-->
        <p class="text-muted">Shipping and additional costs are calculated based on the values you
        have entered.</p>
        <div class="table-responsive">
        <table class="table">
          <tbody>
            <tr>
              <td>Order Subtotal</td>
              <th>Rs.<?php echo $total ?></th>
            </tr>
            <tr>
              <td>Shipping and handling</td>
              <td>Rs.0</td>
            </tr>
            <tr>
              <td>Tax</td>
              <td>Rs.0</td>
            </tr>
            <tr class="total">
              <td>Total</td>
              <th>Rs.<?php echo $total ?></th>
            </tr>
          </tbody>
        </table></div>
      </div><!---order-summary ends-->

    </div><!---col-md-3 ends-->


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