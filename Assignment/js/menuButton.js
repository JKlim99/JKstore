//Get the button:
var menu = document.getElementById("categorybar-mobile-menu");
var login = document.getElementById("login-form");
var register = document.getElementById("register-form");
var registersuccessful = document.getElementById("registersuccessful-form");
var loginfailed = document.getElementById("loginfailed-form");
var forgotpassword = document.getElementById("forgotpassword-form");
var showpassword = document.getElementById("password");
var profilemenu = document.getElementById("profile-menu");
var cart = document.getElementById("cart");

/* hide and show forms */
function hideAndShowMenu() {
  if (menu.style.display=="" ) {
      menu.style.display ="table";
      
  }
  else {
      menu.style.display ="";
  }
}
function showLogin(){
  login.style.display ="table"; 
}
function hideLogin(){
  login.style.display =""; 
}
function showRegister(){
  register.style.display ="table"; 
}
function hideRegister(){
  register.style.display =""; 
}
function showRegisterSuccessful(){
  registersuccessful.style.display ="table"; 
}
function hideRegisterSuccessful(){
  registersuccessful.style.display ="";
}
function showLoginFailed(){
  loginfailed.style.display ="table"; 
}
function hideLoginFailed(){
  loginfailed.style.display ="";
}
function showForgotPassword(){
  forgotpassword.style.display ="table"; 
}
function hideForgotPassword(){
  forgotpassword.style.display ="";
}
function hideAndShowPassowrd(){
  console.log(password.type);
  if(password.type == "password"){
    password.type = "text";
  } else{
    password.type = "password";
  }
}
function hideAndShowProfileMenu(){
  if (profilemenu.style.display=="" ) {
    profilemenu.style.display ="table";  
  }
  else {
    profilemenu.style.display ="";
  }
}
function showCart(){
  cart.style.display="table";
}
function hideCart(){
  cart.style.display="";
}


