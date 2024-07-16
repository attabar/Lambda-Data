$('document').ready(function(){
    $.ajax({
        url: './php/dataPrice.php',
        type: 'GET',
        dataType: 'json', // Assuming your php script will return json format 
        success: function(response){
            // Check if the response is valid
            if(response && response.success){
                for (var i = 0; i < response.data_price.length; i++){
                    var userId = response.data_price[i].id; 
                    $('table').append(
                        '<tr>' +
                        '<td>'+response.data_price[i].id+'</td>' +
                        '<td>'+response.data_price[i].data_id+'</td>' +
                        '<td>'+response.data_price[i].network_id+'</td>' +
                        '<td>'+response.data_price[i].plan_type+'</td>' +
                        '<td>'+response.data_price[i].price+'</td>' +
                        '<td>'+response.data_price[i].selling_price+'</td>' +
                        '<td>'+response.data_price[i].data_type+'</td>' +
                        '<td>'+response.data_price[i].validity+'</td>' +
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