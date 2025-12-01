const mobileHeader1 = document.querySelector('#mobile-header-1');
const mobileHeader2 = document.querySelector('#mobile-header-2');

function onToggleMenu(e){
    if(e.name === 'menu'){
        $('#mobile-header-1').show();
        $('#mobile-header-2').show();
        e.name = 'close';
    }else{
        $('#mobile-header-1').hide();
        $('#mobile-header-2').hide();
        e.name = 'menu';
    }
}

function showExpandableMenu(subMenuId){
    console.log('Showing sub menu '+subMenuId);
    hideExpandableMenus();
    $('#'+subMenuId).show();
}

function hideExpandableMenus(){
    console.log('Hiding all sub menus');
    $('#expanding-menu-personal-banking').hide();
    $('#expanding-menu-business-banking').hide();
    $('#expanding-menu-loans').hide();
    $('#expanding-menu-investments').hide();
    $('#expanding-menu-subsidiaries').hide();
}

// Mobile Menu

function showExpandableMobileMenu(subMenuId, e){
    console.log('Showing sub menu '+subMenuId);
    $('.mobile-exp-link').each(function () {
        $(this).hide();
    });
    $(e).show();
    $('#'+subMenuId).show();
}

function hideExpandableMobileSubMenus(){
    $('#mobile-exp-menu-pb').hide();
}

function closeMobileSubMenu(subMenuId){
    $('#'+subMenuId).hide();
    $('.mobile-exp-link').each(function () {
        $(this).show();
    });
}