var sliderIndex = 1;
var sliderReady = false;

var intervalId = window.setInterval(function(){
    if(sliderReady){
        if(sliderIndex < 4){
            sliderIndex++;
        }else{
            sliderIndex = 1;
        }

        $('.hero-slider').hide();
        $(`#slider-${sliderIndex}`).fadeIn();
        console.log('>> slider switch '+sliderIndex);
    }
}, 4000);

$(document).ready(function (){
    sliderReady = true;
});