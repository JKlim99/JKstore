<!-- Check login status -->
<?php include("check_loginAlgorithm.php");?>
<?php
include("connection.php");
$remove_cart_sql = "delete from ordertable_product where orderID = (select orderID from ordertable where userID = ".$login_id." and orderStatus = 0) and productID = ".$_GET['id'];
mysqli_query($conn,$remove_cart_sql);
echo "<script>window.history.back();</script>";
?>