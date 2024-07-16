function CheckPasswordStrength(){
    var password = document.getElementById("password").value;
    var strongOrWeak = document.getElementById("strongOrWeak");
    strongOrWeak.textContent = '';
    var strength = 0;
    if(password.length >= 8){
        strength++;
    }
    if(password.match(/[a-z]/)){
        strength++;
    }
    if(password.match(/[A-Z]/)){
        strength++;
    }
    if(password.match(/[0-9]/)){
        strength++;
    }
    if(password.match(/[$@#&!]/)){
        strength++;
    }

    var strengthText = '';
    if(strength < 3){
        strengthText = 'Weak Password is not Allowed';
        strongOrWeak.style.color = 'red'
    } else if (strength < 5){
        strengthText = 'Moderate Password but try Strong Password';
        strongOrWeak.style.color = 'orange'
    } else {
        strengthText = "Strong Password";
        strongOrWeak.style.color = 'green'
    }

    strongOrWeak.textContent = strengthText;
}