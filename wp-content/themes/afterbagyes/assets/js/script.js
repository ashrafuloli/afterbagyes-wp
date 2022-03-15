(function ($) {

    'use strict';

    /*------------------------------------
        Data-Background
    --------------------------------------*/
    $("[data-background]").each(function () {
        $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
    });

    $("[data-bg-color]").each(function () {
        $(this).css("background", $(this).attr("data-bg-color"))
    });

    /*------------------------------------
       Mobile Menu
   --------------------------------------*/

    $('#mobile-menu-active').metisMenu();

    $(".open-mobile-menu > a").on("click", function (e) {
        e.preventDefault();
        $(".slide-bar").toggleClass("show");
        $("body").addClass("on-side");
        $('.body-overlay').addClass('active');
        $(this).addClass('active');
    });

    $(".close-mobile-menu > a").on("click", function (e) {
        e.preventDefault();
        $(".slide-bar").removeClass("show");
        $("body").removeClass("on-side");
        $('.body-overlay').removeClass('active');
        $('.open-mobile-menu > a').removeClass('active');
    });

    $('.body-overlay').on('click', function () {
        $(this).removeClass('active');
        $(".slide-bar").removeClass("show");
        $("body").removeClass("on-side");
        $('.open-mobile-menu > a').removeClass('active');
    });

    $('.main-menu > ul > li').slice(-2).addClass('last-item');


    /*-------------------------------------------
        Sticky Header
    --------------------------------------------- */

    let win = $(window);
    let sticky_id = $(".header-area");
    win.on('scroll', function () {
        let scroll = win.scrollTop();
        if (scroll < 245) {
            sticky_id.removeClass("sticky-header");
        } else {
            sticky_id.addClass("sticky-header");
        }
    });


    /* magnificPopup img view */
    $('.popup-image').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    /* magnificPopup video view */
    $('.popup-video').magnificPopup({
        type: 'iframe'
    });

    $('.news-slider-active').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
        centerMode: true,
        centerPadding: 0,
        autoplay: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 560,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    function brandSlider() {
        $('.brand-active').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            dots: false,
            arrows: false,
            centerMode: true,
            centerPadding: 0,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 6,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 560,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }

    AOS.init({
        // Global settings:
        disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        initClassName: 'aos-init', // class applied after initialization
        animatedClassName: 'aos-animate', // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
        throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 120, // offset (in px) from the original trigger point
        //delay: 0, // values from 0 to 3000, with step 50ms
        // duration: 400, // values from 0 to 3000, with step 50ms
        easing: 'ease', // default easing for AOS animations
        once: true, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
        anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

    });

})(jQuery);
