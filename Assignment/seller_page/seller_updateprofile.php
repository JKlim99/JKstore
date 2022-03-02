<?php
if(isset($_POST['updatesubmit'])){
    $profile_email = $_POST['profile-email'];
    /* if seller change their email */
    if($profile_email != $login_email){
        /* check email whether exists */
        $checkemail_sql = "select * from user where userEmail = '$profile_email'";
        $checkemail_result = mysqli_query($conn,$checkemail_sql);
        
        if(mysqli_num_rows($checkemail_result)<=0){
            $profile_username = $_POST['profile-username'];
            $profile_password = $_POST['profile-password'];
            $profile_street =$_POST['profile-street'];
            $profile_city =$_POST['profile-city'];
            $profile_postal = $_POST['profile-postal'];
            $profile_state = $_POST['profile-state'];
            $profile_country = $_POST['profile-country'];
            $profile_phone = $_POST['profile-phone'];
            $profile_shortdescription = $_POST['profile-shortdescription'];
            $profile_description = $_POST['profile-description'];
            $profile_bank = $_POST['profile-bank'];
            $profile_accountnumber = $_POST['profile-accountnumber'];
            
            /* check whether seller change their password */
            if($_POST['profile-password'] == ""){
                $changepassword = "";
            }else{
                $changepassword = "userPassword = '".md5($profile_password)."',";
            }

            $editprofile_sql= "update user set userEmail = '$profile_email',userUsername = '$profile_username',".$changepassword." userStreet = '$profile_street', userCity = '$profile_city',userPostalCode = $profile_postal,userState = '$profile_state',userCountry = '$profile_country',userPhoneNumber = '$profile_phone', sellerShortDescription = '$profile_shortdescription', sellerDescription = '$profile_description', userBank = '$profile_bank', userAccountNumber = ".$profile_accountnumber.", isActive = 2 where userEmail = '$login_email'";
            mysqli_query($conn,$editprofile_sql);
            if(mysqli_affected_rows($conn)<=0){
                echo "<script>alert('Updated failed')</script>";
            }else{
                $_SESSION['login_email'] = $profile_email;
                $_SESSION['login_username'] = $profile_username;
                echo "<script>alert('Updated successful')</script>";
                echo "<script>window.location.href='seller_page_index.php';</script>";
            }
        }else{
                echo"<script>alert('The email has been registered! Try another one.')</script>";
            }
    /* if seller didnt change their email */
	}else{
        $profile_username = $_POST['profile-username'];
        $profile_password = $_POST['profile-password'];
        $profile_street =$_POST['profile-street'];
        $profile_city =$_POST['profile-city'];
        $profile_postal = $_POST['profile-postal'];
        $profile_state = $_POST['profile-state'];
        $profile_country = $_POST['profile-country'];
        $profile_phone = $_POST['profile-phone'];
        $profile_shortdescription = $_POST['profile-shortdescription'];
        $profile_description = $_POST['profile-description'];
        $profile_bank = $_POST['profile-bank'];
        $profile_accountnumber = $_POST['profile-accountnumber'];

        /* Check whether admin change password */
        if($_POST['profile-password'] == ""){
            $changepassword = "";
        }else{
            $changepassword = "userPassword = '".md5($profile_password)."',";
        }
        
        $editprofile_sql= "update user set userUsername = '$profile_username',".$changepassword." userStreet = '$profile_street', userCity = '$profile_city',userPostalCode = $profile_postal,userState = '$profile_state',userCountry = '$profile_country',userPhoneNumber = '$profile_phone' , sellerShortDescription = '$profile_shortdescription', sellerDescription = '$profile_description', userBank = '$profile_bank', userAccountNumber = ".$profile_accountnumber.", isActive = 2 where userEmail = '$profile_email'";
        mysqli_query($conn,$editprofile_sql);
        if(mysqli_affected_rows($conn)<=0){
            echo "<script>alert('Updated failed')</script>";
            echo "<script>window.location.href='seller_page_index.php';</script>";
        }else{
            $_SESSION['login_username'] = $profile_username;
            echo "<script>alert('Updated successful')</script>";
            echo "<script>window.location.href='seller_page_index.php';</script>";
        }
    }
}
?>