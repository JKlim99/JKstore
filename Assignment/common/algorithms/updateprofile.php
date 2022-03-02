<?php
if(isset($_POST['updatesubmit'])){
    $profile_email = $_POST['profile-email'];
    if($profile_email != $login_email){
        $checkemail_sql = "select * from user where userEmail like '%".$profile_email."%'";
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
            
            if($_POST['profile-password'] == ""){
                $changepassword = "";
            }else{
                $changepassword = "userPassword = '".md5($profile_password)."',";
            }

            $editprofile_sql= "update user set userEmail = '$profile_email',userUsername = '$profile_username',".$changepassword." userStreet = '$profile_street', userCity = '$profile_city',userPostalCode = $profile_postal,userState = '$profile_state',userCountry = '$profile_country',userPhoneNumber = '$profile_phone' where userEmail = '$login_email'";
            mysqli_query($conn,$editprofile_sql);
            if(mysqli_affected_rows($conn)<=0){
                echo "<script>alert('Updated failed')</script>";
            }else{
                $_SESSION['login_email'] = $profile_email;
                $_SESSION['login_username'] = $profile_username;
                echo "<script>alert('Updated successful')</script>";
            }
        }else{
                echo"<script>alert('The email has been registered! Try another one.')</script>";
            }
	}else{
        $profile_username = $_POST['profile-username'];
        $profile_password = $_POST['profile-password'];
        $profile_street =$_POST['profile-street'];
        $profile_city =$_POST['profile-city'];
        $profile_postal = $_POST['profile-postal'];
        $profile_state = $_POST['profile-state'];
        $profile_country = $_POST['profile-country'];
        $profile_phone = $_POST['profile-phone'];

        if($_POST['profile-password'] == ""){
            $changepassword = "";
        }else{
            $changepassword = "userPassword = '".md5($profile_password)."',";
        }
        
        $editprofile_sql= "update user set userUsername = '$profile_username',".$changepassword." userStreet = '$profile_street', userCity = '$profile_city',userPostalCode = $profile_postal,userState = '$profile_state',userCountry = '$profile_country',userPhoneNumber = '$profile_phone' where userEmail = '$profile_email'";
        mysqli_query($conn,$editprofile_sql);
        if(mysqli_affected_rows($conn)<=0){
            echo "<script>alert('Updated failed')</script>";
        }else{
            $_SESSION['login_username'] = $profile_username;
            echo "<script>alert('Updated successful')</script>";
        }
    }
}
?>