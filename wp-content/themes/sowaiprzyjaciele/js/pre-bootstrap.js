"use strict";

$(document).ready(function() {
    //Implementacja rozwijalnych submenu w Bootstrapie, gdy JS jest obecny
    submenusDropdownsInit();
    //Adaptive sticky footer, gdy JS jest obecny
    stickyFooterInit();
});


function submenusDropdownsInit() {
    var submenus = $('ul.sub-menu');
    var submenusParents = submenus.closest('li');
    
    submenusParents.addClass('dropdown');
    
    submenusParents.each(function() {
        $(this).find('a').first()
            .attr('data-toggle', 'dropdown')
            .addClass('dropdown-toggle');
    });
    
    submenus.removeClass('sub-menu')
            .addClass('dropdown-menu')
            .attr('role', 'menu');
}


function stickyFooterInit() {
    $('#footer-wrapper').addClass('footer-wrapper-sticky');
    stickyFooterResized();
    $(window).resize(stickyFooterResized);
}
function stickyFooterResized() {
    $('body').css('margin-bottom', $('.footer-wrapper-sticky').css('height'));
}