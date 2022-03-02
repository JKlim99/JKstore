<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/headAndFooter.css"/><!--CSS link-->

	<link href="https://fonts.googleapis.com/css?family=Anton|Roboto&display=swap" rel="stylesheet"/><!--Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"><!--Fonts-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--Search button font-->

	<title>JKstore - Checkout</title>
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
<!-- Check whether user logged in or not if not back to homepage -->
<?php
if($login==0){
	echo "<script>window.location.href='http://localhost/Assignment/index.php';</script>";
}
?>

<!--SELLER-->
<div id="seller" style="background:url('images/bg/index-bg-2.jpg') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;padding:50px 0% 0% 0%;position:relative;z-index:997;box-shadow:black 1px 0 10px;">
	<h1 align="center" style="text-shadow:black 0 0 10px;color:white;">
		Checkout
	</h1>
	<div style="background-color:white;padding-top:20px;">
		<form method="POST" action="common/algorithms/madepayment.php">
			<table id="checkout" align="center" cellspacing="10px">
				<tr>
					<td>
						Card Number
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input style="width:100%;" type="number" required/>
					</td>
				</tr>
				<tr>
					<td>
						Expiry Date
					</td>
					<td>
						Security Code
					</td>
				</tr>
				<tr>
					<td>
						<select required>
							<option>
								Year
							<option>
								2019
							</option>
							<option>
								2020
							</option>
							<option>
								2021
							</option>
							<option>
								2022
							</option>
							<option>
								2023
							</option>
							<option>
								2024
							</option>
							<option>
								2025
							</option>
						</select>
						<select required>
							<option>
								Month
							</option>
							<option>
								01
							</option>
							<option>
								02
							</option>
							<option>
								03
							</option>
							<option>
								04
							</option>
							<option>
								05
							</option>
							<option>
								06
							</option>
							<option>
								07
							</option>
							<option>
								08
							</option>
							<option>
								09
							</option>
							<option>
								10
							</option>
							<option>
								11
							</option>
							<option>
								12
							</option>
						</select>
					</td>
					<td>
						<input type="text" required/><img style="height:auto;width:40px;vertical-align:middle;" src="images/logo/security code.png" alt="security code icon"/>
					</td>
				</tr>
				<tr>
					<td>
						Name
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input style="width:100%;" type="text" required/>
					</td>
				</tr>
			</table>
			<table align="center">
				<tr>
					<td>
						<input class="checkout-submit" type="submit" name="submit" value="Pay Now"/>
					</td>
				</tr>
			</table>
		</form>
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
