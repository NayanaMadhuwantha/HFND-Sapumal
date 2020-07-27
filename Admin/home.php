<?php
include("config.php");
include("usersession.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title> Somstore Group </title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/favicon.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />
	
	 	<link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />
	 <link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="screen" /> 
	 
	 
	 <link rel="stylesheet" href="css/audioplayer.css"  type="text/css" media="screen" />

		<script>
			/*
				VIEWPORT BUG FIX
				iOS viewport scaling bug fix, by @mathias, @cheeaun and @jdalton
			*/
			(function(doc){var addEvent='addEventListener',type='gesturestart',qsa='querySelectorAll',scales=[1,1],meta=qsa in doc?doc[qsa]('meta[name=viewport]'):[];function fix(){meta.content='width=device-width,minimum-scale='+scales[0]+',maximum-scale='+scales[1];doc.removeEventListener(type,fix,true);}if((meta=meta[meta.length-1])&&addEvent in doc){fix();scales=[.25,1.6];doc[addEvent](type,fix,true);}}(document));
		</script>
	<script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>

	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/functions.js" type="text/javascript" charset="utf-8"></script>
	
	
	 <!-- Linking scripts -->
    <script src="js/main.js" type="text/javascript"></script>

	<!-- WAA DHAMAADKA JQueryga CHaTTIng Ka-->

<script type="text/javascript">
$(document).ready(function() {

	// load messages every 1000 milliseconds from server.
	load_data = {'fetch':1};
	window.setInterval(function(){
	 $.post('shout.php', load_data,  function(data) {
		$('.message_box').html(data);
		var scrolltoh = $('.message_box')[0].scrollHeight;
		$('.message_box').scrollTop(scrolltoh);
	 });
	}, 1000);
	
	//method to trigger when user hits enter key
	$("#shout_message").keypress(function(evt) {
		if(evt.which == 13) {
				var iusername = $('#shout_username').val();
				var imessage = $('#shout_message').val();
				post_data = {'username':iusername, 'message':imessage};
			 	
				//send data to "shout.php" using jQuery $.post()
				$.post('shout.php', post_data, function(data) {
					
					//append data into messagebox with jQuery fade effect!
					$(data).hide().appendTo('.message_box').fadeIn();
	
					//keep scrolled to bottom of chat!
					var scrolltoh = $('.message_box')[0].scrollHeight;
					$('.message_box').scrollTop(scrolltoh);
					
					//reset value of message box
					$('#shout_message').val('');
					
				}).fail(function(err) { 
				
				//alert HTTP server error
				alert(err.statusText); 
				});
			}
	});
	
	//toggle hide/show shout box
	$(".close_btn").click(function (e) {
		//get CSS display state of .toggle_chat element
		var toggleState = $('.toggle_chat').css('display');
		
		//toggle show/hide chat box
		$('.toggle_chat').slideToggle();
		
		//use toggleState var to change close/open icon image
		if(toggleState == 'block')
		{
			$(".header div").attr('class', 'open_btn');
		}else{
			$(".header div").attr('class', 'close_btn');
		}
		 
		 
	});
});

</script>

<!-- WAA DHAMAADKA JQueryga CHaTTIng Ka-->
</head>
<body>
	<!-- Begin Wrapper -->
	<div id="wrapper">
		<!-- Begin Header -->
		<div id="header">
			<!-- Begin Shell -->
			<div class="shell">
				<h1 id="logo"><a class="notext" href="#" title="Suncart">Somstore</a></h1>
				<div id="top-nav">
					<ul>
						<li><a href="#" title="Login Email"> <span class="janan"> <?php echo "Your Email Is: ". "<i><b>".$login_session."</b></i>" ;?> </span></a></li>
						
							 <li > <a href="contact.php" title="Contact"> <span class="jananalibritish"> Contact  </span></a>  </li>
					       <li class="janan"><a href="logout.php"><span class="jananalibritish">Logout </span></a></li>
					</ul>
				</div>
				<div class="cl">&nbsp;</div>
	<div class="shopping-cart"  id="cart" id="right" >
<dl id="acc">	
<dt class="active">								
<p class="shopping" >Shopping Cart &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
</dt>
<dd class="active" style="display: block;">
<?php
   //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if(isset($_SESSION["cart_session"]))
{
    $total = 0;
    echo '<ul>';
    foreach ($_SESSION["cart_session"] as $cart_itm)
    {
        echo '<li class="cart-itm">';
        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>'."</br>";
        echo '<h3  style="color: green" ><big> '.$cart_itm["name"].' </big></h3>';
        echo '<div class="p-code"><b><i>ID:</i></b><strong style="color: #d7565b" ><big> '.$cart_itm["code"].' </big></strong></div>';
		echo '<span><b><i>Shopping Cart</i></b>( <strong style="color: #d7565b" ><big> '.$cart_itm["TiradaProductTiga"].'</big></strong>) </span>';
        echo '<div class="p-price"><b><i>Price:</b></i> <strong style="color: #d7565b" ><big>'.$currency.$cart_itm["Qiimaha"].'</big></strong></div>';
        echo '</li>';
        $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal) ."</br>"; 
    }
    echo '</ul>';
    echo '<span class="check-out-txt"><strong style="color:green" ><i>Total:</i> <big style="color:green" >'.$currency.$total.'</big></strong> <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">Check Out</span></a></span>';
	echo '&nbsp;&nbsp;<a   class="a-btnjanan"  href="cart_update.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text">Clear Cart</span></a>';
}else{
    echo ' <h4>(Your Shopping Cart Is Empty!!!)</h4>';
}
?>

</dd>
</dl>
</div>
 <div class="clear"></div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Header -->
  <!-- Begin Navigation -->
		<div id="navigation">
			<!-- Begin Shell -->
			<div class="shell">
				<ul>
					<li class="active"><a href="home.php" title="Home">Home</a></li>
					
					<li><a href="profile.php" title="Profile">Profile</a></li>
					<li>
						<a href="products.php">Category</a>
						<div class="dd">
							<ul>
								<li>
									 <a href="warehouse_1.php"> FoodStuff</a>
									<div class="dd">
										<ul>
											<li><a href="warehouse_1.php">Fruits</a></li>
                                            <li><a href="warehouse_1.php">Biscuits</a></li>
										</ul>
									</div>
								</li>
								
								<li>
									 <a href="warehouse_2.php"> Beverage</a>
									<div class="dd">
										<ul>
											  <li><a href="warehouse_2.php">Bavaria</a></li>
                                             <li><a href="warehouse_2.php">Reddbull</a></li>
										</ul>
									</div>
								</li>
								
								<li>
									<a href="warehouse_3.php"> Cleaning Material</a>
									<div class="dd">
										<ul>
											<li><a href="warehouse_3.php">Fairy</a></li>
                                            <li><a href="warehouse_3.php">Harpic</a></li>
										</ul>
									</div>
								</li>
								
								<li>
									<a href="warehouse_4.php"> Clothes</a>
									<div class="dd">
										<ul>
											  <li><a href="warehouse_4.php">Suit</a></li>
                                              <li><a href="warehouse_4.php">T.shirts</a></li>
										</ul>
									</div>
								</li>
								
							</ul>
						</div>
					</li>
					   <li><a href="products.php"> Products</a></li>
					    <li>
						<a href="products.php">Warehouse</a>
						<div class="dd">
							<ul>
								<li>
									 <a href="warehouse_1.php">Som Food Staff</a>
									
								</li>
								
								<li>
									 <a href="warehouse_2.php">Som Beverages</a>
									
								</li>
								
								<li>
									<a href="warehouse_3.php">Som House Staff</a>
									
								</li>
								
								<li>
									<a href="warehouse_4.php">Som Clothes</a>
									
								</li>
								
							</ul>
						</div>
					</li>
					  <li><a href="about.php">About Us</a></li>
				
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Navigation -->
		<!-- Begin Slider -->
		<div id="slider">
						<!-- Begin Shell -->
			<div class="shell">
				<ul class="slider-items">
					<li>
						<img src="images/s1.png" alt="Slide Image" />
						<div class="slide-entry">
							<h2><span> Islamic</span> Woman Cabaya</h2>
					
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/s2.png" alt="Slide Image" />
						<div class="slide-entry">
							<h4><span>Islamic</span><span class="small"></span> &nbsp; Man Dresses</h4>
							
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/s3.png" alt="Slide Image" />
						<div class="slide-entry">
							<h3><span>Black Suit</span><span class="small"> </span>Dress<span class="small"> And Coats</span></h3> 
					
						
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
							<li>
						<img src="images/s4.png" alt="Slide Image" />
						<div class="slide-entry">
							<h3><span> Choose</span><span class="small"> Frush</span>Fruits</h3> 
							
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/s5.png" alt="Slide Image" />
						<div class="slide-entry">
							<h4><span>Some Fruits</span><span class="small">&amp;</span><span>Frush</span>Crops</h4>
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/s6.png" alt="Slide Image" />
						<div class="slide-entry">
							<h3><span>Smart Dress</span><span class="small">of </span> Male And Females Suits</h3> 
					
							
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/s7.png" alt="Slide Image" />
						<div class="slide-entry">
							<h2><span>Woman</span>Dress</h2>
						
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/s8.png" alt="Slide Image" />
						<div class="slide-entry">
							<h4><span>Frush</span><span class="small"></span> &nbsp;<span> Food</span>  New Crops</h4>
							
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/s9.png" alt="Slide Image" />
						<div class="slide-entry">
					
							<h4 class="short"><span>Home</span> Cleaning Equipment</h4>
							
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
				</ul>
				<div class="cl">&nbsp;</div>
				<div class="slider-nav">
					
				</div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Slider -->
		<!-- Begin Main -->
		<div id="main" class="shell">
			<!-- Begin Content -->
			<div id="content">
				<div class="post">
						<h2>Welcome!</h2>
					<img src="images/logo.png" alt="Post Image" height="160" width="260"/>
					You can be confident when you're shopping online with SomStore. Our Secure online shopping website encrypts your personal and financial information to ensure your order information is protected.We use industry standard 128-bit encryption. Our Secure online shopping website locks all critical information passed from you to us,
                   such as personal information, in an encrypted envelope, making it extremely difficult for this information to be intercepted.. <a href="#" class="more" title="Read More">Read More</a></p>
					<div class="cl">&nbsp;</div>
				</div>
			</div>
			<!-- End Content -->
			<!-- Begin Sidebar -->
			<div id="sidebar">
				<ul>
					<li class="widget">
						<h2>TOP Warehouse</h2>
						<div class="brands">
							<ul>
								<li><a href="warehouse_1.php" title="Brand 1"><img src="images/k.png" width="103" height="51" alt="Brand 1" /></a></li>
								<li><a href="warehouse_2.php" title="Brand 2"><img src="images/b.png" width="103" height="51" alt="Brand 2" /></a></li>
								<li><a href="warehouse_3.php" title="Brand 3"><img src="images/ab.png" width="103" height="51" alt="Brand 3" /></a></li>
								<li><a href="warehouse_4.php" title="Brand 4"><img src="images/33.png" width="103" height="51" alt="Brand 4" /></a></li>
							</ul>
							<div class="cl">&nbsp;</div>
						</div>
						<a href="products.php" class="more" title="More Brands">All Products</a>
					</li>
				</ul>
			</div>
			<!-- End Sidebar -->
			<div class="cl">&nbsp;</div>
		<!-- Begin Products -->
			
				<div id="products">
				<h2>Featured Products</h2>

	      <div class="section group">
		  
		  <?php
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
	$results = $mysqli->query("SELECT * FROM product ORDER BY Product_ID ASC");
    if ($results) { 
	
        //fetch results set as object and output HTML
        while($obj = $results->fetch_object())
        {
			echo '<div class="grid_1_of_4 images_1_of_4">'; 
            echo '<form method="post" action="cart_update.php">';
			echo '<div class="product-thumb"><img src="images/'.$obj->Picture.'"></div>';
            echo '<div class="product-content"><h2><b>'.$obj->productName.'</b> </h2>';
            echo '<div class="product-desc">'.$obj->Description.'</div>';
            echo '<div class="product-info">';
			echo '<p><span class="price"> Price:<big style="color:green">'.$currency.$obj->Price.'</big></span></p>';
            echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
			echo '<div class="button"><span><img src="images/cart.jpg" alt="" /><button class="cart-button"  class="add_to_cart">Add to Cart</button></span> </div>';
			echo '</div></div>';
            echo '<input type="hidden" name="Product_ID" value="'.$obj->Product_ID.'" />';
            echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
            echo '</form>';
            echo '</div>';
        }
    
    }
    ?>
    </div>
				<div class="cl">&nbsp;</div>
			</div>
			
			<!-- End Products -->			
			
			<!-- Begin Products Slider -->
			<div id="product-slider">
				<h2>Best Products</h2>
				<ul>
				
		  	<?php
			$result=mysqli_query($mysqli,"select * from product") or die (mysqli_error());
			while($row=mysqli_fetch_array($result)){
		?>
					<li>
						<a href="products.php" title="Product Link"><img src="images/<?php echo $row['Picture']?>" alt="IMAGES" /></a>
						<div class="info">
							<h4><b><?php echo $row['productName']?></b></h4>
							<span class="number"><span>Price:<big style="color:green">$<?php echo $row['Price']?></big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 <?php } ?>
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Products Slider -->
			
		</div>
		<!-- End Main -->
		<!-- Begin Footer -->
		<div id="footer">
			<div class="boxes">
				<!-- Begin Shell -->
				<div class="shell">
					<div class="box post-box">
						<h2>About SomStore</h2>
						<div class="box-entry">
							<img src="images/logo.png" alt="SomStore" width="160" height="80"/>
							<p>You can be confident when you're shopping online with SomStore. Our Secure online shopping website encrypts your personal and financial information to ensure your order information is protected.We use industry standard 128-bit encryption. Our Secure online shopping website locks all critical information passed from you to us,
                             such as personal information, in an encrypted envelope, making it extremely difficult for this information to be intercepted. </p>
							<div class="cl">&nbsp;</div>
						</div>
					</div>
					<div class="box social-box">
						<h2>We are Social</h2>
						<ul>
							<li><a href="#" title="Facebook"><img src="images/social-icon1.png" alt="Facebook" /><span>Facebook</span><span class="cl">&nbsp;</span></a></li>
							<li><a href="#" title="Twitter"><img src="images/social-icon2.png" alt="Twitter" /><span>Twitter</span><span class="cl">&nbsp;</span></a></li>							
							<li><a href="#" title="RSS"><img src="images/social-icon4.png" alt="RSS" /><span>RSS</span><span class="cl">&nbsp;</span></a></li>
							<li><a href="#" title="Blogger"><img src="images/social-icon7.png" alt="Blogger" /><span>Blogger</span><span class="cl">&nbsp;</span></a></li>
						</ul>
						<div class="cl">&nbsp;</div>
					</div>
					<div class="box">
						<h2>Information</h2>
						<ul>
							<li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
							<li><a href="#" title="Contact Us">Contact Us</a></li>
							<li><a href="#" title="Log In">Log In</a></li>
							<li><a href="#" title="Account">Account</a></li>

						</ul>
					</div>
					<div class="box last-box">
						<h2>Categories</h2>
						<ul>
							<li><a href="#" title="Clothes">Clothes</a></li>
							<li><a href="#" title="Cleaning Material">Cleaning Material</a></li>
							<li><a href="#" title="Fizzi Drinks">Fizzy Drinks</a></li>
							<li><a href="#" title="Food Stuff">Food Stuff</a></li>
						</ul>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- End Shell -->
			</div>
			<div class="copy">
				<!-- Begin Shell -->
				<div class="shell">
					<div class="carts">
						<ul>
							<li><span>We accept</span></li>
							<li><a href="#" title="Zaad service"><img src="images/zaad.png" alt="Zaad Service" /></a></li>
							<li><a href="#" title="Somstore"><img src="images/suncart.png" alt="Somstore" /></a></li>
				
						</ul>
					</div>	<p>&copy; Somstore.com. Groups <a href="index.php"><i><font color="fefefe"> Welcome To Somstore Online Shopping Site </font></i></a></p>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- End Shell -->
			</div>
		</div>
		<!-- End Footer -->
<?php 
  include 'includes/session.php';
  include 'includes/format.php'; 
?>
<?php 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }

  $conn = $somstore->open();
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id");
                $stmt->execute();

                $total = 0;
                foreach($stmt as $srow){
                  $subtotal = $srow['price']*$srow['quantity'];
                  $total += $subtotal;
                }

                echo "<h3>&#36; ".number_format_short($total, 2)."</h3>";
              ?>
              <p>Total Sales</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="book.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM products");
                $stmt->execute();
                $prow =  $stmt->fetch();

                echo "<h3>".$prow['numrows']."</h3>";
              ?>
          
              <p>Number of Products</p>
            </div>
            <div class="icon">
              <i class="fa fa-barcode"></i>
            </div>
            <a href="student.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users");
                $stmt->execute();
                $urow =  $stmt->fetch();

                echo "<h3>".$urow['numrows']."</h3>";
              ?>
             
              <p>Number of Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="return.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
                $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE sales_date=:sales_date");
                $stmt->execute(['sales_date'=>$today]);

                $total = 0;
                foreach($stmt as $trow){
                  $subtotal = $trow['price']*$trow['quantity'];
                  $total += $subtotal;
                }

                echo "<h3>&#36; ".number_format_short($total, 2)."</h3>";
                
              ?>

              <p>Sales Today</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="borrow.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Sales Report</h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Select Year: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2015; $i<=2065; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <br>
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:350px"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Chart Data -->
<?php
  $months = array();
  $sales = array();
  for( $m = 1; $m <= 12; $m++ ) {
    try{
      $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date)=:month AND YEAR(sales_date)=:year");
      $stmt->execute(['month'=>$m, 'year'=>$year]);
      $total = 0;
      foreach($stmt as $srow){
        $subtotal = $srow['price']*$srow['quantity'];
        $total += $subtotal;    
      }
      array_push($sales, round($total, 2));
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $sales = json_encode($sales);

?>
<!-- End Chart Data -->

<?php $pdo->close(); ?>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'SALES',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $sales; ?>
      }
    ]
  }
  //barChartData.datasets[1].fillColor   = '#00a65a'
  //barChartData.datasets[1].strokeColor = '#00a65a'
  //barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>


		
		<div class="shout_box">
      <div class="header"> live Discussion of Somstore <div class="close_btn">&nbsp;</div></div>
     <div class="toggle_chat">
     <div class="message_box">
    </div>
    <div class="user_info">
    <input name="shout_username" id="shout_username" type="text" placeholder="Your Name" maxlength="15" />
   <input name="shout_message" id="shout_message" type="text" placeholder="Type Message Hit Enter" maxlength="100" /> 
    </div>
    </div>
	</div>
	
	</div>
	<!-- End Wrapper -->
</body>
</html>