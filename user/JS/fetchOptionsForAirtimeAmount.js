document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("network_id").addEventListener("change", function(e){
        e.preventDefault();

        // Get the selected network_id
        var networkId = this.value;

        // Create a FormData object to send the selected network_id
        var formData = new FormData();
        formData.append('network_id', networkId)

        fetch("./PHP/fetchForAirtimeAmount.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if(response.ok){
                return response.json();
            }else{
                throw new Error('The response was not okey')
            }
        })
        .then(data => {
            var select = document.getElementById('amount');
            select.innerHTML = '';

            for(var i = 0; i < data.amount.length; i ++){
                var option = document.createElement('option');
                option.text = data.amount;
                option.value = data.amount;
                select.appendChild(option);
            }
        })
    })
})