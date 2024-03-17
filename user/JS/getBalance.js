$('document').ready(function(){
    $.ajax({
        url: './PHP/balance.php',
        type: 'GET',
        dataType: 'json', // Assuming your php script will return json format 
        success: function(response){
            // Check if the response is valid
            if(response && response.success){
                // Access the account details from the response
                var accountBalance = response.balance;

                $('#accBalance').html("₦" + accountBalance);
            }else{
                alert('Error fetching account details')
            }
        },
        error: function(xhr, status, error){
            $("#accBalance").text("Error: " + status + error);
        }
    })
})