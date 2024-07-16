$('document').ready(function(){
    $.ajax({
        url: './php/dataTransactions.php',
        type: 'GET',
        dataType: 'json', // Assuming your php script will return json format 
        success: function(response){
            // Check if the response is valid
            if(response && response.success){
                for (var i = 0; i < response.data_transactions.length; i++){
                    var userId = response.data_transactions[i].id; 
                    $('table').append(
                        '<tr>' +
                        '<td>'+response.data_transactions[i].id+'</td>' +
                        '<td>'+response.data_transactions[i].plan_network+'</td>' +
                        '<td>'+response.data_transactions[i].mobile_number+'</td>' +
                        '<td>'+response.data_transactions[i].plan+'</td>' +
                        '<td>'+response.data_transactions[i].status+'</td>' +
                        '<td>'+response.data_transactions[i].plan_name+'</td>' +
                        '<td>'+response.data_transactions[i].plan_amount+'</td>' +
                        '<td>'+response.data_transactions[i].create_date+'</td>' +
                        // '<td><i class="bi bi-trash delete-icon" data-id="'+ response.data_transactions[i].id +'"></i></td>' +
                        // '<td><i class="bi bi-pencil-square update-icon" data-id="'+ response.data_transactions[i].id +'"></i></td>' +
                        '</tr>'
                    )
                }
                // add event for delete icon
                $('.delete-icon').click(function(){
                    // confirm before deleting
                    if(confirm('Do you want to delete this user ?')){
                        deleteUserData(userId);
                    }
                })
            }
        },
        error: function(xhr, status, error){
            console.log("Error: " + xhr + status + error);
        }
    })
})