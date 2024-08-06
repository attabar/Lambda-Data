document.addEventListener("DOMContentLoaded", function() {
    // Buy Data
    document.getElementById("updateDataPrice").addEventListener('submit', function(e) {
        e.preventDefault();


        var buyPrice = document.getElementById("buying-price").value;
        var sellPrice = document.getElementById("selling-price").value;
        var plan_id = document.getElementById("planType").value;
    

        var submitBtn = document.getElementById("btn");
        submitBtn.innerHTML = "Processing...";
        submitBtn.style.fontWeight = 'bold';
        submitBtn.disabled = true;

        var formData = new FormData();
        formData.append("buying-price", buyPrice);
        formData.append("selling-price", sellPrice);
        formData.append("planType", plan_id);
       

        fetch('./assets/php/resetData.php', {
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
