<?php
/**
 * Template Name: Staff Template
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
    <!-- /.staff-area start -->
    <section class="staff-area inner-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 m-auto text-center">
                    <header>
                        <h2 class="section-title"><?php echo get_field('liso-american_financial_staff_heading', 'option'); ?></h2>
                    </header>
                    <div class="content mt-5">
                        <?php echo get_field('liso-american_financial_staff_address', 'option'); ?>
                    </div>
                </div>
            </div>
            <div class="row pb-2 pt-5 align-items-center justify-content-between">
                <?php $staff_list = get_field('staff_list', 'option'); ?>
                <?php foreach ($staff_list as $sl) : ?>
                <div class="col-lg-4 col-md-4 col-sm-6 text-center">
                    <figure class="staff">
                        <img alt="logo" class="lazy circular-img" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo $sl['staff_image'];?>"/>
                        <figcaption>
                            <h5 class="staff__name"><?php echo $sl['staff_name'];?></h5>
                            <span class="staff__designation"><?php echo $sl['staff_designation'];?></span>
                            <p class="staff__organisation"><?php echo $sl['staff_organisation'];?></p>
                        </figcaption>
                    </figure>
                </div>
                <?php endforeach; ?>
            </div>
            <?php $staff_address = get_field('staff_address', 'option'); ?>
            <?php if ($staff_address) : ?>
            <hr>
            <div class="row pb-3 pt-5 justify-content-between align-items-center">
                <?php foreach ($staff_address as $sa) :?>
                <div class="col-lg-5 col-md-4 col-sm-6 text-center">
                    <figure class="staff mb-30">
                        <h3 class="staff__office-name text-primary-color"><?php echo $sa['staff_address_heading'];?></h3>
                        <img alt="logo" class="lazy circular-img" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo $sa['staff_image_addr'];?>"/>
                        <figcaption>
                            <h5 class="staff__name"><?php echo $sa['staff_name_addr'];?></h5>
                            <span class="staff__designation"><?php echo $sa['staff_designation_addr'];?></span>
                            <p class="staff__organisation"> <?php echo $sa['staff_organisation_addr'];?></p>
                            <address class="staff__address">
                                <?php echo $sa['staff_address_addr'];?>
                            </address>
                        </figcaption>
                    </figure>
                </div>
                <?php endforeach;?>
            </div>
            <?php endif;?>
        </div>
    </section>
    <!-- /.staff-area end -->
<?php
get_footer();
