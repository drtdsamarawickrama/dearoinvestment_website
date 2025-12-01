$(document).ready(function (){
    console.log('vehicle lease inquiry is ready');
    $('#vehicle_register_state').change(function (){
        let registrationStatus = $(this).val();
        console.log(">> "+registrationStatus);
        if($(this).val() == 'NOT-REGISTERED'){
            $('#div_vehicle_registered_number').hide();
            $('#div_registered_year').hide();
            $('#div_vehicle_registered_certificate').hide();
        }else{
            $('#div_vehicle_registered_number').show();
            $('#div_registered_year').show();
            $('#div_vehicle_registered_certificate').show();
        }
    });

    $('#form-lease-vehicle-essentials').submit(function (e){
        e.preventDefault();
        var inquiryId = $('#vehicle_essentials_inquiry_id').val();
        console.log('>> inquiry id '+inquiryId);
        $.ajax({
            method: "POST",
            url: "/inquiries/vehicle-detials/essentials",
            data: {
                "_token": $(this).find('[name="_token"]').val(),
                "inquiry_id": inquiryId,
                "vehicle_register_state": $('#vehicle_register_state').val(),
                "vehicle_registered_number": $('#vehicle_registered_number').val(),
                "registered_year": $('#registered_year').val(),
                "vehicle_make": $('#vehicle_make').val(),
                "vehicle_model": $('#vehicle_model').val(),
                "manufactured_year": $('#manufactured_year').val(),
                "meter_reading": $('#meter_reading').val(),
                "chassis_number": $('#chassis_number').val(),
                "engine_number": $('#engine_number').val(),
                "customer_nic": $('#customer_nic').val(),
                "engine_capacity": $('#engine_capacity').val(),
                "seating_capacity": $('#seating_capacity').val(),
            },
            beforeSend: function() {
                $('#vehicle-essentials-inprogress').show();
            },
            success: function (response){
                console.log('Error status: '+response.error+' Message: '+response.message);
                if(response.error == 0){
                    $('#vehicle-essentials-inprogress').hide();
                    $('#vehicle-essentials-success-acknowledge').show();
                }else{
                    console.log(+response.message);
                }
            },
            error: function (response){
                $('#vehicle-essentials-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#vehicle-essentials-inprogress').show();
                console.log("Got an error: "+response.error);
            }
        });
    });

    $('#form-lease-vehicle-photo-front').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/vehicle-detials/photo",
            data: new FormData(document.getElementById("form-lease-vehicle-photo-front")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#vehicle-front-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#vehicle-front-inprogress').hide();
                    $('#vehicle-front-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#vehicle-front-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#vehicle-front-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-lease-vehicle-photo-rear').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/vehicle-detials/photo",
            data: new FormData(document.getElementById("form-lease-vehicle-photo-rear")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#vehicle-rear-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#vehicle-rear-inprogress').hide();
                    $('#vehicle-rear-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#vehicle-rear-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#vehicle-rear-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-lease-vehicle-photo-left').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/vehicle-detials/photo",
            data: new FormData(document.getElementById("form-lease-vehicle-photo-left")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#vehicle-left-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#vehicle-left-inprogress').hide();
                    $('#vehicle-left-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#vehicle-left-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#vehicle-left-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-lease-vehicle-photo-right').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/vehicle-detials/photo",
            data: new FormData(document.getElementById("form-lease-vehicle-photo-right")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#vehicle-right-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#vehicle-right-inprogress').hide();
                    $('#vehicle-right-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#vehicle-right-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#vehicle-right-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-lease-vehicle-photo-engine').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/vehicle-detials/photo",
            data: new FormData(document.getElementById("form-lease-vehicle-photo-engine")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#vehicle-engine-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#vehicle-engine-inprogress').hide();
                    $('#vehicle-engine-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#vehicle-engine-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#vehicle-engine-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-lease-vehicle-photo-chassis').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/vehicle-detials/photo",
            data: new FormData(document.getElementById("form-lease-vehicle-photo-chassis")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#vehicle-chassis-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#vehicle-chassis-inprogress').hide();
                    $('#vehicle-chassis-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#vehicle-chassis-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#vehicle-chassis-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-lease-vehicle-photo-meter').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/vehicle-detials/photo",
            data: new FormData(document.getElementById("form-lease-vehicle-photo-meter")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#vehicle-meter-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#vehicle-meter-inprogress').hide();
                    $('#vehicle-meter-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#vehicle-meter-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#vehicle-meter-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-lease-vehicle-photo-reg-certificate').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/vehicle-detials/photo",
            data: new FormData(document.getElementById("form-lease-vehicle-photo-reg-certificate")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#vehicle-reg-certificate-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#vehicle-reg-certificate-inprogress').hide();
                    $('#vehicle-reg-certificate-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#vehicle-reg-certificate-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#vehicle-reg-certificate-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-lease-vehicle-photo-lessee').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/vehicle-detials/photo",
            data: new FormData(document.getElementById("form-lease-vehicle-photo-lessee")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#vehicle-lessee-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#vehicle-lessee-inprogress').hide();
                    $('#vehicle-lessee-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#vehicle-lessee-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#vehicle-lessee-inprogress').show();
                console.log('Something Happened');
            }
        });
    });
});