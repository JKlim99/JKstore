<?php
    if($login == 1){
        $sum =0;
        $selectcart_sql = "select * from ordertable_product inner join ordertable on ordertable.orderID = ordertable_product.orderID where userID = ".$login_id." and orderStatus = 0";
        $selectcart_result = mysqli_query($conn,$selectcart_sql);
        $getorderid_sql="select * from ordertable where userID = ".$login_id." and orderStatus = 0";
        $getorderid_result= mysqli_query($conn,$getorderid_sql);
        $getorderid_rows = mysqli_fetch_array($getorderid_result);
?>

<table id="cart" cellpadding="2px">
    <tr><td>
        <table style="width:100%" align="center">
            <tr>
                <td colspan="2" align="right">
                    <a onclick="hideCart()" style="cursor:pointer;">x</a>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <h1>Shopping Cart</h1>
                </td>
            </tr>
        </table>
    </td></tr>
    <tr><td class="cart-product">
        <?php 
        if(mysqli_num_rows($selectcart_result)>0){
            while($selectcart_rows = mysqli_fetch_array($selectcart_result)){ 
                $stock_quantity_check_sql = "select * from ordertable inner join product where productID = ".$selectcart_rows['productID']." and orderID = ".$getorderid_rows['orderID'];
                $stock_quantity_check_result = mysqli_query($conn,$stock_quantity_check_sql);
                $stock_quantity_check_rows = mysqli_fetch_array($stock_quantity_check_result);    
        ?>
        <table>
            <tr>
                <td>
                    <img class="cart-image" src="images/product box/<?php echo $stock_quantity_check_rows['productImageURL'];?>" alt=""/>
                </td>
                <td width="200px ">
                    <?php echo $stock_quantity_check_rows['productName'] ?>
                </td>
                <td align="center" width="50px">
                    <form id="quantity<?php echo $selectcart_rows['productID'];?>" method="POST" action="common/algorithms/updatequantity.php">    
                        <select name="product<?php echo $selectcart_rows['productID'];?>" onchange="quantityupdate(<?php echo $selectcart_rows['productID'];?>)" style="font-size:20px">
                        <?php 
                        for($i=1;$i<= $stock_quantity_check_rows['quantity'];$i++){ 
                        ?>
                            <option value="<?php echo $i;?>" <?php if($i == $selectcart_rows['quantity']){echo "selected";}?> ><?php echo $i ?></option>
                        <?php } ?>
                        </select>
                        <input type="hidden" name="id" value="<?php echo $selectcart_rows['productID'];?>"/>
                        <input type="submit" name="quantitycheck" value="update" style="display:none"/>
                    </form>
                </td>
                <td class="cart-text">
                    RM<?php 
                        $checksale_sql="select sale from product where productID = ".$selectcart_rows['productID']." and sale = 0";
                        $checksale_result=mysqli_query($conn,$checksale_sql);
                        if(mysqli_num_rows($checksale_result)==1){
                            $cart_quantity_check ="select cast((quantity * (select price from product where productID = ".$selectcart_rows['productID']."))as decimal(11,2)) as price from ordertable_product where productID= ".$selectcart_rows['productID']." and orderID = ".$getorderid_rows['orderID'];
                            $price_result = mysqli_query($conn,$cart_quantity_check);
                            $price_rows = mysqli_fetch_array($price_result);
                        }else{
                            $cart_quantity_check ="select cast((quantity * (select price*(100-salePercentage)/100 from product where productID = ".$selectcart_rows['productID'].")) as decimal(10,2)) as price from ordertable_product where productID= ".$selectcart_rows['productID']." and orderID = ".$getorderid_rows['orderID'];
                            $price_result = mysqli_query($conn,$cart_quantity_check);
                            $price_rows = mysqli_fetch_array($price_result);
                        }
                        echo $price_rows['price']; 
                        $sum += $price_rows['price']; 
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>    
                <td colspan="2" align="right">
                    <form method="GET" action="common/algorithms/remove_cart.php">
                        <input type="hidden" name="id" value="<?php echo $selectcart_rows['productID']; ?>"/>
                        <input class="remove-text" type = "submit" value="remove"/>
                    </form>
                </td>
            </tr>
        </table>
        <?php }}else{ ?>
        <table align="center">
            <tr>
                <td>
                    <h3 class="cart-text">Your cart is empty</h3>
                </td>
            </tr>
        </table>
        <?php } ?>
    </td></tr>
    <tr><td>
        <table align="center">
            <tr>
                <td align="center">
                    Total
                </td>
            </tr>
            <tr>
                <td class="cart-text" align="center">
                    RM<?php echo $sum; ?>
                </td>
            </tr>
            <tr>    
                <td align="center">
                <?php if(mysqli_num_rows($selectcart_result)>0){ ?>
                    <form method="POST" action="http://localhost/Assignment/checkout.php">
                        <input class="cart-submit" type="submit" value="Checkout"/>
                    </form>
                    <?php }else{ ?>
                    <form method="POST" action="http://localhost/Assignment/checkout.php">
                        <input class="cart-submit" type="submit" value="Checkout" disabled/>
                    </form>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </td></tr>
</table>
<?php } ?>