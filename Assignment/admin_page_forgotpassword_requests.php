<?php
/* Connection */
include("common/connection.php");
/* check login status and usertype */
include("admin_page/check_loginAlgorithm.php");
?>

<?php 
$getemail_sql="select * from user where request_password = 1";
$getemail_result = mysqli_query($conn,$getemail_sql);
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

	<title>JKstore - Forgot password requests (ADMIN)</title>
</head>
<body>
	<a href="seller_page_index.php"><img class="home-logo" src="images/logo/jkstore_logo.png"/></a>
	<div style="background: white;">
		<h1 class="header">Welcome back! <?php echo $login_username;?></h1>
	</div>
	<div style="background:url('images/bg/sellerpage-bg-1.jpg') fixed;background-size: cover;padding:20px">
		<a href="admin_page_index.php" class="profile-button">BACK</a>
		<table align="center" cellspacing="20px" class="table">
			<tr>
				<td>
					<h1>Forgot password requests</h1>
				</td>
			</tr>
			<?php if(mysqli_num_rows($getemail_result)>0){?>
			<?php while($getemail_rows=mysqli_fetch_array($getemail_result)){ ?>
			<tr>
				<td style="font-size:2vh;font-family: 'Montserrat', sans-serif;">
					<?php echo $getemail_rows['userEmail'];?>
				</td>
				<td>
					<?php $emailid=$getemail_rows['userID']."%26temp=".$getemail_rows['temp_password']; ?>
					<a href="mailto:<?php echo $getemail_rows['userEmail'];?>?Subject=JKstore | Reset Your Password&body=RESET password: <?php echo "http://localhost/Assignment/common/algorithms/resetpassword.php?id=".$emailid;?>"
					class="profile-button">Send</a>
				</td>
			</tr>
			<?php }}else{ ?>
			<tr>
				<td style="font-size:20px;font-family: 'Montserrat', sans-serif;">
					There is no one requested for resetting password currently.
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
<script type="text/javascript" src="js/seller_page.js" ></script>
</body>
</html>