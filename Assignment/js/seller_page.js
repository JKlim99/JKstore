/* Hide and show notice for seller who first login */
var notice = document.getElementById("notice");

function showNotice(){
    notice.style.display = "table";
}
function hideNotice(){
    notice.style.display ="";
}
/* Submit shipping status update form */
function shippingStatusUpdate(orderid,userid){
    order_status_update= document.getElementById("order"+orderid+"-"+userid).submit();
}