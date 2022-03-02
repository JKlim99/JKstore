<?php
/* Connection */
include("common/connection.php");

/* check login status and usertype */
include("admin_page/check_loginAlgorithm.php");

/* check usertype */
include("admin_page/checkusertype.php");
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

	<title>JKstore - Home (ADMIN)</title>
</head>
<body>
	<a href="seller_page_index.php"><img class="home-logo" src="images/logo/jkstore_logo.png"/></a>
	<div style="background: white;">
		<h1 class="header">Welcome back! <?php echo $login_username;?></h1>
	</div>
	<div style="background:url('images/bg/sellerpage-bg-1.jpg') fixed;background-size: cover;padding:20px">
		<table align="center" cellspacing="20px" style="padding:3% 4% 2.5% 4%" class="table">
			<tr align="center">
				<td>
					<a class="menu-button-link" href='admin_page_ban.php' >Ban</a>
				</td>
			</tr>
			<tr align="center">
				<td>
					<a class="menu-button-link" href="admin_page_sitefeedbacks.php">Site feedbacks</a>
				</td>
			</tr>
			<tr align="center">
				<td>
					<a class="menu-button-link" href="admin_page_forgotpassword_requests.php">Forgot password requests</a>
				</td>
			</tr>
			<tr align="center">
				<td>
					<a class="menu-button-link" href="admin_page_editprofile.php">Edit profile</a>
				</td>
			</tr>
			<tr align="center">
				<td>
					<a class="menu-button-link" href="common/algorithms/logoutAlgorithm.php">Logout</a>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>