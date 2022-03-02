<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/headAndFooter.css"/><!--CSS link-->
    <link rel="stylesheet" type="text/css" href="css/aboutus.css"/>
	<link rel="icon" href="images/logo/jkstore_logo.png"/><!-- Logo on tab -->
	<link href="https://fonts.googleapis.com/css?family=Anton|Roboto&display=swap" rel="stylesheet"/><!--Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"><!--Fonts-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--Search button font-->

	<title>JKstore - About Us</title>
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
<?php include("common/cart.php");?>
<!-- Header -->
<?php include("common/header.php");?>
<!-- Cart -->


<!--ABOUT US-->
<div id="aboutus" style="background:url('images/bg/index-bg-2.jpg') no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;z-index:997;position:relative;box-shadow:black 1px 0 10px;">
	<h1 align="center" style="color:white;margin:0px;padding:120px;text-shadow: black 1px 0px 10px;">
		
	</h1>
	<div style="color:black;background-color: white;padding:5%;"align="center">
        <h1 style="margin:0;font-size:55px;font-family: 'Montserrat', 'sans-serif';">
			ABOUT JKSTORE
        </h1>
        <br/>
        <p style="margin:0;font-family: 'Montserrat', 'sans-serif';margin-bottom:80px;">
			Our mission is providing a platform which helps people who<br/> wish to sell their products or buy items from other sellers.
        </p>
        <hr width="200px" size="5px" style="background-color: black;"/>
    </div>
    <div style="background:white">
        <table id="about" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <td>
                    <table align="center">
                        <tr>
                            <td align="center"><h1 style="font-family: 'Montserrat', 'sans-serif';border:black solid 3px">OUR VISION</h1></td>
                        </tr>
                        <tr>
                            <td width="500px" align="center" style="font-family: 'Montserrat', 'sans-serif'">
                                <p style="text-align:justify;">We aim to build the future infrastructure of commerce. We envision that our customers will meet, work and live at Alibaba, and that we will be a company that lasts at least 102 years.</p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td><img class="about-image" src="images/bg/about-bg-1.jpg"/></td>
            </tr>
            <tr>
                <td><img class="about-image" src="images/bg/about-bg-2.jpg"/></td>
                <td>
                    <table align="center">
                        <tr>
                            <td align="center"><h1 style="font-family: 'Montserrat', 'sans-serif';border:black solid 3px">WHAT WE DO</h1></td>
                        </tr>
                        <tr>
                            <td width="500px" align="center" style="font-family: 'Montserrat', 'sans-serif'">
                                <p style="text-align:justify;">We enable businesses to transform the way they market, sell and operate and improve their efficiencies. We provide the technology infrastructure and marketing reach to help merchants, brands and other businesses to leverage the power of new technology to engage with their users and customers and operate in a more efficient way.

                                        Our businesses are comprised of core commerce, cloud computing, digital media and entertainment, and innovation initiatives.</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                    <td>
                        <table align="center">
                            <tr>
                                <td align="center"><h1 style="font-family: 'Montserrat', 'sans-serif';border:black solid 3px">HISTORY</h1></td>
                            </tr>
                            <tr>
                                <td width="500px" align="center" style="font-family: 'Montserrat', 'sans-serif'">
                                    <p style="text-align:justify;">JKlim Group was founded in 2019 by Lim Jinq Kuen, a junior programmer who really likes programming even takes it as hobby. Apart from JKstore, JKgames was also part of the JKlim group what they do is designing and publishing games main focus on 2D pixel art games. </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td><img class="about-image" src="images/bg/about-bg-3.jpg"/></td>
                </tr>
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
