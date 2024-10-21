document.addEventListener("submit", function(e) {
    e.preventDefault();

    let oldPass = document.getElementById("oldPass").value;
    let newPass = document.getElementById("newPass").value;
    let retypePass = document.getElementById("retypePass").value;

    let formData = new FormData();
    formData.append("oldPass", oldPass);
    formData.append("newPass", newPass);
    formData.append("retypePass", retypePass)

    fetch("./assets/PHP/changePassword.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Network response was not okay");
        }
        return response.json();
    })
    .then(data => {
        Swal.fire({
            icon: data.success ? 'success' : 'error',
            // title: data.title,
            text: data.message
        });
    })
    .catch(error => {
        console.log("Error: ", error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: error.message, // Using error.message to show the error details
            confirmButtonText: "OK"
        });
    })
})