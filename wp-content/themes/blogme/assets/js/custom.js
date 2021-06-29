jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader                  = $('#loader');
    var loader_container        = $('#preloader');
    var scroll                  = $(window).scrollTop();  
    var scrollup                = $('.backtotop');
    var primary_menu_toggle     = $('#masthead .menu-toggle');
    var top_menu_toggle         = $('#top-navigation .menu-toggle');
    var dropdown_toggle         = $('button.dropdown-toggle');
    var primary_nav_menu        = $('#masthead .main-navigation');
    var top_nav_menu            = $('#top-navigation .main-navigation');
    var thumbnail_wrapper       = $('.thumbnail-wrapper');
    var editor_wrapper          = $('.editor-wrapper');
    var travel_slider           = $('.travel-slider');
    var featured_slider          = $('#featured-slider');


/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");
    
/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/
    
    $(window).scroll(function() {
       

        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    primary_menu_toggle.click(function(){
        primary_nav_menu.slideToggle();
        $(this).toggleClass('active');
        $('.menu-overlay').toggleClass('active');
        $('#masthead .main-navigation').toggleClass('menu-open');
    });

    top_menu_toggle.click(function(){
        top_nav_menu.slideToggle();
        $(this).toggleClass('active');
        $('.menu-overlay').toggleClass('active');
        $('#top-navigation .main-navigation').toggleClass('menu-open');
        $('#top-navigation').css({ 'z-index' : '30000' });

        if( $('#masthead .menu-toggle').hasClass('active') ) {
            primary_nav_menu.slideUp();
            $('#masthead .main-navigation').removeClass('menu-open');
            $('#masthead .menu-toggle').removeClass('active');
            $('.menu-overlay').toggleClass('active');
        }
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
        $(this).parent().find('.sub-menu').first().slideToggle();
        $('#primary-menu > li:last-child button.active').unbind('keydown');
    });

    $('.main-navigation ul li.search-menu a').click(function(event) {
        event.preventDefault();
        $(this).toggleClass('search-active');
        $('.main-navigation #search').fadeToggle();
        $('.main-navigation .search-field').focus();
    });

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();
        }
    });


    $(document).click(function (e) {
        var container = $("#masthead, #top-navigation");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            primary_nav_menu.slideUp();
            $(this).removeClass('active');
            $('.menu-overlay').removeClass('active');
            $('#masthead .main-navigation').removeClass('menu-open');
            $('.menu-toggle').removeClass('active');

            top_nav_menu.slideUp();
            $(this).removeClass('active');
            $('.menu-overlay').removeClass('active');
            $('#top-navigation .main-navigation').removeClass('menu-open');
        }
    });

/*------------------------------------------------
            PACKERY
------------------------------------------------*/
$('.grid').packery({
    itemSelector: '.grid-item'
});

/*------------------------------------------------
            Sliders
------------------------------------------------*/
thumbnail_wrapper.slick({
    responsive: [
    {
        breakpoint: 1025,
        settings: {
            slidesToShow: 2
        }
    },
    {
        breakpoint: 600,
        settings: {
            slidesToShow: 1        
        }
    }
    ]
});

editor_wrapper.slick({
    responsive: [
    {
        breakpoint: 1200,
        settings: {
            slidesToShow: 2
        }
    },
    {
        breakpoint: 900,
        settings: {
            slidesToShow: 1     
       }
    }
    ]
});

travel_slider.slick();

featured_slider.slick();



$('.client-wrapper').slick({
    responsive: [{
        breakpoint: 1024,
            settings: {
            slidesToShow: 4
        }
    },
    {
        breakpoint: 767,
        settings: {
            slidesToShow: 2
        }
    }]
});

$('#insta-slider .section-content').slick({
     responsive: [{
        breakpoint: 1200,
            settings: {
            slidesToShow: 4
        }
    },
    {
        breakpoint: 1024,
        settings: {
            slidesToShow: 3
        }
    },

    {
        breakpoint: 767,
        settings: {
            slidesToShow: 2
        }
    },

    {
        breakpoint: 567,
        settings: {
            slidesToShow: 1
        }
    }]
});


$('#hero-slider').slick({
    responsive: [{
        breakpoint: 1200,
            settings: {
            slidesToShow: 2
        }
    },
    {
        breakpoint: 1024,
        settings: {
            slidesToShow: 1
        }
    },
    {
        breakpoint: 567,
        settings: {
            slidesToShow: 1
        }
    }]
});


/*--------------------------------------------------------------
 Keyboard Navigation
----------------------------------------------------------------*/
if( $(window).width() < 1024 ) {
    $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });

    $('#secondary-menu').find("li").last().bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#top-navigation').find('.menu-toggle').focus();
        }
    });

    $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });

    $('#search').find("button").unbind('keydown');

}
else {
    $('#primary-menu').find("li").unbind('keydown');

    $('#search').find("button").bind( 'keydown', function(e) {
        var tabKey              = e.keyCode === 9;
        var shiftKey            = e.shiftKey;

        if( tabKey ) {
            e.preventDefault();
            $('#search').hide();
            $('.search-menu > a').removeClass('search-active').focus();
        }

        if( shiftKey && tabKey ) {
            e.preventDefault();
            $('#search').show();
            $('.main-navigation .search-field').focus();
            $('.search-menu > a').addClass('search-active');
        }
    });

    $('.search-menu > a').on('keydown', function (e) {
        var tabKey              = e.keyCode === 9;
        var shiftKey            = e.shiftKey;
        
        if( $('.search-menu > a').hasClass('search-active') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                $('#search').hide();
                $('.search-menu > a').removeClass('search-active').focus();
            }
        }
    });
}

$(window).resize(function() {
    if( $(window).width() < 1024 ) {
        $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });

        $('#secondary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#top-navigation').find('.menu-toggle').focus();
            }
        });

        $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });

        $('#search').find("button").unbind('keydown');
    }
    else {
        $('#primary-menu').find("li").unbind('keydown');
    }
});

primary_menu_toggle.on('keydown', function (e) {
    var tabKey    = e.keyCode === 9;
    var shiftKey  = e.shiftKey;

    if( primary_menu_toggle.hasClass('active') ) {
        if ( shiftKey && tabKey ) {
            e.preventDefault();
            primary_nav_menu.slideUp();
            $('.main-navigation').removeClass('menu-open');
            $('.menu-overlay').removeClass('active');
            primary_menu_toggle.removeClass('active');
        };
    }
});

top_menu_toggle.on('keydown', function (e) {
    var tabKey    = e.keyCode === 9;
    var shiftKey  = e.shiftKey;

    if( top_menu_toggle.hasClass('active') ) {
        if ( shiftKey && tabKey ) {
            e.preventDefault();
            top_nav_menu.slideUp();
            top_menu_toggle.removeClass('active');
        };
    }
});



$('.gallery-popup').magnificPopup( {
    delegate:'.popup', type:'image', tLoading:'Loading image #%curr%...', 
    gallery: {
        enabled: true, navigateByImgClick: true, preload: [0, 1]
    }
    , image: {
        tError:'<a href="%url%">The image #%curr%</a> could not be loaded.', titleSrc:function(item) {
            return item.el.attr('title');
        }
    }
});

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});
