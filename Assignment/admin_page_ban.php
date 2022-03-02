<?php
/* Connection */
include("common/connection.php");
/* check login status and usertype */
include("admin_page/check_loginAlgorithm.php");
?>
<?php
/* if admin change seller status */
if(isset($_POST['user-status'])){
	$userid=$_POST['userid'];
	$userstatus = $_POST['user-status'];
	$update_userstatus_sql="update user set isActive = $userstatus where userID = $userid";
	mysqli_query($conn,$update_userstatus_sql);
}
/* if admin change product status */
if(isset($_POST['product-status'])){
	$productid=$_POST['productid'];
	$productstatus = $_POST['product-status'];
	$update_productstatus_sql="update product set productStatus = $productstatus where productID = $productid";
	mysqli_query($conn,$update_productstatus_sql);
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

	<title>JKstore - Ban (ADMIN)</title>
</head>
<body>
	<a href="seller_page_index.php"><img class="home-logo" src="images/logo/jkstore_logo.png"/></a>
	<div style="background: white;">
		<h1 class="header">Welcome back! <?php echo $login_username;?></h1>
	</div>
	<div style="background:url('images/bg/sellerpage-bg-1.jpg') fixed;background-size: cover;padding:20px">
		<?php if(!isset($_GET['sellers'])&&!isset($_GET['products'])){ ?>
		<a href="admin_page_index.php" class="profile-button">BACK</a>
		<div style="height:7.7vw;"></div>
		<table align="center" cellspacing="20px" style="padding:2% 3% 2% 3%" class="table">
			<tr>
				<td align="center">
					<h1>Ban</h1>
				</td>
			</tr>
			<tr>
				<td align="center">
					<form method="GET">
						<input class="profile-button" style="width:120px;" type="submit" name="sellers" value="Sellers"/>
					</form>
				</td>
			</tr>
			<tr>
				<td align="center">
					<form method="GET">
						<input class="profile-button" style="width:120px;" type="submit" name="products" value="Products"/>
					</form>
				</td>
			</tr>
		</table>
		<div style="height:7.7vw;"></div>
		<!-- after admin click seller show: -->
		<?php }elseif (isset($_GET['sellers'])){ ?>
			
		<a href="admin_page_ban.php" class="profile-button">BACK</a>
		<table align="center" cellspacing="20px" style="padding:2% 3% 2% 3%;width:30vw" class="table">
			<tr>
				<td align="center" colspan="2">
					<form method="POST">
						<input type="text" name="seller-name" placeholder="Search"/>
						<button type="submit" name="seller-search" style="background-color: white;color:black;border:black solid 1px;"><i class="fa fa-search"></i></button>
					</form>
				</td>
			</tr>
			<?php /* display all sellers */
			if(!isset($_POST['seller-search'])){
				$getseller_sql = "select * from user where userType = 2";
				$getseller_result = mysqli_query($conn,$getseller_sql);
			}/* seller search */
			if(isset($_POST['seller-search'])){
				$getseller_sql = "select * from user where userType = 2 and userUsername like '%".$_POST['seller-name']."%'";
				$getseller_result = mysqli_query($conn,$getseller_sql);
			}
			while($getseller_rows = mysqli_fetch_array($getseller_result)){	
			?>
			<tr>
				<td style="font-family: 'Montserrat', sans-serif;">
					<?php echo $getseller_rows['userUsername'];?>
				</td>
				<td align="right">
					<form method="POST" id="userstatus<?php echo $getseller_rows['userID'];?>">
						<select name="user-status" onchange="userstatusupdate(<?php echo $getseller_rows['userID'];?>)">
							<option value="2" <?php if($getseller_rows['isActive']==2){echo "selected";}?> >Active</option>
							<option value="0" <?php if($getseller_rows['isActive']==0){echo "selected";}?> >Ban</option>
						</select>
						<input type="hidden" name="userid" value="<?php echo $getseller_rows['userID'];?>"/>
					</form>
				</td>
			</tr>
			<tr><td colspan="2"><hr/></td></tr>
			<?php } ?>
		</table>
		<!-- after admin click product -->
		<?php }elseif (isset($_GET['products'])){ ?>
		<a href="admin_page_ban.php" class="profile-button">BACK</a>
		<table align="center" cellspacing="20px" style="padding:2% 3% 2% 3%;width:30vw" class="table">
			<tr>
				<td align="center" colspan="2">
					<form method="POST">
						<input type="text" name="product-name" placeholder="Search"/>
						<button type="submit" name="product-search" style="background-color: white;color:black;border:black solid 1px;"><i class="fa fa-search"></i></button>
					</form>
				</td>
			</tr>
			<?php /* display all product */
			if(!isset($_POST['product-search'])){
				$getproduct_sql = "select * from product";
				$getproduct_result = mysqli_query($conn,$getproduct_sql);
			}/* product search */
			if(isset($_POST['product-search'])){
				$getproduct_sql = "select * from product where productName like '%".$_POST['product-name']."%'";
				$getproduct_result = mysqli_query($conn,$getproduct_sql);
			}
			while($getproduct_rows = mysqli_fetch_array($getproduct_result)){	
			?>
			<tr>
				<td style="font-family: 'Montserrat', sans-serif;">
					<?php echo $getproduct_rows['productName'];?>
				</td>
				<td align="right">
					<form method="POST" id="productstatus<?php echo $getproduct_rows['productID'];?>">
						<select name="product-status" onchange="productstatusupdate(<?php echo $getproduct_rows['productID'];?>)">
							<option value="1" <?php if($getproduct_rows['productStatus']==1){echo "selected";}?> >Active</option>
							<option value="0" <?php if($getproduct_rows['productStatus']==0){echo "selected";}?> >Ban</option>
						</select>
						<input type="hidden" name="productid" value="<?php echo $getproduct_rows['productID'];?>"/>
					</form>
				</td>
			</tr>
			<tr><td colspan="2"><hr/></td></tr>
			<?php } ?>
		</table>
		<?php } ?>
	</div>
	<script type="text/javascript" src="js/submit.js"></script>
</body>
</html>