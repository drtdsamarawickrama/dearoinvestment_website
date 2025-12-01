$(document).ready(function (){
    console.log('js is ready to create blogs');

    // Create Contents
    $('#btn-show-add-title').click(function (){
        $('#div-edit-content').hide();
        $('#div-create-content').show();
        $('.div-form-add-content').hide();
        $('#div-form-add-title').show();
    });

    $('#btn-show-add-para').click(function (){
        $('#div-edit-content').hide();
        $('#div-create-content').show();
        $('.div-form-add-content').hide();
        $('#div-form-add-para').show();
    });

    $('#btn-show-add-list-bulleted').click(function (){
        $('#div-edit-content').hide();
        $('#div-create-content').show();
        $('.div-form-add-content').hide();
        $('#div-form-add-list-bulleted').show();
    });

    $('#btn-show-add-list-numbered').click(function (){
        $('#div-edit-content').hide();
        $('#div-create-content').show();
        $('.div-form-add-content').hide();
        $('#div-form-add-list-numbered').show();
    });

    $('#btn-show-add-image').click(function (){
        $('#div-edit-content').hide();
        $('#div-create-content').show();
        $('.div-form-add-content').hide();
        $('#div-form-add-image').show();
    });

    $('#btn-show-add-pdf').click(function (){
        $('#div-edit-content').hide();
        $('#div-create-content').show();
        $('.div-form-add-content').hide();
        $('#div-form-add-pdf').show();
    });

    // Update Contents
    $('.form-title-data-holder').submit(function (e){
        e.preventDefault();
        $('#div-create-content').hide();
        $('#div-edit-content').show();
        $('.div-form-edit-content').hide();
        $('#div-form-edit-title').show();

        var contentElementId = $(this).find('#element_id').val();
        var contentJson = jQuery.parseJSON($(this).find('#content_json').val());
        
        $('#div-form-edit-title').find('#content_id').val(contentElementId);
        $('#div-form-edit-title').find('#title').val(contentJson.title);

        $('html, body').animate({
            scrollTop: $("#div-edit-content").offset().top
        }, 1000);
    });

    $('.form-para-data-holder').submit(function (e){
        e.preventDefault();
        $('#div-create-content').hide();
        $('#div-edit-content').show();
        $('.div-form-edit-content').hide();
        $('#div-form-edit-para').show();

        var contentElementId = $(this).find('#element_id').val();
        var contentJson = jQuery.parseJSON($(this).find('#content_json').val());
        
        $('#div-form-edit-para').find('#content_id').val(contentElementId);
        $('#div-form-edit-para').find('#para').val(contentJson.paragraph);

        $('html, body').animate({
            scrollTop: $("#div-edit-content").offset().top
        }, 1000);
    });

    $('.form-list-bullet-data-holder').submit(function (e){
        e.preventDefault();
        $('#div-create-content').hide();
        $('#div-edit-content').show();
        $('.div-form-edit-content').hide();
        $('#div-form-edit-list-bulleted').show();

        var contentElementId = $(this).find('#element_id').val();
        var contentJson = jQuery.parseJSON($(this).find('#content_json').val());
        var bulletItems = "";
        for(var i in contentJson.list_items) {
            bulletItems += contentJson.list_items[i];

            if(i < (contentJson.list_items.length-1)){
                bulletItems += "\n";
            }
        }
        
        $('#div-form-edit-list-bulleted').find('#content_id').val(contentElementId);
        $('#div-form-edit-list-bulleted').find('#list_bulleted').val(bulletItems);

        $('html, body').animate({
            scrollTop: $("#div-edit-content").offset().top
        }, 1000);
    });

    $('.form-list-numbered-data-holder').submit(function (e){
        e.preventDefault();
        $('#div-create-content').hide();
        $('#div-edit-content').show();
        $('.div-form-edit-content').hide();
        $('#div-form-edit-list-numbered').show();

        var contentElementId = $(this).find('#element_id').val();
        var contentJson = jQuery.parseJSON($(this).find('#content_json').val());
        var bulletItems = "";
        for(var i in contentJson.list_items) {
            bulletItems += contentJson.list_items[i];

            if(i < (contentJson.list_items.length-1)){
                bulletItems += "\n";
            }
        }
        
        $('#div-form-edit-list-numbered').find('#content_id').val(contentElementId);
        $('#div-form-edit-list-numbered').find('#list_numbered').val(bulletItems);

        $('html, body').animate({
            scrollTop: $("#div-edit-content").offset().top
        }, 1000);
    });

    $('.form-image-data-holder').submit(function (e){
        e.preventDefault();
        $('#div-create-content').hide();
        $('#div-edit-content').show();
        $('.div-form-edit-content').hide();
        $('#div-form-edit-image').show();

        var contentElementId = $(this).find('#element_id').val();
        var contentJson = jQuery.parseJSON($(this).find('#content_json').val());
        
        $('#div-form-edit-image').find('#content_id').val(contentElementId);
        $('#div-form-edit-image').find('#image_title').val(contentJson.title);

        $('html, body').animate({
            scrollTop: $("#div-edit-content").offset().top
        }, 1000);
    });

    $('.form-pdf-data-holder').submit(function (e){
        e.preventDefault();
        $('#div-create-content').hide();
        $('#div-edit-content').show();
        $('.div-form-edit-content').hide();
        $('#div-form-edit-pdf').show();

        var contentElementId = $(this).find('#element_id').val();
        var contentJson = jQuery.parseJSON($(this).find('#content_json').val());
        
        $('#div-form-edit-pdf').find('#content_id').val(contentElementId);
        $('#div-form-edit-pdf').find('#pdf_title').val(contentJson.title);

        $('html, body').animate({
            scrollTop: $("#div-edit-content").offset().top
        }, 1000);
    });
});