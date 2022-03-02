<?php
include("connection.php");

if(isset($_GET['id'])){
    $getfeedback_sql="select * from site_feedback where id=".$_GET['id'];
    $getfeedback_result = mysqli_query($conn,$getfeedback_sql);
    $getfeedback_rows = mysqli_fetch_array($getfeedback_result);
    /* Update site feedback to replied */
    $updatereplied_sql = "update site_feedback set replied = 1 where id =".$_GET['id'];
    mysqli_query($conn,$updatereplied_sql);
    echo "<script>window.location.href='http://localhost/Assignment/admin_page_sitefeedbacks.php?id=".$_GET['id']."';</script>";
}
?>