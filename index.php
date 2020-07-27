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
						
				
						</div>
					</li>
					  <li><a href="about.php">About Us</a></li>
					  <li><a href="customer.php">Free Sign Up</a> </li>
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Navigation -->
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
					
							<a href="diabetes.php " class="button" title="Details"><span>Details</span></a>
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
						<img src="images/klkl.png" alt="Slide Image" />
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
			<!-- End Shell -->
		</div>
		<!-- End Slider -->
		<!-- Begin Main -->
		<div id="main" class="shell">
			<!-- Begin Content -->
			<div id="content">
				<div class="post">
							<font size="3"><div style="background-color:#FDFEFE ; padding: 10px; border: 4px solid green;"><h2>What is a noncommunicable disease?</h2>
A noncommunicable disease is a noninfectious health condition that cannot be spread from person to person. It also lasts for a long period of time. This is also known as a chronic disease.
A combination of genetic, physiological, lifestyle, and environmental factors can cause these diseases. Some risk factors include:	</br>	</br>

*Unhealthy diets	</br>	</br>
*Lack of physical activity	</br>	</br>
*Smoking and secondhand smoke	</br>	</br>
*Excessive use of alcohol	</br>	</br>
	</font></br>	</div>	</br>
				<font size="3"><div style="background-color:#FFFFFF ; padding: 10px; border: 4px solid green;"><h2>Non-communicable diseases </h2>
					*Noncommunicable diseases kill around 40 million people
 each year. This is about 70 percent of all deaths worldwide.</br>
*Noncommunicable diseases affect people belonging to all age groups, religions, and countries.</br>
*Noncommunicable diseases are often associated with older people. However, 15 million
 annual deaths from noncommunicable diseases occur among people aged 30 to 69.</br>
*More than 85 percent of these deaths occur in low- and middle-income countries and in vulnerable communities where access to preventative healthcare is lacking.</font></br></div></br>
			
					</br>
					<font size="3"><div style="background-color:#FDFEFE ; padding: 10px; border: 4px solid green;"><h2>What are the most common noncommunicable diseases? </h2>
	
Some noncommunicable diseases are more common than others. The four main types of noncommunicable diseases include cardiovascular disease, cancer, chronic respiratory disease, and diabetes.</br>

</font></br></div></br>
 
                    </br>

	              </br>


<div class="cl">&nbsp;</div>
				</div>
			</div>
			<!-- End Content -->
			<!-- Begin Sidebar -->
			
			<div id="sidebar">
				<ul>
					<li class="widget">
						<h2>Types of Diabetes</h2>
						<div class="brands">
						<ul>
								<li><a href="diabetest1.php" title="Type 1 diabetes "><img src="images/dtp1.png" width="230" height="70" alt="Brand 1" /></a></li>
								<li><a href="diabetest2.php" title="Type 2 diabetes "><img src="images/dtp2.png" width="230" height="70" alt="Brand 2" /></a></li>
								<li><a href="gs.php" title="Gestational diabetes "><img src="images/gs1.png" width="230" height="70" alt="Brand 3" /></a></li>
							<h2>Types of Cancer</h2>
								<li><a href="lung.php" title="Lung & Bronchus"><img src="images/sasa.png" width="230" height="70" alt="Brand 1" /></a></li></br>
								<li><a href="prcancer.php" title="Prostate"><img src="images/pros.png" width="230" height="70" alt="Brand 2" /></a></li>
								<li><a href="colon.php" title="Colon & Rectum"><img src="images/col.png" width="230" height="70" alt="Brand 3" /></a></li>
								
							<h2>Types of cardiovascular diseases</h2>
							    <li><a href="card1.php" title="Lung & Bronchus"><img src="images/ch.png" width="230" height="70" alt="Brand 1" /></a></li></br>
								<li><a href="card2.php" title="Colon & Rectum"><img src="images/hf.png" width="230" height="70" alt="Brand 3" /></a></li>
					
					
							</ul>
							</ul>
							<div class="cl">&nbsp;</div>
						</div>
						
					</li>
				</ul>
			</div>
			
			<!-- End Sidebar -->
			<div class="cl">&nbsp;</div>
						<!-- Begin Products -->
			<div id="product">
				

	      <div class="section group">
		  
		  <?php
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
	$results = $mysqli->query("SELECT * FROM clng ORDER BY Product_ID ASC");
    if ($results) { 
	
        //fetch results set as object and output HTML
        while($obj = $results->fetch_object())
        {
			echo '<div class="grid_1_of_4 images_1_of_4">'; 
            echo '<form method="post" action="cart_update.php">';
			echo '<div class="product-thumb"><img src="images/'.$obj->Picture.'"></div>';
            echo '<div class="product-content"><h2><b>'.$obj->ProductName.'</b> </h2>';
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
			
			
    
			
		</div>
		<!-- End Main -->
		<!-- Begin Footer -->
		<div id="footer">
			<div class="boxes">
				<!-- Begin Shell -->
				<div class="shell">
					<div class="box post-box">
						<h2>About HFND.COM</h2>
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