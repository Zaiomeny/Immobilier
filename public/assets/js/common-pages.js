"use strict";
$(document).ready(function() {
    // $('.theme-loader').addClass('loaded');
    $('.theme-loader').animate({
        'opacity': '0',
    }, 12);
    setTimeout(function() {
        $('.theme-loader').remove();
    }, 20);
    // $('.pcoded').addClass('loaded');
});
