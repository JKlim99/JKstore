<?php
/* Connection */
include("common/connection.php");
/* check login status and usertype */
include("seller_page/check_loginAlgorithm.php");
?>

<?php
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

?>

<?php 
if(isset($_FILES['profile-picture'])){ 
    if($_FILES['profile-picture']['error']>0){

    }
    else{
        $allowed = array('image/jpeg','image/jpg','image/png');
        if (in_array($_FILES['profile-picture']['type'], $allowed)){
            $filename = $_FILES['profile-picture']['name'];
            $filename_split = explode(".", $filename);
            $extension = end($filename_split);
            $tmp = $_FILES['profile-picture']['tmp_name'];
            $dir = "images/userPicture/".$login_id.".".$extension;

            if (move_uploaded_file($tmp, $dir)) {
                
                $update_picture_sql="update user set userPicture = '".$login_id.".".$extension."' where userID = $login_id";
                mysqli_query($conn,$update_picture_sql);
                echo "<script>alert('Image uploaded successfully.');</script>";
            }
        }
    }
}
include("seller_page/seller_updateprofile.php");
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

	<title>JKstore - Edit profile (SELLER)</title>
</head>
<body>
	<a href="seller_page_index.php"><img class="home-logo" src="images/logo/jkstore_logo.png"/></a>
	<div style="background: white;">
		<h1 class="header">Welcome back! <?php echo $login_username;?></h1>
	</div>
	<div style="background:url('images/bg/sellerpage-bg-1.jpg');background-size: cover;padding:3%">
    <!-- comments same as edit_profile.php -->
	<?php if($password == 0){ ?>
        <a href="seller_page_index.php" class="profile-button">BACK</a>
        <form method="POST">
            <div style="height:8.4vw;"></div>
            <table align="center" cellspacing="5%" cellpadding="5%" class="table">
				<tr>
					<td>
						<h2 align="center">Please enter your current password to proceed.</h2>
						<p align="center" style="color:red;"><?php echo $error;?></p>
					</td>
				</tr>
				<tr>
                    <td align="center">
                        <input style="font-size:20px;" type="password" name="check-password" placeholder="Current password" minlength="8" maxlength="15" required/>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding:10px;">
                        <input class="profile-button" name="proceedsubmit" type="submit" value="Proceed"/>
                    </td>
                </tr>
            </table>
            <div style="height:8.4vw;"></div>
        </form>
        <?php }else{ ?>
        <a href="seller_page_editprofile.php" class="profile-button">BACK</a>
        <form method="post" enctype="multipart/form-data">
            <table align="center" class="table" >
                <tr>
                    <td style="width:252px;" align="center">
                        - Profile picture -
                        <input style="font-size:20px;width:100%;" type="file" name="profile-picture"/>
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <input style="font-size:20px;" type="email" name="profile-email" placeholder="Email" value="<?php echo $login_email ?>" maxlength="345"required/>
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-username" placeholder="Username (Display only)" value="<?php echo $login_username ?>" maxlength="50" required/>
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-password" placeholder="Password(min 8 characters)" minlength="8" maxlength="15"/>
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-street" placeholder="Street" value="<?php echo $checkpassword_rows['userStreet'] ?>" maxlength="50" required/>
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-city" placeholder="City" value="<?php echo $checkpassword_rows['userCity'] ?>" maxlength="50" required/>
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <input style="font-size:20px;" type="number" name="profile-postal" placeholder="Postal Code" min="0" value="<?php echo $checkpassword_rows['userPostalCode'] ?>" minlength="5" maxlength="5" required/>
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-state" placeholder="State" value="<?php echo $checkpassword_rows['userState'] ?>" maxlength="50" required/>
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-country" placeholder="Country" value="<?php echo $checkpassword_rows['userCountry'] ?>" maxlength="50" required/>
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-phone" placeholder="Phone Number (601112345678)" value="<?php echo $checkpassword_rows['userPhoneNumber'] ?>" minlength="11" maxlength="12" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea style="font-size:20px;width:250px;height:70px" type="text" name="profile-shortdescription" placeholder="Store short description" maxlength="50" col="5" required><?php echo $checkpassword_rows['sellerShortDescription'] ?></textarea>
                    </td>
                </tr>
                <tr >
                    <td>
                        <textarea style="font-size:20px;width:250px;height:150px;" type="text" name="profile-description" placeholder="Store description" maxlength="500" col="20" required><?php echo $checkpassword_rows['sellerDescription'] ?></textarea>
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <input style="font-size:20px;" type="text" name="profile-bank" placeholder="Bank name" value="<?php echo $checkpassword_rows['userBank'] ?>" maxlength="50" required/>
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <input style="font-size:20px;" type="number" name="profile-accountnumber" placeholder="Account Number" value="<?php echo $checkpassword_rows['userAccountNumber'] ?>" maxlength="50" required/>
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
</body>
</html>