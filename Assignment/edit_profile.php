<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/headAndFooter.css"/><!--CSS link-->
    <link rel="stylesheet" type="text/css" href="css/profile.css"/>
	<link rel="icon" href="images/logo/jkstore_logo.png"/><!-- Logo on tab -->
	<link href="https://fonts.googleapis.com/css?family=Anton|Roboto&display=swap" rel="stylesheet"/><!--Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"><!--Fonts-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--Search button font-->

	<title>JKstore - Edit profile</title>
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
<!-- Check password algorithm -->
<?php
/* if the proceed button not yet clicked, the password set to 0. If it is set to 1 the edit form will showed up */
if(!isset($_POST['proceedsubmit'])){
    $password = 0;
    $error ="";
}else{
    $checkpassword_sql="select * from user where userID=".$login_id." and userPassword='".md5($_POST['check-password'])."'";
    $checkpassword_result = mysqli_query($conn,$checkpassword_sql);
    $checkpassword_rows = mysqli_fetch_array($checkpassword_result);
    if(mysqli_num_rows($checkpassword_result)==1){
        $password = 1;

    }else{
        $error = "Wrong password! Try again.";
    }
}
include("common/algorithms/updateprofile.php");
?>
<div id="aboutus" style="background:url('images/bg/index-bg-2.jpg') no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;padding:50px 0% 0% 0%;z-index:997;position:relative;box-shadow:black 1px 0 10px;">
	<h1 align="center" style="color:white;text-shadow: black 1px 0px 10px;">
		Profile
	</h1>
	<div style="color:black;background-color: white;padding:5%;">
        <table align="center" cellpadding="5px" style="padding:20px;">
            <tr>
                <td class="profile-link-selected">
                    <a href="edit_profile.php   " class="profile-link">Edit Profile</a>
                </td>
                <td>
                    <a href="track_order.php" class="profile-link">Track Order</a>
                </td>
            </tr>
        </table>
        <?php if($password == 0){ ?>
        <form method="POST">
            <h2 align="center">Please enter your current password to proceed.</h2>
            <p align="center" style="color:red;"><?php echo $error;?></p>
            <table align="center">
                <tr>
                    <td>
                        <input style="font-size:20px;" type="password" name="check-password" placeholder="Current password" minlength="8" maxlength="15" required/>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding:10px;">
                        <input class="profile-button" name="proceedsubmit" type="submit" value="Proceed"/>
                    </td>
                </tr>
            </table>
        </form>
        <?php }else{ ?>
        <form method="POST">
            <table align="center">
                <tr>
                    <td>
                        <input style="font-size:20px;" type="email" name="profile-email" placeholder="Email" value="<?php echo $login_email ?>" maxlength="345" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-username" placeholder="Username (Display only)" value="<?php echo $login_username ?>" maxlength="50" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-password" placeholder="Password(min 8 characters)" minlength="8" maxlength="15"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-street" placeholder="Street" value="<?php echo $checkpassword_rows['userStreet'] ?>" maxlength="50" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-city" placeholder="City" value="<?php echo $checkpassword_rows['userCity'] ?>" maxlength="50" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input style="font-size:20px;" type="number" name="profile-postal" placeholder="Postal Code" min="0" value="<?php echo $checkpassword_rows['userPostalCode'] ?>" maxlength="5" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-state" placeholder="State" value="<?php echo $checkpassword_rows['userState'] ?>" maxlength="50" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-country" placeholder="Country" value="<?php echo $checkpassword_rows['userCountry'] ?>" maxlength="50" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-phone" placeholder="Phone Number (601112345678)" value="<?php echo $checkpassword_rows['userPhoneNumber'] ?>" minlength="11" maxlength="12" required/>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding:10px;">
                        <input class="profile-button" name="updatesubmit" type="submit" value="Update"/>
                    </td>
                </tr>
            </table>
        </form>
        <?php } ?>
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
