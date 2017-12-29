/**
 * @package CSSecoThemes
 * csseco.js
 */
jQuery(document).ready(function ($) {

    // ==================
    // CSSeco Header menu
    // ==================
    var menuCSSecoWP = $('nav.header_menu'),
        // menuCSSecoWPa = $('nav#cssecoMenu li:not(.menu-item-has-children) a'),
        mnuClkSelect = $('nav#cssecoMenu li.menu-item-has-children > a');

    //mnuClkSelect.parent('.menu-item-has-children').prepend('<span class="csseco_menu_dbclck">2<span class="glyphicon glyphicon-hand-down" aria-hidden="true"></span></span>'); //glyphicon glyphicon-hand-down => bootstrap class
    mnuClkSelect.click(function(e) {
        e.preventDefault();
        var $this = $(this);
        if ($this.hasClass('clicked')){
            $this.removeClass('clicked');
            // console.log("Double click");
            var link = $this.attr('href');
            setTimeout(function(){
                window.location.replace(link);
            }, 300);
        } else {
            $this.addClass('clicked');
            setTimeout(function() {
                if ($this.hasClass('clicked')){
                    $this.removeClass('clicked');
                    // console.log("Just one click!");
                    $this.parent('.menu-item-has-children').toggleClass('opened');
                    $this.parent('.menu-item-has-children').siblings().removeClass('opened');
                    $this.parent('.menu-item-has-children').siblings().find('.menu-item-has-children').removeClass('opened');
                    $this.parent('.menu-item-has-children').find('.menu-item-has-children').removeClass('opened');
                }
            }, 300);
        }
    });
    // Menu on smaller screens
    menuCSSecoWP.prepend('<i class="csseco_menu_burger fa fa-bars" aria-hidden="true"></i>');
    var menuCSSecoBurger = $('.csseco_menu_burger');
    menuCSSecoBurger.click(function(){
        menuCSSecoWP.find('ul.menu').slideToggle();
        menuCSSecoWP.find('.menu-item-has-children').removeClass('opened');
    });

    // ==================
    // Add bootstrap classes on different elements in the DOM
    // ==================
    $('img').addClass('img-responsive'); // add img-responsive(bootstrap) to all images
    $('select').addClass('form-control'); // add form-control(bootstrap) class on all select elements on the site
    $('table').addClass('table'); // add table(bootstrap) class on all table elements on the site

});