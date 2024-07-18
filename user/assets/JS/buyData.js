document.addEventListener("DOMContentLoaded", function() {
    // Buy Data
    document.getElementById("dataForm").addEventListener('submit', function(e) {
        e.preventDefault();

        var network_id = document.getElementById("network_id").value;
        var plan_id = document.getElementById("plan_id").value;
        var data_type = document.getElementById("data_type").value;
        var amount = document.getElementById("amount").value;
        var mobile = document.getElementById("mobile_number").value;

        var submitBtn = document.getElementById("btn");
        submitBtn.innerHTML = "Processing...";
        submitBtn.style.fontWeight = 'bold';
        submitBtn.disabled = true;

        var formData = new FormData();
        formData.append("network_id", network_id);
        formData.append("plan_id", plan_id);
        formData.append("data_type", data_type);
        formData.append("amount", amount);
        formData.append("mobile_number", mobile);

        fetch('./assets/PHP/buyData.php', {
            method: "POST",
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
                title: data.title,
                text: data.message
            });

            submitBtn.innerHTML = 'Buy';
            submitBtn.disabled = false;
        })
        .catch(error => {
            console.log("Error: ", error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: error.message, // Using error.message to show the error details
                confirmButtonText: "OK"
            });
            submitBtn.innerHTML = 'Buy';
            submitBtn.disabled = false;
        });
    });
});
