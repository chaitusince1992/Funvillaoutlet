<?php
/*
    Template Name: About Us
*/
?>
<?php get_header(); ?>
<style>

    .team-members-container {
        padding: 0px 6.25vw;
        font-size: 0;
    }
    .team-member-section {
        height: 100% !important;
    }
    .team-member-image {
        transition: all 0.5s;
        width: 16.3vw;
        height: 16.3vw;
        background-blend-mode: multiply;
        display: inline-block;
        margin: 0.375vw;
        position: relative;
        background-image: url('<?php echo get_template_directory_uri(); ?>/inc/imgNew/team-default.png');
        background-size: 100%;
        vertical-align: middle;
        font-size: 1rem;
        color: #fff;
        cursor: pointer;
    }
    .team-member-image>img {
        width: 100%;
        height: 100%;
        visibility: hidden;
    }
    .overlay-container {
        position: absolute;
        width: 100%;
        bottom: 0;
        opacity: 0;
        display: none;
        transition: opacity 0.5s;
        padding: 10px;
    }

    .team-member-image:hover {
        background-color: #ea3c55;
    }

    .team-member-image:hover .overlay-container {
        display: block;
        opacity: 1;
    }
    .we-are-team {
        width: 50.2vw;
        background-color: #ea3c55;
        height: 16.4vw;
        display: inline-block;
        vertical-align: middle;
        margin: 0.375vw;
        position: relative;
        font-size: 3rem;
        color: #fff;
        line-height: 16.4vw;
        text-align: center;
    }
    .we-are-team-text {
    }
    .team-member-image a.linkedin {
        color: white;
        font-size: 1.2rem;
    }
    .team-member-image .member-name {
        font-size: 0.7rem;
    }
    .team-member-image .member-designation {
        font-size: 0.5rem;
    }

    @media only screen and (max-width:543px) {
        .team-member-image {
            width: 42.3vw;
            height: 42.3vw;
        }
        .we-are-team {
            width: 85.3vw;
            height: 36.4vw;
            margin-top: 1.375vw;
            margin-bottom: 1.375vw;
            line-height: 36.4vw;
        }
        .section.we-are-illustration>.container, .section.team-member-section>.team-members-container {
            padding-top: 65px;
        }
    }
</style>

<section class="fullpage-team">
    <div class="section hero-section">
        <div class="video-wrapper">
            <video id="myVideo" poster="<?php echo get_template_directory_uri(); ?>/inc/imgNew/video-cover.png">
                <source src="<?php echo get_template_directory_uri(); ?>/inc/video/homepage.mp4" type='video/mp4;' />
            </video>
            <div class="we-are-overlay layer">
            </div>
            <div class="video-text-layer" >
                <h1 class="we-are-overlay-text"><span>“</span>We are</h1>
                    <div class="play-pause-wrapper">
                        <i class="fa fa-play fa-5x" id="play" aria-hidden="true"></i>
                    </div>
            </div>
        </div>
    </div>

	<div class="section we-are-illustration" data-anchor="we_are">
		<div class="container h-100">
			<div class="row h-100">
			 	<div class="col-lg-7 col-12 my-lg-auto">
                    <h1 class="main-heading">
                        We are,
                    </h1>
                    <!--<hr>-->
					 <h4 class="product-design-sub-heading mb-2">
                        Living in the Details to create experiences that win positive outcomes
                    </h4>
					 <article class="product-design-article p d-none d-lg-block">
                            <p class="mb-2">Imaginea Designs is an Innovation and Design Consultancy division of Imaginea Groups. </p>
                            <p>With a human-centered approach to innovation, we strive to identify the needs of people &amp; integrate it with the best of technology. Living in the micro-moments &amp; focussing only on those that help the users to move seamlessly, is what makes our approach unique and drive our clients to win big. </p>
 					 </article>
                      <article class="product-design-article p d-lg-none mb-0">
                            <p class="mb-0">Imaginea Designs is an Innovation and Design Consultancy division of Imaginea Groups. With a human-centered approach to innovation, we strive to identify the needs of people &amp; integrate it with the best of technology. Living in the micro-moments &amp; focussing only on those that help the users to move seamlessly, is what makes our approach unique and drive our clients to win big. </p>
                      </article>
				 </div>
				 <div class="col-lg-5 col-12 service-image-container p-0 my-lg-auto">
					 <img class="img-fluid mx-auto d-block we-are" src="<?php echo get_template_directory_uri(); ?>/inc/imgNew/About Us.svg" alt="product-design">
				 </div>
			</div>
		</div>
	</div>

	<div class="section team-member-section" data-anchor="Team">
        <div class="team-members-container">
       <?php $teamMemberArray = CFS()->get('team_members_loop');
        foreach ((array) $teamMemberArray as $key => $value) { ?>
                <div class="team-member-image" style="background-image: url('<?php echo wp_get_attachment_image_url( $value['team_member_photo_thumb'], 'large' ) ?>')">
                    <img src="<?php echo wp_get_attachment_image_url( $value['team_member_photo_thumb'], 'large' ) ?>" alt="" class="img-fluid">
                    <div class="overlay-container">
                       <?php if($value['team_member_linkedin'] != '') {?>
                        <a class="linkedin" href="<?php echo $value['team_member_linkedin'] ?>" target="_blank"><span class="fa fa-linkedin-square"></span></a>
                        <?php } ?>
                        <div class="member-name"><?php echo $value['team_member_name'] ?></div>
                        <div class="member-designation"><?php echo $value['team_member_designation'] ?></div>
                    </div>
                </div>
            <?php if($key == 1) { ?>
                <div class="we-are-team hidden-sm-up">
                    <div>WE</div>
                </div>
            <?php } ?>

            <?php if($key == 5) { ?>
                <div class="we-are-team hidden-sm-down">
                    <div>WE</div>
                </div>
            <?php }
              }
            ?>
        </div>
    </div>

	<div class="section contact" data-anchor="contact">
        <?php get_footer(); ?>
	</div>
    <script>
        var baseTeamUrl = "<?php echo get_template_directory_uri(); ?>/inc/imgNew/team/"; //location directory for team members images
        var Team = {
        "items": [
            {
                "url": baseTeamUrl+"anirban.jpg"
            },
            {
                "url": baseTeamUrl+"arka.jpg"
            },
            {
                "url": baseTeamUrl+"balraaj.jpg"
            },
            {
                "url": baseTeamUrl+"chaitanya.jpg"
            },
            {
                "url": baseTeamUrl+"deba.jpg"
            },
            {
                "url": baseTeamUrl+"diptava.jpg"
            },
            {
                "url": baseTeamUrl+"gourav.jpg"
            },
            {
                "url": baseTeamUrl+"harsh.jpg"
            },
             {
                "url": baseTeamUrl+"jyoti.jpg"
            },
             {
                "url": baseTeamUrl+"kadambari.jpg"
            },
            {
                "url": baseTeamUrl+"keertana.jpg"
            },
            {
                "url": baseTeamUrl+"navin.jpg"
            },
            {
                "url": baseTeamUrl+"parimal.jpg"
            },
             {
                "url": baseTeamUrl+"pavan.jpg"
            },
            {
                "url": baseTeamUrl+"progya.jpg"
            },
            {
                "url": baseTeamUrl+"raju.jpg"
            },
            {
                "url": baseTeamUrl+"rakhi.jpg"
            },
            {
                "url": baseTeamUrl+"ranjita.jpg"
            },
             {
                "url": baseTeamUrl+"sai.jpg"
            },
             {
                "url": baseTeamUrl+"samar.jpg"
            },
            {
                "url": baseTeamUrl+"sarat.jpg"
            },
            {
                "url": baseTeamUrl+"sourav.jpg"
            },
            {
                "url": baseTeamUrl+"subasish.jpg"
            },
             {
                "url": baseTeamUrl+"sumit.jpg"
            },
            {
                "url": baseTeamUrl+"susmita.jpg"
            },
            {
                "url": baseTeamUrl+"swarat.jpg"
            },
            {
                "url": baseTeamUrl+"vijay.jpg"
            },
            {
                "url": baseTeamUrl+"vinod.jpg"
            },
            {
                "url": baseTeamUrl+"1.jpg"
            },
            {
                "url": baseTeamUrl+"2.jpg"
            },
            {
                "url": baseTeamUrl+"3.jpg"
            },
            {
                "url": baseTeamUrl+"4.jpg"
            },
            {
                "url": baseTeamUrl+"5.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            },
            {
                "url": baseTeamUrl+"6.jpg"
            }
        ]
        }

        var $ = jQuery.noConflict();

        $(".nav-bottom ul.right-data-list li").on("click", function(e) {
            e.stopPropagation();
            // e.preventDefault();
            var $current = $(this);
            $current.addClass("active").siblings("li.active").removeClass("active");
        });

        $(document).ready(function() {
            $(".spinner").fadeOut();
            $("body").removeClass("spinner-scroll");
            /*$('.full-page-sections').fullpage({
                navigation: false,
                navigationPosition: 'right',
                responsiveWidth: 320,
                css3: true,
                scrollingSpeed: 700,
                autoScrolling: true,
                fitToSection: true,
                fitToSectionDelay: 0,
                scrollBar: false,
                slidesNavigation: true,
                lockAnchors: true,
                controlArrows: false,
                verticalCentered: false,
                dragAndMoveKey: 'aW1hZ2luZWEuY29tX0FwTVpISmhaMEZ1WkUxdmRtVT1HODg=',
                dragAndMove: true,
                sectionSelector: '.section',
                slideSelector: '.slide',
                onLeave: function(index, nextIndex, direction) {
                    if (nextIndex === 1) {
                        $(".full-page-sections").css("z-index", "0");
                    } else {
                        $(".full-page-sections").css("z-index", "99");
                    }
                },
                afterRender: function() {
                    console.log("Done rendered");
                },
                afterLoad: function(anchorLink, index) {

                },
                onLeave: function(index, nextIndex, direction) {

                }
            });*/

            var playwrapper = $('.play-pause-wrapper');
            var video = $("video#myVideo");
            var videoOverlay = $(".video-text-layer");
            var layer = $(".we-are-overlay");

            $(playwrapper).on('click', function(e) {
                video.get(0).play();
                videoOverlay.fadeOut();
                layer.fadeOut();
            });

            video.on('click', function(e) {
                video.get(0).pause();
                videoOverlay.fadeIn();
                layer.fadeIn();
            });



                      /*$.each(Team.items, function(i,f) {
                          $(".team-members-container ul").append("<li><img src='"+f.url+"' />  </li>");
                          if(Team.items.length-1 === i) {
                            $('.team-members-container ul li').addClass('tile1');
                   //        	var middle = Math.ceil((data.items.length-1) / 2);
                            // $("ul li:nth-child(" + middle + ")").after('<li>We</li>');
                          }
                      });*/



        })
    </script>
</body>
</html>
