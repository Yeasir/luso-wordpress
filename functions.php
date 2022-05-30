<?php
/**
 * luso functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package luso
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'luso_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function luso_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on luso, use a find and replace
		 * to change 'luso' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'luso', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-header' => esc_html__( 'Primary', 'luso' ),
            'menu-footer1' => esc_html__( 'Footer Menu 1', 'luso' ),
            'menu-footer2' => esc_html__( 'Footer Menu 2', 'luso' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'luso_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

        add_role(
            'agent',
            __( 'Agent' ),
            array(
                'read'         => true,  // true allows this capability
            )
        );

	}
endif;
add_action( 'after_setup_theme', 'luso_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function luso_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'luso_content_width', 640 );
}
add_action( 'after_setup_theme', 'luso_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function luso_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'luso' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'luso' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'luso_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function luso_scripts() {

    wp_enqueue_style( 'luso-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION, false );

    wp_enqueue_style( 'luso-all', get_template_directory_uri() . '/css/all.css', array(), _S_VERSION, false );


    wp_enqueue_style( 'luso-slick-theme', get_template_directory_uri() . '/css/slick-theme.css', array(), _S_VERSION, false );

    wp_enqueue_style( 'luso-slick', get_template_directory_uri() . '/css/slick.css', array(), _S_VERSION, false );

    wp_enqueue_style( 'luso-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css', array(), _S_VERSION, false );

	wp_enqueue_style( 'luso-style', get_stylesheet_uri(), array(), _S_VERSION );

    wp_enqueue_style( 'luso-custom-css', get_template_directory_uri() . '/css/custom.css', array(), _S_VERSION, false );

	wp_style_add_data( 'luso-style', 'rtl', 'replace' );

    wp_enqueue_script( 'luso-modernizr', get_template_directory_uri() . '/js/modernizr-2.8.3.min.js', array('jquery'), _S_VERSION, false );

	wp_enqueue_script( 'luso-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'luso-popper', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'luso-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'luso-fancybox-js', get_template_directory_uri() . '/js/jquery.fancybox.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'luso-slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'luso-lazyload-js', get_template_directory_uri() . '/js/lazyload.min.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    if( is_page_template( 'template-contact.php' ) ){
        wp_enqueue_script( 'maps-api', 'http://maps.google.com/maps/api/js?key=AIzaSyABqK-5ngi3F1hrEsk7-mCcBPsjHM5_Gj0', array('jquery'), time(), true );
        wp_enqueue_script( 'maps-map', get_template_directory_uri() . '/js/map.js', array('jquery'), time(), true );
    }

    wp_enqueue_script( 'print-this', get_template_directory_uri() . '/js/printThis.js', array('jquery'), time(), true );
    wp_enqueue_script( 'custom-main', get_template_directory_uri() . '/js/main.js', array('jquery'), time(), true );
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/functions.js', array('jquery'), time(), true );

    $jsvars = array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'homeurl' => trailingslashit(home_url()),
    );
    wp_localize_script( 'jquery', 'js_var', $jsvars );
}
add_action( 'wp_enqueue_scripts', 'luso_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//checking user role in profile page
add_action( 'show_user_profile', 'user_fields_for_agent', 10);
add_action( 'edit_user_profile', 'user_fields_for_agent', 10);
function user_fields_for_agent( $user ){
    //Setting up variables to hold the registration data
    //$selected_register = esc_attr(get_the_author_meta( 'registered_as', $user->ID ));
    //$selected = get_the_author_meta( 'unit_type', $user->ID );
    $agent_latitude = esc_attr(get_the_author_meta( 'agent_latitude', $user->ID) );
    $agent_longitude = esc_attr(get_the_author_meta( 'agent_longitude', $user->ID) );
    $agent_address = esc_attr(get_the_author_meta( 'agent_address', $user->ID) );
    $agent_phone = esc_attr(get_the_author_meta( 'agent_phone', $user->ID) );
    $agent_zipcode = esc_attr(get_the_author_meta( 'agent_zipcode', $user->ID) );

    switch ($user->roles[0]) {

        case 'agent':
            echo '<h3>Agent Details</h3>';
            echo '<table class="form-table"><tbody><tr>';
            echo '</tr>';
            echo '<tr><th>Address</th>';
            echo '<td><input type="text" name="agent_address" id="agent_address" value="'; echo $agent_address; echo '" class="regular-text" /></td>';
            echo '</tr>';
            echo '</tr>';
            echo '<tr><th>Phone</th>';
            echo '<td><input type="text" name="agent_phone" id="agent_phone" value="'; echo $agent_phone; echo '" class="regular-text" /></td>';
            echo '</tr>';
            echo '<tr><th>Zip Code</th>';
            echo '<td><input type="text" name="agent_zipcode" id="agent_zipcode" value="'; echo $agent_zipcode; echo '" class="regular-text" /></td>';
            echo '</tr>';
            echo '<tr><th>Latitude</th>';
            echo '<td><input type="text" name="agent_latitude" id="agent_latitude" value="'; echo $agent_latitude; echo '" class="regular-text" /></td>';
            echo '</tr>';
            echo '<tr><th>Longitude</th>';
            echo '<td><input type="text" name="agent_longitude" id="agent_longitude" value="'; echo $agent_longitude; echo '" class="regular-text" /></td>';
            echo '</tr>';
            echo '</tbody></table>';
            break;
    }
}



//saving the user fields
add_action( 'personal_options_update', 'save_user_fields' );
add_action( 'edit_user_profile_update', 'save_user_fields' );

function save_user_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
    update_user_meta( $user_id, 'agent_address', sanitize_text_field( $_POST['agent_address'] ) );
    update_user_meta( $user_id, 'agent_phone', sanitize_text_field( $_POST['agent_phone'] ) );
    update_user_meta( $user_id, 'agent_zipcode', sanitize_text_field( $_POST['agent_zipcode'] ) );
    update_user_meta( $user_id, 'agent_latitude', sanitize_text_field( $_POST['agent_latitude'] ) );
    update_user_meta( $user_id, 'agent_longitude', sanitize_text_field( $_POST['agent_longitude'] ) );
}

function milesToKilometers($miles){
    return $miles * 1.60934;
}

function search_agent(){
    global $wpdb;
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $distance = intval($_POST['distance']);
    $distance = milesToKilometers($distance);
    $zipcode = $_POST['postcode_search'];
    $earth_radius = 6371;

    if( !empty( $zipcode ) ){
        $sql = $wpdb->prepare("
        SELECT DISTINCT
            u.ID,
            latitude.meta_value as locLat,
            longitude.meta_value as locLong,
            ( %d * acos(
            cos( radians( %s ) )
            * cos( radians( latitude.meta_value ) )
            * cos( radians( longitude.meta_value ) - radians( %s ) )
            + sin( radians( %s ) )
            * sin( radians( latitude.meta_value ) )
            ) )
            AS distance
        FROM $wpdb->users u
        INNER JOIN $wpdb->usermeta latitude ON u.ID = latitude.user_id
        INNER JOIN $wpdb->usermeta longitude ON u.ID = longitude.user_id
        INNER JOIN $wpdb->usermeta zipcode ON u.ID = zipcode.user_id
        WHERE 1 = 1
        AND latitude.meta_key = 'agent_latitude'
        AND longitude.meta_key = 'agent_longitude'
        AND ( zipcode.meta_key = 'agent_zipcode' AND zipcode.meta_value = %s )
        HAVING distance < %s
        ORDER BY distance ASC",
            $earth_radius,
            $lat,
            $lng,
            $lat,
            $zipcode,
            $distance
        );
    }else {
        $sql = $wpdb->prepare("
        SELECT DISTINCT
            u.ID,
            latitude.meta_value as locLat,
            longitude.meta_value as locLong,
            ( %d * acos(
            cos( radians( %s ) )
            * cos( radians( latitude.meta_value ) )
            * cos( radians( longitude.meta_value ) - radians( %s ) )
            + sin( radians( %s ) )
            * sin( radians( latitude.meta_value ) )
            ) )
            AS distance
        FROM $wpdb->users u
        INNER JOIN $wpdb->usermeta latitude ON u.ID = latitude.user_id
        INNER JOIN $wpdb->usermeta longitude ON u.ID = longitude.user_id
        WHERE 1 = 1
        AND latitude.meta_key = 'agent_latitude'
        AND longitude.meta_key = 'agent_longitude'
        HAVING distance < %s
        ORDER BY distance ASC",
            $earth_radius,
            $lat,
            $lng,
            $lat,
            $distance
        );
    }

    $nearbyAgents = $wpdb->get_results( $sql );
    $output = '';
    if ( !empty( $nearbyAgents ) ) {
        foreach ($nearbyAgents as $nearbyAgent) :
            $user_id = $nearbyAgent->ID;
            $image_url = get_avatar_url( $user_id );
            $agent_address = get_user_meta( $user_id, 'agent_address', true );
            $agent_phone = get_user_meta( $user_id, 'agent_phone', true );
            $agent_zipcode = get_user_meta( $user_id, 'agent_zipcode', true );
            $output .= '<div class="col-lg-3 col-md-3 col-sm-6 text-center">';
                $output .= '<figure class="agent-item">';
                    $output .= '<img alt="staff" class="lazy circular-img agent-item__agent-img" src="'.get_bloginfo('template_url').'/images/_blank.png" data-src="'.$image_url.'"/>';
                        $output .= '<figcaption>';
                            $output .= '<h3 class="agent-item__name">'.esc_html( $nearbyAgent->display_name ).'</h3>';
                            $output .= '<span class="agent-item__designation">'.$agent_address.'</span>';
                            $output .= '<span class="agent-item__card-number"> '.$agent_phone.'</span>';
                        $output .= '</figcaption>';
                    $output .= '</figure>';
            $output .= '</div>';
        endforeach;
        echo json_encode( array( 'status' => 1, 'output' => $output ) );
    }else{
        $args = array(
            'role'    => 'agent',
            'orderby' => 'user_nicename',
            'order'   => 'ASC'
        );
        $users = get_users( $args );
        if( !empty( $users ) ) :
            foreach ( $users as $user ) :
                $image_url = get_avatar_url( $user->ID );
                $image_url = isset($image_url) ? $image_url : get_bloginfo('template_url').'/images/agent/placeholder.png';
                $agent_address = get_user_meta( $user->ID, 'agent_address', true );
                $agent_phone = get_user_meta( $user->ID, 'agent_phone', true );
                $agent_zipcode = get_user_meta( $user->ID, 'agent_zipcode', true );
                $output .= '<div class="col-lg-3 col-md-3 col-sm-6 text-center">';
                $output .= '<figure class="agent-item">';
                $output .= '<img alt="staff" class="lazy circular-img agent-item__agent-img" src="'.get_bloginfo('template_url').'/images/_blank.png" data-src="'.$image_url.'"/>';
                $output .= '<figcaption>';
                $output .= '<h3 class="agent-item__name">'.esc_html( $user->display_name ).'</h3>';
                $output .= '<span class="agent-item__designation">'.$agent_address.'</span>';
                $output .= '<span class="agent-item__card-number"> '.$agent_phone.'</span>';
                $output .= '</figcaption>';
                $output .= '</figure>';
                $output .= '</div>';
            endforeach;
        endif;
        echo json_encode( array( 'status' => 0, 'output' => $output ) );
    }

    exit();
}

add_action('wp_ajax_search_agent', 'search_agent');
add_action('wp_ajax_nopriv_search_agent', 'search_agent');

add_filter( 'body_class','filter_body_classes' );
function filter_body_classes( $classes ) {

    if ( is_home() ) {
        $classes[] = 'site-header__transparent_enable';
    }

    return $classes;

}

function filter_plugin_updates( $value ) {
    unset( $value->response['advanced-custom-fields/acf.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

// ACF Option Page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Header Settings',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Home Page',
        'menu_title'	=> 'Home Page',
        'parent_slug'	=> 'theme-general-settings',
    ));

    /*acf_add_options_sub_page(array(
        'page_title' 	=> 'About Page',
        'menu_title'	=> 'About Page',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Product Page',
        'menu_title'	=> 'Product Page',
        'parent_slug'	=> 'theme-general-settings',
    ));*/

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Staff Page',
        'menu_title'	=> 'Staff Page',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Contact Page',
        'menu_title'	=> 'Contact Page',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Photo Gallery Page',
        'menu_title'	=> 'Photo Gallery Page',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'News Page',
        'menu_title'	=> 'News Page',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Policy & Annuity Forms',
        'menu_title'	=> 'Policy & Annuity Forms',
        'parent_slug'	=> 'theme-general-settings',
    ));
}

function my_secondary_menu_classes( $classes, $item, $args ) {
    // Only affect the menu placed in the 'secondary' wp_nav_bar() theme location
    if ( 'menu-header' === $args->theme_location ) {
        // Make these items 3-columns wide in Bootstrap
        $classes[] = 'nav-item';
    }

    return $classes;
}

add_filter( 'nav_menu_css_class', 'my_secondary_menu_classes', 10, 3 );

add_filter( 'nav_menu_link_attributes', function( $atts, $item, $args, $depth ) {
    if( $args->theme_location == 'menu-header' ):
        $atts['class'] = "nav-link";
    endif;
    return $atts;
}, 100, 4 );

function product_page_redirect() {
    if ( is_page( 'Products' ) ) {
        $page = get_page_by_title('Life Insurance');
        wp_redirect( get_permalink( $page ) );
        die;
    }
}
add_action( 'template_redirect', 'product_page_redirect' );

function about_page_redirect() {
    if ( is_page( 'About' ) ) {
        wp_redirect( get_permalink( 153 ) );
        die;
    }
}
add_action( 'template_redirect', 'about_page_redirect' );

if ( ! function_exists( 'register_custom_post_type' ) ) {

    function register_weblinks_custom_post_type() {

        /**
         * Post Type: Web Links.
         */

        $labels = [
            "name" => __( "Web Links", "luso" ),
            "singular_name" => __( "Web Links", "luso" ),
        ];

        $args = [
            "label" => __( "Web Links", "luso" ),
            "labels" => $labels,
            "description" => __( "Create a post for the web links", "luso" ),
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "register_meta_box_cb" => "weblinks_meta_box",
            "hierarchical" => false,
            "rewrite" => [ "slug" => "weblinks", "with_front" => true ],
            "query_var" => true,
            "supports" => [ "title", "thumbnail" ],
        ];

        register_post_type( "weblinks", $args );
    }

}

add_action( 'init', 'register_weblinks_custom_post_type' );

function weblinks_meta_box() {
    add_meta_box(
        'weblinks-meta-id',
        __( 'Web Links Metadata', 'luso' ),
        'weblinks_meta_box_callback'
    );
}

function weblinks_meta_box_callback( $post ) {
    wp_nonce_field( 'weblink_metabox_nonce', 'weblink_metabox_nonce' );
    $weblink_subtitle = get_post_meta( $post->ID, '_weblink_subtitle', true );
    $weblink_video_url = get_post_meta( $post->ID, '_weblink_video_url', true );
    echo '<label><b>Subtitle:</b> </label><input style="width:100%" id="weblink_subtitle" name="weblink_subtitle" value="' . esc_attr( $weblink_subtitle ) . '">';
    echo '<label><b>Video URL:</b> </label><input style="width:100%" id="weblink_video_url" name="weblink_video_url" value="' . esc_attr( $weblink_video_url ) . '">';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id
 */
function save_weblinks_meta_box_data( $post_id ) {

    // Check if our nonce is set.
    if ( ! isset( $_POST['weblink_metabox_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['weblink_metabox_nonce'], 'weblink_metabox_nonce' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( ! current_user_can( 'edit_page', $post_id ) ) {
        return;
    }

    /* OK, it's safe for us to save the data now. */

    // Sanitize user input.
    $weblink_subtitle = sanitize_text_field( $_POST['weblink_subtitle'] );
    $weblink_video_url = sanitize_text_field( $_POST['weblink_video_url'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, '_weblink_subtitle', $weblink_subtitle );
    update_post_meta( $post_id, '_weblink_video_url', $weblink_video_url );
}

add_action( 'save_post', 'save_weblinks_meta_box_data' );

function load_search_results(){
    $query = $_POST['query'];
    $vn = 0;
    if( !empty( $_POST['offset'] ) ){
        $offset = $_POST['offset'];
        $args = array(
            'post_type' => 'weblinks',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            's' => $query,
            'offset' => $offset * 3
        );
        $vn = $offset;
    }else {
        $args = array(
            'post_type' => 'weblinks',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            's' => $query,
        );
    }
    $search = new WP_Query( $args );
    $output = '';
    if ( $search->have_posts() ) :
        $output .= '<div class="row">';
        while ( $search->have_posts() ) : $search->the_post();
            $weblink_subtitle = get_post_meta( $search->post->ID, '_weblink_subtitle', true );
            $weblink_video_url = get_post_meta( $search->post->ID, '_weblink_video_url', true );
            $featured_img_url = get_the_post_thumbnail_url($search->post->ID,'full');
            $output .= '<a href="'.$featured_img_url.'" data-fancybox="video'.$vn.'" data-title="'.get_the_title().'"';
            if( !empty( $weblink_video_url ) ):
                $output .= 'data-product_url="'.$weblink_video_url.'"';
            endif;
            if( !empty( $weblink_subtitle ) ):
                $output .= 'data-content="'.$weblink_subtitle.'"';
            endif;
            $output .= 'class="';
            if( empty( $weblink_video_url ) ):
                $output .= 'gallery-category-item ';
            endif;
            if( !empty( $weblink_video_url ) ):
                $output .= 'promo-video ';
            endif;
            $output .= 'video-item ';
            if( !empty( $weblink_video_url ) ):
                $output .= 'video-item-popup ';
            endif;
            $output .= 'col-lg-4 col-md-6 col-sm-12 text-center">
            <figure>
                <img alt="poster" class="lazy" src="'.get_bloginfo('template_url').'/images/_blank.png" data-src="'.$featured_img_url.'"/>';
                if( !empty( $weblink_video_url ) ):
                    $output .= '<figcaption class="video-caption">
                    <h4>'.get_the_title().'</h4>
                    <span class="mb-2 d-block">'.$weblink_subtitle.'</span>
                    <div class="video-link">
                        <span class="play-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="119.202" height="99.499" viewBox="0 0 119.202 99.499">
                                  <path id="Path_107" data-name="Path 107" d="M1038.5,1305.25v-99.5l119.2,49.75Z" transform="translate(-1038.5 -1205.75)" fill="#fff"></path>
                            </svg>
                        </span>
                        Play video
                    </div>
                </figcaption>';
                endif;
            $output .= '</figure>
        </a>';
        endwhile;
        $output .= '</div>';
        if( $search->max_num_pages > 1 ):
            $output .= '<nav aria-label="Page navigation" class="float-right">';
                $output .= '<ul class="pagination ajax">';
                    for($i=1;$i<=$search->max_num_pages;$i++) :
                    $output .= '<li class="page-item">';
                        $output .= '<a class="page-link';
                        if( $i==1 && empty( $_POST['offset'] ) ) :
                            $output .= ' current';
                        elseif (!empty( $_POST['offset'] ) && $i==$_POST['offset'] + 1) :
                            $output .= ' current';
                        endif;
                        $output .= '" href="javascript:void(0);">'.$i.'</a>';
                    $output .= '</li>';
                    endfor;
                $output .= '</ul>';
            $output .= '</nav>';
        /*$output .= '<nav aria-label="Page navigation" class="float-right">';
        $big = 999999999; // need an unlikely integer
        $links = paginate_links( array(
            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $search->max_num_pages,
            'prev_next'=>false,
            'type'=>'array',
        ) );

        if ( $links ) :
            $output .= '<ul class="pagination ajax">';
            $output .= '<li class="page-item">';
            $output .= join( '</li><li class="page-item">', $links );
            $output .= '</li>';

            $output .= '</ul>';

        endif;
        $output .= '</nav>';*/

        endif;
    else :
        $output .= '<p>Nothings found!</p>';
        wp_reset_postdata();
    endif;
    echo $output;
    die();
}

add_action('wp_ajax_load_search_results', 'load_search_results');
add_action('wp_ajax_nopriv_load_search_results', 'load_search_results');


/*add_filter( 'tribe_events_views_v2_view_breakpoints', '__return_empty_array' );
add_filter( 'tribe_events_kill_responsive', '__return_true' );*/
function customize_tribe_events_v2_breakpoints( $breakpoints ) {
    $breakpoints = [
        'xsmall' => 320,
        'medium' => 480,
        'full'   => 600,
    ];

    return $breakpoints;
}

add_filter( 'tribe_events_views_v2_view_breakpoints', 'customize_tribe_events_v2_breakpoints' );
