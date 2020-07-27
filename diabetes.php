<?php
session_start();
include("config.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>

	<title> HFND.COM </title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/favicon.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />
	   	<link rel="stylesheet" href="css/userlogin.css" type="text/css" media="all" />
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


    <div class="bg">

    


	<!-- Begin Wrapper -->
	<div id="wrapper">
		<!-- Begin Header -->
		<div id="header">
			<!-- Begin Shell -->
			<div class="shell">
				<h1 id="logo"><a class="notext" href="#" title="Suncart">HFSD.COM</a></h1>
				
				<div id="top-nav">
					<ul>
					
						<li><a href="contact.php" title="Contact"><span>Contact</span></a></li>
						<li><a href="Sign In.php" title="Sign In"><span>Sign In</span></a></li>
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
					<li class="active"><a href="index.php" title="index.php">Home</a></li>
					<li>
						<a href="products.php">Category</a>
						
					   <li><a href="products.php"> Products</a></li>
					   	   <li>
						<a href="products.php">Warehouse</a>
					
					</li>
					  <li><a href="about.php">About Us</a></li>
					  <li><a href="customer.php">Free Sign Up</a> </li>
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
						<img src="images/dbs.png" alt="Slide Image" />
						<div class="slide-entry">
							<h2><span> DIABETES</span> </h2>
					
							<a href="diabetes.php" class="button" title="Details"><span>Details</span></a>
						</div>
					</li>
					<li>
						<img src="images/
can.png" alt="Slide Image" />
						<div class="slide-entry">
							<h4><span></span>CANCER<span class="small"></span> </h4>
							
							<a href="cancer.php" class="button" title="Details"><span>Details</span></a>
						</div>
					</li>
					<li>
						<img src="images/ht.png" alt="Slide Image" />
						<div class="slide-entry">
							<h3><span></span><span class="small"> </span>CARDIOVASCULAR DISEASES<span class="small"> </span></h3> 
					
						
							<a href="card.php" class="button" title="Buy now"><span>Details</span></a>
						</div>
					</li>
							<li>
						<img src="images/rd.png" alt="Slide Image" />
						<div class="slide-entry">
							<h3><span> </span><span class="small"> </span>RESPIRATORY DISEASES</h3> 
							
							<a href="rd.php" class="button" title="Buy now"><span>Details</span></a>
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
		
					
</br>
<font size="3"><div style="background-color:#FDFEFE ; padding: 10px; border: 4px solid green;"><h2>Key facts</h2>
The number of people with diabetes rose from 108 million in 1980 to 422 million in 2014.
The global prevalence of diabetes* among adults over 18 years of age rose from 4.7% in 1980 to 8.5% in 2014 (1).
Diabetes prevalence has been rising more rapidly in low- and middle-income countries than in high-income countries.
Diabetes is a major cause of blindness, kidney failure, heart attacks, stroke and lower limb amputation.
In 2016, an estimated 1.6 million deaths were directly caused by diabetes. Another 2.2 million deaths were attributable to high blood glucose in 2012.
Almost half of all deaths attributable to high blood glucose occur before the age of 70 years. WHO estimates that diabetes was the seventh leading cause of death in 2016.
A healthy diet, regular physical activity, maintaining a normal body weight and avoiding tobacco use are ways to prevent or delay the onset of type 2 diabetes.
Diabetes can be treated and its consequences avoided or delayed with diet, physical activity, medication and regular screening and treatment for complications.</font></br></div></br>
<font size="3"><div style="background-color:#FDFEFE ; padding: 10px; border: 4px solid green;"><h2>What is diabetes</h2>Diabetes is a chronic disease that occurs when the pancreas is no longer able to make insulin, or when the body cannot make good use of the insulin it produces.
</br>
Insulin is a hormone made by the pancreas, that acts like a key to let glucose from the food we eat pass from the blood stream into the cells in the body to produce energy. All carbohydrate foods are broken down into glucose in the blood. Insulin helps glucose get into the cells. </br>

Not being able to produce insulin or use it effectively leads to raised glucose levels in the blood (known as hyperglycaemia). Over the long-term high glucose levels are associated with damage to the body and failure of various organs and tissues.
</font></br></div></br>
</br>

<font size="3"><div style="background-color:#FDFEFE ; padding: 10px; border: 4px solid green;"><h2>Overview</h2>
Diabetes is a chronic disease that occurs either when the pancreas does not produce enough insulin or when the body cannot effectively use the insulin it produces. Insulin is a hormone that regulates blood sugar. Hyperglycaemia, or raised blood sugar, is a common effect of uncontrolled diabetes and over time leads to serious damage to many of the body's systems, especially the nerves and blood vessels.

In 2014, 8.5% of adults aged 18 years and older had diabetes. In 2016, diabetes was the direct cause of 1.6 million deaths and in 2012 high blood glucose was the cause of another 2.2 million deaths.
</font></br></div></br>
</br>
<font size="3"><div style="background-color:#FDFEFE ; padding: 10px; border: 4px solid green;"><h2>Types of diabetes</h2></br>
*Type 1 diabetes </br>
*Type 2 diabetes </br>
*Gestational diabetes (GDM)</br></font></br></div></br>
</br>

<div class="cl">&nbsp;</div>
				</div>
			</div>
			<!-- End Content -->
			<!-- Begin Sidebar -->
			<div id="sidebar">
				<ul>
					<li class="widget">
						<h2>Types Of Diabetes</h2>
						<div class="brands">
							<ul>
															<li><a href="diabetest1.php" title="diabetesType1"><img src="images/dtp1.png" width="230" height="70" alt="Brand 1" /></a></li>

								<li><a href="diabetest2.php" title="Brand 2"><img src="images/dtp2.png" width="230" height="70" alt="Brand 2" /></a></li>


								<li><a href="gs.php" title="Brand 3"><img src="images/gs1.png" width="230" height="70" alt="Brand 3" /></a></li>
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
				
				
				
				
          <form name="form1">
	     <input type="hidden" name="productid" />
         <input type="hidden" name="command" />
         </form>
		
	
	      <div class="section group">
		  
		  <?php
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
	$results = $mysqli->query("SELECT * FROM produ where Warehouse_ID=10 ORDER BY Product_ID ASC");
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
			</div>
				<div class="cl">&nbsp;</div>
			</div>
			
			<!-- End Products -->
			
		</div>
		<!-- End Main -->
		<!-- Begin Footer -->
		<div id="footer">
			<div class="boxes">
				<!-- Begin Shell -->
				<div class="shell">
					<div class="box post-box">
						<h2> HFND.COM</h2>
						<div class="box-entry">
							<img src="images/logo.png" alt="SomStore" width="160" height="80"/>
							<p>you can do online shopping confidently and conviently with us.we ensure your financial security and privacy. any of your informations sent to us would never be sent to any other third party. </p>
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
			<li><a href="diabetes.php" title="* DIABETES">* DIABETES</a></li>
							<li><a href="cancer.php" title="*CANCER">*CANCER</a></li>
							<li><a href="card.php" title="*CARDIOVASCULAR DISEASES">*CARDIOVASCULAR DISEASES</a></li>
							<li><a href="rd.php" title="*RESPIRATORY DISEASES">*RESPIRATORY DISEASES</a></li>
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
									<li><a href="#" title="Zaad service"><img src="images/cart-img3.jpg" alt="Zaad Service" /></a></li>
							<li><a href="#" title="Somstore"><img src="images/lp.jpg" alt="Somstore" /></a></li>
				
				
						</ul>
					</div>	<p>&copy; HFND.COM <a href="index.php"><i><font color="fefefe"> Welcome To fruits for non communicable diseases online shopping </font></i></a></p>
					<div class="cl">&nbsp;</div>
					Copyright ©2020 HFND.COM All rights reserved.
				</div>
				<!-- End Shell -->
			</div>
		</div>
		<!-- End Footer -->
		
		<div class="shout_box">
      <div class="header"> live Discussion of fruits for non communicable diseases online shopping <div class="close_btn">&nbsp;</div></div>
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