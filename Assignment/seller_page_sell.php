<?php
/* Connection */
include("common/connection.php");
/* check login status and usertype */
include("seller_page/check_loginAlgorithm.php");
?>
<?php 
if(isset($_POST['sell-product'])){
	$product_name = $_POST['product-name'];
	$checkname_sql = "select * from product where productName ='$product_name'";
	$checkname_result = mysqli_query($conn,$checkname_sql);
	if(mysqli_num_rows($checkname_result)<=0){
		$product_description = $_POST['product-description'];
		$product_category = $_POST['product-category'];
		$product_price = $_POST['product-price'];
		$product_quantity = $_POST['product-quantity'];
		
		$insertproduct_sql = "insert into product (productName, productDescription, productCategory, price, quantity, productListedDate,userID) values('$product_name','$product_description','$product_category',$product_price,$product_quantity,'".date("Y-m-d")."',$login_id)";
		mysqli_query($conn,$insertproduct_sql);
		if (mysqli_affected_rows($conn)==1){
			$getproductid_sql = "select * from product where userID = $login_id order by productID desc limit 1";
			$getproductid_result=mysqli_query($conn,$getproductid_sql);
			$getproductid_rows = mysqli_fetch_array($getproductid_result);
			if(isset($_FILES['product-image'])){ 
				if($_FILES['product-image']['error']>0){
			
				}
				else{
					$allowed = array('image/jpeg','image/jpg','image/png');
					if (in_array($_FILES['product-image']['type'], $allowed)){
						$filename = $_FILES['product-image']['name'];
						$filename_split = explode(".", $filename);
						$extension = end($filename_split);
						$tmp = $_FILES['product-image']['tmp_name'];
						$dir = "images/product box/".$getproductid_rows['productID'].".".$extension;
			
						if (move_uploaded_file($tmp, $dir)) {
							$update_picture_sql="update product set productImageURL = '".$getproductid_rows['productID'].".".$extension."' where productID = ".$getproductid_rows['productID'];
							mysqli_query($conn,$update_picture_sql);
							echo "<script>alert('Successfully listed. The product has now on list.');</script>";
							echo "<script>window.location.href='seller_page_index.php';</script>";
						}
					}
				}
			}
		}
	}else{
		echo "<script>alert('The product name has been taken. Please try again.');</script>";
		echo "<script>window.history.back();</script>";
	}
}
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

	<title>JKstore - Sell (SELLER)</title>
</head>
<body>
	<a href="seller_page_index.php"><img class="home-logo" src="images/logo/jkstore_logo.png"/></a>
	<div style="background: white;">
		<h1 class="header">Welcome back! <?php echo $login_username;?></h1>
	</div>
	<div style="background:url('images/bg/sellerpage-bg-1.jpg');background-size: cover;padding:3%">
		<a href="seller_page_index.php" class="profile-button">BACK</a>
		<form method="POST" enctype="multipart/form-data">
			<table align="center" style="" class="table">
				<tr>
					<td align="center">
						<h1>Sell your product <br/>on JKstore</h1>
					</td>
				</tr>
				<tr>
					<td>
						<input style="font-size:20px;" type="text" name="product-name" placeholder="Product name" maxlength="255" required/>
					</td>
				</tr>
				<tr>
					<td>
						<textarea style="font-size:20px;width:253.2px;padding:0px;margin:0px" type="text" name="product-description" placeholder="Product description" minlength="10" maxlength="500" required></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<select name="product-category" style="font-size: 20px;width:255px;" required>
							<option value="">Select Category</option>
							<option value="fashion">Fashion</option>
							<option value="electronicDevices">Electronic Devices</option>
							<option value="healthAndBeauty">Health & Beauty</option>
							<option value="homeAppliance">Home Appliance</option>
							<option value="sports">Sports</option>
							<option value="homeAndLifestyle">Home & Lifestyle</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<input style="font-size:20px;" type="number" name="product-price" placeholder="Product price" min="1" maxlength="10" required/>
					</td>
				</tr>
				<tr>
					<td>
						<input style="font-size:20px;" type="number" name="product-quantity" placeholder="Product Quantity" min="0" maxlength="11" required/>
					</td>
				</tr>
				<tr>
					<td align="center">
						- Product Image -
					</td>
				</tr>
				<tr>
					<td>
						<input style="font-size:20px;width:255px;" type="file" name="product-image" required/>
					</td>
				</tr>
				<tr>
					<td align="center" style="padding:15px 0 0 0;">
						<input class="profile-button" type="submit" name="sell-product" value="Submit"/>
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>