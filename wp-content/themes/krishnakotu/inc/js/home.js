var $ = jQuery.noConflict();





$(document).ready(function () {

    $("#nav-toggle").click(function () {
        console.log("clicked")
        $("#nav-toggle, #nav-overlay, #nav-fullscreen").toggleClass("open");
        $("header.home-header").toggleClass("open");
    });

    $('.full-page-sections').fullpage({
        navigation: false,
        responsiveWidth: 320,
        autoScrolling: true,
        fitToSection: true,
        scrollBar: false,
        slidesNavigation: true,
        lockAnchors: true,
        controlArrows: false,
        verticalCentered: false,
        sectionSelector: '.section',
        slideSelector: '.slide',
        afterLoad: function (anchorLink, index) {}
    });

    /*********** reinitializing full page js for mobile / laptop based on width ************/
    /*Start*/
    var resizeTimer; //iPhone 6+ landscape width
    resizeNav();
    $(window).resize(function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
//            console.log("Resized");
            resizeNav();
        }, 500);
    });
    /*End*/

});


function resizeNav() {
    var $navOverlay = $("#nav-overlay"),
        $navFullscreen = $("#nav-fullscreen");
    // Set the nav height to fill the window
    $navFullscreen.css({
        height: window.innerHeight
    });

    // Set the circle radius to the length of the window diagonal,
    // this way we're only making the circle as big as it needs to be.
    var radius = Math.sqrt(
        Math.pow(window.innerHeight, 2) + Math.pow(window.innerWidth, 2)
    );
    var diameter = radius * 2;
    $navOverlay.width(diameter);
    $navOverlay.height(diameter);
    $navOverlay.css({
        "margin-top": -radius,
        "margin-right": -radius
    });
}

