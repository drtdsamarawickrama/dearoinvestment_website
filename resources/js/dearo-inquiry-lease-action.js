$(document).ready(function (){
    console.log('Lease action is ready');

    $('#form-lease-action-arrears-activate').submit(function(e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/dearo/inquiries/lease/application/arrears/activate",
            data: new FormData(document.getElementById("form-lease-action-arrears-activate")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#lease-action-arrears-activate-success-acknowledge').hide();
                $('#lease-action-arrears-activate-inprogress p').text('Updating ...');
                $('#lease-action-arrears-activate-inprogress').show();
            },
            success: function (response){
                location.reload();
                if(!response.error){
                    $('#lease-action-arrears-activate-inprogress').hide();
                    $('#lease-action-arrears-activate-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#lease-action-arrears-activate-inprogress p').text('Something happened. Please try again later.');
                $('#lease-action-arrears-activate-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-lease-action-arrears-deactivate').submit(function(e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/dearo/inquiries/lease/application/arrears/deactivate",
            data: new FormData(document.getElementById("form-lease-action-arrears-deactivate")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#lease-action-arrears-deactivate-success-acknowledge').hide();
                $('#lease-action-arrears-deactivate-inprogress p').text('Updating ...');
                $('#lease-action-arrears-deactivate-inprogress').show();
            },
            success: function (response){
                location.reload();
                if(!response.error){
                    $('#lease-action-arrears-deactivate-inprogress').hide();
                    $('#lease-action-arrears-deactivate-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#lease-action-arrears-deactivate-inprogress p').text('Something happened. Please try again later.');
                $('#lease-action-arrears-deactivate-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-lease-action-vehicle-missing-activate').submit(function(e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/dearo/inquiries/lease/application/vehicle-missing/activate",
            data: new FormData(document.getElementById("form-lease-action-vehicle-missing-activate")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#lease-action-vehicle-missing-activate-success-acknowledge').hide();
                $('#lease-action-vehicle-missing-activate-inprogress p').text('Saving ...');
                $('#lease-action-vehicle-missing-activate-inprogress').show();
            },
            success: function (response){
                location.reload();
                if(!response.error){
                    $('#lease-action-vehicle-missing-activate-inprogress').hide();
                    $('#lease-action-vehicle-missing-activate-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#lease-action-vehicle-missing-activate-inprogress p').text('Something happened. Please try again later.');
                $('#lease-action-vehicle-missing-activate-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    $('#form-lease-action-vehicle-missing-deactivate').submit(function(e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/dearo/inquiries/lease/application/vehicle-missing/deactivate",
            data: new FormData(document.getElementById("form-lease-action-vehicle-missing-deactivate")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#lease-action-vehicle-missing-deactivate-success-acknowledge').hide();
                $('#lease-action-vehicle-missing-deactivate-inprogress p').text('Saving ...');
                $('#lease-action-vehicle-missing-deactivate-inprogress').show();
            },
            success: function (response){
                location.reload();
                if(!response.error){
                    $('#lease-action-vehicle-missing-deactivate-inprogress').hide();
                    $('#lease-action-vehicle-missing-deactivate-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#lease-action-vehicle-missing-deactivate-inprogress p').text('Something happened. Please try again later.');
                $('#lease-action-vehicle-missing-deactivate-inprogress').show();
                console.log('Something Happened');
            }
        });
    });
});