$(document).ready(function (){
    var isAccountChecked = false;
    var isMobileAvailable = false;
    var isLogged = false;
    if($('#input_is_logged').val() == '1'){
        isLogged = true;
    }

    $('#new_inquiry_input_mobile').keyup(function(){
        let mobileInput = $(this).val();
        var mobileValidation = new RegExp('^[0-9]{10}$');

        if (mobileValidation.test(mobileInput)) {
            console.log('digits only passed');
            $('.non-mobile').show();
            $('#msg-existing-user').hide();
            $('#msg-mobile-validation').html('*');
        }else{
            console.log('digits only failed');
            $('#msg-mobile-validation').html('* Provide your mobile in 10 digits');
        }
    });

    $('#new_inquiry_input_mobile').focusout(function(){
        let mobileInput = $(this).val();
        var mobileValidation = new RegExp('^[0-9]{10}$');

        if (mobileValidation.test(mobileInput)) {
            console.log('mobile passed');
            // Check for availability
            $.ajax({
                method: "GET",
                url: "/inquiry/customer-profile/check/"+mobileInput,
                success: function (response){
                    isAccountChecked = true; 
                    if(response.error == 0){
                        if(response.mobile_available == 1){
                            isMobileAvailable = true;
                            $('#btn-make-inquiry').show();
                            $('#msg-existing-user').hide();
                        }else{
                            $('#btn-make-inquiry').hide();
                            $('.non-mobile').hide();
                            $('#msg-existing-user').show();
                            $('#msg-mobile-validation').html('* Mobile number is not available');
                        }
                        console.log('>> '+ response.message+' availability: '+isMobileAvailable);  
                    }else{
                        console.log('>> '+ response.message); 
                        $('#btn-make-inquiry').hide();
                        $('.non-mobile').hide();
                        $('#msg-existing-user').show();
                    }
                },
                error: function (msg){
                    console.log('some error in ajax');
                    $('#btn-make-inquiry').hide();
                    $('.non-mobile').hide();
                    $('#msg-existing-user').show();
                }
            });
        }else{
            console.log('mobile failed');
        }
    });

    $('#form-make-inquiry').submit(function (e){
        if(isAccountChecked && isMobileAvailable || isLogged){
            
        }else{
            $('#msg-mobile-validation').html('* Mobile number is not available');
            e.preventDefault();
        }
    });

    $('#form-customer-profile-details').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/customer-profile/profile-details",
            data: new FormData(document.getElementById("form-customer-profile-details")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                // $('#vehicle-front-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#profile-essentials-inprogress').hide();
                    $('#profile-essentials-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#profile-essentials-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#profile-essentials-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-lease-nic-photo-front').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/customer-profile/nic",
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
            url: "/inquiries/customer-profile/nic",
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