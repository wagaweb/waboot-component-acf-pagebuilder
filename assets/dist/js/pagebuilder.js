jQuery(document).ready(function($) {


    // Rellax Init
    if($('.parallax-wrap').length > 0){

        initParallax();

    }


    // Masonry Init
    if($('.wb-gallery--masonry').length > 0) {
        var $masonryGallery = $('.wb-gallery--masonry');
        $masonryGallery.imagesLoaded(function () {
            $masonryGallery.masonry({
                itemSelector: '.wb-gallery__item'
            });
        });
    }


    // Owl Carousel Init
    if($('.wb-carousel').length > 0) {
        var $carousels = $('.wb-carousel');
        for (var carousel of $carousels) {
            var $carousel = $(carousel);
            $carousel.owlCarousel({
                responsive: {
                    0: {
                        items: 1,
                    },
                    575: {
                        items: 2,
                    },
                    768: {
                        items: $carousel.data('carousel-items')
                    },
                },
                nav:true,
                dots:false,
                navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                autoHeight: true
            });
        }
    }


    // Tabs Init
    if($('.wb-tabs').length > 0) {

        if (window.matchMedia('(min-width: 768px)').matches) {
            var $tabs = $('.wb-tabs');
            for (var tab of $tabs) {
                var $tab = $(tab);
                $tab.tabs();
            }
        }

        if (window.matchMedia('(max-width: 767px)').matches) {
            $('.wb-tabs__wrapper').addClass('owl-carousel').owlCarousel({
                items: 1,
                nav:false,
                dots:true,
                //navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                autoHeight: true
            });
        }

    }



    // Accordion Init
    if($('.wb-accordion').length > 0) {
        var $accordionSections = $('.wb-accordion');
        for (var accordionSection of $accordionSections) {
            var $accordionSection = $(accordionSection);
            $accordionSection.accordion({
                collapsible: true,
                active: false,
                heightStyle: "content"
            });
        }
    }

    // OLD SCRIPTS

    // jQuery
    /*
    if ($('.c-waboot_acf_pagebuilder_template').length > 0) {

        let $pgbuiilderSections = $('.wb_acf_pgb__section'),
            $pgbuilderCarousels = $('.wb_acf_pgb__owlcarousel');

        for (let section of $pgbuiilderSections) {
            let $section = $(section),
                contain = $section.data("container"),
                modWidth = $section.find("[data-inner-module-width]").data("inner-module-width"),
                modAlignment = $section.find("[data-text-align]").data("text-align"),
                modSize = $section.find("[data-text-size]").data("text-size");

            if (contain) $section.find('.wb_acf_pgb__section__inner').addClass('container');

            // inner "width" on desktop
            if (modWidth && window.matchMedia('(min-width: 768px)').matches) {
                $section.find('[data-module]').css('width', modWidth);
            }


            // "text-align"
            if (modAlignment) $section.find('[data-module]').css('text-align', modAlignment);

            // paragraph text size, with class
            if (modSize) {
                let cssClass = '';
                switch (modSize){
                    case 'xsmall':
                        cssClass = 'xsmall-text';
                        break;
                    case 'small':
                        cssClass = 'small-text';
                        break;
                    case 'regular':
                        cssClass = false;
                        break;
                    case 'big':
                        cssClass = 'big-text';
                        break;
                    default :
                        cssClass = false;
                }

                if (cssClass) $section.find('[data-module] p').addClass(cssClass);
            }
        }


        for (let carousel of $pgbuilderCarousels) {
            let $carousel = $(carousel);

            //pagebuilder owlcarousel
            $carousel.owlCarousel({
                loop: $carousel.data("carousel-loop"),
                responsiveClass:true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    575: {
                        items: 2,
                    },
                    768: {
                        items: $carousel.data("carousel-items"),
                    },
                },
                autoplay: true,
                margin: 0,
                nav:true,
                navText: ['<div class="icon-arrow_left_10x17"></div>', '<div class="icon-arrow_right_10x17"></div>'],
            });
        }

    }
    */

});




/*
 **	Sections with parallax background image
 */
function initParallax(){
    "use strict";

    let $ = jQuery;

    if($('.parallax-wrap').length){
        $('.parallax-wrap').each(function() {
            let parallaxElement = $(this);
            if(parallaxElement.hasClass('parallax-fullscreen')){
                let windowHeight = $(window).height();
                parallaxElement.height(windowHeight);
            }
            let speed = parallaxElement.data('speed')*0.4;
            parallaxElement.parallax("50%", speed);
        });
    }
}