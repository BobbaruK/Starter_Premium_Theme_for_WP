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
    //$('select').addClass('form-control'); // add form-control(bootstrap) class on all select elements on the site
    //$('table').addClass('table'); // add table(bootstrap) class on all table elements on the site

    // ==================
    // Carousel next and prev thumb preview
    // ==================
    var carousel = '.csseco-carousel-thumb';
    csseco_get_bs_thumbs(carousel);
    $(carousel).on('slid.bs.carousel', function () {
        csseco_get_bs_thumbs(carousel);
    });
    function csseco_get_bs_thumbs( carousel ) {
        $(carousel).each(function () {
            var prevThumb = $(this).find('.item.active').find('.prev-thumb-preview').data('image');
            $(this).find('.carousel-control.left').find('.preview-thumb').css('background-image', 'url('+prevThumb+')');
            var nextThumb = $(this).find('.item.active').find('.next-thumb-preview').data('image');
            $(this).find('.carousel-control.right').find('.preview-thumb').css('background-image', 'url('+nextThumb+')');
        });
    }

    // ==================
    // Ajax functions (Load more posts)
    // ==================
    $(document).on('click', '.csseco_load_more:not(.load)', function () {
        var that = $(this);
        var page = that.data('page');
        var newPage = page+1;
        var ajaxurl = that.data('url');

        that.addClass( 'load' ).find('.text').text('Loading'); // add class load on the button
        that.find('i').addClass('fa-spin'); // add class fa-spin ont the i(fontawesome)

        $.ajax({
            url : ajaxurl,
            type : 'post',//method(post or get)
            data : {
                page : page,
                action : 'csseco_load_more'
            },
            error : function( response ){
                console.log(response);
            },
            success : function( response ){
                setTimeout(function () {
                    that.data('page', newPage);
                    $('.csseco-posts-container').append( response );
                    that.removeClass( 'load' ).find('.text').text('Load More'); // remove class load on the button
                    that.find('i').removeClass('fa-spin'); // remove class fa-spin on the i(fontawesome)
                    revealPosts();
                    csseco_restart_bs();
                }, 600);
            }
        });
    });

    /**
     * Helper Functions
     */
    // Reveal Posts
    revealPosts();
    function revealPosts() {
        var posts = $('.csseco-posts-container article:not(.reveal)');
        var i = 0;
        setInterval(function(){
            if( i>= posts.length ) {
                return false;
            } else {
                var el = posts[i];
                $(el).addClass('reveal');
                i++;
            }
        }, 400);
    }
    // Force start carousel on loaded posts
    function csseco_restart_bs() {
        $('.csseco-carousel-thumb').carousel();
        csseco_get_bs_thumbs(carousel);
        $(carousel).on('slid.bs.carousel', function () {
            csseco_get_bs_thumbs(carousel);
        });
    }

});