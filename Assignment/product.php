<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/headAndFooter.css"/><!--CSS link-->
    <link rel="stylesheet" type="text/css" href="css/productAndSeller.css"/><!--CSS link-->

	<link href="https://fonts.googleapis.com/css?family=Anton|Roboto&display=swap" rel="stylesheet"/><!--Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"><!--Fonts-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--Search button font-->

	<title>JKstore - Product pages</title>
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
if(isset($_GET['id'])){
	$product_id=$_GET['id'];
	/* select the product based on the id */
    $product_sql="select * from product inner join user on product.userID = user.userID where productID ='".$product_id."' and user.isActive = 2";
    $product_result =mysqli_query($conn,$product_sql);
	$product_rows=mysqli_fetch_array($product_result);
	/* select the seller of the product */
    $seller_sql="select * from user where userID = '".$product_rows['userID']."'";
    $seller_result= mysqli_query($conn,$seller_sql);
	$seller_rows= mysqli_fetch_array($seller_result);
	/* get average rate of the product */
    $rating_sql = "select cast(avg(rate) as decimal(2,1)) as rate from rating where productID = '".$product_id."'";
    $rating_result=mysqli_query($conn,$rating_sql);
	$rating_rows=mysqli_fetch_array($rating_result);
}
	/* Add cart and buy algorithms */
	if(isset($_GET['addcart'])||isset($_GET['buynow'])){
		/* check whether there is cart order exists in database */
		$checkcart_sql="select * from ordertable where orderStatus = 0 and userID=".$login_id;
		$checkcart_result = mysqli_query($conn,$checkcart_sql);
		$checkcart_rows = mysqli_fetch_array($checkcart_result);
		
		if(mysqli_num_rows($checkcart_result)<=0){/* create new cart */			
			$storecart_sql="insert into ordertable (orderStatus,orderDate,userID) values(0,'".date('y-m-d')."',".$login_id.");";
			mysqli_query($conn,$storecart_sql);
			$checkcart_result = mysqli_query($conn,$checkcart_sql);
			$checkcart_rows = mysqli_fetch_array($checkcart_result);
			$firstaddcart_sql = "insert into ordertable_product values(".$checkcart_rows['orderID'].",".$_GET['id'].",1,null,0,0);";
			mysqli_query($conn,$firstaddcart_sql);
			if(isset($_GET['addcart'])){
			echo "<script>window.location.href='product.php?id=".$_GET['id']."';</script>";
			}else{
				echo "<script>window.location.href='checkout.php';</script>";
			}
		}else{/* use existing cart */
			$checkcartquantity_sql = "select * from ordertable_product where orderID=".$checkcart_rows['orderID']." and productID = ".$_GET['id'];
			$checkcartquantity_result = mysqli_query($conn,$checkcartquantity_sql);
			if(mysqli_num_rows($checkcartquantity_result)==1){
			$addcart_sql="update ordertable_product set quantity=(select quantity from ordertable where orderID=".$checkcart_rows['orderID']." and productID = ".$_GET['id'].")+1 where orderID=".$checkcart_rows['orderID']." and productID =".$_GET['id'];
			mysqli_query($conn,$addcart_sql);
			}else{
				$addanotherproduct_sql="insert into ordertable_product values(".$checkcart_rows['orderID'].",".$_GET['id'].",1,null,0,0);";
				mysqli_query($conn,$addanotherproduct_sql);
			}
			if(isset($_GET['addcart'])){
				echo "<script>window.location.href='product.php?id=".$_GET['id']."';</script>";
			}else{
				echo "<script>window.location.href='checkout.php';</script>";
			}
		}
	}
	
?>
<?php if(mysqli_num_rows($product_result)>0){?>
<div id="seller" style="background:url('images/bg/index-bg-2.jpg') no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;padding:50px 0% 0% 0%;position:relative;z-index:997;box-shadow:black 1px 0 10px;">
	<h1 class="product-header" align="center">
		<a href="index.php">Home</a> > <a href="result.php?search-key=<?php echo $product_rows['productCategory'];?>&target=product"><?php 
					if($product_rows['productCategory']=="fashion"){echo "Fashion";}
					elseif($product_rows['productCategory']=="electronicDevices"){echo "Electronic Devices";}
					elseif($product_rows['productCategory']=="healthAndBeauty"){echo "Health & Beauty";}
					elseif($product_rows['productCategory']=="homeAppliance"){echo "Home Appliance";}
					elseif($product_rows['productCategory']=="sports"){echo "Sports";}
					elseif($product_rows['productCategory']=="homeAndLifestyle"){echo "Home & Lifestyle";}
					?></a> > <a href="product.php?id=<?php echo $product_id;?>"><?php echo $product_rows['productName'];?></a>
	</h1>
	<div style="background-color:white;">
		<table align="center" id="product">
            <tr>
                <td colspan="2" align="center" class="product-detail">
                    <h2><?php echo $product_rows['productName'];?></h2>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <img src="images/product box/<?php echo $product_rows['productImageURL'];?>" class="product-image" alt="itemname"/>
                </td>
            </tr>
            <tr>
                <td class="product-detail">
                    <?php 
                    if($rating_rows['rate']!=null){
                    echo $rating_rows['rate'];
                    echo "<span style='color:gold;'class='fa fa-star checked'></span>";
                    }?>
                </td>
                <?php if($product_rows['sale']==1){?>		
				<td class="product-detail" align="right">
					<p><strike>RM<?php echo $product_rows['price']?></strike><?php echo " RM".$product_rows['price']*((100-$product_rows['salePercentage'])/100);?></p>
				</td>
				<?php }else{ ?>
				<td class="product-detail" align="right">
					<p>RM<?php echo $product_rows['price'];?></p>
				</td>
				<?php } ?>
            </tr>
            <Tr>
                <td>
                    Category
                </td>
                <td class="product-detail" align="right">
					<a href="result.php?search-key=<?php echo $product_rows['productCategory'];?>&target=product">
					<?php 
					if($product_rows['productCategory']=="fashion"){echo "Fashion";}
					elseif($product_rows['productCategory']=="electronicDevices"){echo "Electronic Devices";}
					elseif($product_rows['productCategory']=="healthAndBeauty"){echo "Health & Beauty";}
					elseif($product_rows['productCategory']=="homeAppliance"){echo "Home Appliance";}
					elseif($product_rows['productCategory']=="sports"){echo "Sports";}
					elseif($product_rows['productCategory']=="homeAndLifestyle"){echo "Home & Lifestyle";}
					?>
					</a>
                </td>
            </Tr>
            <Tr>
                <td>
                    Item Description
                </td>
                <td class="product-detail"  style="color:grey;font-size:1.5vw;" align="justify">
                    <?php echo $product_rows['productDescription'];?>
                </td>
            </Tr>
            <Tr>
                <td>
                    Seller
                </td>
                <td class="product-detail" align="right">
                    <a href="seller.php?id=<?php echo $product_rows['userID'];?>"><?php echo $seller_rows['userUsername'];?></a>
                </td>
            </Tr>
            <Tr>
                <td>
                    Listed on
                </td>
                <td class="product-detail" align="right">
                    <?php echo $product_rows['productListedDate'];?>
                </td>
            </Tr>
        </table>
        <table align="center" cellspacing="20px">
            <tr>
                <td>
					<!-- if user not yet logged in -->
					<?php if($login == 0){ ?>
						<?php if($product_rows['quantity']<=0){ ?>
							<form method="GET">
							<input type="hidden" name="id" value="<?php echo $product_rows['productID']; ?>"/>
							<input type="submit" name="addcart" value="OUT OF STOCK" class="product-button" disabled/>
						</form>
						<?php }else{ ?>
						<a echo onclick="showLogin()" class="product-button">ADD TO CART</a>
						<?php } ?>
					<?php }elseif($product_rows['quantity']<=0){ ?>
						<form method="GET">
							<input type="hidden" name="id" value="<?php echo $product_rows['productID']; ?>"/>
							<input type="submit" name="addcart" value="OUT OF STOCK" class="product-button" disabled/>
						</form>
					<?php }elseif($product_rows['productStatus']==0){ ?>
						<form method="GET">
							<input type="hidden" name="id" value="<?php echo $product_rows['productID']; ?>"/>
							<input type="submit" name="addcart" value="NOT AVAILABLE" class="product-button" disabled/>
						</form>
					<!-- if user logged in -->
					<?php }else{ ?>
						<form method="GET">
							<input type="hidden" name="id" value="<?php echo $product_rows['productID']; ?>"/>
							<input type="submit" name="addcart" value="ADD TO CART" class="product-button"/>
						</form>
					<?php } ?>
                </td>
                <td>
				<!-- if user not yet logged in -->
				<?php if($login == 0){ ?>
					<?php if($product_rows['quantity']<=0){}else{ ?>
						<a echo onclick="showLogin()" class="product-button">BUY NOW</a>
					<?php } ?>
					<?php }elseif($product_rows['quantity']<=0){ ?>
					<?php }elseif($product_rows['productStatus']==0){ ?>
				<!-- if user logged in -->
					<?php }else{ ?>
						<form method="GET">
							<input type="hidden" name="id" value="<?php echo $product_rows['productID']; ?>"/>
							<input type="submit" name="buynow" value="BUY NOW" class="product-button"/>
						</form>
					<?php } ?>
                </td>
            </tr>
        </table>
<!-- More from seller -->
        <table align="center">
            <tr>
                <td>    
                    <h2 class="morefrom-title"><a href="seller.php?id=<?php echo $product_rows['userID'];?>">More from <?php echo $seller_rows['userUsername'];?></a></h2>
                </td>
            </tr>  
        </table>
        <table align="center" cellspacing="10vw" style="background-color:white;">
			<?php 
			$product_sql = "select * from product where userID = '".$product_rows['userID']."' and productID<> '".$product_id."' and productStatus = 1 order by sale desc limit 4; ";
			$product_result = mysqli_query($conn,$product_sql);
			$product_column = 0;
			$product_row = 1; 
			if(mysqli_num_rows($product_result)<=0){?>
                <table align="center">
					<tr>
						<td>
							<h2 class="product-detail">- No more products found from this seller -</h2>
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
<!-- More from category -->
<?php
$product_sql="select * from product inner join user on product.userID = user.userID where productID ='".$product_id."' and user.isActive = 2";
$product_result =mysqli_query($conn,$product_sql);
$product_rows=mysqli_fetch_array($product_result);
?>
        <table align="center">
            <tr>
                <td>    
                    <h2 class="morefrom-title"><a href="result.php?search-key=<?php echo $product_rows['productCategory'];?>&target=product">More from <?php 
					if($product_rows['productCategory']=="fashion"){echo "Fashion";}
					elseif($product_rows['productCategory']=="electronicDevices"){echo "Electronic Devices";}
					elseif($product_rows['productCategory']=="healthAndBeauty"){echo "Health & Beauty";}
					elseif($product_rows['productCategory']=="homeAppliance"){echo "Home Appliance";}
					elseif($product_rows['productCategory']=="sports"){echo "Sports";}
					elseif($product_rows['productCategory']=="homeAndLifestyle"){echo "Home & Lifestyle";}
					?></a></h2>
                </td>
            </tr>  
        </table>
        <table align="center" cellspacing="10vw" style="background-color:white;">
			<?php 
			$product_category_sql = "select * from product inner join user on product.userID = user.userID where productCategory = '".$product_rows['productCategory']."' and productID!= '".$product_id."' and productStatus = 1 and product.userID != ".$product_rows['userID']." and user.isActive = 2 order by sale desc limit 4";
			$product_category_result = mysqli_query($conn,$product_category_sql);
			$product_category_column = 0;
			$product_category_row = 1; 
			if(mysqli_num_rows($product_category_result)<=0){?>
                <table align="center">
					<tr>
						<td>
							<h2 class="product-detail">- No more products found from this category -</h2>
						</td>
					</tr>
				</table>
			<?php }
			else{    
                while ($product_category_rows= mysqli_fetch_array($product_category_result)){
					if($product_category_column == $product_category_row - 1){
						echo "<tr><!--PRODUCT ROW ".$product_category_row."-->";
						
					}
			?> 

			
			<td>
				<a href="product.php?id=<?php echo $product_category_rows['productID'];?>" style="text-decoration:none; ">
					<table class="productbox" cellpadding="0" cellspacing="0"><!--PRODUCT PRODUCT 1-->
                        
                        <tr>
							<td class="productbox-image" style="background-image:url('images/product box/detail.png'),url('images/product box/<?php echo $product_category_rows['productImageURL'];?>')">
							</td>
						</tr>
						<tr>
							<td class="productname">
								<p><?php echo $product_category_rows['productName'];?></p>
							</td>
						</tr>
						<?php if($product_category_rows['sale']==1){?>
						<tr>
							<td class="productsale">
								<p>SALE <?php echo $product_category_rows['salePercentage']."%"?></p>
							</td>
						</tr>						
						<tr>
							<td class="productprice">
								<p><strike>RM<?php echo $product_category_rows['price']?></strike><?php echo " RM".$product_category_rows['price']*((100-$product_rows['salePercentage'])/100);?></p>
							</td>
						</tr>
						<?php }else{ ?>
						<tr>
							<td class="productprice">
								<p>RM<?php echo $product_category_rows['price'];?></p>
							</td>
						</tr>
						<?php } ?>	
					</table>
				</a>
			</td>
			<?php
				$product_category_column += 0.25; 
				if($product_category_column == $product_category_row){
					echo"</tr>";
					$product_category_row += 1;
				}
			}
			} ?>		
		</table>
	</div>
</div>
<?php }else{
	echo "<script>window.location.href='http://localhost/Assignment/result.php?search-key=&target=';</script>";
} ?>
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
