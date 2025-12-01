$(document).ready(function(){
    $('#form-customer-bank-statement').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/bank-proof/new",
            data: new FormData(document.getElementById("form-customer-bank-statement")),
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
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#bank-statement-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#bank-statement-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-customer-billing-proof').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/billing-proof/new",
            data: new FormData(document.getElementById("form-customer-billing-proof")),
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
                $('#bill-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#bill-inprogress').show();
                console.log('Something Happened');
            }
        });
    });
});