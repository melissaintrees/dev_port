/*
 * Custom script about Flexible Lite
 */
jQuery(function() {

    //Homepage slider
    jQuery('#homeSlider').bxSlider({
        adaptiveHeight: true,
        pager: false,
        auto: true,
        mode: 'fade',
        speed: 1400,
        pause: 4600,
        prevText: '<i class="fa fa-chevron-left"> </i>',
        nextText: '<i class="fa fa-chevron-right"> </i>'
    });

    jQuery('.sponsorSlider').bxSlider({
        minSlides: 1,
        maxSlides: 4,
        slideWidth: 210,
        slideMargin: 70,
        pager: false,
        controls: false,
        auto: true,
        prevText: '<i class="fa fa-angle-left"></i>',
        nextText: '<i class="fa fa-angle-right"></i>',
        ticker: true,
        speed: 10000
    });

    //testimonial slider

    jQuery('.testimonial-slider').bxSlider({
        minSlides: 1,
        maxSlides: 2,
        slideWidth: 570,
        slideMargin: 60,
        speed: 1000,
        pager: false,
        controls: true,
        nextText: '<i class="fa fa-arrow-right"> </i>',
        prevText: '<i class="fa fa-arrow-left"> </i>',
    });

    jQuery('#site-navigation').onePageNav({
        currentClass: 'current-one-page-item',
        changeHash: false,
        scrollSpeed: 1500,
        scrollThreshold: 0.5,
        filter: '',
        easing: 'swing',
        begin: function() {
            //I get fired when the animation is starting
        },
        end: function() {
            //I get fired when the animation is ending
        },
        scrollChange: function(jQuerycurrentListItem) {
            //I get fired when you enter a section and I pass the list item of the section
        }
    });

    // parallax background scroll
    jQuery(window).on('load', function() {
        var width = Math.max(window.innerWidth, document.documentElement.clientWidth);
        if (width && width >= 768) {
            jQuery('.flexible-lite-widget-wrapper,.flexible-lite-cta-wrapper').each(function() {
                jQuery(this).parallax('center', 0.3, true);
            });
        }
    });

    //home page search
    jQuery('.header-search-wrapper .search-main').click(function() {
        jQuery('.header-search-wrapper .search-form-main').toggleClass('search-activate');
    });

    // Scroll To Top
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 1000) {
            jQuery('#mt-scrollup').fadeIn('slow');
        } else {
            jQuery('#mt-scrollup').fadeOut('slow');
        }
    });

    jQuery('#mt-scrollup').click(function() {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    //toggle-menu

    jQuery(window).on('load', function() {
        var width = Math.max(window.innerWidth, document.documentElement.clientWidth);
        if (width && width < 767) {
            jQuery('.menu-toggle,#site-navigation ul li').not('#site-navigation ul li.menu-item-has-children').click(function() {
                jQuery('#primary-menu').slideToggle('slow');
            });
        }
    });

    //responsive sub menu toggle
    jQuery('#site-navigation .menu-item-has-children').append('<span class="sub-toggle"> <i class="fa fa-angle-right"></i> </span>');

    jQuery('#site-navigation .sub-toggle').click(function() {
        jQuery(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
        jQuery(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');
    });
});
