document.addEventListener("DOMContentLoaded", function(e) {
    e.preventDefault();
document.getElementById("signUpForm").addEventListener("submit", function(e){
    e.preventDefault();

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
    })
    .catch(error => {
    console.log("There was a problem with the response operation: ",error);
    })
})
})