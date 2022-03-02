<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/headAndFooter.css"/><!--CSS link-->
	<link rel="icon" href="images/logo/jkstore_logo.png"/><!-- Logo on tab -->
	<link href="https://fonts.googleapis.com/css?family=Anton|Roboto&display=swap" rel="stylesheet"/><!--Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"><!--Fonts-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--Search button font-->

	<title>JKstore - Home</title>
</head>

<body>
<!-- CONNECTION -->
<?php include("common/connection.php");?>
<!-- Check login status -->
<?php include("common/algorithms/check_loginAlgorithm.php");?>
<!--MOBILE HOME BUTTON AND SEARCH BAR-->
<?php include("common/header_mobile.php");?>
<!--Side Navigation bar-->
<?php include("common/side_navigation_bar(index).php");?>
<!-- Login form -->
<?php include("common/forms/login_form.php");?>
<!-- Login failed form -->
<?php include("common/forms/login_failed_form.php");?>
<!-- Forgot password form -->
<?php include("common/forms/forgot_password_form.php");?>
<!-- Register form -->
<?php include("common/forms/register_form.php");?>
<!-- Register successful form -->
<?php include("common/forms/register_successful_form.php");?>
<!-- Cart -->
<?php include("common/cart.php");?>
<!-- Index header -->
<div >
	<div style="height: 17.5vw">
	</div>
	<div class="top">
		<!-- Background video -->
		<video autoplay muted loop id="myVideo">
			<source src="videos/background.mp4" type="video/mp4">
		</video>
		<!--Header-->
		<div>
			<h1 class="header" align="center" style="color:white; text-shadow:black 1px 0 5px;">Welcome to JK Store</h1> 
		</div>
		
		<div>
			<!--Big search bar-->
			<table class="header" align="center"> 
				<tr>
					<td>
						<form method="get" action="result.php" style="background-color: white;padding:5px;box-shadow:black 1px 0 5px;margin:0px;">
						<!--SEARCH BAR-->
						<input class="search-bar" style="font-size:2vw;width:40vw;border:0;" type="text" name="search-key" placeholder="Search what you want"/>
						<!--BIG SEARCH BUTTON-->
						<button class="search-btn" type="submit"><i class="fa fa-search" style="font-size:2vw;"></i></button>
						<!-- HIDDEN VALUE (target=NULL) -->
						<input type="hidden" name="target"/>
						</form>
					</td>
				</tr>
			</table>
		</div>
		<div>
			<?php if($login == 0){ ?>
			<!--Big Sign In and Register buttons-->
			<table class="header" align="center" cellspacing="30px"> 
				<tr align="center">
					<td>
						<!--BIG SIGN IN BUTTON-->
						<a class="SignInAndRegisterBtn" onclick="showLogin()" style="cursor:pointer">Sign In</a>
					</td>
					<td>
						<!--BIG REGISTER BUTTON-->
						<a class="SignInAndRegisterBtn" onclick="showRegister()" style="cursor:pointer">Register</a>
					</td>
				</tr>
				<tr align="center">
					<td class="questions">
						Already have an account?
					</td>
					<td class="questions">
						Want to be a seller or buyer?
					</td>
				</tr>
			</table>
			<?php } else{ ?>
			<table class="header" align="center" cellspacing="30px"> 
				<tr align="center">
					<td>
						<!--BIG Profile BUTTON-->
						<a class="SignInAndRegisterBtn" href="edit_profile.php" style="cursor:pointer">Profile</a>
					</td>
					<td>
						<!--BIG Log Out BUTTON-->
						<a class="SignInAndRegisterBtn" href="common/algorithms/logoutAlgorithm.php" style="cursor:pointer">Logout</a>
					</td>
				</tr>
				<tr align="center">
					<td class="questions" colspan="2">
						Welcome back! <?php echo $login_username;?>
					</td>
				</tr>
			</table>
			<?php } ?>
		</div>
	</div>
	<div style="height: 5vw">
	</div>
</div>
<!-- Header -->
<?php include("common/header.php");?>

<!--Categories box menu-->
<div id="categorybox" style="padding:1% 0% 5% 0%;position:relative;z-index:997; background-color:white;box-shadow:black 1px 0 10px">
	<h1 align="center" style="background-color:orange;color:white;">
		Categories
	</h1>
	<table align="center" cellspacing="30px" style="z-index:998;"> 
		<tr>
			<td>
				<a href="result.php?search-key=fashion&target=product">
					<table class="categorybox" style="background-image:url('images/category box/black.png'),url('images/category box/clothes.jpg');"> <!--category box-->
						<tr>
							<td>
								<p class="text" style="background-color:black;">Fashion</p><!--CLOTHES-->
							</td>
						</tr>
					</table>
				</a>
			</td>
			<td>
				<a href="result.php?search-key=electronicDevices&target=product">
					<table class="categorybox" style="background-image:url('images/category box/black.png'),url('images/category box/electronic devices.jpg');"> <!--category box-->
						<tr>
							<td>
								<p style="background-color:black;">Electronic Devices</p><!--ELETRONIC DEVICES-->
							</td>
						</tr>
					</table>
				</a>
			</td>
			<td>
				<a href="result.php?search-key=healthAndBeauty&target=product">
					<table class="categorybox" style="background-image:url('images/category box/black.png'),url('images/category box/health and beauty.jpg');"> <!--category box-->
						<tr>
							<td>
								<p style="background-color:black;">Health & Beauty</p><!--HEALTH AND BEAUTY-->
							</td>
						</tr>
					</table>
				</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="result.php?search-key=homeAppliance&target=product">
					<table class="categorybox" style="background-image:url('images/category box/black.png'),url('images/category box/home appliance.jpg')"> <!--category box-->
						<tr>
							<td>
								<p style="background-color:black;">Home Appliance</p><!--HOME APPLIANCE-->
							</td>
						</tr>
					</table>
				</a>
			</td>
			<td>
				<a href="result.php?search-key=sports&target=product">
					<table class="categorybox" style="background-image:url('images/category box/black.png'),url('images/category box/sports.jpg');"> <!--category box-->
						<tr>
							<td>
								<p style="background-color:black;">Sports</p><!--SPORTS-->
							</td>
						</tr>
					</table>
				</a>
			</td>
			<td>
				<a href="result.php?search-key=homeAndLifestyle&target=product">
					<table class="categorybox" style="background-image:url('images/category box/black.png'),url('images/category box/home and lifestyle.jpg');"> <!--category box-->
						<tr>
							<td>
								<p style="background-color:black;">Home & Lifestyle</p><!--HOME AND LIFESTYLE-->
							</td>
						</tr>
					</table>
				</a>
			</td>
		</tr>
	</table>
</div>
<!-- background 1 -->
<div style="height: 30vw;position:relative;z-index:996;background: url('images/bg/index-bg-3.jpg')no-repeat fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;background-attachment:fixed;">
</div>
<!--SALE-->
<div id="sale"style="background-color:white;padding:1% 0% 5% 0%;position:relative;z-index:997;box-shadow:black 1px 0 10px">
	<h1 align="center" style="background-color:orange;color:white;">
		Sale
	</h1>
	<table align="center" cellspacing="10px" style="z-index:998;">
		
			<?php 
			$product_sql = "select * from product inner join user on product.userID = user.userID where sale = 1 and productStatus = 1 and quantity>0 and user.isActive = 2 limit 8";
			$product_result = mysqli_query($conn,$product_sql);
			$product_column = 0;
			$product_row = 1; 
			while ($product_rows= mysqli_fetch_array($product_result)){
				if($product_column == $product_row - 1){
					echo "<tr><!--SALE ROW ".$product_row."-->";
					
				}
			?> 
			<td>
				<a href="product.php?id=<?php echo $product_rows['productID'];?>" style="text-decoration:none; ">
					<table class="productbox" cellpadding="0" cellspacing="0"><!--SALE PRODUCT 1-->
						<tr>
							<td class="productbox-image" style="background-image:url('images/product box/detail.png'),url('images/product box/<?php echo $product_rows['productImageURL'];?>')">
							</td>
						</tr>
						<tr>
							<td class="productname">
								<p><?php echo $product_rows['productName'];?></p>
							</td>
						</tr>
						<tr>
							<td class="productsale">
								<p>SALE <?php echo $product_rows['salePercentage']."%"?></p>
							</td>
						</tr>
						<tr>
							<td class="productprice">
								<p><strike>RM<?php echo $product_rows['price']?></strike><?php echo " RM".$product_rows['price']*((100-$product_rows['salePercentage'])/100);?></p>
							</td>
						</tr>
					</table>
				</a>
			</td>
			<?php
				$product_column += 0.25; 
				if($product_column == $product_row){
					echo"</tr>";
					$product_row += 1;
				}
			} ?>		
	</table>
	<div align="center" style="padding:1% 0% 0% 0%"><!--SEE MORE BUTTON-->
		<a class="seemore2" href="result.php?target=sale&search-key=">See More</a>
	</div>	
</div>
<!-- background 2 -->
<div style="height: 30vw;position:relative;z-index:996;background: url('images/bg/index-bg-4.jpg')no-repeat fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;background-attachment:fixed;">
</div>
<!--SELLER-->
<div id="seller" style="background-color:white;padding:1% 0% 5% 0%;position:relative;z-index:997;box-shadow:black 1px 0 10px">
	<h1 align="center" style="background-color:orange;color:white;">
		Seller
	</h1>
	<table align="center" cellspacing="20px">
		<?php 
			$seller_sql = "select * from user where userType = 2 and isActive = 2 limit 4";
			$seller_result = mysqli_query($conn,$seller_sql);
			$seller_column = 0;
			$seller_row = 1; 
			while ($seller_rows= mysqli_fetch_array($seller_result)){
				if($seller_column == $seller_row - 1){
					echo "<tr><!--SELLER ROW ".$seller_row."-->";
					
				}
		?> 
			<td>
				<a href="seller.php?id=<?php echo $seller_rows['userID'];?>" style="text-decoration:none;">
					<table class="sellerbox" cellpadding="0" cellspacing="0"><!--SELLER 1-->
						<tr>
							<td class="sellerbox-image" rowspan="2" style="background-image:url('images/userPicture/<?php echo $seller_rows['userPicture'];?>');">	
							</td>
							<td class="sellerbox-view"rowspan="2">
								<br/>View details
							</td>
							<td style="vertical-align:top;">
								<p class="sellerbox-sellername"><?php echo $seller_rows['userUsername'];?></p>
								
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;">
								<p class="sellerbox-sellerdescription"><?php echo $seller_rows['sellerShortDescription'];?></p>
							</td>
						</tr>
						
					</table>
				</a>
			</td>
		<?php
			$seller_column += 0.5; 
			if($seller_column == $seller_row){
				echo"</tr>";
				$seller_row += 1;
			}
		} ?>		
	</table>

	<div align="center" style="padding:1% 0% 0% 0%"><!--SEE MORE BUTTON-->
		<a class="seemore2" href="result.php?target=seller&search-key=">See More</a>
	</div>
</div>

<!-- background 3 -->
<div style="height: 30vw;position:relative;z-index:996;background: url('images/bg/index-bg-6.jpg')no-repeat fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;background-attachment:fixed;">
</div>

<!--ABOUT US-->
<div id="aboutus" style="background:url('images/bg/index-bg-2.jpg') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;z-index:997;position:relative;box-shadow:black 1px 0 10px;">
	<h1 align="center" style="color:white;margin:0px;padding:5%;text-shadow: black 1px 0px 10px;">
		About Us
	</h1>
	<div style="color:black;background-color: white;padding:5%;"align="center">
		<p style="margin:0;font-family: 'Montserrat', 'sans-serif';">
			We provide a platform which helps people<br/> who wish to sell their products or<br/> buy items from other sellers.
		</p>
		<br/>
		<h2 style="margin:0;">
			- JK store -
		</h2>
		<br/>
		<div align="center" style="padding:1% 0% 0% 0%"><!--SEE MORE BUTTON-->
			<a class="seemore2" href="aboutus.php">Learn More</a>
		</div>
	</div>
	
</div>

<!-- background 4 -->
<div style="height: 30vw;position:relative;z-index:996;background: url('images/bg/index-bg-5.jpg')no-repeat fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;background-attachment:fixed;">
</div>
<!--HELP AND CONTACT-->
<?php include("common/help_and_contact_template.php");?>
<!-- Sitemap -->
<?php include("common/footer.php");?>
<!-- Javascripts -->
<?php include("common/javascripts.php");?>
<!-- login algorithm -->
<?php include("common/algorithms/loginAlgorithm.php");?>
<!-- Register Algorithm -->
<?php include("common/algorithms/registerAlgorithm.php")?>
<!-- Forgot Password Algorithm -->
<?php include("common/algorithms/forgot_passwordAlgorithm.php")?>
<!-- Help and Contact Algorithm -->
<?php include("common/algorithms/help_and_contact_submit.php")?>
</body>

</html>
