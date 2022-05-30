<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package luso
 */

get_header();
?>
    <?php
    $home_slider = get_field('home_slider', 'option');
    if( !empty( $home_slider ) ) :
    ?>
    <!-- /.hero-wrapper start -->
    <section class="hero-wrapper">
        <div class="container-fluid p-0">
            <ul class="hero-slider gradiant-overlay-blue">
                <?php foreach ( $home_slider as $hs ) : ?>
                <li class="<?php //echo $hs['slider_class'];?>">
                    <a href="<?php echo $hs['slider_url'];?>">
                        <span class="slide lazy" style="background-image: url('<?php bloginfo('template_url');?>/images/_blank.png')" data-bg="<?php echo $hs['slider_image']['url'];?>">
                            <span class="container-box">
                                  <span class="hero-slider_content"><h1 class="hero-slider__title fade-in"><?php echo $hs['slider_title'];?></h1></span>
                            </span>
                        </span>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </section>
    <!-- /.hero-wrapper end -->
    <?php endif;?>
    <!-- /.feature-video start -->
    <section class="feature-video">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <figure class="promo-video">
                        <img alt="poster" class="lazy" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo get_field('home_page_feature_video_poster', 'option'); ?>"/>
                        <a data-fancybox href="<?php echo get_field('home_page_feature_video_url', 'option'); ?>" class="video-link">
                            <span class="play-btn">
                               <svg xmlns="http://www.w3.org/2000/svg" width="138" height="140" viewBox="0 0 138 140">
                                    <path id="Path_5" data-name="Path 5" d="M617,1462l-138,70V1392Z" transform="translate(-479 -1392)" fill="#fff"/>
                                </svg>
                            </span>
                        </a>
                    </figure>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="about-nfo-box">
                        <?php echo get_field('home_page_feature_video_content', 'option'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.feature-video end -->
<?php
get_footer();
