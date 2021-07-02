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

            if ($("body section.content-block").length) {
                $([document.documentElement, document.body]).animate({
                    scrollTop: $("body section.content-block").offset().top
                }, 2000);
            }
        })
    }
    /* hero unit button to bottom end*/

    /* Hamburger click handle */
    $('.hamburger').on('click', function() {
        $('body').toggleClass('offcanvas-active');
    });

    /* Offcanvas close button handle */
    $('.off-canvas .close-button').on('click', function() {
        $('body').removeClass('offcanvas-active');
    });

});
