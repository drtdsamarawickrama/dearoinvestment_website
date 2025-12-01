var jewellerySelected = {
    jewellery_types: []
};

$(document).ready(function(){
    console.log('Admin-pawning is ready');
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

        renderSelectedJewellery();
    }
});

function renderSelectedJewellery(){
    $('#div-jewellery-chip-holder').empty();
    jewellerySelected.jewellery_types.forEach(function (type, index) {
        console.log(type.name, index);
        var chip = `<div id="chip-`+type.id+`" class="flex items-center justify-start bg-theme-orange text-theme-gray px-2 py-2"><div>${type.name} - ${type.count}</div></div>`;

        $('#div-jewellery-chip-holder').append(chip);
    });
}