document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("network_id").addEventListener("change", function(e){
        e.preventDefault();

        var networkId = this.value;
        var formData = new FormData();
        formData.append('network_id', networkId);

        fetch("./PHP/fetchForAirtimeAmount.php", {
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
            selectAmountOption.text = '---Select Amount---';
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

        fetch("./PHP/fetchForAirtimeAmount.php", {
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
                document.getElementById("amountToPay").value = '₦' + data.amountToPay;
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
        var amount = document.getElementById("amount").value;
        var formData = new FormData(this);
        formData.append("network_id", network_id);
        formData.append("amount", amount);

        fetch('./PHP/buyAirtime.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            console.log(response)
            if(!response.ok){
                throw new Error("network response was not ok")
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
                // console.log(data.message)
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Failed",
                    text: data.message
                })
            }
        })
        .then(error => {
            console.log("error: ", error)
        })
    })
});