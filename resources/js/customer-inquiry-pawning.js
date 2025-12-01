var jewellerySelected = {
    jewellery_types: []
};

$(document).ready(function(){
    console.log('Gold loan js is loaded.');

    $('#btn-add-jewellery').click(function (){
        var jewelleryType = $('#input-jewellery-type').find(":selected").val();
        var jewelleryCount = $('#input-jewellery-count').val();

        if(jewelleryCount > 0 && jewelleryType != null){
            jewellerySelected.jewellery_types.push({
                "id" : Math.floor(Math.random() * 26) + Date.now(), 
                "name" : jewelleryType,
                "count"  : jewelleryCount,
            });
            console.log(`Type is ${jewelleryType} count is ${jewelleryCount}`);

            $('#pawning_essentials_jewellery_details').val(JSON.stringify(jewellerySelected));
            renderSelectedJewellery();
        }
    });

    $('.btn-delete-jewellery-type').click(function(){
        console.log('deletion detected');
        var index = $(this).attr('data_index');
        jewellerySelected.jewellery_types.splice(index, 1);

        $('#pawning_essentials_jewellery_details').val(JSON.stringify(jewellerySelected));
        renderSelectedJewellery();
    });

    $('input[name="pawn_status"]').click(function (){
        console.log(`radio ${ $(this).val()}`);
        if($(this).val() == 'true'){
            $('#div-pawning-receipt').fadeIn();
        }else{
            $('#div-pawning-receipt').fadeOut();
        }
    });

    $('#form-pawning-jewelry-details').submit(function (e){
        e.preventDefault();
        if(jewellerySelected.jewellery_types.length > 0){
            $('#pawning_essentials_jewellery_details').val(JSON.stringify(jewellerySelected));
            $.ajax({
                method: "POST",
                url: "/inquiries/pawning-details/essentials",
                data: new FormData(document.getElementById("form-pawning-jewelry-details")),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function() {
                    $('#pawning-success-acknowledge').hide();
                    $('#pawning-inprogress p').text('Saving ...');
                    $('#pawning-inprogress').show();
                },
                success: function (response){
                    if(!response.error){
                        $('#pawning-inprogress').hide();
                        $('#pawning-success-acknowledge').show();
                    }else{
                        
                    }
                    console.log('Error status: '+response.error+' Message: '+response.message);
                },
                error: function (response){
                    $('#pawning-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                    $('#pawning-inprogress').show();
                    console.log('Something Happened');
                }
            });
        }else{
            $('#pawning-inprogress p').text('Jewelleries and quantities required');
            $('#pawning-inprogress').show();
        }
    });

    $('#form-pawning-receipt').submit(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/inquiries/pawning-details/receipt/new",
            data: new FormData(document.getElementById("form-pawning-receipt")),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#receipt-inprogress').show();
            },
            success: function (response){
                if(!response.error){
                    $('#receipt-inprogress').hide();
                    $('#receipt-success-acknowledge').show();
                }else{
                    
                }
                console.log('Error status: '+response.error+' Message: '+response.message);
            },
            error: function (response){
                $('#receipt-inprogress p').text('Please select an image format-jpg,png,jpeg-less than 8 mb.');
                $('#receipt-inprogress').show();
                console.log('Something Happened');
            }
        });
    });

    // Render Saved Jewelleris on load
    var savedJewelleryString = $('#initial_jewellery_list').val();
    if(savedJewelleryString != 'NA'){
        var savedJewelleries = JSON.parse(savedJewelleryString);

        savedJewelleries.forEach(function (type, index) {
            jewellerySelected.jewellery_types.push({
                "id" : Math.floor(Math.random() * 26) + Date.now(), 
                "name" : type.description,
                "count"  : type.jewellery_count,
            });
        });

        $('#pawning_essentials_jewellery_details').val(JSON.stringify(jewellerySelected));
        renderSelectedJewellery();
    }
});

function renderSelectedJewellery(){
    $('#div-jewellery-chip-holder').empty();
    jewellerySelected.jewellery_types.forEach(function (type, index) {
        console.log(type.name, index);
        var chip = `<div id="chip-`+type.id+`" class="flex items-center justify-start bg-theme-orange text-theme-gray px-2 py-2"><div>${type.name} - ${type.count}</div><button class="btn-delete-jewellery-type w-6 h-6 bg-theme-gray flex items-center justify-center text-white text-center ml-4" data_index="`+index+`">x</button></div>`;

        $('#div-jewellery-chip-holder').append(chip);
    });
}

$(document).on('click', '.btn-delete-jewellery-type', function(){ 
    console.log('deletion detected');
    var index = $(this).attr('data_index');
    jewellerySelected.jewellery_types.splice(index, 1);

    renderSelectedJewellery();
});