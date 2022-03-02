<?php 
session_start();
if(isset($_SESSION['login'])){
	$login = $_SESSION['login'];
	$login_id = $_SESSION['login_ID'];
	$login_username=$_SESSION['login_username'];
	$login_email = $_SESSION['login_email'];
	$login_usertype = $_SESSION['usertype'];
	if($login_usertype == 2){
		echo "<script>window.location.href='seller_page_index.php';</script>";
	}elseif($login_usertype == 0){
		echo "<script>window.location.href='admin_page_index.php';</script>";
	}
}else{
	$login=0;
	
}?>