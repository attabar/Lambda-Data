document.addEventListener("DOMContentLoaded", function(e) {
    e.preventDefault();
    
document.getElementById("signUpForm").addEventListener("submit", function(e){
    e.preventDefault();
    if (!validateInput()) return;

    var submitBtn = document.getElementById("submitBtn");
    submitBtn.innerHTML = "Processing...";
    submitBtn.style.fontWeight = 'bold';
    submitBtn.style.backgroundColor = 'lightblue';
    submitBtn.disabled = true;

    var formData = new FormData(this);

    fetch("./assets/PHP/Registration.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        console.log(response);
        if(!response.ok){
            throw new Error("Network response was not ok");
        }
    return response.json();
    })
    .then(data => {
        if(data.success){
            Swal.fire({
                icon: "success",
                title: "Successful",
                text: data.message
        })
        }else{
            Swal.fire({
                icon: "error",
                title: "Failed",
                text: data.message
            })
        }
        submitBtn.innerHTML = 'Sign up';
        submitBtn.disabled = false;
    })
    .catch(error => {
    console.log("There was a problem with the response operation: ",error);
    })
})
})

function validateInput() {
    let fullname = document.getElementById("fullname").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let pin = document.getElementById("pin").value.trim();
    let password = document.getElementById("password").value.trim();
    let errorElement = document.querySelector('.error');

    if (!fullname || !email || !phone || !pin || !password) {
        errorElement.innerText = "All fields are required!";
        return false;
    }

    // Validate email format
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        errorElement.innerText = "Invalid email format!";
        return false;
    }

    // Validate phone number format (example: for 10-11 digits)
    const phoneRegex = /^\d{10,11}$/;
    if (!phoneRegex.test(phone)) {
        errorElement.innerText = "Invalid phone number!";
        return false;
    }

    // Check PIN (example: minimum 4 digits)
    if (pin.length < 4 || isNaN(pin)) {
        errorElement.innerText = "PIN must be at least 4 digits!";
        return false;
    }

    // Check password strength
    if (password.length < 6) {
        errorElement.innerText = "Password must be at least 6 characters!";
        return false;
    }

    errorElement.innerText = ""; // Clear error message
    return true;
}
