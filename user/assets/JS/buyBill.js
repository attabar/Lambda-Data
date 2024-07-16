document.addEventListener("DOMContentLoaded", function(){

    document.getElementById("billForm").addEventListener("submit", function(e){

        e.preventDefault();

        var disco_name = document.getElementById("disco_name").value;
        var amount = document.getElementById("amount").value;
        var meter_number = document.getElementById("meter_number").value;
        var meter_type = document.getElementById("meter_type").value;

        var formData = new FormData();
        formData.append("disco_name", disco_name);
        formData.append("amount", amount);
        formData.append("meter_number", meter_number);
        formData.append("meter_type", meter_type);

        fetch("./PHP/buyBill.php", {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            Swal.fire({
                icon: data.success ? 'success':'error',
                title: data.title,
                text: data.message
            })
        })
    })
})