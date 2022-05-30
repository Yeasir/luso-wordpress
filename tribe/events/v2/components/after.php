<?php
/**
 * Component: After Events
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/components/after.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 4.9.11
 *
 * @var string $after_events HTML stored on the Advanced settings to be printed after the Events.
 */

if ( empty( $after_events ) ) {
	return;
}
?>
<div class="tribe-events-after-html">
	<?php echo $after_events; ?>
</div>
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
                $map = tribe_get_embedded_map();
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