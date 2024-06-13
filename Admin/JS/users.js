$('document').ready(function(){
    $.ajax({
        url: './php/users.php',
        type: 'GET',
        dataType: 'json', // Assuming your php script will return json format 
        success: function(response){
            // Check if the response is valid
            if(response && response.success){
                for (var i = 0; i < response.users.length; i++){
                    var userId = response.users[i].id; 
                    $('table').append(
                        '<tr>' +
                        '<td>'+response.users[i].id+'</td>' +
                        '<td>'+response.users[i].fname+'</td>' +
                        '<td>'+response.users[i].lname+'</td>' +
                        '<td>'+response.users[i].username+'</td>' +
                        '<td>'+response.users[i].email+'</td>' +
                        '<td>'+response.users[i].phone+'</td>' +
                        '<td><i class="bi bi-trash delete-icon" data-id="'+ response.users[i].id +'"></i></td>' +
                        '<td><i class="bi bi-pencil-square update-icon" data-id="'+ response.users[i].id +'"></i></td>' +
                        '<td><i class="bi bi-pencil-square update-icon" data-id="'+ window.location.href +' = ../../users/RegistrationPage.php "></i></td>' +
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
            console.log("Error: " + status + error);
        }
    })

    function deleteUserData(userId){
        $.ajax({
            url: './php/deleteUsers.php',
            type: 'POST',
            dataType: 'json',
            data: {id:userId},
            success: function(response){
                if(response && response.success){
                    $('table').find('[data-id="'+ userId +'"]').closest('tr').remove();
                }
            }
        })
    }
})