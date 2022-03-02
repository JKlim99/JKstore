<?php
// CONNECTION
include("connection.php");
//LOGIN algorithm
if(isset($_POST['loginsubmit'])){
	
	if(!isset($_SESSION['login'])){
		$login_email = mysqli_real_escape_string($conn,$_POST['login-email']);
		$login_password = mysqli_real_escape_string($conn,$_POST['login-password']);
		$login_sql ="select * from user where userEmail = '".$login_email."' and userPassword = '".md5($login_password)."' and (isActive >0);";
		$login_result = mysqli_query($conn,$login_sql);
		if (mysqli_num_rows($login_result)==1){
			$login_rows = mysqli_fetch_array($login_result);
			$login=1;
			$_SESSION['login'] = $login;
			$_SESSION['login_ID'] = $login_rows['userID'];
			$_SESSION['login_username'] = $login_rows['userUsername'];
			$_SESSION['login_email'] = $login_rows['userEmail'];
			$_SESSION['usertype'] = $login_rows['userType'];
			
			echo "<script>window.location.reload(true);</script>";
		}
		else{
			echo "<script type='text/javascript'>showLoginFailed();</script>";
			
			
		}
	}
} 

?>
