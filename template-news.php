<?php
/**
 * Template Name: News Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package luso
 */

get_header();
?>
    <!-- /.news-area start -->
    <section class="news-area inner-page-wrapper">
        <div class="news-banner lazy" style="background-image: url('<?php bloginfo('template_url');?>/images/_blank.png')" data-bg="<?php echo get_the_post_thumbnail_url();?>">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 text-center">
                        <header>
                            <h1 class="section-title"><a href="#">Media</a> / <a href="#">News</a> / Press Kit</h1>
                        </header>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.news-area end -->

    <!-- /.sticky-blog start -->
    <section class="news-categories">
        <div class="container">
            <!-- .history start-->
            <?php echo get_field('news_page_history_section', 'option', false); ?>
            <!-- .history end-->

            <hr class="large">

            <!-- .publications start-->
            <?php echo get_field('news_page_publication_section', 'option', false); ?>
            <!-- .publications end-->

            <hr class="large">

            <!-- .Video start-->
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="text-primary-color"><?php echo get_field('news_page_video_section_heading', 'option'); ?></h2>
                </div>
            </div>
            <div class="row">
                <?php
                $news_page_video_section_content = get_field('news_page_video_section_content', 'option');
                if( !empty( $news_page_video_section_content ) ) :
                    foreach ( $news_page_video_section_content as $nvsc ) :
                ?>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <figure class="promo-video video-category-item">
                        <img alt="poster" class="lazy" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo $nvsc['video_poster_image'];?>"/>
                        <a data-fancybox href="<?php echo $nvsc['video_url'];?>" class="video-link">
                            <span class="play-btn">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="119.202" height="99.499" viewBox="0 0 119.202 99.499">
                                  <path id="Path_107" data-name="Path 107" d="M1038.5,1305.25v-99.5l119.2,49.75Z" transform="translate(-1038.5 -1205.75)" fill="#fff"/>
                                </svg>
                            </span>
                        </a>
                    </figure>
                </div>
                <?php endforeach; endif;?>
                <div class="col-12 pt-2 pb-2">
                    <a href="<?php echo get_field('news_page_video_section_button_link', 'option'); ?>" class="btn more-btn">More</a>
                </div>
            </div>
            <!-- .Video end-->

            <hr class="large">

            <!-- .Photos start-->
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="text-primary-color"><?php echo get_field('news_page_photo_section_heading', 'option'); ?></h2>
                </div>
            </div>
            <div class="row">
                <?php
                $news_page_photo_section_content = get_field('news_page_photo_section_content', 'option');
                $counter = 1;
                foreach ($news_page_photo_section_content as $nps ) :
                ?>
                <div class="col-lg-3 col-md-4 col-sm-12 text-center">
                    <a href="javaScript:void(0)" data-fancybox data-src="#modal_<?php echo $counter;?>" class="gallery-category-item">
                        <figure>
                            <img alt="poster" class="lazy" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo $nps['news_page_gallery_poster_image'];?>"/>
                            <figcaption class="pt-3">
                                <span><?php echo $nps['news_page_gallery_name'];?></span>
                            </figcaption>
                        </figure>
                    </a>
                    <div class="sub-gallery-modal" id="modal_<?php echo $counter;?>" style="display: none">
                        <div class="gallery-wrapper">
                            <h3 class="text-center mb-5 text-white"><?php echo $nps['news_page_gallery_name'];?></h3>
                            <?php if(!empty($nps['news_page_gallery_images'])): ?>
                            <ul class="list-unstyled sub-gallery-for">
                                <?php foreach ($nps['news_page_gallery_images'] as $ngi) :?>
                                <li class="list-inline-item">
                                    <a href="<?php echo $ngi['new_page_gallery_image'];?>"  data-fancybox="gallery">
                                        <figure>
                                            <img alt="poster" class="lazy" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo $ngi['new_page_gallery_image'];?>"/>
                                        </figure>
                                    </a>
                                </li>
                                <?php endforeach;?>
                            </ul>

                            <ul class="list-unstyled sub-gallery-nav">
                                <?php foreach ($nps['news_page_gallery_images'] as $ngi) :?>
                                <li class="list-inline-item">
                                    <figure>
                                        <img alt="poster" class="lazy" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo $ngi['new_page_gallery_image'];?>"/>
                                    </figure>
                                </li>
                                <?php endforeach;?>
                            </ul>
                            <?php endif;?>
                        </div>

                    </div>
                </div>
                <?php $counter++; endforeach;?>

                <div class="col-12 pt-2 pb-2">
                    <a href="<?php echo get_field('news_page_photo_section_button_link', 'option'); ?>" class="btn more-btn">More</a>
                </div>
            </div>
            <!-- .Photos end-->


            <hr class="large">

            <!-- .Calender start-->
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="text-primary-color"><?php echo get_field('news_page_calender_section_heading', 'option'); ?></h2>
                </div>
            </div>
            <?php
            //$news_page_calender_section_content = get_field('news_page_calender_section_content', 'option');
            $events = tribe_get_events( [
                'posts_per_page' => 3,
                'start_date'     => 'now',
            ] );

            if( !empty( $events ) ) :
            ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <?php
                    $events = tribe_get_events( [
                        'posts_per_page' => 2,
                        'start_date'     => 'now',
                    ] );

                    if( !empty( $events ) ) :
                        ?>
                        <ul class="list-unstyled">
                            <?php foreach ( $events as $ncs ) :
                                $_EventOrganizerID = get_post_meta($ncs->ID,'_EventOrganizerID',true);
                                $_EventVenueID = get_post_meta($ncs->ID,'_EventVenueID',true);
                                if ( has_post_thumbnail( $ncs->ID ) ):
                                    $thumb = get_the_post_thumbnail_url( $ncs->ID, 'full' );
                                elseif ( tribe_event_featured_image( $ncs->ID ) ):
                                    $thumb = tribe_event_featured_image( $ncs->ID, 'large', false, false );
                                endif;

                                $_VenueEventShowMap = get_post_meta($_EventVenueID,'_VenueEventShowMap',true);

                                ?>
                                <li>
                                    <div class="table-responsive mb-3">
                                        <table class="table calender-list">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <h2 class="event-heading"><?php echo tribe_get_start_date( $ncs->ID, true, 'M' );?></h2>
                                                    <h4 class="evening-date"><?php echo tribe_get_start_date( $ncs->ID, true, 'j' );?></h4>
                                                </td>
                                                <td>
                                                    <h4 class="event-title"><?php echo get_the_title($_EventOrganizerID);?></h4>
                                                    <p class="event-date"><?php echo tribe_get_start_date($ncs->ID, false, 'g:i A' );?> to <?php echo tribe_get_end_date($ncs->ID, false, 'g:i A' );?></p>
                                                </td>
                                                <td class="text-right location-nfo">
                                                    <p><strong>Location: </strong><?php echo get_post_meta($_EventVenueID,'_VenueCity',true);?>, <?php echo get_post_meta($_EventVenueID,'_VenueState',true);?></p>
                                                    <a href="javascript:void(0)" class="more-info-btn"><svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"><g id="Group_364" data-name="Group 364" transform="translate(0.347 0.405)"><g id="Right_Arrow_Icon" data-name="Right Arrow Icon" transform="translate(0 0)"><rect id="bound" width="33" height="33" transform="translate(-0.347 -0.405)" fill="none"/><path id="Combined_Shape" data-name="Combined Shape" d="M14,0A14,14,0,1,1,0,14,14,14,0,0,1,14,0Z" transform="translate(1.653 1.595)" fill="#001a39"/></g><g id="Group_351" data-name="Group 351" transform="translate(7.445 7.929)"><line id="Line_55" data-name="Line 55" x2="16.228" transform="translate(0 8.114)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2"/><line id="Line_56" data-name="Line 56" x1="16.228" transform="translate(8.114) rotate(90)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2"/></g></g></svg><span>more info</span></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="event-modal-item">
                                        <div class="row mb-4">
                                            <div class="col-lg-4 col-md-5 col-sm-12 limg">
                                                <figure class="promo-video event-video">
                                                    <img alt="poster" class="lazy entered loaded" src="<?php bloginfo('template_url');?>/images/event-video-poster.png" data-src="<?php echo $thumb; ?>" data-ll-status="loaded">
                                                    <a data-fancybox="" href="<?php echo get_field('event_video_url', $ncs->ID); ?>" class="video-link">
                                <span class="play-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="119.202" height="99.499" viewBox="0 0 119.202 99.499"><path id="Path_107" data-name="Path 107" d="M1038.5,1305.25v-99.5l119.2,49.75Z" transform="translate(-1038.5 -1205.75)" fill="#fff"></path></svg>
                                </span>
                                                    </a>
                                                </figure>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-12 rcnt">
                                                <h2 class="mb-2"><?php echo $ncs->post_title;?></h2>
                                                <p><?php echo $ncs->post_content;?></p>
                                            </div>
                                        </div>
                                        <?php
                                        $map = tribe_get_embedded_map($ncs->ID);
                                        ?>
                                        <div class="mapevent">
                                            <?php
                                            // Display the map.
                                            do_action( 'tribe_events_single_meta_map_section_start' );
                                            echo $map;
                                            do_action( 'tribe_events_single_meta_map_section_end' );
                                            ?>
                                        </div>
                                        <footer class="pt-2 pb-2">
                                            <div class="row align-items-center">
                                                <div class="col text-lg-left text-md-left text-sm-center"><a href="javascript:void(0)">Add to Google Calendar</a></div>
                                                <div class="col text-lg-right text-md-right text-sm-center">
                                                    <a href="javascript:void(0)" class="close-btn"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"><g id="Group_357" data-name="Group 357" transform="translate(0.315 0.297)"><g id="Right_Arrow_Icon" data-name="Right Arrow Icon" transform="translate(-0.369 -0.35)"><rect id="bound" width="26" height="26" transform="translate(0.054 0.054)" fill="none"/><path id="Combined_Shape" data-name="Combined Shape" d="M11,0A11,11,0,1,1,0,11,11,11,0,0,1,11,0Z" transform="translate(2.054 1.054)" fill="#001a39"/></g><g id="Group_351" data-name="Group 351" transform="translate(3.918 12.499) rotate(-45)"><line id="Line_55" data-name="Line 55" x2="13.079" transform="translate(0 6.54)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2"/><line id="Line_56" data-name="Line 56" x1="13.079" transform="translate(6.54 0) rotate(90)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2"/></g></g>
                                                        </svg> Close
                                                    </a>
                                                </div>
                                            </div>
                                        </footer>
                                    </div>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    <?php endif;?>
                </div>

                <div class="col-12 pt-2 pb-2">
                    <a href="<?php bloginfo('url');?>/events/" class="btn more-btn">More</a>
                </div>
            </div>
            <?php endif;?>
            <!-- .Calender end-->

        </div>
    </section>
    <!-- /.sticky-blog end -->
<?php
get_footer();
