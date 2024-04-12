document.addEventListener('DOMContentLoaded', function() {
    var network = document.getElementById('network');
    var planType = document.getElementById('plan_id');

    function fetchDataPlan() {
        var networkName = network.value;
        fetch('./PHP/fetchPrice.php', {
            method: 'POST',
            body: JSON.stringify({ network: networkName }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(response => {
            if (response && response.success) {
                planType.innerHTML = '<option value="">Select Plan Type</option>';
                var plans = null;
                switch(networkName) {
                    case '1':
                        plans = response.mtn;
                        break;
                    case '2':
                        plans = response.glo;
                        break;
                    case '3':
                        plans = response.airtel;
                        break;
                    case '6':
                        plans = response.nineMobile;
                        break;
                    default:
                        plans = [];
                }
                plans.forEach(plan => {
                    alert(plan.mtn_data_id)
                    planType.innerHTML += `<option value="${plan.mtn_data_id}">${plan.mtn_plan_type} ${mtn_plan.data_type}</option>`;
                });
            }
        })
        .catch(error => {
            console.error('Fetch Error:', error);
        });
    }

    network.addEventListener('change', function(e) {
        e.preventDefault();
        fetchDataPlan();
    });

    network.dispatchEvent(new Event('change'));


    planType.addEventListener('change', function(e) {
        e.preventDefault();
        var planType = planType.value;
        var dataType = document.getElementById('data_type');
        var amount = document.getElementById('amount');
        
        fetch('./PHP/fetchPrice2.php', {
            method: 'POST',
            body: JSON.stringify({ plan_type: planType }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(response => {
            if (response && response.success) {
                
                dataType.value = response.fetch[0].fetchDataPlan;
                amount.value = response.fetch[0].fetchDataPrice;
            
            } else {
                dataType.value = response.fetch.fetchDataPrice;
            }
        })
        .catch(error => {
            console.error('Fetch Error:', error);
        });
    });

    dataType.dispatchEvent(new Event('change'));

    var dataForm = document.getElementById('dataForm');
    dataForm.addEventListener('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(dataForm);
        formData.append('network_id', network.value);
        formData.append('plan_id', dataType.value);

        fetch('./PHP/buyData.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(response => {
            if (response.success && response.status === 'successful') {
                Swal.fire({
                    icon: 'success',
                    title: response.status,
                    text: response.message,
                    confirmButtonText: 'OK'
                });
            } else if (response.success && response.status === 'failed') {
                Swal.fire({
                    icon: 'error',
                    title: response.status,
                    text: response.message,
                    confirmButtonText: 'OK'
                });
            } else if (parseFloat(amount.value) > parseFloat(response.settlement_amount)) {
                Swal.fire({
                    icon: 'error',
                    title: response.title,
                    text: response.message,
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            console.error('Fetch Error:', error);
        });
    });
});