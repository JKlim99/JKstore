<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db = 'jkstore';

$conn = mysqli_connect($server,$username,$password,$db);

if(mysqli_connect_error()){
	die('Connection error');
}

?>
