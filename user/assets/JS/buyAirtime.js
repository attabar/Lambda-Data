    document.getElementById("btn").addEventListener("click", function(e){
        e.preventDefault();
        Swal.fire({
            title: "Enter Pin",
            input: "password",
            inputPlaceholder: "Enter Your Pin",
            showCancelButton: true,
            confirmButtonText: "confirm"
        }).then((res) => {
            if(res.isConfirmed){
                let pin = res.value;
                
                // send the pin to the server for verification
                fetch("./assets/PHP/verifyPin.php", {
                    method: "POST",
                    headers: {
                        "Content-Type" : "application/json"
                    },
                    body: JSON.stringify({ pin : pin })
                }).then(res => res.json())
                .then(data => {
                    if(data.valid){
                        submitAirtimeForm()
                    }
                    else {
                        // If the PIN is invalid, show an error
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid PIN',
                            text: 'The PIN you entered is incorrect. Please try again.'
                        });
                    }
                })
            }
        })
    })


// function to be call for airtime top up 
function submitAirtimeForm() {
    var network_id = document.getElementById("network_id").value;
    var airtime_type = document.getElementById("airtime_type").value;
    var mobile_number = document.getElementById("mobile_number").value;
    var amount = document.getElementById("amount").value;
    var amountToPay = document.getElementById("amountToPay").value;

    var formData = new FormData();
    formData.append("network_id", network_id);
    formData.append("airtime_type", airtime_type);
    formData.append("mobile_number", mobile_number);
    formData.append("amount", amount);
    formData.append("amountToPay", amountToPay);

    fetch('./assets/PHP/buyAirtime.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if(!response.ok){
            throw new Error("network response was not ok")
        }
        return response.json();
    })
    .then(data => {
        Swal.fire({
            icon: data.success ? 'success' : 'error',
            title: data.title,
            text: data.message
        }); 
    })
    .then(error => {
        console.log("error: ", error)
    })
}