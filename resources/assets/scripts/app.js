import $ from 'jquery';
import 'what-input';
window.jQuery = $;

import './lib/foundation-explicit-pieces';
import {editableSvg, isInViewport} from './lib/utilities';
import 'slick-carousel/slick/slick';

$(document).foundation();

$(function() {

    /* slick slider */
    $('[data-slick]').slick();

    /* Replace all SVG images with inline SVG */
    editableSvg('img.editable-svg');

    /* Sticky header */
    window.onscroll = function() { stickyHeader() };
    const header = document.querySelector('.site-header');
    var sticky = header.offsetTop;

    stickyHeader();
    function stickyHeader() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
    /* end Sticky header */

    /* hero unit button to bottom */
    if($('.hero-button-to-bottom').length) {
        $('.hero-button-to-bottom').on('click', function (e) {
            e.preventDefault();

            let excessSpacing;

            if ($(window).width() < 1025) {
                excessSpacing = 76;
            } else {
                excessSpacing = 96;
            }

            if ($("body section.content-block").length) {
                $([document.documentElement, document.body]).animate({
                    scrollTop: $("body .hero-unit").outerHeight() - excessSpacing,
                }, 1500);
            }
        })
    }
    /* hero unit button to bottom end*/

     /* text editor p > img */
    if ($('.module.text-editor p > img').length) {
        $('.module.text-editor p > img').each(function (index, item) {
            $(item).parent().addClass('img-container');
        })
    }
    /* text editor p > img  end */

    /* image carousel */
    if($('.images-carousel').length) {
        $('.images-carousel').slick(
            {
                dots: false,
                infinite: false,
                arrows: true,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                nextArrow: '.images-carousel__next',
                prevArrow: '.images-carousel__prev',
            }
        )
    }
    /* image carousel end */

    /* testimonials carousel */
    if($('.template-testimonials-slider').length) {
        $('.template-testimonials-slider').slick(
            {
                dots: false,
                infinite: false,
                arrows: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                nextArrow: '.testimonials__next',
                prevArrow: '.testimonials__prev',
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        },
                    },
                ],
            }
        )
    }
    /* testimonials carousel end */

    /* testimonials carousel */
    if($('.template-team-slider').length) {
        $('.template-team-slider').slick(
            {
                dots: false,
                infinite: false,
                arrows: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                nextArrow: '.team__next',
                prevArrow: '.team__prev',
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        },
                    },
                ],
            }
        )
    }
    /* testimonials carousel end */

    /* testimonials carousel */
    if($('.instagram-feed-slider').length) {
        $('.instagram-feed-slider').slick(
            {
                dots: false,
                infinite: false,
                arrows: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                nextArrow: '.instagram-feed__next',
                prevArrow: '.instagram-feed__prev',
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        },
                    },
                ],
            }
        )
    }
    /* testimonials carousel end */

    /* blog */
    if ($('.facet-radio-wrapper').length) {
        $('.facet-radio-wrapper .facetwp-radio').click(function () {
            $('.facet-radio-wrapper .facetwp-radio').removeClass('checked');
            $(this).addClass('checked');
        })
    }

    if ($('.blog-pagination__button').length) {
        $('.blog-pagination__button').click(function () {
            $('.blog-pagination__button').removeClass('active');
            $(this).addClass('active');
        })
    }
    /* blog end */

    /* content cards start */
    if($('.template-cards-content-grid').length) {
        if($(window).width() < 1025) {
            $('.template-cards-content-grid').slick(
                {
                    dots: true,
                    infinite: false,
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                dots: true
                            }
                        },
                    ]
                }
            )
        }
    }
    /* content cards end*/

    /* Hamburger click handle */
    $('.hamburger').on('click', function() {
        $('body').toggleClass('offcanvas-active');
    });

    /* Offcanvas close button handle */
    $('.off-canvas .close-button').on('click', function() {
        $('body').removeClass('offcanvas-active');
    });

});
