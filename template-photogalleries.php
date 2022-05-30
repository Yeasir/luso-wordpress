<?php
/**
 * Template Name: Photo Gallery Template
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
                    <?php get_sidebar('common');?>
                </div>
                <!-- /.col-md-4 -->
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="tab-content" id="photo_tab_content">
                        <header class="text-center">
                            <h2 class="section-title"><?php the_title();?></h2>
                        </header>
                        <?php
                        $photo_galleries = get_field('photo_galleries', 'option');
                        if( !empty( $photo_galleries ) ) :
                            $counter = 1;
                        ?>
                            <div class="col-lg-9 col-md-12 col-sm-12 m-auto">
                                <div class="row justify-content-between">
                                    <?php foreach ( $photo_galleries as $photo_gallery ) : ?>
                                        <div class="col-lg-5 col-md-6 col-sm-12 text-center">
                                            <div class="gallery-wrapper">
                                                <a href="<?php echo $photo_gallery['gallery_poster_image'];?>" data-fancybox="gallery<?php echo $counter;?>" class="gallery-category-item" data-caption="<?php echo $photo_gallery['gallery_name'];?>">
                                                    <figure>
                                                        <img alt="poster" class="lazy" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo $photo_gallery['gallery_poster_image'];?>"/>
                                                        <figcaption class="pt-4">
                                                            <span><?php echo $photo_gallery['gallery_name'];?></span>
                                                        </figcaption>
                                                    </figure>
                                                </a>
                                                <?php foreach ( $photo_gallery['gallery_images'] as $gallery_image ) : ?>
                                                <a style="display: none" href="<?php echo $gallery_image['gallery_image'];?>" data-fancybox="gallery<?php echo $counter;?>" class="gallery-category-item" data-caption="<?php echo $photo_gallery['gallery_name'];?>">
                                                    <figure>
                                                        <img alt="poster" class="lazy" src="<?php echo $gallery_image['gallery_image'];?>" data-src="<?php echo $gallery_image['gallery_image'];?>"/>
                                                        <figcaption class="pt-4">
                                                            <span><?php echo $photo_gallery['gallery_name'];?></span>
                                                        </figcaption>
                                                    </figure>
                                                </a>
                                                <?php endforeach;?>
                                            </div>

                                        </div>
                                    <?php $counter++; endforeach;?>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
                <!-- /.col-md-8 -->
            </div>


        </div>
    </section>
    <!-- /.about-area end -->
<?php
get_footer();
