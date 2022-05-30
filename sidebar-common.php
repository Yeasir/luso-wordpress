<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package luso
 */

?>
<?php
$querired_object = get_queried_object();
?>
<div class="sidebar">
    <ul class="nav flex-column tab-list" id="about_tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link <?php if( isset( $querired_object->post_name ) && $querired_object->post_name === 'news' ) :?>active<?php endif;?>" href="<?php bloginfo('url');?>/news/" >Media / News / Press Kit</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if( isset( $querired_object->post_name ) && $querired_object->post_name === 'publications' ) :?>active<?php endif;?>"  href="<?php bloginfo('url');?>/publications/" >Luso-American Publications</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if( ( isset( $querired_object->post_name ) && $querired_object->post_name === 'events' || isset( $querired_object->name ) && $querired_object->name === 'tribe_events' ) ) :?>active<?php endif;?>" href="<?php bloginfo('url');?>/events/">Calendar of Events</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if( isset( $querired_object->post_name ) && $querired_object->post_name === 'videos-and-digital-media' ) :?>active<?php endif;?>" href="<?php bloginfo('url');?>/videos-and-digital-media/" >Videos and Digital Media</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if( isset( $querired_object->post_name ) && $querired_object->post_name === 'photo-galleries' ) :?>active<?php endif;?>" href="<?php bloginfo('url');?>/photo-galleries/">Photo Galleries</a>
        </li>
    </ul>
</div>
