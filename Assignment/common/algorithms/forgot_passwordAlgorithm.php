<?php
include("connection.php");
if(isset($_POST['forgotsubmit'])){
	/* Check whether the email exists or not */
	$forgot_email = $_POST['forgot-email'];
	$checkemail_sql = "select * from user where userEmail = '".$forgot_email."'";
	$checkemail_result = mysqli_query($conn,$checkemail_sql);
	if(mysqli_num_rows($checkemail_result)<=0){
		
		echo"<script>alert('The email has not been registered yet!')</script>";
		
	}else{
		/* Check whether user request password before or not */
		$check_requestpassword_sql= "select * from user where userEmail ='".$forgot_email."' and request_password = 1";
		$check_requestpassword_result = mysqli_query($conn,$check_requestpassword_sql);
		if(mysqli_num_rows($check_requestpassword_result)<=0){
			/* Generate temporary password */
			function temp_password(){
				$string = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
				$stringlength=strlen($string);
				$temp_password = "";
				for ($i = 0; $i <10; $i++){
					$temp_password .=$string[rand(0,$stringlength-1)];
				}
				return $temp_password;
			}
			$password= temp_password();
			$requestpassword_sql="update user set request_password = 1, temp_password = '$password' where userEmail ='".$forgot_email."'";
			mysqli_query($conn,$requestpassword_sql);
			echo"<script>alert('Requesting for the forgotten password submitted successfully. Kindly wait for the email.')</script>";
		}else{
			echo"<script>alert('Your request for forgotten password is still on pending')</script>";
		}
    }
}
?>