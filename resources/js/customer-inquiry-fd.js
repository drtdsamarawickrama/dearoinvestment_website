$(document).ready(function(){
    $('#form-fd-essentials').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/fd-detials/essentials",
            data: new FormData(document.getElementById("form-fd-essentials")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#fd-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#fd-inprogress').hide();
                    $('#fd-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#fd-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#fd-inprogress').show();
                console.log('Something Happened');
            }
        });
    });
});