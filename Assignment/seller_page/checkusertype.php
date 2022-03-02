<?php
/* if usetype = admin */
if($login_usertype == 0){
    echo "<script>window.location.href='http://localhost/Assignment/admin_page_index.php';</script>";
/* if usertype = buyer */
}elseif($login_usertype == 1){
    echo "<script>window.location.href='http://localhost/Assignment/index.php';</script>";
}
?>