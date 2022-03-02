<?php
include("connection.php");
if(isset($_POST['registersubmit'])){
	$register_password = $_POST['register-password'];
	$register_retypepassword = $_POST['register-retypepassword'];
	if($register_password == $register_retypepassword){
		$register_email = $_POST['register-email'];
		$checkemail_sql = "select * from user where userEmail ='$register_email'";
		$checkemail_result = mysqli_query($conn,$checkemail_sql);
		if(mysqli_num_rows($checkemail_result)<=0){
			$register_username = $_POST['register-username'];
			$register_street =$_POST['register-street'];
			$register_city =$_POST['register-city'];
			$register_postal = $_POST['register-postal'];
			$register_state = $_POST['register-state'];
			$register_country = $_POST['register-country'];
			$register_phone = $_POST['register-phone'];
			$register_usertype = $_POST['usertype'];
			
			$register_sql= "insert into user (userEmail, userUsername, userPassword, userPhoneNumber, userType, userPicture, userStreet, userCity, userState, userCountry, userPostalCode, isActive,request_password) VALUES ('$register_email', '$register_username', '".md5($register_password)."', $register_phone, '$register_usertype', 'jkstore-profile-default.png', '$register_street', '$register_city', '$register_state', '$register_country', $register_postal,1,0);";
			mysqli_query($conn,$register_sql);
			if(mysqli_affected_rows($conn)<=0){
				echo"<script>alert('Register failed')</script>";
			}else{
				echo"<script type='text/javascript'>showRegisterSuccessful();</script>";
			}
		}else{
			echo"<script>alert('The email has been registered! Try another one.')</script>";
			}
	}else{
		echo"<script>alert('Both passwords are not matched.')</script>";
		echo"<script>window.history.back();</script>;";
	}
}
?>