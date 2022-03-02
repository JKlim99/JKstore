<?php
include("connection.php");
$orderid = $_POST['orderid'];
$productid =  $_POST['productid'];
$shippingstatus = $_POST['shipping-status'];

$update_shippingstatus_sql = "update ordertable_product set shippingStatus = $shippingstatus where orderID = $orderid and productID = $productid";
mysqli_query($conn,$update_shippingstatus_sql);
if(mysqli_affected_rows($conn)>0){
    echo "<script>alert('Shipping status has been updated successfully.');</script>";
    echo "<script>window.location.href='http://localhost/Assignment/seller_page_manage_order.php';</script>";
}else{
    echo "<script>alert('Shipping status has failed to update.');</script>";
}
?>