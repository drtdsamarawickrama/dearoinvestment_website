$(document).ready(function(){
    $('#form-guarantor-details').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/guarantor/new",
            data: new FormData(document.getElementById("form-guarantor-details")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#guarantor-details-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#guarantor-details-inprogress').hide();
                    $('#guarantor-details-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#guarantor-details-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#guarantor-details-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-gurantor-bank-statment').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/guarantor/bank-proof/new",
            data: new FormData(document.getElementById("form-gurantor-bank-statment")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#bank-statement-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#bank-statement-inprogress').hide();
                    $('#bank-statement-success-acknowledge').show();
                    if(!response.is_bankproof_provided){
                        $('#statement-message').text(response.missing_statments_message);
                    }else{
                        $('#statement-message').hidden();
                    }
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#bank-statement-inprogress').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#bank-statement-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-guarantor-billing-proof').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/guarantor/billing-proof/new",
            data: new FormData(document.getElementById("form-guarantor-billing-proof")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#bill-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#bill-inprogress').hide();
                    $('#bill-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#bill-inprogress').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#bill-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-lease-nic-photo-front').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/guarantor/nic",
            data: new FormData(document.getElementById("form-lease-nic-photo-front")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#nic-front-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#nic-front-inprogress').hide();
                    $('#nic-front-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#nic-front-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#nic-front-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-lease-nic-photo-back').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/guarantor/nic",
            data: new FormData(document.getElementById("form-lease-nic-photo-back")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#nic-back-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#nic-back-inprogress').hide();
                    $('#nic-back-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#nic-back-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#nic-back-inprogress').show();
                console.log('Something Happened');
            }
        });
    });
});