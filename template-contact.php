<?php
/**
 * Template Name: Contact Template
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
    <!-- /.contact-area start -->
    <section class="contact-area inner-page-wrapper">
        <div class="container">
            <div class="row">
                <header class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <h2 class="section-title"><?php echo get_field('contact_page_heading', 'option'); ?></h2>
                </header>
            </div>
            <?php
            $contact_page_map_section = get_field('contact_page_map_section', 'option');
            if( !empty( $contact_page_map_section ) ) :
                $count = 1;
                foreach ( $contact_page_map_section as $cps ) :
            ?>
            <div class="row mb-5">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h3 class="text-primary-color mb-4"><?php echo $cps['contact_page_map_section_heading'];?></h3>
                    <?php echo $cps['contact_page_map_section_address'];?>
                </div>
                <!-- /.col-md-3 -->
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="map" id="map_<?php echo $count;?>" data-html="<?php echo $cps['contact_page_map_section_map_address'];?>"></div>
                </div>
                <!-- /.col-md-9 -->
            </div>
            <?php $count++;endforeach; endif;?>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="contact-form">
                        <?php echo do_shortcode('[contact-form-7 id="147" title="Contact form 1"]');?>
                    </div>
                </div>
                <!-- /.col-md-9 -->
                <div class="col-lg-3 col-md-3 col-sm-12 ml-auto">
                    <a href="tel:<?php echo get_field('contact_call_us_number', 'option');?>">
                        <figure class="contact-item text-center">
                            <img alt="logo" class="lazy" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo get_field('contact_call_image', 'option');?>"/>
                            <figcaption>
                                <span class="title-tootlip"><?php echo get_field('contact_call_us_text', 'option');?></span>
                                <span class="cell-number"><?php echo get_field('contact_call_us_number', 'option');?></span>
                            </figcaption>
                        </figure>
                    </a>
                    <figure class="contact-item text-center">
                        <img alt="logo" class="lazy" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo get_field('contact_page_logo', 'option');?>"/>
                        <figcaption class="mt-4">
                            <?php echo get_field('contact_page_text', 'option');?>
                        </figcaption>
                    </figure>
                </div>
                <!-- /.col-md-3 -->
            </div>
        </div>
    </section>
    <!-- /.contact-area end -->
<?php
get_footer();
