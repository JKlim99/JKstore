<?php
/* Connection */
include("common/connection.php");
/* check login status and usertype */
include("seller_page/check_loginAlgorithm.php");
?>

<?php
/* select orders where buyers bought their products */
$getorder_sql="select ordertable_product.orderID,ordertable.orderDate,ordertable_product.quantity,ordertable_product.price,ordertable_product.shippingStatus,ordertable_product.rateStatus,product.productID,product.productName,product.productImageURL,user.userUsername, user.userEmail,user.userPhoneNumber,user.userStreet,user.userCity,user.userPostalCode,user.userState,user.userCountry from ordertable inner join ordertable_product on ordertable.orderID = ordertable_product.orderID inner join product on ordertable_product.productID = product.productID inner join user on ordertable.userID=user.userID where product.userID= $login_id and orderStatus = 1 order by ordertable.orderDate asc";
$getorder_result=mysqli_query($conn,$getorder_sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/seller_page.css"/><!--CSS link-->
	<link rel="icon" href="images/logo/jkstore_logo.png"/><!-- Logo on tab -->
	<link href="https://fonts.googleapis.com/css?family=Anton|Roboto&display=swap" rel="stylesheet"/><!--Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"><!--Fonts-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--Search button font-->

	<title>JKstore - Manage orders (SELLER)</title>
</head>
<body>
	<a href="seller_page_index.php"><img class="home-logo" src="images/logo/jkstore_logo.png"/></a>
	<div style="background: white;">
		<h1 class="header">Welcome back! <?php echo $login_username;?></h1>
	</div>
	<div style="background:url('images/bg/sellerpage-bg-1.jpg') fixed;background-size: cover;padding:3%">
		<a href="seller_page_index.php" class="profile-button">BACK</a>
		<table align="center">
			<?php if(mysqli_num_rows($getorder_result)>0){?>
			<?php while($getorder_rows = mysqli_fetch_array($getorder_result)){?>
			<tr>
				<td>
					<table style="font-family: 'Montserrat', sans-serif;padding:5vw;margin:2vw;" class="table">
						<tr>
							<td colspan="4">
								<b>Order #<?php echo $getorder_rows['orderID'];?></b>
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<?php echo $getorder_rows['orderDate'];?>
							</td>
						</tr>
						<tr>
							<td rowspan="2" colspan="2" style="width:10vw;height:10vw">
								<img class="product-image" src="images/product box/<?php echo $getorder_rows['productImageURL'];?>" alt="product image"/>
							</td>
							<td style="width:18vw;">
								<?php echo $getorder_rows['productName'];?>
							</td>
							<td>
								<b>x<?php echo $getorder_rows['quantity'];?></b>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								Total paid: <b>RM <?php echo $getorder_rows['price'];?></b>
							</td>
						</tr>
						<tr>
							<td colspan="4">
								Sold To:
							</td>
						</tr>
						<tr>
							<td colspan="1">
								Name:
							</td>
							<td colspan="3">
								<b><?php echo $getorder_rows['userUsername'];?></b>
							</td>
						</tr>
						<tr>
							<td colspan="1">
								Email:
							</td>
							<td colspan="3">
								<b><a href="mailto:<?php echo $getorder_rows['userEmail'];?>" class="product-link"><?php echo $getorder_rows['userEmail'];?></a></b>
							</td>
						</tr>
						<tr>
							<td colspan="1">
								Phone:
							</td>
							<td colspan="3">
								<b><a href="tel:+<?php echo $getorder_rows['userPhoneNumber'];?>" class="product-link">+<?php echo $getorder_rows['userPhoneNumber'];?></a></b>
							</td>
						</tr>
						<tr>
							<td colspan="1" style="vertical-align:top;">
								Address:
							</td>
							<td colspan="3">
								<b><?php echo $getorder_rows['userStreet'].", ".$getorder_rows['userCity'].", <br/>".$getorder_rows['userPostalCode']." ".$getorder_rows['userState'].", ".$getorder_rows['userCountry'].".";?></b>
							</td>
						</tr>
						<tr>
							<td align="center" style="padding:30px 0 0 0;" colspan="4">
								<form method="POST" action="seller_page/shipping_status_update.php" id="order<?php echo $getorder_rows['orderID'];?>-<?php echo $getorder_rows['productID'];?>">
									<select name="shipping-status" style="font-size:20px;background: white;" onchange="shippingStatusUpdate(<?php echo $getorder_rows['orderID'];?>,<?php echo $getorder_rows['productID'];?>);">
										<option value="">-Shipping status-</option>
										<option value="0" <?php if($getorder_rows['shippingStatus']==0){echo "selected";}?> >Processing</option>
										<option value="1" <?php if($getorder_rows['shippingStatus']==1){echo "selected";}?> >Preparation for delivery</option>
										<option value="2" <?php if($getorder_rows['shippingStatus']==2){echo "selected";}?> >Out for delivery</option>
										<option value="3" <?php if($getorder_rows['shippingStatus']==3){echo "selected";}?> >Delivered</option>
									</select>
									<input type="hidden" name="orderid" value="<?php echo $getorder_rows['orderID'];?>"/>
									<input type="hidden" name="productid" value="<?php echo $getorder_rows['productID'];?>"/>
									
								</form>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<?php }}else{ ?>
			<tr>
				<td align="center">
					<h1 style="color:white;text-shadow:black 0 0 10px;font-family: 'Montserrat', sans-serif;">Opps. There is no one buying your products yet.</h1>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
<script type="text/javascript" src="js/seller_page.js" ></script>
</body>
</html>