document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("network").addEventListener("change", function(e){
        e.preventDefault();

        var network_id = document.getElementById("network").value;

        var formData = new FormData();
        formData.append("network", network_id);
        
        fetch("./assets/php/dataOptions.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if(!response.ok){
                throw new Error("network is not ok");
            }
            return response.json();
        })
        .then(data => {
            var select = document.getElementById("planType");
            select.innerHTML = '';

            selectDataPlanOption = document.createElement("option");
            selectDataPlanOption.text = "---Select Data Plan---";
            selectDataPlanOption.value = '';
            select.appendChild(selectDataPlanOption);

            data.forEach(function(item){
                var option = document.createElement("option");
                option.text = item.data_type + ' ' + item.plan_type + ' ' + item.validity;
                option.value = item.data_id
                select.appendChild(option)
            })
        })
        .then(error => {
            console.log("Error: ", error)
        })
    })

    document.getElementById("planType").addEventListener("change", function(e){

        e.preventDefault();
        var plan_id = document.getElementById("planType").value;
        var formData = new FormData();
        formData.append("planType", plan_id);

        fetch("./assets/PHP/dataOptions.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if(!response.ok){
                throw new Error("network response was not ok");
            }
            return response.json();
        })
        .then(data => {
            if(data.success){
                document.getElementById("buying-price").value = data.buyPrice
                document.getElementById("selling-price").value = data.sellPrice;
            }
        })
    })
})