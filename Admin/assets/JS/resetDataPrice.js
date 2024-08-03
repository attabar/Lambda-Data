document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("network").addEventListener("change", function(e) {
        e.preventDefault();

        var network_id = document.getElementById('network').value;

        var formData = new FormData();
        formData.append("network", network_id);

        fetch("./assets/php/updateDataPrice.php", {
            method: 'POST',
            body: formData
        }).then(response => {
            if (!response.ok) {
                throw new Error("There was a problem with the network response");
            }
            return response.json();
        }).then(data => {
            if (data.success) {
                var select = document.getElementById('planType');
                select.innerHTML = '';

                var selectDataPlanOption = document.createElement('option');
                selectDataPlanOption.text = 'Select Plan Type';
                selectDataPlanOption.disabled = true;
                selectDataPlanOption.selected = true;
                selectDataPlanOption.value = '';
                select.appendChild(selectDataPlanOption);

                data.plans.forEach(function(plan) {
                    var option = document.createElement('option');
                    option.text = `${plan.plan_type} ${plan.data_type} ${plan.validity}`;
                    option.value = plan.data_id;
                    select.appendChild(option);
                });
            } else {
                console.log(data.message);
            }
        }).catch(error => {
            console.error("Error: ", error);
        });
    });
});