<?php
	include("connection.php");
	if(isset($_POST['contactus-submit'])){
		
		$contactus_name = $_POST['contactus-name'];
		$contactus_email= $_POST['contactus-email'];
		$contactus_title = $_POST['contactus-title'];
		$contactus_message = $_POST['contactus-message'];
		$feedback_check_sql= "select * from site_feedback where name = '".$contactus_name."' and email = '".$contactus_email."' and title = '".$contactus_title."' and message = '".$contactus_message."'"; 
		$feedback_result=mysqli_query($conn,$feedback_check_sql);
		if(mysqli_num_rows($feedback_result)<=0){
			$contactus_sql="insert into site_feedback (name, email, title, message, replied) VALUES ('$contactus_name', '$contactus_email', '$contactus_title', '$contactus_message', '0');";
			mysqli_query($conn,$contactus_sql);
			if (mysqli_affected_rows($conn)>0){
				echo "<script>alert('submitted');</script>";
				
			}
		}
	}
?>