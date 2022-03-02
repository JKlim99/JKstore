<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/headAndFooter.css"/><!--CSS link-->
    <link rel="stylesheet" type="text/css" href="css/productAndSeller.css"/><!--CSS link-->

	<link href="https://fonts.googleapis.com/css?family=Anton|Roboto&display=swap" rel="stylesheet"/><!--Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"><!--Fonts-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--Search button font-->

	<title>JKstore - Sellers</title>
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

<!--PRODUCT-->
<?php 
	$seller_id=$_GET['id'];
	/* select seller where = id */
    $seller_sql="select * from user where userID ='".$seller_id."'";
    $seller_result =mysqli_query($conn,$seller_sql);
    $seller_rows=mysqli_fetch_array($seller_result);
    
?>
<div id="seller" style="background:url('images/bg/index-bg-2.jpg') no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;padding:50px 0% 0% 0%;position:relative;z-index:997;box-shadow:black 1px 0 10px;">
	<h1 class="product-header" align="center" style="padding-bottom:100px;">
		<a href="index.php">Home</a> > <a href="result.php?target=seller&search-key=">Sellers</a> > <a href="seller.php?id=<?php echo $seller_id;?>"><?php echo $seller_rows['userUsername'];?></a>
	</h1>
	<div style="background-color:white;">
<!-- Seller details -->
        <table align="center" style="position:relative;top:-80px;width:200px">
            <tr>
                <td>
                    <img class="seller-image" src="images/userPicture/<?php echo $seller_rows['userPicture'];?>" alt="<?php echo $seller_rows['userPicture'];?>"/>
                </td>
            </tr>
            <tr>
                <td align="center"><h2 class="product-detail"><?php echo $seller_rows['userUsername'];?></h2></td>
            </tr>
        </table>
		<table align="center" style="position:relative;top:-50px">
            <tr>
                <td align="center">- <?php echo $seller_rows['sellerShortDescription'];?> -</td>
            </tr>
            <tr>
                <td style="width:40vw;font-family: 'Montserrat', sans-serif;" align="center"><p><?php echo $seller_rows['sellerDescription'];?></p></td>
			</tr>
			<tr>
				<td align="center">Contact:</td>
			</tr>
			<tr>
				<td align="center"><a class="seller-email" href="mailto:<?php echo $seller_rows['userEmail'];?>"><?php echo $seller_rows['userEmail'];?></a></td>
			</tr>
			<tr>
				<td align="center"><a class="seller-email" href="tel:+6<?php echo $seller_rows['userPhoneNumber'];?>">+<?php echo $seller_rows['userPhoneNumber'];?></a></td>
			</tr>
        </table>
<!-- Items from seller -->
        <table align="center">
            <tr>
                <td>    
                    <h2>Products from <?php echo $seller_rows['userUsername'];?></h2>
                </td>
            </tr>
        </table>     
        <table align="center" cellspacing="10vw" style="background-color:white;">
			<?php 
			$product_sql = "select * from product where userID = '".$seller_id."' and productStatus = 1 order by sale desc";
			$product_result = mysqli_query($conn,$product_sql);
			$product_column = 0;
			$product_row = 1; 
            if(mysqli_num_rows($product_result)<=0){?>
                <table align="center">
					<tr height="500px">
						<td>
							<h2>- This seller haven't start selling any products -</h2>
						</td>
					</tr>
				</table>
			<?php }
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
