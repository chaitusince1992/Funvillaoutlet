$.fn.exist = function() {
    return this.length > 0;
};
jQuery(function($) {
    $(document).ready(function() {
        var resizeTimer;
        $(".spinner-loader").hide();

        $(".download-case-study form").on("submit", function(e) {
            e.preventDefault();
            var $el = $(this);
            $el.find("input").attr("disabled", "disabled");
            $el.find("button").attr("disabled", "disabled");
            var url = $(".project-title-box").attr("data-casestudy");
            var email = $el.find("#email").val();
            var name = $el.find("#name").val();
            var cs = $(".project-title-box").text();
            $(".spinner-loader").fadeIn();
            $.ajax({
                url: 'http://design.imaginea.com/wp-content/themes/imaginea/inc/mailLogic/sendEmailUser.php',
                type: 'POST',
                data: {
                    'post_name': name,
                    'post_email': email,
                    'post_url': url,
                    'post_cs': cs
                },
                success: function(data) {
                    $el.find("input").removeAttr("disabled");
                    $el.find("button").removeAttr("disabled");
                    $(".spinner-loader").fadeOut();
                    $el.trigger('reset');
                },
                error: function(e) {
                    console.log(e.message);
                }
            });
        });


        /* Video Player */
        var closeVideoPlayer = function() {
            $(".video-player-container").hide();
            $("video#portfolio-video").attr("src", "");
            $(".play-icon-circle").find(".fa.fa-play").removeClass("fa-pause");
        }
        $(".play-icon-circle").click(function() {
            $("video#portfolio-video").attr("src", $(this).data("videoUrl"));
            $(".video-player-container").show();
            $(this).find(".fa.fa-play").toggleClass("fa-pause");
            var parentClass = $(this).data('parentClass');
            if ($(this).find(".fa.fa-play.fa-pause").get(0)) {
                console.log("video is played");
                $("video#portfolio-video").get(0).play();
            } else {
                console.log("video paused");
                $("video#portfolio-video").get(0).pause();
            }
        });
        $(".video-close-icon-container").click(closeVideoPlayer);
        $('video#portfolio-video').on('ended', closeVideoPlayer);
        $(document).keyup(function(e) {
            if (e.keyCode == 27) { // escape key maps to keycode `27`
                // <DO YOUR WORK HERE>
                closeVideoPlayer();
            }
        });
        /* Video Player End */

        /*Navigation start */
        $("#nav-toggle").click(function() {
            $("#nav-toggle, #nav-overlay, #nav-fullscreen").toggleClass("open");
            $("header.home-header").toggleClass("open");
        });
        var fullpageConfig = {
            verticalCentered: false,
            dragAndMoveKey: 'aW1hZ2luZWEuY29tX0FwTVpISmhaMEZ1WkUxdmRtVT1HODg=',
            dragAndMove: true,
            scrollBar: false,
            css3: true,
            fitToSection: true,
            fitToSectionDelay: 0,
            sectionSelector: '.section',
            scrollingSpeed: 500,
            afterRender: function() {
                $(".slider").twentytwenty({
                    default_offset_pct: 0.7
                });
            },
            onLeave: function(index, nextIndex, direction) {
                //                console.log(index, nextIndex, direction);
                //                console.log($(this).find("video"));
                closeVideoPlayer();
            },
            afterLoad: function(anchorLink, index) {
//                console.log(this, anchorLink, index);
                if (this.hasClass('team-member-section')) {
                    $.fn.fullpage.setAutoScrolling(false);
                } else {
                    $.fn.fullpage.setAutoScrolling(true);
                }
                if (this.hasClass("light")) {
                    $("header.home-header").addClass("light");
                } else {
                    $("header.home-header").removeClass("light");
                }
            },
        };
        if (!$("html").hasClass("fp-enabled")) {
            $('.fullpage').fullpage(fullpageConfig);

        }

        domResetOnResize();
        resizeNav();

        $(window).resize(function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                console.log("Resized");
                domResetOnResize();
                resizeNav();
            }, 500);
        });
    });
    /* $(".slider").on("touchstart", function() {
         $.fn.fullpage.setAllowScrolling(false);
     });
     $(document).on("touchstart", ".slick-slider", function() {
         $.fn.fullpage.setAllowScrolling(false);
     });
     $(".slider").on("touchend", function() {
         $.fn.fullpage.setAllowScrolling(true);
     });
     $(document).on("touchend", ".slick-slider", function() {
         $.fn.fullpage.setAllowScrolling(true);
     });*/
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
var comment, $hidelm;

function domResetOnResize() {
    var mobileBreakPoint = 768;
    $hidelm = $('.section.hidden-md-up');
    var existDiv = $($hidelm).exist();
    comment = !comment ? existDiv && document.createComment($hidelm.get(0).outerHTML) || "" : comment;
    if ($(window).width() >= mobileBreakPoint) { //desktop
        slickForDesktop();
        clickEventsOffDesktop();
        $(".section.the-client-fold").addClass("light");
        if (existDiv) {
            $hidelm.replaceWith(comment);
        }
    } else { //for mobiles
        slickForMobile();
        clickEventsOnMobile();
        $(".section.the-client-fold").removeClass("light"); //this is page specific
        if (!existDiv) {
            $(".section.multiple-info-rows").after($(comment.nodeValue)[0])
        }
    }
    $('p:empty').remove();
    $(".multiple-info-rows").find(".row:eq(1)").html();
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
    var clickEventsOnMobile = function() {
        $(".project-cover-image-container").on("click",function(e){
            var anchor = $(e.currentTarget).find("a");
            !$(e.target).is("a") ? location.href = anchor.attr("href") : undefined;
        });
        $(".section-blocks-parent.case-study.tiles").on("click",function(e){
            var anchor = $(e.currentTarget).find("a");
            !$(e.target).is("a") ? location.href = anchor.attr("href") : undefined;
        });
    }

    var clickEventsOffDesktop = function() {
        $(".project-cover-image-container").off("click");
        $(".section-blocks-parent.case-study.tiles").off("click");
    }
/* custom click events end*/
