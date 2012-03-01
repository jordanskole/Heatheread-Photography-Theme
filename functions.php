<?


// call our init functions 
add_action('after_setup_theme', 'heatheread_setup');

/*
* setup all our init functions 
*/

function heatheread_setup() {

	/* Make Heatheread available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Eleven, use a find and replace
	 * to change 'heatheread' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'heatheread', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Load up our theme options page and related code.
	require( get_template_directory(). '/inc/includes.php' );

	// Grab Twenty Eleven's Ephemera widget.
	//require( get_template_directory() . '/inc/widgets.php' );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menu( 'primary', __( 'Primary Menu', 'heatheread_primary' ) );
	register_nav_menu('header', __('Header Menu', 'heatheread_header') );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image', 'video' ) );

	// Add support for custom backgrounds
	add_custom_background();

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );
	
}

/*
* register our bootstrap enqueue function with hook 'wp_enqueue_scripts' which can be used for front end CSS and JavaScript
*/
add_action('wp_enqueue_scripts', 'add_bootstrap_files');

/*
* create our function that will enqueue all the necessary bootstrap files 
*/
function add_bootstrap_files() {
	
	// register the twitter bootstrap css files to enqueue
	wp_register_style( 'twitter-bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	
	// register the tiny bit of padding we need to occur between bootstrap and bootstrap-resp
	wp_register_style('twitter-bootstrap-tween', get_template_directory_uri() . '/css/bootstrap-tween.css');
	
	// wp_register_style( 'twitter-bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_register_style( 'twitter-bootstrap-resp', get_template_directory_uri() . '/css/bootstrap-responsive.css' );
	// wp_register_style( 'twitter-bootstrap-resp-min', get_template_directory_uri() . '/css/bootstrap-responsive.min.css' );
	
	// register google's version of jQuery to avoid no conflict mode from WordPress
	wp_register_script('google-jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
	
	// register the twitter bootstrap js files to enqueue 
	wp_register_script( 'twitter-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('google-jquery') );
	//	wp_register_script('twitter-bootstrap-min', get_template_directory_uri() . '/js/bootstrap.js');
	
	// register the twitter bootstrap collapse jquery plugin
	// !important apparently bootstrap.js loads all the bootstrap plugins
	// wp_register_script('twitter-bootstrap-collapse', get_template_directory_uri() . '/js/bootstrap-collapse.js');
	
	// now enqueue the styles/scripts
	wp_enqueue_style('twitter-bootstrap');
	wp_enqueue_style('twitter-bootstrap-tween');
	wp_enqueue_style('twitter-bootstrap-resp');
	wp_enqueue_script('twitter-bootstrap');
	// wp_enqueue_script('twitter-bootstrap-collapse');
	
}

/*
* we need jQuery in order for our pinterest activities to work, and we also need to enqueue our masonry plugin
*/
add_action('wp_enqueue_scripts','add_masonry_files');
/*
* now lets create our jQuery masonry function it will be very similar to the bootstrap above only we will be dependent on jquery
*/

function add_masonry_files() {
	// register the masonry scripts 
	wp_register_script('jquery-masonry', get_template_directory_uri() . '/js/jquery.masonry.js', array('google-jquery'));
	//wp_register_script('jquery-masonry-min', get_template_directory_uri() . '/js/jquery.masonry.min.js', array('jquery'));
	
	// lets register infinite scroll in here as well. 
	wp_register_script('jquery-infinite-scroll', get_template_directory_uri() . '/js/jquery.infinitescroll.js',array('google-jquery'));
	// wp_register_script('jquery-infinite-scroll-min', get_template_directory_uri() . '/js/jquery.infinitescroll.min.js',array('jquery'));
	
	// now enqueue the scripts 
	wp_enqueue_script('jquery-masonry');
	// wp_enqueue_script('jquery-masonry-min');
	wp_enqueue_script('jquery-infinite-scroll');
	// wp_enqueue_script('jquery-infinite-scroll-min');
}


/*
* lets enqueue our included and very special dynamically generated css file
*/

// hook our function that registers & enqueue's our css file into WordPress
add_action('wp_enqueue_scripts','add_dynamic_style');

// create our function that registers & enqueue's the css file
function add_dynamic_style() {
	
	// register the dynamic css file by name with WordPress 
	wp_register_style('dynamic-style', get_template_directory_uri() . '/css/dynamic-style.php');
	
	// and now enqueue that bad boy
	wp_enqueue_style('dynamic-style');	

}



/*
* create and hook in a custom search form that we can use in our navigation that matches the defaults for bootstrap.
*/

add_filter( 'get_search_form', 'bootstrap_search_form' );

// our function to add the classes we need to the search form
function bootstrap_search_form( $form ) {

    $form = '<form class="navbar-search pull-right" role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <input type="text" value="' . get_search_query() . '" name="s" id="s" class="search-query"/>
    </form>';

    return $form;
}


?>
