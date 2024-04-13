document.addEventListener('DOMContentLoaded', function() {
    var network = document.getElementById("network");
    var plan_id = document.getElementById("plan_id");
    
    function fetchData(url, method, data, successCallback, errorCallback) {
        fetch(url, {
            method: method,
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(successCallback)
        .catch(errorCallback);
    }

    // Function for network changing to append data plan and data type
    network.addEventListener('change', function(e) {
        e.preventDefault();
        var networkName = this.value;
        fetchData('./PHP/fetchPrice.php', 'POST', { network: networkName }, function(response) {
            if (response && response.success) {
                plan_id.innerHTML = '<option value="">Select</option>'; // Clear existing options
                if (networkName === '1') {
                    response.mtn.forEach(function(item) {
                        plan_id.innerHTML += '<option value="' + item.mtn_data_id + '">' + item.mtn_plan_type + ' ' + item.mtn_data_type + '</option>';
                    });
                } else if (networkName === '3') {
                    response.airtel.forEach(function(item) {
                        dataType.innerHTML += '<option value="' + item.airtel_data_id + '">' + item.airtel_plan_type + ' ' + item.airtel_data_type + '</option>';
                    });
                } else if (networkName === '2') {
                    response.glo.forEach(function(item) {
                        dataType.innerHTML += '<option value="' + item.glo_data_id + '">' + item.glo_plan_type + ' ' + item.glo_data_type + '</option>';
                    });
                } else if (networkName === '6') {
                    response.nineMobile.forEach(function(item) {
                        dataType.innerHTML += '<option value="' + item.nineMobile_data_id + '">' + item.nineMobile_plan_type + ' ' + item.nineMobile_data_type + '</option>';
                    });
                }
            }else{
                console.log("The network was not respons")
            }
        }, function(error) {
            console.log("FETCH ERROR: ", error);
        });
    });

    network.dispatchEvent(new Event('change'));

    plan_id.addEventListener('change', function(e) {
        e.preventDefault();
        var data_plan_id = this.value;
        console.log(data_plan_id)
        var data_plan = document.getElementById("data_type");
        var amount = document.getElementById('amount');

        fetchData('./PHP/fetchPrice2.php', 'POST', { data_plan_id: data_plan_id }, function(response) {
            if (response && response.success) {
                console.log(response)
                if (response.fetch && response.fetch.length > 0) {
                    data_plan.value = response.fetch[0].fetchDataPlan;
                    amount.value = response.fetch[0].fetchDataPrice;
                } else {
                    // Handle the case when response.fetch is undefined or empty
                    console.log("response of the fetch is equal to 0")
                }
            } else {
                // Handle the case when response.success is false
                console.log("The network response was false")
            }
            
        }, function(error) {
            console.log("FETCH ERROR: ", error);
        });
    });

    plan_id.dispatchEvent(new Event('change'));
})