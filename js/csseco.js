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

    // ==================
    // Carousel next and prev thumb preview
    // ==================
    var carouselClass = '.csseco-carousel-thumb';
    $(document).on('click', carouselClass, function(){
        var id = $("#"+$(this).attr("id"));
        $(id).on('slid.bs.carousel', function(){
            csseco_get_bs_thumbs(id);
        });
    });
    $(document).on('mouseenter', carouselClass, function(){
        var id = $("#"+$(this).attr("id"));
        csseco_get_bs_thumbs(id);
    });
    function csseco_get_bs_thumbs( id ) {
        var prevThumb = $(id).find('.item.active').find('.prev-thumb-preview').data('image');
        $(id).find('.carousel-control.left').find('.preview-thumb').css('background-image', 'url('+prevThumb+')');
        var nextThumb = $(id).find('.item.active').find('.next-thumb-preview').data('image');
        $(id).find('.carousel-control.right').find('.preview-thumb').css('background-image', 'url('+nextThumb+')');
    }

    // ==================
    // Ajax functions (Load more posts)
    // ==================
    $(document).on('click', '.csseco_load_more:not(.load)', function () {
        var that = $(this);
        var page = that.data('page');
        var newPage = page+1;
        var ajaxurl = that.data('url');
        var prev = that.data('prev');
        var archive = that.data('archive');

        if( typeof prev === 'undefined' ) {
            prev = 0;
        }

        if( typeof archive === 'undefined') {
            archive = 0;
        }

        that.addClass( 'load' ).find('.text').text('Loading'); // add class load on the button
        that.find('i').addClass('fa-spin'); // add class fa-spin ont the i(fontawesome)

        $.ajax({
            url : ajaxurl,
            type : 'post',//method(post or get)
            data : {
                page : page,
                prev : prev,
                archive : archive,
                action : 'csseco_load_more'
            },
            error : function( response ){
                console.log(response);
            },
            success : function( response ){
                if( response == 0 ) {
                    $('.csseco-posts-container').append('<h3>No more posts to load.</h3>');
                    that.fadeOut(320).slideUp();
                } else {
                    setTimeout(function () {

                        if ( prev == 1 ) {
                            $('.csseco-posts-container').prepend( response );
                            newPage = page-1;
                            that.find('.text').text('Load Prev');
                        } else {
                            $('.csseco-posts-container').append( response );
                        }

                        if ( newPage == 1 ) {
                            that.fadeOut(320).slideUp();
                        } else  {
                            that.data('page', newPage);
                            that.removeClass( 'load' ).find('.text').text('Load More'); // remove class load on the button
                            that.find('i').removeClass('fa-spin'); // remove class fa-spin on the i(fontawesome)
                        }

                        revealPosts();
                    }, 600);
                }
            }
        });
    });

    // ==================
    // Scroll Functions
    // ==================
    var last_scroll = 0;
    $(window).scroll( function() {
        var scroll = $(window).scrollTop();
        if( Math.abs( scroll - last_scroll ) > $(window).height()*0.1 ){
            last_scroll = scroll;
            $('.page-limit').each(function( index ){
                if( isVisible( $(this) ) ) {
                    history.replaceState( null, null, $(this).attr("data-page") );
                    return(false);
                }
            });
        }
    } );

    // ==================
    // Helper Functions
    // ==================
    // Reveal Posts
    revealPosts(); // init
    function revealPosts() {
        //Bootstrap tooltip
        $('[data-toggle="tooltip"]').tooltip();
        //Bootstrap popover
        $('[data-toggle="popover"]').popover();

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
        }, 110);
    }
    // Check if posts are loaded and update url
    function isVisible( element ) {/* https://www.youtube.com/watch?v=IizweXL-RPY&feature=youtu.be&t=20m16s */
        var scroll_pos = $(window).scrollTop();
        var window_height = $(window).height();
        var el_top = $(element).offset().top;
        var el_height = $(element).height();
        var el_bottom = el_top + el_height;
        return( ( el_bottom - el_height*0.25 > scroll_pos ) && ( el_top < ( scroll_pos+0.5*window_height ) ) );
    }

});