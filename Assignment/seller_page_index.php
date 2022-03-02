<?php
/* Connection */
include("common/connection.php");
/* check login status and usertype */
include("seller_page/check_loginAlgorithm.php");
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

	<title>JKstore - Home (SELLER)</title>
</head>
<body>
	<?php include("seller_page/notice.php");?>
	<a href="seller_page_index.php"><img class="home-logo" src="images/logo/jkstore_logo.png"/></a>
	<div style="background: white;">
		<h1 class="header">Welcome back! <?php echo $login_username;?></h1>
	</div>
	<div style="background:url('images/bg/sellerpage-bg-1.jpg');background-size: cover;padding:35px">
		<table align="center" cellspacing="19.3px" class="table">
			<tr align="center">
				<td>
					<a class="menu-button-link" <?php if($isActive == 1){echo "onclick='showNotice();'";}else{echo "href='seller_page_sell.php'";}?> >Sell on JKstore now!</a>
				</td>
			</tr>
			<tr align="center">
				<td>
					<a class="menu-button-link" href="seller_page_manage_product.php">Manage product</a>
				</td>
			</tr>
			<tr align="center">
				<td>
					<a class="menu-button-link" href="seller_page_manage_order.php">Manage order</a>
				</td>
			</tr>
			<tr align="center">
				<td>
					<a class="menu-button-link" href="seller_page_editprofile.php">Edit profile</a>
				</td>
			</tr>
			<tr align="center">
				<td>
					<a class="menu-button-link" href="common/algorithms/logoutAlgorithm.php">Logout</a>
				</td>
			</tr>
		</table>
	</div>
<script type="text/javascript" src="js/seller_page.js" ></script>
</body>
</html>