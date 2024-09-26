document.addEventListener("DOMContentLoaded", function(e) {
    e.preventDefault();
document.getElementById("signUpForm").addEventListener("submit", function(e){
    e.preventDefault();

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