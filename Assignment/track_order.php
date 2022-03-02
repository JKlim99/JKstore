<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/headAndFooter.css"/><!--CSS link-->
    <link rel="stylesheet" type="text/css" href="css/profile.css"/>
	<link rel="icon" href="images/logo/jkstore_logo.png"/><!-- Logo on tab -->
	<link href="https://fonts.googleapis.com/css?family=Anton|Roboto&display=swap" rel="stylesheet"/><!--Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"><!--Fonts-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--Search button font-->

	<title>JKstore - Track order</title>
</head>

<body>
<!-- CONNECTION -->
<?php include("common/connection.php");?>
<!-- Check login status -->
<?php include("common/algorithms/check_loginAlgorithm.php");?>
<!--MOBILE HOME BUTTON AND SEARCH BAR-->
<?php include("common/header_mobile.php");?>
<!--Side Navigation bar-->
<?php include("common/side_navigation_bar.php");?>
<!-- Login form -->
<?php include("common/forms/login_form.php");?>
<!-- Forgot password form -->
<?php include("common/forms/forgot_password_form.php");?>
<!-- Register form -->
<?php include("common/forms/register_form.php");?>
<!-- Register successful form -->
<?php include("common/forms/register_successful_form.php");?>
<!-- Cart -->
<?php include("common/cart.php");?>
<!-- Header -->
<?php include("common/header.php");?>
<!-- Check whether user logged in or not if not back to homepage -->
<?php
if($login==0){
	echo "<script>window.location.href='http://localhost/Assignment/index.php';</script>";
}
?>
<!-- Select order algorithm -->
<?php
$select_order_sql = "select * from ordertable where userID = $login_id and orderstatus = 1 order by orderDate desc";
$select_order_result = mysqli_query($conn,$select_order_sql);

?>
<div id="aboutus" style="background:url('images/bg/index-bg-2.jpg') no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;padding:50px 0% 0% 0%;z-index:997;position:relative;box-shadow:black 1px 0 10px;">
	<h1 align="center" style="color:white;text-shadow: black 1px 0px 10px;">
		Profile
	</h1>
	<div style="color:black;background-color: white;padding:5%;">
        <table align="center" cellpadding="5px" style="padding:20px;">
            <tr>
                <td>
                    <a href="edit_profile.php" class="profile-link">Edit Profile</a>
                </td>
                <td class="profile-link-selected">
                    <a href="track_order.php" class="profile-link">Track Order</a>
                </td>
            </tr>
        </table>
        <?php 
        if(mysqli_num_rows($select_order_result)>0){
        while($select_order_rows = mysqli_fetch_array($select_order_result)){
            $select_product_sql = "select ordertable_product.orderID,ordertable.orderDate,ordertable_product.quantity,ordertable_product.price,ordertable_product.shippingStatus,ordertable_product.rateStatus,product.productID,product.productName,product.productImageURL from ordertable inner join ordertable_product on ordertable.orderID = ordertable_product.orderID inner join product on ordertable_product.productID = product.productID where ordertable.orderID = ".$select_order_rows['orderID']." and orderStatus = 1";
            $select_product_result = mysqli_query($conn,$select_product_sql);
            $order_sum = 0;
        ?>
        <table align="center" class="order-slot">
            <tr>
                <td colspan="2">
                    <b>Order #<?php echo $select_order_rows['orderID'];?></b>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Placed on <?php echo $select_order_rows['orderDate'];?>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding:30px 0 30px 0">
                    <?php while($select_product_rows=mysqli_fetch_array($select_product_result)){?>
                        <a class="order-text" href="product.php?id=<?php echo $select_product_rows['productID'];?>">
                            <table>
                                <tr>
                                    <td rowspan="2">
                                        <img class="cart-image" src="images/product box/<?php echo $select_product_rows['productImageURL'];?>" alt=""/>
                                    </td>
                                    <td width="150px ">
                                        <?php echo $select_product_rows['productName'] ?>
                                    </td>
                                    <td align="left" width="50px">
                                        x<?php echo $select_product_rows['quantity'];?> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Subtotal:
                                    </td>
                                    <td>
                                        RM<?php echo $select_product_rows['price'];
                                        $order_sum += $select_product_rows['price'];?>
                                    </td>
                                </tr>  
                                <tr>
                                    <td colspan="3" align="right">
                                        <b><?php 
                                        if($select_product_rows['shippingStatus'] == 0){
                                            echo "Processing";
                                        }elseif($select_product_rows['shippingStatus'] == 1){
                                            echo "Preparation for delivery";
                                        }elseif($select_product_rows['shippingStatus']==2){
                                            echo "Out for Delivery";
                                        }else{
                                            echo "Delivered";
                                        }
                                        ?></b>
                                    </td>
                                </tr>
                            </table>
                        </a>
                        <!-- Rate shows up when the shipping status = delivered -->
                        <?php if($select_product_rows['shippingStatus']==3 && $select_product_rows['rateStatus'] == 0){?>
                            <table align="center">
                                <tr>
                                    <td colspan="3">
                                        <form>
                                            <a href="common/algorithms/rate.php?orderid=<?php echo $select_product_rows['orderID'];?>&id=<?php echo $select_product_rows['productID'];?>&rate=1"><img class="rate-star" src="images/logo/rate star.png" onmouseover="this.src='images/logo/yellow rate star.png'" onmouseout="this.src='images/logo/rate star.png'" alt=""/></a>
                                            <a href="common/algorithms/rate.php?orderid=<?php echo $select_product_rows['orderID'];?>&id=<?php echo $select_product_rows['productID'];?>&rate=2"><img class="rate-star" src="images/logo/rate star.png" onmouseover="this.src='images/logo/yellow rate star.png'" onmouseout="this.src='images/logo/rate star.png'" alt=""/></a>
                                            <a href="common/algorithms/rate.php?orderid=<?php echo $select_product_rows['orderID'];?>&id=<?php echo $select_product_rows['productID'];?>&rate=3"><img class="rate-star" src="images/logo/rate star.png" onmouseover="this.src='images/logo/yellow rate star.png'" onmouseout="this.src='images/logo/rate star.png'" alt=""/></a>
                                            <a href="common/algorithms/rate.php?orderid=<?php echo $select_product_rows['orderID'];?>&id=<?php echo $select_product_rows['productID'];?>&rate=4"><img class="rate-star" src="images/logo/rate star.png" onmouseover="this.src='images/logo/yellow rate star.png'" onmouseout="this.src='images/logo/rate star.png'" alt=""/></a>
                                            <a href="common/algorithms/rate.php?orderid=<?php echo $select_product_rows['orderID'];?>&id=<?php echo $select_product_rows['productID'];?>&rate=5"><img class="rate-star" src="images/logo/rate star.png" onmouseover="this.src='images/logo/yellow rate star.png'" onmouseout="this.src='images/logo/rate star.png'" alt=""/></a>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        <?php } ?>
                    <?php } ?>        
                </td>
            </tr>
            <tr>
                <td align="right">
                    <b>Total: RM<?php echo $order_sum;?></b>
                </td>
            </tr>
        </table>
        <br/>
        <?php }}else{ ?>
        <table align="center">
            <tr>
                <td>
                    <h3 class="cart-text">There are no orders placed yet.</h3>
                </td>
            </tr>
        </table>
        <?php } ?>
                
        
        
    </div>
</div>
<!-- Sitemap -->
<?php include("common/footer.php");?>
<!-- Javascripts -->
<?php include("common/javascripts.php");?>
<!-- login algorithm -->
<?php include("common/algorithms/loginAlgorithm.php");?>
<!-- Register Algorithm -->
<?php include("common/algorithms/registerAlgorithm.php")?>
<!-- Forgot Password Algorithm -->
<?php include("common/algorithms/forgot_passwordAlgorithm.php")?>

</body>

</html>
