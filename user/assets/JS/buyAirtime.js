document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("network_id").addEventListener("change", function(e){
        e.preventDefault();

        var networkId = this.value;
        var formData = new FormData();
        formData.append('network_id', networkId);

        fetch("./assets/PHP/airtimeOption.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if(response.ok){
                return response.json();
            } else {
                throw new Error('The response was not okay');
            }
        })
        .then(data => {
            var select = document.getElementById('amount');
            select.innerHTML = ''; // Clear previous options

            // Add 'Select Amount' option as the first option
            var selectAmountOption = document.createElement("option");
            selectAmountOption.text = '------';
            selectAmountOption.value = '';
            select.appendChild(selectAmountOption);

            // Add fetched options
            data.forEach(function(item) {
                var option = document.createElement("option");
                option.text = '₦' + item.amount;
                option.value = item.amount;
                select.appendChild(option);
            });
        })
        .catch(error => {
            console.log("Error: ", error);
        });
    });

    document.getElementById("amount").addEventListener("change", function(e){
        e.preventDefault();

        var amountValue = this.value;
        var formData = new FormData();
        formData.append("amount", amountValue);

        fetch("./assets/PHP/airtimeOption.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if(response.ok){
                return response.json();
            } else {
                throw new Error("The response was not okay");
            }
        })
        .then(data => {
            if(data.success) {
                document.getElementById("amountToPay").value = data.amountToPay;
            } else {
                console.log("Error: ", data.message);
            }
        })
        .catch(error => {
            console.log("Error: ", error);
        });
    });
    document.getElementById("airtimeForm").addEventListener("submit", function(e){
        e.preventDefault();

        var network_id = document.getElementById("network_id").value;
        var airtime_type = document.getElementById("airtime_type").value;
        var mobile_number = document.getElementById("mobile_number").value;
        var amount = document.getElementById("amount").value;
        var amountToPay = document.getElementById("amountToPay").value;

        var formData = new FormData(this);
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
                icon: data.success ? "success":"error",
                title: data.title,
                text: data.message
            })
            
        })
        .then(error => {
            console.log("error: ", error)
        })
    })
});