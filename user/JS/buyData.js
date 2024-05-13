document.addEventListener("DOMContentLoaded", function(){
    // Buy Data
    document.getElementById("dataForm").addEventListener('submit', function(e) {
        e.preventDefault();

        var network_id = document.getElementById("network_id").value;
        var plan_id = document.getElementById("plan_id").value;
        var data_type = document.getElementById("data_type").value;
        var amount = document.getElementById("amount").value;
        var mobile = document.getElementById("mobile_number").value;

        var formData = new FormData();
        formData.append("network_id", network_id);
        formData.append("plan_id", plan_id);
        formData.append("data_type", data_type);
        formData.append("amount", amount);
        formData.append("mobile_number", mobile);

        fetch('./PHP/buyData.php', {
            method: "POST",
            body: formData
        })
        .then(response => {
            if(!response.ok){
                throw new Error("Network response was not okay");
            }
            return response.json();
        })
        .then(data => {
            if(amount > data.balance){
                Swal.fire({
                    icon: 'error',
                    title: 'INSUFFICIENT BALANCE',
                    text: 'Kindly Fund Your Wallet and Enjoy Your Top Ups, Your Current Balance: ' + data.balance,
                    confirmButtonText: "OK"
                });
            }
            else if(data.success && data.status === 'successful'){
                Swal.fire({
                    icon: 'success',
                    title: data.status,
                    text: data.message
                })
            }
            else if (data.success === false && data.status === 'failed') {
                    Swal.fire({
                        icon: 'error',
                        title: data.status,
                        text: data.message,
                        confirmButtonText: "OK"
                    });
            } 
            // else (amount > data.balance) {
            //         
            // } 

        })
        .catch(error => {
            console.log("Error: ", error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: error,
                confirmButtonText: "OK"
            });
        });
    });
});
