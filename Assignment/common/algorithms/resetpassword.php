<?php
include("connection.php");
if(isset($_GET['id'])&&isset($_GET['temp'])){
    $userid = $_GET['id'];
    $temp_password = $_GET['temp'];

    $resetpassword_sql="update user set userPassword = '".md5(12345678)."', request_password = 0, temp_password='' where userID= $userid and temp_password = '".$temp_password."'";
    $resetpassword_result = mysqli_query($conn,$resetpassword_sql);
    if(mysqli_affected_rows($conn)>0){
        echo "<script>alert('Password reset successfully. Your password has now been reset to 12345678.');</script>";
        echo "<script>window.location.href='http://localhost/Assignment/index.php';</script>";
    }else{
        echo "<script>alert('Password reset failed.');</script>";
        echo "<script>window.location.href='http://localhost/Assignment/index.php';</script>";
    }
}else{
    echo "<script>window.location.href='http://localhost/Assignment/index.php';</script>";
}
?>