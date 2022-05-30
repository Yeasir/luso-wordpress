<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package luso
 */

?>
    <?php
    $service_area_section = get_field('service_area_section', 'option');
    if( !empty( $service_area_section ) ) :
        $bg_colors = ['bg-primary','bg-sky-blue','bg-yellow','bg-dark-red'];
    ?>
    <!-- /.service-area start -->
    <section class="service-area">
        <div class="container">
            <div class="row">
                <?php foreach ( $service_area_section as $key => $sas ) :
                    $title = get_the_title($sas);
                    if( $sas->post_name === 'policy-annuity-forms' ){
                        $title = 'Forms';
                    }
                    ?>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                    <a href="<?php the_permalink( $sas );?>">
                        <figure class="service-item">
                            <img alt="logo" class="lazy" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo get_the_post_thumbnail_url( $sas );?>"/>
                            <figcaption class="service-item--caption <?php echo $bg_colors[$key];?>">
                                <span class="h3"><?php echo $title;?></span>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
    <!-- /.service-area end -->
    <?php endif;?>
</main>
<!-- /#main end -->

<!-- /.footer start -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 widget">
                        <h5 class="mb-4 h3 text-uppercase">Home Office</h5>
                        <?php echo get_field('home_office', 'option', false);?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 widget">
                        <h5 class="mb-4 h3 text-uppercase">East Coast Office</h5>
                        <?php echo get_field('east_coast_office', 'option', false);?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12 widget">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-sm-12 p-0 text-lg-left text-md-left text-sm-center">
                                <a class="custom-logo-link" href="<?php bloginfo('url');?>">
                                    <img alt="logo" class="lazy" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo get_field('footer_logo', 'option');?>"/>
                                </a>
                                <?php
                                $social_menu = get_field('social_menu', 'option');
                                if( !empty( $social_menu ) ) :
                                ?>
                                <ul class="list-inline social-link mt-3">
                                    <?php foreach ( $social_menu as $sm ) : ?>
                                    <li class="list-inline-item"><a href="<?php echo $sm['social_url'];?>"><?php echo $sm['social_icon'];?></a></li>
                                    <?php endforeach;?>
                                </ul>
                                <?php endif;?>
                            </div>
                            <div class="col-lg-6 col-sm-12 p-0">
                                <?php
                                wp_nav_menu( array(
                                    'menu_class'        => "list-unstyled mb-4 footer-menu",
                                    'container'         => "",
                                    'theme_location'    => 'menu-footer1'
                                ) );

                                wp_nav_menu( array(
                                    'menu_class'        => "list-unstyled mb-4 footer-menu",
                                    'container'         => "",
                                    'theme_location'    => 'menu-footer2'
                                ) );
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12 widget">
                        <h5 class="mb-4 h3 text-uppercase">Stay Updated</h5>
                        <?php echo do_shortcode('[newsletter_form form="1"]');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /.footer end -->

<!-- Back to top button -->
<a href="javascript:void(0)" id="scroll" style="display: none;"><i class="fa fa-angle-double-up"></i></a>
<!-- Back to top button -->

<?php wp_footer(); ?>

</body>
</html>
