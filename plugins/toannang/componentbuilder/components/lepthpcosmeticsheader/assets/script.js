$(document).ready(function () {
    if (jQuery(window).width() < 767) {
        jQuery('#menu_mobile').mmenu({});
    }
    $('#sidenav-h025 .link_list_mobile  ul  li.menu-item-has-children > a').click(function (e) {
        e.preventDefault();
        $(this).siblings('.sub-menu').slideToggle();
    });
    $('#mobile-layer-h025').click(function () {
        close_menu();
    });
    $('#sidenav-h025 .close-menu').click(function () {
        close_menu();
    });
    $('#header-h025 .nav-mobile-button > a').click(function (e) {
        e.preventDefault();
        $('#mobile-layer-h025').addClass('open-mobile-layer');
        $('#sidenav-h025').addClass('open-sidenav');
    });
    
    function close_menu() {
        $('#mobile-layer-h025').removeClass('open-mobile-layer');
        $('#sidenav-h025').removeClass('open-sidenav');
    }
});
$(document).ready(function () {
    $('.lept_component3_slider_h502_v3').slick({
        arrows: true,
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: '<div class="btn-slider btn-slider-left" alt="prev"></div>',
        nextArrow: '<div class="btn-slider btn-slider-right" alt="next"></div>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 340,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
        
    });
});
