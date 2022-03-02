<?php
/* Connection */
include("common/connection.php");
/* check login status and usertype */
include("seller_page/check_loginAlgorithm.php");
?>

<?php
if(isset($_POST['update-product'])){
	$product_name = $_POST['product-name'];
	$checkname_sql = "select * from product where productName ='$product_name'";
	$checkname_result = mysqli_query($conn,$checkname_sql);
	$getname_sql="select * from product where productID = ".$_GET['id'];
	$getname_result=mysqli_query($conn,$getname_sql);
	$getname_rows=mysqli_fetch_array($getname_result);
	
	if(mysqli_num_rows($checkname_result)<=0 || $getname_rows['productName'] == $product_name){
		$product_description = htmlspecialchars($_POST['product-description']);
		$product_category = $_POST['product-category'];
		$product_price = $_POST['product-price'];
		$product_quantity = $_POST['product-quantity'];
		$product_sale_percentage = $_POST['product-sale'];
		$product_status = $_POST['product-status'];
		echo "<script>console.log('".$product_description."');</script>";
		if($product_sale_percentage >0){
			$product_sale = 1;
		}else{
			$product_sale = 0;
		}
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
					$dir = "images/product box/".$_GET['id'].".".$extension;
		
					if (move_uploaded_file($tmp, $dir)) {
						$update_picture_sql="update product set productImageURL = '".$_GET['id'].".".$extension."' where productID = ".$_GET['id'];
						mysqli_query($conn,$update_picture_sql);
						echo "<script>alert('Image uploaded successfully.');</script>";
					}
				}
			}
		}
		$updateproduct_sql = "update product set productName = '$product_name',productDescription = '$product_description', quantity= $product_quantity, productCategory = '$product_category',price= $product_price, sale = $product_sale, salePercentage = $product_sale_percentage,productStatus = $product_status where productID = ".$_GET['id'];
		mysqli_query($conn,$updateproduct_sql);
		if (mysqli_affected_rows($conn)>0){
			echo "<script>alert('Successfully updated. The product has now up to date.');</script>";
			echo "<script>window.location.href='seller_page_manage_product.php?id=".$_GET['id']."';</script>";
		}else{
			echo "<script>alert('Update failed.');</script>";
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

	<title>JKstore - Manage products (SELLER)</title>
</head>
<body>
	<a href="seller_page_index.php"><img class="home-logo" src="images/logo/jkstore_logo.png"/></a>
	<div style="background: white;">
		<h1 class="header">Welcome back! <?php echo $login_username;?></h1>
	</div>
	<?php
	include("common/connection.php"); 
	$listproduct_sql="select * from product where userID = $login_id";
	$listprodcut_result= mysqli_query($conn,$listproduct_sql);
	
	?>
	<div style="background:url('images/bg/sellerpage-bg-1.jpg') fixed;background-size: cover;padding:35px">
		<?php if(!isset($_GET['id'])){ ?>
		<a href="seller_page_index.php" class="profile-button">BACK</a>
		<table align="center" cellspacing="20vw">
			<tr>
				<?php
				if(mysqli_num_rows($listprodcut_result)>0){ 
					$column = 0;
					$row = 1;
					while($listproduct_rows=mysqli_fetch_array($listprodcut_result)){
						if($row==$column){
							echo "<tr> <!--row $row-->";
						}
					?>
				<td>
					<a href="seller_page_manage_product?id=<?php echo $listproduct_rows['productID'];?>">
						<table align="center" cellspacing="5vw" cellpadding="5vw;" class="product">
							<tr>
								<td align="center" class="product-image-column">
									<img class="product-image" src="images/product box/<?php echo $listproduct_rows['productImageURL'];?>"/>
								</td>
							</tr>
							<tr>
								<td align="center" style="color:black;width:16vw;">
									<?php echo $listproduct_rows['productName'];?>
								</td>
							</tr>
							<tr>
								<td align="center" style="color:black;">
									<?php
									$rating_sql = "select cast(avg(rate) as decimal(2,1)) as rate from rating where productID = '".$listproduct_rows['productID']."'";
									$rating_result=mysqli_query($conn,$rating_sql);
									$rating_rows=mysqli_fetch_array($rating_result); 
									if($rating_rows['rate']!=null){
									echo $rating_rows['rate'];
									echo "<span style='color:gold;'class='fa fa-star checked'></span>";
									}?>
								</td>
							</tr>
						</table>
					</a>
				</td>
				<?php
						$column+=0.5;
						if($row==$column){
							echo "</tr>";
							$row+=1;
						} 
					}
				}else{
				 ?>
				 <td align="center">
					<h1 style="color:white;text-shadow:black 0 0 10px;font-family: 'Montserrat', sans-serif;">You are not selling any products yet!</h1>
				 </td>
				<?php } ?>
			</tr>
			
		</table>
		<?php 
		}else{ 
			$selectproduct_sql="select * from product where productID = ".$_GET['id']." and userID= $login_id";
			$selectproduct_result = mysqli_query($conn,$selectproduct_sql);
			$selectproduct_rows = mysqli_fetch_array($selectproduct_result);
			if(mysqli_num_rows($selectproduct_result)==1){	
		?>
			<a href="seller_page_manage_product.php" class="profile-button">BACK</a>
			<form method="POST" enctype="multipart/form-data">
			<table align="center" style="padding:5%" class="table">
				<tr>
					<td align="center">
						<h1>Edit product</h1>
					</td>
				</tr>
				<tr>
					<td>
						Name<br/>
						<input style="font-size:20px;" type="text" name="product-name" placeholder="Product name" value="<?php echo $selectproduct_rows['productName'];?>" maxlength="255" required/>
					</td>
				</tr>
				<tr>
					<td>
						Description<br/>
						<textarea style="font-size:20px;width:253.2px;height:200px;padding:0px;margin:0px" type="text" name="product-description" placeholder="Product description" minlength="10" maxlength="500" required><?php echo $selectproduct_rows['productDescription'];?></textarea>
					</td>
				</tr>
				<tr>
					<td>
						Category<br/>
						<select name="product-category" style="font-size: 20px;width:255px;" required>
							<option value="">-Select Category-</option>
							<option value="fashion" <?php if($selectproduct_rows['productCategory'] =="fashion"){echo "selected";}?> >Fashion</option>
							<option value="electronicDevices" <?php if($selectproduct_rows['productCategory'] =="electronicDevices"){echo "selected";}?> >Electronic Devices</option>
							<option value="healthAndBeauty" <?php if($selectproduct_rows['productCategory'] =="healthAndBeauty"){echo "selected";}?> >Health & Beauty</option>
							<option value="homeAppliance" <?php if($selectproduct_rows['productCategory'] =="homeAppliance"){echo "selected";}?> >Home Appliance</option>
							<option value="sports" <?php if($selectproduct_rows['productCategory'] =="sports"){echo "selected";}?>>Sports</option>
							<option value="homeAndLifestyle" <?php if($selectproduct_rows['productCategory'] =="homeAndLifestyle"){echo "selected";}?> >Home & Lifestyle</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Price<br/>
						<input style="font-size:20px;" type="number" name="product-price" placeholder="Product price" min="1" value="<?php echo $selectproduct_rows['price'];?>" maxlength="10" required/>
					</td>
				</tr>
				<tr>
					<td>
						Quantity<br/>
						<input style="font-size:20px;" type="number" name="product-quantity" placeholder="Product Quantity" min="0" value="<?php echo $selectproduct_rows['quantity'];?>" maxlength="11" required/>
					</td>
				</tr>
				<tr>
					<td align="center">
						- Product Image -
					</td>
				</tr>
				<tr>
					<td>
						<input style="font-size:20px;width:255px;" type="file" name="product-image"/>
					</td>
				</tr>
				<tr>
					<td>
						Sale<br/>
						<select name="product-sale" style="font-size: 20px;width:255px;" required>
							<option value="">-Sale-</option>
							<option value="0" <?php if($selectproduct_rows['salePercentage']==0){echo "selected";}?> >No sale</option>
							<?php for($i=5;$i<100;$i+=5){?>
							<option value="<?php echo $i;?>" <?php if($i== $selectproduct_rows['salePercentage']){echo "selected";}?>><?php echo $i;?>%</option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Availability<br/>
						<select name="product-status" style="font-size: 20px;width:255px;" required>
							<option value="">-Product availability-</option>
							<option value="1" <?php if($selectproduct_rows['productStatus'] == 1){echo "selected";}?> >Published</option>
							<option value="0" <?php if($selectproduct_rows['productStatus'] == 0){echo "selected";}?> >Unpublished</option>
						</select>
				<tr>
					<td align="center" style="padding:15px 0 0 0;">
						<input class="profile-button" type="submit" name="update-product" value="Update"/>
					</td>
				</tr>
			</table>
		</form>
		<?php }} ?>
	</div>
</body>
</html>