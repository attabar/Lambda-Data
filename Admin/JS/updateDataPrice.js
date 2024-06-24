document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("network-id").addEventListener("change", function(e){
        e.preventDefault();

        var network_id = document.getElementById('network-id').value;
        // var planType = document.get

        var formData = new FormData();
        formData.append("network-id", network_id);

        fetch("./php/updateDataPrice.php", {
            method: 'POST',
            body: formData
        }).then(response => {
            if(!response.ok){
                throw new Error("there was a problem associated with the response network")
            }
            return response.json();
        }).then(data => {
            var select = document.getElementById('planType');
            select.innerHTML = '';

            selectDataPlanOption = document.createElement('option');
            selectDataPlanOption.text = 'Select Plan Type';
            selectDataPlanOption.disabled;
            selectDataPlanOption.value = '';
            select.appendChild(selectDataPlanOption);

            data.forEach(function(item){
                var option = document.createElement('option');
                option.text = item.planType + ' ' + item.dataType + ' ' + item.validity;
                option.value = item.dataid;
                select.appendChild(option);
            })
        })
        .catch(error => {
            console.log("Error: ", error);
        })
    })

    document.getElementById('planType').addEventListener("change", function(e){
        e.preventDefault();

        var planType = document.getElementById('planType').value;

        var formData = new FormData();
        formData.append('planType', planType);

        fetch("./php/updateDataPrice.php", {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if(!response.ok){
                throw new Error("Network response was not okey")
            }
            return response.json();
        })
        .then(data => {
            var bprice = document.getElementById('buying-price');
            var sprice = document.getElementById('selling-price');

            bprice.value = data.price;
            sprice.value = data.selling_price;
        })
    })

    // submit to update 
    document.getElementById("updateDataPrice").addEventListener("submit", function(e){
        e.preventDefault();

        var network_id = document.getElementById("network-id").value;
        var planType = document.getElementById("planType").value;
        var bprice = document.getElementById('buying-price').value;
        var sprice = document.getElementById('selling-price').value;

        var formData = new FormData();
        formData.append("network-id", network_id);
        formData.append("planType", planType);
        formData.append("buying-price", bprice);
        formData.append("selling-price", sprice);

        fetch("./php/updateDataPrice.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if(!response.ok){
                throw new Error("Network response was not okey");
            }
            return response.json();
        })
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            console.log("Error: ", error);
        })
    })
})