<?php
/*
Template Name: Portfolio2
*/
?>
<?php get_header(); ?>

<style>
    .section .fp-tableCell {
        vertical-align: bottom;
    }
    section.section .fp-tableCell>.container {
        overflow: hidden;
        height: 88%;
    }
/*    .dark h2.subhead, .dark h1.main-heading {
        color: #141516;
    }*/
    .light h2.subhead, .light h1.main-heading {
        color: #fff;
    }
    .light h1.main-heading:before {
        background: #fff;
    }

    .section-inner-content{
        /*height: 100vh;*/
/*            padding-top: 68px;*/
    }
    .section{
        position: relative;
    }
    .flex-column [class*='col']{
        align-self: stretch!important;
        max-width: 100%;
/*            padding: 20px 15px;*/
    }


     .section.portfolio {
        background-size: 100%;
        background-repeat: no-repeat;
        background-position: left bottom;
    }



    .Image-holder {
        text-align: center;
    }




    /*h1.main-heading {
        color: inherit;
    }*/
    p {
/*        line-height: 2;*/
    }




    .side-cover-image {
        position: absolute;
        overflow: hidden;
        width: 47%;
        height: 100%;
    }
    .side-cover-image>img {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
    .side-cover-image.right {
        top: 0;
        right: 0;
    }
    .side-cover-image.left {
        top: 0;
        left: 0;
    }
    section.section>.fp-tableCell {
        overflow: hidden;
    }
    .column-image-container {
        height: 22vh;
    }
    .column-image-container>img {
        object-fit: contain;
    }
    .column-p {
        font-size: 0.7rem;
    }
    .project-detail-rows {
        max-height: 75%;
/*            overflow: hidden;*/
    }



    @media  (max-width: 480px) {
        html{
            font-size: 12px;
        }
        .section .fp-tableCell {
/*                vertical-align: text-top;*/
/*                padding-top: 70px;*/
            vertical-align: bottom;
        }
        .section.portfolio {
            background-size: 200%;
        }
        .column-p {
            display: none;
        }
        .column-container {
            background-color: transparent !important;
        }
        .column-image-container {
            height: 22vh;
        }
        .img-section {
            max-height: 40vh;
        }
        .side-cover-image.right, .side-cover-image.left {
            top: 60%;
            bottom: 0;
            width: 100%;
            height: 40%;
        }
        .side-cover-image>img {
            height: initial;
            width: 100%;
        }
        p {
            line-height: 1.6;
        }

    }

    <?php echo $clientInfo = CFS()->get('p2_custom_css');	?>

</style>
<div class="fullpage">
    <!-- Portfolio Intro -->
    <section class="section continer-fluid portfolio" style="background-color:<?php echo get_field('portfolio_background_color',get_the_ID()) ?>;background-image:url('<?php echo get_field('portfolio_background_image',get_the_ID()) ?>');color:<?php echo get_field('portfolio_font_color', get_the_ID()) ?>;">
        <div class="container h-100">
            <div class="row h-100">
                <div class="align-self-lg-center col-lg-12 section-inner-content m-0 p-0">
                    <div class="col-lg-12 h-100">
                        <h1 class="main-heading"><?php echo get_field('portfolio_title',get_the_ID()) ?></h1>
                        <p><?php echo get_field('portfolio_subtitle',get_the_ID()) ?></p>
                    </div>
                </div>
                <div class="Image-holder col-9 col-lg-4 ml-auto mr-auto">
                    <!-- <img src="<?php echo $src[0]; ?>" alt="Project developement" class="img-fluid"/> -->
                    <?php	echo my_responsive_thumbnail(($post->ID));?>
                </div>
            </div>
        </div>
    </section>

    <!-- Client detail info -->
    <?php
        $project_detail_parent = CFS()->get('p2_project_detail_parent');
        foreach ($project_detail_parent as $p_project) {
            $multiRowClass = sizeof($p_project["p2_project_detail_info"]) > 1 ? "multiple-info-rows": "";
    ?>
    <section class="section <?php echo $p_project['p2_detail_class'] . ' ' . $multiRowClass ?>" style="background-color:<?php echo $p_project['p2_background_color']?>;background-image:url(<?php echo $p_project['p2_background_image']?>); color:<?php echo $p_project['p2_detail_font_color']?>">
        <div class="container h-100">
<!--        <div class="d-lg-table-cell align-middle">-->
            <?php foreach ( $p_project['p2_layout_type_main'] as $key => $label ) { ?>
            <div class="row h-100 <?php echo $label == 'flex-column'? '': $label ?> ">
                <div class="col-12 <?php echo $label == 'flex-column'? '': 'col-lg-6' ?> justify-content-center align-self-lg-center <?php echo $p_project["p2_floating_cover_postion"] == 'left' ? 'offset-lg-6':'' ?> p-0 project-detail-rows flex-column">
            <?php }
                foreach($p_project['p2_project_detail_info'] as $key => $project_rows) {
                    ?>
                    <div class="col-12 col-lg justify-content-center align-self-center content_section <?php echo $key=='1'?'hidden-md-down':'' ?>">
                           <?php   if(implode("",$project_rows['p2_detail_header_type']) == "Head") { ?>
                        <h1 class="main-heading"><?php echo $project_rows['p2_detail_header'] ?> </h1>
                            <?php } else { ?>
                        <h2 class="subhead"><?php echo $project_rows['p2_detail_header'] ?> </h2>
                            <?php } ?>
                        <p><?php echo $project_rows['p2_detail_description'] ?></p>
                    </div>

                    <?php if($project_rows['p2_detail_image'] != '') {?>
                    <div class="col-12 col-lg-6 justify-content-center align-self-center img-section hidden-sm-up <?php echo $key=='1'?'hidden-md-down':'' ?>">
                        <img class="img-fluid" src="<?php echo wp_get_attachment_image_url( $project_rows['p2_detail_image'], 'large' ) ?>"
                        srcset="<?php echo wp_get_attachment_image_srcset( $project_rows['p2_detail_image'], 'large' ) ?>"
                        alt="<?php echo get_post_meta($project_rows['p2_detail_image'], '_wp_attachment_image_alt', true); ?>"
                        />
                    </div>
                    <?php }
                }

                    ?>
                </div>
                <?php if($p_project['p2_is_there_column'] == 0 ) {
                        if (wp_get_attachment_image_url( $p_project['p2_project_info_image_main'], 'large' ) != '') { ?>
                    <div class="col-12 <?php echo implode($p_project["p2_project_info_image_main_size"]) ?> ml-lg-auto mr-lg-auto justify-content-center align-self-center img-section <?php echo $p_project["p2_is_there_floating_image"] == 1?'h-50':'' ?> <?php echo sizeof($p_project["p2_project_detail_info"]) > 1? 'hidden-sm-down':'' ?>">
                        <img class="img-fluid" src="<?php echo wp_get_attachment_image_url( $p_project['p2_project_info_image_main'], 'large' ) ?>"
                        srcset="<?php echo wp_get_attachment_image_srcset( $p_project['p2_project_info_image_main'], 'large' ) ?>"
                        alt="<?php echo get_post_meta($p_project['p2_project_info_image_main'], '_wp_attachment_image_alt', true); ?>"
                        />
                    </div>
                <?php }
                    } else { ?>
                   <div class="container column-container col-12" style="background-color: <?php echo $p_project["p2_column_parent_background_color"] ?>;max-width: 100vw;">
                       <div class="row <?php echo $p_project['p2_detail_class']?>-columns">
                      <?php foreach($p_project['p2_columns_info_loop'] as $key => $project_columns) { ?>
                           <div class="col-4 my-lg-3">
                              <div class="column-image-container col-lg-8 col-8 offset-2 ml-auto mr-auto m-3">
                                  <img class="w-100 h-100" src="<?php echo wp_get_attachment_image_url( $project_columns['p2_column_info_logo'], 'large' ) ?>"
                    srcset="<?php echo wp_get_attachment_image_srcset( $project_columns['p2_column_info_logo'], 'large' ) ?>"
                    alt="<?php echo get_post_meta($project_columns['p2_column_info_logo'], '_wp_attachment_image_alt', true); ?>"
                    />
                              </div>
                              <h3 class="text-center"><?php echo $project_columns['p2_column_heading'] ?></h3>
                              <p class="column-p"><?php echo $project_columns['p2_column_content'] ?></p>
                           </div>
                       <?php } ?>
                       </div>
                   </div>
                <?php } ?>
            </div>
<!--        </div>-->
        </div>
       <?php if($p_project["p2_is_there_floating_image"] == 1) {?>
        <div class="side-cover-image <?php echo $p_project['p2_floating_cover_postion'] ?>">
            <img class="" src="<?php echo wp_get_attachment_image_url( $p_project['p2_floating_cover_image'], 'large' ) ?>"
                    srcset="<?php echo wp_get_attachment_image_srcset( $p_project['p2_floating_cover_image'], 'large' ) ?>"
                    alt="<?php echo get_post_meta($p_project['p2_floating_cover_image'], '_wp_attachment_image_alt', true); ?>"
                    />
        </div>
        <?php } ?>
    </section>
    <!-- For Mobile -->
    <?php  if(sizeof($p_project["p2_project_detail_info"]) > 1) { ?>
    <section class="section hidden-md-up <?php echo $p_project['p2_detail_class']?>-1">
        <div class="container h-100">
           <div class="row h-100">
            <?php $project_rows2 = $p_project['p2_project_detail_info'][1] ?>
            <div class="col-12 col-lg justify-content-center align-self-lg-center content_section">
                <h1 class="<?php  echo (implode("",$project_rows2['p2_detail_header_type'])=="Head" ?"main-heading": "subhead") ?>"><?php echo $project_rows2['p2_detail_header'] ?> </h1>
                <p><?php echo $project_rows2['p2_detail_description'] ?></p>
            </div>
                <?php if($project_rows2['p2_detail_image'] != '') {?>
            <div class="col-12 col-lg-6 justify-content-center align-self-lg-center img-section hidden-sm-up text-center">
                <img class="img-fluid" src="<?php echo wp_get_attachment_image_url( $project_rows2['p2_detail_image'], 'large' ) ?>"
                srcset="<?php echo wp_get_attachment_image_srcset( $project_rows2['p2_detail_image'], 'large' ) ?>"
                alt="<?php echo get_post_meta($project_rows2['p2_detail_image'], '_wp_attachment_image_alt', true); ?>"
                />
            </div>
            <?php }  ?>
            </div>
        </div>
    </section>



     <?php
            }
        }
    ?>
    <?php $caption = CFS()->get('p_contact_us_caption') ?>
    <?php $captionImage = CFS()->get('p_contact_us_image') ?>
    <?php $buttonText = CFS()->get('p_contact_us_button_text') ?>
    <?php $captionBgColor = CFS()->get('p_caption_background_color') ?>
    <?php $captionBgImage = CFS()->get('p_caption_background_image') ?>
    <section class="section continer-fluid text-center get_in_touch" style="background-color:<?php echo $captionBgColor ?>;background-image:url('<?php echo wp_get_attachment_image_url( $captionBgImage, 'large' ) ?>')">
        <div class="container">
            <div class="d-flex h-100 row">
               <?php $imageVisibility = $captionBgImage == '' ? 'visible' : 'hidden';
                     $captionImage = $captionBgImage == '' ? $captionImage : $captionBgImage; ?>
                <div class="align-self-center col-12 img-section" style="visibility:<?php echo $imageVisibility ?>">
                <?php if($captionImage != '') {?>
                    <img class="img-fluid mx-auto" src="<?php echo wp_get_attachment_image_url( $captionImage, 'large' ) ?>" alt="<?php echo get_post_meta($captionImage, '_wp_attachment_image_alt', true); ?>">
                <?php } ?>
                </div>
                <div class="col-12 content_section">
                    <div class="contact-us-caption m-0"><?php echo $caption ?></div>
                    <div class="section-btn-area mt-3"><a href="<?php echo get_site_url(); ?>/contact" class="btn btn-nofill btn-red"><?php echo $buttonText ?></a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section pro-sections contact section-content">

        <?php get_footer('portfolio'); ?>
