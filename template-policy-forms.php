<?php
/**
 * Template Name: Policy Forms Template
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
    <!-- /.policy-form-area start -->
    <section class="policy-form inner-page-wrapper">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h1 class="text-primary-color"><?php the_title();?></h1>
                </div>
            </div>
            <?php
            $policy_forms = get_field('policy_forms', 'option');
            if( !empty( $policy_forms ) ) :
            ?>
            <div class="row pt-3 pb-3 align-items-center justify-content-center">
                <?php foreach ( $policy_forms as $pf ) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?php echo $pf['policy_form_url'];?>">
                        <figure class="form-item text-center">
                            <img alt="logo" class="lazy circular-img mb-5" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo $pf['policy_form_icon'];?>"/>
                            <figcaption>
                                <span class="text-navi-blue-color form-item_title"><?php echo $pf['policy_form_title'];?></span>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <?php endforeach; ?>

            </div>
            <?php endif;?>
        </div>
    </section>
    <!-- /.policy-form-area end -->
<?php
get_footer();
