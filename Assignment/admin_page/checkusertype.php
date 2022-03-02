<?php
/* if usertype = buyer */
if($login_usertype == 1){
    echo "<script>window.location.href='http://localhost/Assignment/index.php';</script>";
/* if usertype = seller */
}elseif($login_usertype == 2){
    echo "<script>window.location.href='http://localhost/Assignment/seller_page_index.php';</script>";
}else{
    
}
?>