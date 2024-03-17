$('document').ready(function(){
    $.ajax({
        url: './PHP/fundWallet.php',
        type: 'GET',
        dataType: 'json', // Assuming your php script will return json format 
        success: function(response){
            // Check if the response is valid
            if(response && response.success){
                // Access the account details from the response
                var accountNumber = response.accountNumber;
                var accountName = response.accountName;
                var bankName = response.bankName;
                // var accountNumber = response.accountNumber;
                // Use the variables as needed (e.g., display in your HTML)
                $('#accNum').html(accountNumber);
                $('#accName').html(accountName);
                $('#bank').html(bankName);
            }else{
                alert('Error fetching account details')
            }
        },
        error: function(){
            window.location.href = './loginPage.php'
        }
    })
})