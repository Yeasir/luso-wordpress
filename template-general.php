<?php
/**
 * Template Name: General Page Template
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
                <?php
                global $post;
                $classes = ['publications'=>'publication_tab_content'];
                ?>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="tab-content" id="<?php echo $classes[$post->post_name];?>">
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
