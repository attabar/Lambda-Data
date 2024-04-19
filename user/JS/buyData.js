document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("dataForm").addEventListener('submit', function(e) {
        e.preventDefault();

        var network = $("#network");
        var planId = $("#plan_id");
        var selectedNetwork = network.value;
        var selectedDataType = planId.value;
        var formData = new FormData(this);
        formData.append("network", selectedNetwork);
        formData.append("plan_id", selectedDataType);
        var amount = document.getElementById("amount").value;

        fetchData('./PHP/buyData.php', 'POST', formData, function(response) {
            if (response.success && response.status === 'successful') {
                Swal.fire({
                    icon: 'success',
                    title: response.status,
                    text: response.message,
                    confirmButtonText: "OK"
                });
            } else if (response.success && response.status === 'failed') {
                Swal.fire({
                    icon: 'error',
                    title: response.status,
                    text: response.message,
                    confirmButtonText: "OK"
                });
            } else if (parseFloat(amount) > parseFloat(response.settlement_amount)) {
                Swal.fire({
                    icon: 'error',
                    title: response.title,
                    text: response.message,
                    confirmButtonText: "OK"
                });
            }
        }, function(error) {
            console.log("FETCH ERROR: ", error);
        });
    });
});
