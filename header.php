<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package luso
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php bloginfo('template_url');?>/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="<?php bloginfo('template_url');?>/images/favicon.png" type="image/x-icon">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!--/.header start -->
<header class="site-header" id="header">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-lg-left text-md-left text-sm-center">
                    <a class="custom-logo-link dark-logo" href="<?php bloginfo('url');?>">
                        <img alt="logo" class="lazy" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo get_field('logo', 'option'); ?>"/>
                    </a>

                    <a class="custom-logo-link white-logo" href="<?php bloginfo('url');?>">
                        <img alt="logo" class="lazy" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo get_field('white_logo', 'option'); ?>"/>
                    </a>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-lg-right text-md-right text-sm-center right-nfo">
                    <span class="d-block text-uppercase"><?php echo get_field('phone_text', 'option'); ?></span>
                    <a href="tel:<?php echo get_field('phone_number', 'option'); ?>" class="h2"><?php echo get_field('phone_number', 'option'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                    wp_nav_menu( array(
                        'menu_class'        => "navbar-nav mr-auto",
                        'container'         => "",
                        'theme_location'    => 'menu-header'
                    ) );
                    ?>
                    <form class="form-inline my-2 my-lg-0" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" class="form-control" placeholder="Search" />
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--/.header end -->

<!-- /#main start -->
<main id="main" class="site-main">
    <?php //global $template; echo $template;?>
