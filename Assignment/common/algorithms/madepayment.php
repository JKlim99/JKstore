<?php
include("connection.php");
include("check_loginAlgorithm.php");
if(isset($_POST['submit'])){
    $checkquantity_sql="select * from  product inner join ordertable_product on product.productID=ordertable_product.productID inner join ordertable on ordertable_product.orderID = ordertable.orderID where ordertable.userID = ".$login_id." and ordertable.orderStatus=0 and product.quantity >= ordertable_product.quantity";
    $checkquantity_result =mysqli_query($conn,$checkquantity_sql);
    $check_order_product_sql="select * from ordertable inner join ordertable_product on ordertable.orderID = ordertable_product.orderID where ordertable.userID = ".$login_id." and ordertable.orderStatus = 0";
    $check_order_product_result=mysqli_query($conn,$check_order_product_sql);
    /* if cart is empty */
    if(mysqli_num_rows($check_order_product_result)<=0){
        echo "<script>alert('The cart is empty!');</script>";
        echo "<script>window.location.href='http://localhost/Assignment/index.php'</script>";
    /* check all items in order whether they are sufficient or not */
    }elseif(mysqli_num_rows($checkquantity_result)==mysqli_num_rows($check_order_product_result)){
        $deductquantity_sql="update product inner join ordertable_product on product.productID=ordertable_product.productID inner join ordertable on ordertable_product.orderID = ordertable.orderID set product.quantity = product.quantity - ordertable_product.quantity where ordertable.userID = ".$login_id." and ordertable.orderStatus=0";
        mysqli_query($conn,$deductquantity_sql);
        date_default_timezone_set('asia/kuala_lumpur');
        $change_orderstatus_sql = "update ordertable set orderStatus = 1,orderDate = '".date("Y-m-d H:i:s")."' where userID = ".$login_id." and orderStatus = 0";
        mysqli_query($conn,$change_orderstatus_sql);
        while($check_order_product_rows=mysqli_fetch_array($check_order_product_result)){
            $checksale_sql="select sale from product where productID = ".$check_order_product_rows['productID']." and sale = 0";
            $checksale_result=mysqli_query($conn,$checksale_sql);
            if(mysqli_num_rows($checksale_result)==1){
                $cart_quantity_check ="select cast((quantity * (select price from product where productID = ".$check_order_product_rows['productID']."))as decimal(11,2)) as price from ordertable_product where productID= ".$check_order_product_rows['productID']." and orderID = ".$check_order_product_rows['orderID'];
                $price_result = mysqli_query($conn,$cart_quantity_check);
                $price_rows = mysqli_fetch_array($price_result);
            }else{
                $cart_quantity_check ="select cast((quantity * (select price*(100-salePercentage)/100 from product where productID = ".$check_order_product_rows['productID'].")) as decimal(10,2)) as price from ordertable_product where productID= ".$check_order_product_rows['productID']." and orderID = ".$check_order_product_rows['orderID'];
                $price_result = mysqli_query($conn,$cart_quantity_check);
                $price_rows = mysqli_fetch_array($price_result);
            }
            $insert_price ="update ordertable_product set price=".$price_rows['price']." where productID =".$check_order_product_rows['productID']." and orderID =".$check_order_product_rows['orderID'];
            $insert_price_result=mysqli_query($conn,$insert_price);
        }
        echo "<script>alert('Payment made successfully! Your order is now on processing.');</script>";
        echo "<script>window.location.href='http://localhost/Assignment/track_order.php'</script>";
    /* if one or more of them are not sufficient */
    }else{
        echo "<script>alert('Some of your items quantity are not sufficient in stock please check again');</script>";
        $updatequantity_sql="update product inner join ordertable_product on product.productID=ordertable_product.productID inner join ordertable on ordertable_product.orderID = ordertable.orderID set ordertable_product.quantity = 1 where ordertable.userID = ".$login_id." and ordertable.orderStatus=0 and product.quantity < ordertable_product.quantity";
        $updatequantity_result=mysqli_query($conn,$updatequantity_sql);
        echo "<script>window.location.href='http://localhost/Assignment/index.php'</script>";
    }
}