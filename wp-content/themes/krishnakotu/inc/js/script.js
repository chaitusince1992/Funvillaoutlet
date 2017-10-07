var $ = jQuery.noConflict();

$(document).ready(function () {
    var resizeTimer;

    /*Navigation start */
    $("#nav-toggle").click(function () {
        $("#nav-toggle, #nav-overlay, #nav-fullscreen").toggleClass("open");
        $("header.home-header").toggleClass("open");
    });

    var fullpageConfig = {
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
    };

    if (!$("html").hasClass("fp-enabled")) {
        $('.full-page-sections').fullpage(fullpageConfig);
    }

    domResetOnResize();
    resizeNav();

    $(window).resize(function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
            console.log("Resized");
            domResetOnResize();
            resizeNav();
        }, 500);
    });
});

function resizeNav() {
    // Set the nav height to fill the window
    $("#nav-fullscreen").css({
        height: "100%"
    });

    // Set the circle radius to the length of the window diagonal,
    // this way we're only making the circle as big as it needs to be.
    var radius = Math.sqrt(
        Math.pow(window.innerHeight, 2) + Math.pow(window.innerWidth, 2)
    );
    var diameter = radius * 2;
    $("#nav-overlay").width(diameter);
    $("#nav-overlay").height(diameter);
    $("#nav-overlay").css({
        "margin-top": -radius,
        "margin-right": -radius
    });
}

function domResetOnResize() {
    if ($("html").hasClass("fp-enabled")) {
        $.fn.fullpage.reBuild();
    }
}

/* Slick Slider code Start */
function slickForMobile() {
    var slickEl = $(".creation-of-persona-columns, .league-of-logo-columns, .case-study-slides-container>div, .featured-projects-container>div, .get-in-touch-container");
    slickEl.parent().find('.slick-initialized').slick('unslick');
    slickEl.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        infinite: false,
        speed: 300
    });
}

function slickForDesktop() {
    var slickEl = $(".creation-of-persona-columns, .league-of-logo-columns, .case-study-slides-container>div, .featured-projects-container>div, .get-in-touch-container");
    slickEl.parent().find('.slick-initialized').slick('unslick');
    $(".case-study-slides-container>div").slick({
        infinite: false,
        speed: 300,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: true
    });
}
/* Slick Slider code end */

/* custom click events */
var clickEventsOnMobile = function () {
    $(".project-cover-image-container").on("click", function (e) {
        var anchor = $(e.currentTarget).find("a");
        !$(e.target).is("a") ? location.href = anchor.attr("href") : undefined;
    });
    $(".section-blocks-parent.case-study.tiles").on("click", function (e) {
        var anchor = $(e.currentTarget).find("a");
        !$(e.target).is("a") ? location.href = anchor.attr("href") : undefined;
    });
}

var clickEventsOffDesktop = function () {
    $(".project-cover-image-container").off("click");
    $(".section-blocks-parent.case-study.tiles").off("click");
}
/* custom click events end*/
