<?php
/**
 * Template Name: Videos and Digital Media Template
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
    <section class="video-digital inner-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
                    <?php get_sidebar('common');?>
                </div>
                <!-- /.col-md-4 -->
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="tab-content" id="video_tab_content">
                        <header class="text-center">
                            <h2 class="section-title"><?php the_title();?></h2>
                        </header>
                        <!--<div class="col-lg-9 col-md-12 col-sm-12 m-auto">-->
                        <div class="col-lg-10 col-md-12 col-sm-12 m-auto">
                            <div class="row mb-4">
                                <div class="col-lg-6 col-md-6 col-sm-12 text-lg-left text-md-left text-sm-center">
                                    <h3 class="text-primary-color mb-3">Web Links</h3>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-lg-right text-md-right text-sm-center">
                                    <form class="search" id="weblinkSrcFrm" method="get" class="form-inline my-2 my-lg-0 justify-content-end" action="">
                                        <div class="form-group has-search w-100">
                                            <span class="fa fa-search form-control-feedback"></span>
                                            <input type="search" class="form-control w-100" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="vdm">
                                <?php
                                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                                $the_query = new WP_Query(
                                    array(
                                        'posts_per_page'=> 3,
                                        'post_type'=>'weblinks',
                                        'paged' => $paged,
                                    )
                                );
                                if ( $the_query -> have_posts() ) :
                                ?>
                                <div class="row" id="itmCont">
                                    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                                    <?php
                                    $weblink_subtitle = get_post_meta( $post->ID, '_weblink_subtitle', true );
                                    $weblink_video_url = get_post_meta( $post->ID, '_weblink_video_url', true );
                                    $featured_img_url = get_the_post_thumbnail_url($post->ID,'full');
                                    ?>
                                    <a  href="<?php echo $featured_img_url;?>" data-fancybox="video<?php echo $paged;?>" data-title="<?php the_title();?>"<?php if( !empty( $weblink_video_url ) ):?> data-product_url="<?php echo $weblink_video_url;?>"<?php endif;?> <?php if( !empty( $weblink_subtitle ) ):?>data-content="<?php echo $weblink_subtitle;?>"<?php endif;?> class="<?php if( empty( $weblink_video_url ) ):?>gallery-category-item<?php endif;?> <?php if( !empty( $weblink_video_url ) ):?>promo-video<?php endif;?> video-item <?php if( !empty( $weblink_video_url ) ):?>video-item-popup<?php endif;?> col-lg-4 col-md-6 col-sm-12 text-center">
                                        <figure>
                                            <img alt="poster" class="lazy" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo $featured_img_url;?>"/>
                                            <?php if( !empty( $weblink_video_url ) ):?>
                                            <figcaption class="video-caption">
                                                <h4><?php the_title();?></h4>
                                                <span class="mb-2 d-block"><?php echo $weblink_subtitle;?></span>
                                                <div class="video-link">
                                                    <span class="play-btn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="119.202" height="99.499" viewBox="0 0 119.202 99.499">
                                                              <path id="Path_107" data-name="Path 107" d="M1038.5,1305.25v-99.5l119.2,49.75Z" transform="translate(-1038.5 -1205.75)" fill="#fff"></path>
                                                        </svg>
                                                    </span>
                                                    Play video
                                                </div>
                                            </figcaption>
                                            <?php endif;?>
                                        </figure>
                                    </a>
                                    <?php
                                    endwhile;
                                    ?>
                                </div>
                                <?php
                                    //echo $the_query->max_num_pages;
                                    if($the_query->max_num_pages > 1):
                                ?>
                                        <nav aria-label="Page navigation" class="float-right">
                                            <ul class="pagination ajax">
                                            <?php
                                            for($i=1;$i<=$the_query->max_num_pages;$i++) :?>
                                                <li class="page-item"><a class="page-link <?php if($i==1) :?>current<?php endif;?>" href="javascript:void(0);"><?php echo $i;?></a></li>
                                            <?php endfor;
                                            ?>
                                            </ul>
                                        </nav>

                                <!--<nav aria-label="Page navigation" class="float-right">
                                    <?php
                                    $big = 999999999; // need an unlikely integer
                                    $links = paginate_links( array(
                                        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                        'format' => '?paged=%#%',
                                        'current' => max( 1, get_query_var('paged') ),
                                        'total' => $the_query->max_num_pages,
                                        'prev_next'=>false,
                                        'type'=>'array',
                                    ) );

                                    if ( $links ) :
                                        echo '<ul class="pagination ajax">';
                                        echo '<li class="page-item">';
                                        echo join( '</li><li class="page-item">', $links );
                                        echo '</li>';

                                        echo '</ul>';
                                    endif;
                                    ?>
                                </nav>-->
                                    <?php endif;?>
                                <?php wp_reset_postdata();endif;?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-8 -->
            </div>
        </div>
    </section>
    <!-- /.about-area end -->
<?php
get_footer();
