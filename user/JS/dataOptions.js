document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("network_id").addEventListener("change", function(e){
        e.preventDefault();

        var network_id = document.getElementById("network_id").value;

        var formData = new FormData();
        formData.append("network_id", network_id);
        
        fetch("./PHP/dataOptions.php", {
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
            var select = document.getElementById("plan_id");
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

    document.getElementById("plan_id").addEventListener("change", function(e){

        e.preventDefault();
        var plan_id = document.getElementById("plan_id").value;
        var formData = new FormData();
        formData.append("plan_id", plan_id);

        fetch("./PHP/dataOptions.php", {
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
                document.getElementById("data_type").value = data.fetchDataType
                document.getElementById("amount").value = data.fetchPrice;
            }
        })
    })
})