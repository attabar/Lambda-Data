$(document).ready(function(){
    $.ajax({
        url:'./PHP/transaction.php',
        type:'POST',
        dataType:'json',
        success: function(response){
            if(response && response.success){
                for (var i = 0; i < response.history.length; i++){
                    $('table').append(
                        '<tr>' +
                        '<td>' + response.history[i].id + '</td>' +
                        '<td>' + response.history[i].transaction_id+'</td>' +
                        '<td>' + response.history[i].plan_network + '</td>' +
                        '<td>' + response.history[i].mobile_number + '</td>' +
                        '<td>' + response.history[i].plan+'</td>' +
                        '<td>' + response.history[i].status + '</td>' +
                        '<td>' + response.history[i].plan_name + '</td>' +
                        '<td>' + response.history[i].plan_amount+'</td>' +
                        '<td>' + response.history[i].create_date + '</td>' +
                        '</tr>'
                    )
                }
            }
        },
        error: function(xhr, status, error){
            console.log("AJAX ERROR: ", status, error);
        }
    })
})