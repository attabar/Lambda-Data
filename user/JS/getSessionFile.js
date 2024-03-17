$('document').ready(function(){
    $.ajax({
        url: './PHP/session.php',
        type: 'GET',
        dataType: 'json',
        success: function(response){
            if(response && response.success){
                $('#username').html(response.username);
            }
        }
    })
})