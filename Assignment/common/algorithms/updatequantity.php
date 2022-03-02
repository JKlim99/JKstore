<?php
    include("connection.php");
    include("check_loginAlgorithm.php");
    $getorderid_sql="select * from ordertable where userID = ".$login_id." and orderStatus = 0";
    $getorderid_result= mysqli_query($conn,$getorderid_sql);
    $getorderid_rows = mysqli_fetch_array($getorderid_result);
    $selectcart_sql = "select * from ordertable_product inner join ordertable on ordertable.orderID = ordertable_product.orderID where userID = ".$login_id." and orderStatus = 0 and productID = ".$_POST['id'];
    $selectcart_result = mysqli_query($conn,$selectcart_sql);
    $selectcart_rows = mysqli_fetch_array($selectcart_result);
    echo $_POST['product'.$selectcart_rows['productID']];
    echo $selectcart_rows['quantity'];
    echo $_POST['id'];
    if($selectcart_rows['quantity']!=$_POST['product'.$selectcart_rows['productID']]){
        
        $updatequantity_sql="update ordertable_product set quantity = ".$_POST['product'.$selectcart_rows['productID']]." where productID =". $selectcart_rows['productID']." and orderID = ".$getorderid_rows['orderID'];
        mysqli_query($conn,$updatequantity_sql);
        echo "<script>window.history.back();</script>";
    }
    

?>