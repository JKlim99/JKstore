<?php 
session_start();
if(isset($_SESSION['login'])){
	$login = $_SESSION['login'];
	$login_id = $_SESSION['login_ID'];
	$login_username=$_SESSION['login_username'];
	$login_email = $_SESSION['login_email'];
	$login_usertype = $_SESSION['usertype'];
	$isActive_sql = "select * from user where userID = $login_id";
	$isActive_result = mysqli_query($conn,$isActive_sql);
	$isActive_rows = mysqli_fetch_array($isActive_result);
	$isActive = $isActive_rows['isActive'];
	include("checkusertype.php");
}else{
	echo "<script>window.location.href='http://localhost/Assignment/index.php';</script>";
	
}?>