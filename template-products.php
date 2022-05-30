<?php
/**
 * Template Name: Products Template
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
    <!-- /.about-area start -->
    <section class="about-area inner-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
                    <div class="sidebar">
                        <h5 class="sidebar_title">Products</h5>
                        <?php
                        $current_querired_object = get_queried_object();

                        $parentPage = get_page_by_title( 'Products' );

                        $args = array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'post_parent'    => $parentPage->ID,
                            'order'          => 'ASC',
                            'orderby'        => 'menu_order'
                        );

                        $children = new WP_Query( $args );

                        if ( $children->have_posts() ) : ?>
                        <ul class="nav flex-column tab-list" id="product_tab">
                            <?php while ( $children->have_posts() ) : $children->the_post(); ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if( $current_querired_object->post_name == $post->post_name ) : ?>active<?php endif;?>" href="<?php the_permalink();?>"><?php the_title()?></a>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                        <?php endif; wp_reset_postdata(); ?>
                    </div>
                </div>
                <!-- /.col-md-4 -->
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="tab-content" id="product_tab_content">
                        <header class="text-center">
                            <h2 class="section-title"><?php the_title();?></h2>
                        </header>
                        <?php the_content();?>
                    </div>
                </div>
                <!-- /.col-md-8 -->
            </div>

        </div>
    </section>
    <!-- /.about-area end -->
<?php
get_footer();
