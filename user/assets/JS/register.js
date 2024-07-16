var form = document.getElementById("signUpForm");
var fname = document.getElementById('fname');
var lname = document.getElementById('lname');
var username = document.getElementById('username');
var email = document.getElementById('email');
var phone = document.getElementById('phone');
var password = document.getElementById('password');
var cpassword = document.getElementById('cpassword');

var error1 = document.getElementById("error1");
var error2 = document.getElementById("error2");
var error3 = document.getElementById("error3");
var error4 = document.getElementById("error4");
var error5 = document.getElementById("error5");
var error6 = document.getElementById("error6");
var error7 = document.getElementById("error7");

function validateSignUp(){
    let isValid = true;

    // reset error message
    error1.textContent = '';
    error2.textContent = '';
    error3.textContent = '';
    error4.textContent = '';
    error5.textContent = '';
    error6.textContent = '';
    error7.textContent = '';

    // Check each input field and display errors if necessary
    if(fname.value.trim() === ""){
        error1.textContent = "First Name is required*";
        isValid = false;
    }
    if(lname.value.trim() === ""){
        error2.textContent = "Last Name is required*";
        isValid = false;
    }
    if(username.value.trim() === ""){
        error3.textContent = "Username is required*";
        isValid = false;
    }
    if(email.value.trim() === ""){
        error4.textContent = "Email is required*";
        isValid = false;
    }
    if(phone.value.trim() === ""){
        error5.textContent = "Mobile is required*";
        isValid = false;
    }
    if(password.value.trim() === ""){
        error6.textContent = "Password is required*";
        isValid = false; 
    }
    if(cpassword.value.trim() === ""){
        error7.textContent = "Confirm Password is required*";
        isValid = false;
    }

    return isValid;
}


form.addEventListener("submit", function(event){
    if(!validateSignUp()){
        event.preventDefault();
    }
    // if(password.value.trim() !== cpassword.value.trim()){
    //     alert("Password and Confirm Password doesn't Match!");
    // }else{
    //     sendAjaxRequest();
    // }
})