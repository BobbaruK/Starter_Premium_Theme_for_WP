/**
 * @package CSSecoThemes
 * csseco.autoload-init.js
 */
jQuery(document).ready(function ($) {

    $(window).scroll( function() {
        if($(window).scrollTop() + $(window).height() >= $('#main').height()){ //scrolled to bottom of #main
            $('.csseco-load-next').find('.csseco_load_more').trigger('click');
        }
    } );

});