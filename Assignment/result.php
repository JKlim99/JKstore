<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/headAndFooter.css"/><!--CSS link-->

	<link href="https://fonts.googleapis.com/css?family=Anton|Roboto&display=swap" rel="stylesheet"/><!--Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"><!--Fonts-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--Search button font-->

	<title>JKstore - Search results</title>
</head>

<body>
<!-- CONNECTION -->
<?php include("common/connection.php");?>
<!-- Check login status -->
<?php include("common/algorithms/check_loginAlgorithm.php");?>
<!--MOBILE HOME BUTTON AND SEARCH BAR-->
<?php include("common/header_mobile.php");?>
<!--Side Navigation bar-->
<?php include("common/side_navigation_bar.php");?>
<!-- Login form -->
<?php include("common/forms/login_form.php");?>
<!-- Forgot password form -->
<?php include("common/forms/forgot_password_form.php");?>
<!-- Register form -->
<?php include("common/forms/register_form.php");?>
<!-- Register successful form -->
<?php include("common/forms/register_successful_form.php");?>
<!-- Cart -->
<?php include("common/cart.php");?>
<!-- Header -->
<?php include("common/header.php");?>


<!--SELLER-->
<div id="seller" style="background:url('images/bg/index-bg-2.jpg') no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;padding:50px 0% 0% 0%;position:relative;z-index:997;box-shadow:black 1px 0 10px;">
	<h1 align="center" style="text-shadow:black 0 0 10px;color:white;">
		Search Results
	</h1>
	<div style="background-color:white;">
		<table align="center" cellspacing="10vw" style="background-color:white;">
			<?php 
				/* if the target and search key in url are not set */
				if(!isset($_GET['target'])||!isset($_GET['search-key'])){
					echo "<script>window.location.href='http://localhost/Assignment/result.php?search-key=&target=';</script>";
				}
				/* if the user click search without keywords */
				if ($_GET['target'] == null){
					$sellersearch = $_GET['search-key'];
					$productsearch = $_GET['search-key'];
					$category = $_GET['search-key'];
					$sale="";
				/* if the user click see more on seller */
				}elseif($_GET['target'] == "seller"){
					$sellersearch = $_GET['search-key'];
					$productsearch = "no value";
					$category = "no value";
					$sale="";
				/* if the user click see more on sale */
				}elseif($_GET['target'] == "sale"){
					$sellersearch = "no value";
					$productsearch = $_GET['search-key'];
					$category = $_GET['search-key'];
					$sale = "and sale = '1'";
				/* if the user click categories */
				}else{
					$sellersearch = "no value";
					$productsearch = "no value";
					$category = $_GET['search-key'];
					$sale="";
				}
				/* seller results */
				$seller_sql = "select * from user where userType = 2 and userUsername like '%".$sellersearch."%' and isActive=2";
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
		<table align="center" cellspacing="10vw" style="background-color:white;">
			<?php 
			/* product results */
			$product_sql = "select * from product inner join user on product.userID = user.userID where (productCategory like '%".$category."%' or productName like '%".$productsearch."%' or productDescription like '%".$productsearch."%') ".$sale." and productStatus = 1 and user.isActive = 2 order by sale desc";
			$product_result = mysqli_query($conn,$product_sql);
			$product_column = 0;
			$product_row = 1; 
			if(mysqli_num_rows($product_result)<=0 && mysqli_num_rows($seller_result)<=0){
			?>
				<table align="center">
					<tr height="500px">
						<td>
							<h2>- No results found -</h2>
						</td>
					</tr>
				</table>
			<?php	
			}
			else{
				while ($product_rows= mysqli_fetch_array($product_result)){
					if($product_column == $product_row - 1){
						echo "<tr><!--PRODUCT ROW ".$product_row."-->";
						
					}
			?> 

			
			<td>
				<a href="product.php?id=<?php echo $product_rows['productID'];?>" style="text-decoration:none; ">
					<table class="productbox" cellpadding="0" cellspacing="0"><!--PRODUCT PRODUCT 1-->
						<tr>
							<td class="productbox-image" style="background-image:url('images/product box/detail.png'),url('images/product box/<?php echo $product_rows['productImageURL'];?>')">
							</td>
						</tr>
						<tr>
							<td class="productname">
								<p><?php echo $product_rows['productName'];?></p>
							</td>
						</tr>
						<?php if($product_rows['sale']==1){?>
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
						<?php }else{ ?>
						<tr>
							<td class="productprice">
								<p>RM<?php echo $product_rows['price'];?></p>
							</td>
						</tr>
						<?php } ?>	
					</table>
				</a>
			</td>
			<?php
				$product_column += 0.25; 
				if($product_column == $product_row){
					echo"</tr>";
					$product_row += 1;
				}
			}
			} ?>		
		</table>
	</div>
</div>
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

</body>

</html>
