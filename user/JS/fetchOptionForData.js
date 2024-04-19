$('document').ready(function(e){
    
    var network = $("#network");
    var dataType = $("#plan_id");
    
   
    // function for network changing to append data plan and data type
    $("#network").on('change', function(e){
        e.preventDefault();
        var networkName = $(this).find(":selected").val();
        $.ajax({
            url: './PHP/fetchOptionForData.php',
            type: 'POST',
            dataType: 'json',
            data: {network:networkName},
            success: function(response){
                if(response && response.success && networkName === '1'){
                    dataType.find('option:not(:first)').remove();
                    for(var i = 0; i < response.mtn.length; i++){
                        dataType.append('<option value="'+response.mtn[i].mtn_data_id+'">'+response.mtn[i].mtn_plan_type +' '+response.mtn[i].mtn_data_type+'  -  '+response.mtn[i].mtn_validity+'</option>')
                    }
                }else if(response && response.success && networkName === '3'){
                    dataType.find('option:not(:first)').remove();
                    for(var i = 0; i < response.airtel.length; i++){
                        dataType.append('<option value="'+response.airtel[i].airtel_data_id+'">'+response.airtel[i].airtel_plan_type+ ' '+response.airtel[i].airtel_data_type+'  -  '+response.airtel[i].airtel_validity+'</option>');
                    }
                }else if(response && response.success && networkName === '2'){
                    dataType.find('option:not(:first)').remove();
                    for(var i = 0; i < response.glo.length; i++){
                        dataType.append('<option value="'+response.glo[i].glo_data_id+'">'+response.glo[i].glo_plan_type+ ' '+response.glo[i].glo_data_type+'  -  '+response.glo[i].glo_validity+'</option>')
                    }
                }else if(response && response.success && networkName === '6'){
                    dataType.find('option:not(:first)').remove();
                    for(var i = 0; i < response.nineMobile.length; i++){
                        dataType.append('<option value="'+response.nineMobile[i].nineMobile_data_id+'">'+response.nineMobile[i].nineMobile_plan_type+ ' '+response.nineMobile[i].nineMobile_data_type+'  -  '+response.nineMobile[i].nineMobile_validity+'</option>')
                    }
                }
            },
            error: function(xhr, status, error){
                console.log("AJAX ERROR: ", status, error);
            }
        });   
    })
    network.trigger('change');

    dataType.on('change', function(e){
        e.preventDefault();
        var plan_type = $(this).find(":selected").val();
        var data_plan = $("#data_type");
        var amount = $('#amount');

        $.ajax({
            url: './PHP/fetchOptionForData2.php',
            type: 'POST',
            dataType: 'json',
            data: {dataType:plan_type},
            success: function(response){
                console.log(response);
                if(response && response.success){
                    if(response.fetchPrice.length > 0 && response.fetchDataType.length > 0){
                        data_plan.val(response.fetchDataType)
                        amount.val(response.fetchPrice)
                    }
                }else{
                    console.error(response.fetch);
                }
            },
            error: function(xhr,status,error){
                console.log("Error: ", error)
            }
        })
    })
    // dataType.trigger('change');


    $("#dataForm").submit(function(e){
        e.preventDefault();

        // Add the selected options to the FormData
        var selectedNetwork = $("#network").find(":selected").val();
        var selectedDataType = $("#plan_id").find(":selected").val();
        var formData = new FormData(this); 
        formData.append("network", selectedNetwork);
        formData.append("plan_id", selectedDataType);
        var amount = $("#amount").val();
        $.ajax({
            url: './PHP/buyData.php',
            type: "POST", 
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                if(response.success && response.status === 'successful'){
                    Swal.fire({
                        icon: 'success',
                        title: response.status,
                        text: response.message,
                        confirmButtonText: "OK"
                    });
                }else if(response.success && response.status === 'failed'){
                    Swal.fire({
                        icon: 'error',
                        title: response.status,
                        text: response.message,
                        confirmButtonText: "OK"
                    });
                }else if(parseFloat(amount) > parseFloat(response.settlement_amount)){
                    // alert(response.message);
                    Swal.fire({
                            icon:'error',
                            title: response.title,
                            text: response.message,
                            confirmButtonText: "OK"
                        });
                    }
                
            },
            error: function(xhr, status, error){
                console.log(error,status);
                console.log(xhr.responseText)
            }
        })
    })
})