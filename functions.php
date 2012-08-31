<?php
/**
 * Maja Lind functions and definitions
 *
 * @package Maja Lind
 * @since Maja Lind 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Maja Lind 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'maja_lind_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Maja Lind 1.0
 */
function maja_lind_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Maja Lind, use a find and replace
	 * to change 'maja_lind' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'maja_lind', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	
	
	add_theme_support( 'post-thumbnails' );


if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'slide-img', 400, 250 );
	add_image_size( 'post-img', 600, 200, true);
}

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'maja_lind' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // maja_lind_setup
add_action( 'after_setup_theme', 'maja_lind_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Maja Lind 1.0
 */
function maja_lind_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidomeny', 'maja_lind' ),
		'description' => __('Sidomeny för startsidan'),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Bloggsidomeny', 'maja_lind' ),
		'description' => __('Sidomeny för nyhetssidan'),
		'id' => 'sidebar-blog',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer', 'maja_lind' ),
		'description' => __('Footer. OBS! Endast tre widgets ryms.'),
		'id' => 'footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'maja_lind_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function maja_lind_scripts() {
	global $post;

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'maja_lind_scripts' );

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'publications',
		array(
			'labels' => array(
				'name' => _x('Publikationer', 'post type general name'),
				'singular_name' => _x('Publikation', 'post type singular name'),
				'add_new' => _x('Lägg till', 'slide'),
				'add_new_item' => __('Lägg till ny publikation'),
				'edit_item' => __('Redigera publikation'),
				'new_item' => __('Ny publikation'),
				'view_item' => __('Visa publikation'),
				'search_items' => __('Sök publikationer'),
				'not_found' => __('Inga publikationer funna'),
				'not_found_in_trash' => __('Inga publikationer funna i papperskorgen'), 
				'parent_item_colon' => '',
				'menu_name' => 'Publikationer',
			),
			
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail'),
		)
	);
}

/* Register a Custom Post Type (Slide) */
add_action('init', 'slide_init');
function slide_init() {
	$labels = array(
		'name' => _x('Slides', 'post type general name'),
		'singular_name' => _x('Slide', 'post type singular name'),
		'add_new' => _x('Lägg till', 'slide'),
		'add_new_item' => __('Lägg till ny slide'),
		'edit_item' => __('Redigera slide'),
		'new_item' => __('Ny slide'),
		'view_item' => __('Visa slide'),
		'search_items' => __('Sök slides'),
		'not_found' => __('Inga slides funna'),
		'not_found_in_trash' => __('Inga slides funna i papperskorgen'), 
		'parent_item_colon' => '',
		'menu_name' => 'Bildspel'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail'),
		'register_meta_box_cb' => 'add_slide_link'
	); 
	register_post_type('slide', $args);
}

function add_slide_link() {
    add_meta_box('slide_link', 'Slide-länk', 'print_slide_link_form', 'slide', 'side', 'default');
}

function print_slide_link_form() {
    global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    // Get the location data if its already been entered
    $linktext = get_post_meta($post->ID, '_linktext', true);
        $url = get_post_meta($post->ID, '_url', true);
    // Echo out the field
        echo '<label for="_linktext">Länktext:</label>';
    echo '<input type="text" name="_linktext" value="' . $linktext  . '" class="widefat" />';
        echo '<label for="_url">URL/Länkadress: (Glöm inte http://)</label>';
        echo '<input type="text" name="_url" value="' . $url  . '" class="widefat" />';
}
// Save the Metabox Data
function save_slide_link($post_id, $post) {
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
		return $post->ID;
	}
	
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
        
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    $slide_link['_linktext'] = $_POST['_linktext'];
    $slide_link['_url'] = $_POST['_url'];
    
    // Add values of $events_meta as custom fields
    foreach ($slide_link as $key => $value) { // Cycle through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
}
add_action('save_post', 'save_slide_link', 1, 2); // save the custom fields

/* Update Slide Messages */
add_filter('post_updated_messages', 'slide_updated_messages');
function slide_updated_messages($messages) {
	global $post, $post_ID;
	$messages['slide'] = array(
		0 => '',
		1 => sprintf(__('Slide uppdaterad.'), esc_url(get_permalink($post_ID))),
		2 => __('Specialfält uppdaterat.'),
		3 => __('Specialfält raderat.'),
		4 => __('Slide uppdaterad.'),
		5 => isset($_GET['revision']) ? sprintf(__('Slide återställdes till version %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
		6 => sprintf(__('Slide publicerad.'), esc_url(get_permalink($post_ID))),
		7 => __('Slide sparad.'),
		8 => sprintf(__('Slide tillagd.'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
		9 => sprintf(__('Slide schemalagd till: <strong>%1$s</strong>. '), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
		10 => sprintf(__('Slide-utkast uppdaterat.'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
	);
	return $messages;
}



/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );
