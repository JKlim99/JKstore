<?php
include("connection.php");
include("check_loginAlgorithm.php");
$insertrate_sql = "insert into rating (rate, userID, productID) values(".$_GET['rate'].",".$login_id.",".$_GET['id'].")";
mysqli_query($conn,$insertrate_sql);
$update_ratestatus_sql="update ordertable_product set rateStatus = 1 where orderID = ".$_GET['orderid']." and productID = ".$_GET['id'];
mysqli_query($conn,$update_ratestatus_sql);
echo "<script>window.history.back();</script>";
?>