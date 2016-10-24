<?php
/**
 * @package WordPress
 * @subpackage Need-Cars
 * @since Need-Cars 1.0
 */
 function need_cars_init() {
	 register_nav_menus( array(
		'topmenu' => 'Основные разделы'
	) );
	add_theme_support( 'post-thumbnails', array( 'page' ) );
	add_post_type_support( "page", "thumbnail" );
	wp_enqueue_style('jquery.mCustomScrollbar.min', get_template_directory_uri().'/css/jquery.mCustomScrollbar.min.css'); 
	//wp_enqueue_script('jquery.dropdown', get_template_directory_uri().'/js/dropdown.js', array('jquery'));
	wp_enqueue_style('blueimp-gallery.min', get_template_directory_uri().'/gallery-master/css/blueimp-gallery.min.css'); 
	wp_enqueue_script('jquery.blueimp-gallery.min', get_template_directory_uri().'/gallery-master/js/jquery.blueimp-gallery.min.js', array('jquery'));
	wp_enqueue_script('blueimp-gallery-youtube', get_template_directory_uri().'/gallery-master/js/blueimp-gallery-youtube.js', array('jquery'));
	wp_enqueue_script('jquery.mCustomScrollbar.concat.min', get_template_directory_uri().'/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'));
	wp_enqueue_script('script', get_template_directory_uri().'/js/script.js', array('jquery'));
	remove_action('wp_head','wp_print_scripts');
    remove_action('wp_head','wp_print_head_scripts',9);
    remove_action('wp_head','wp_enqueue_scripts',1);
    add_action('wp_footer','wp_print_scripts',5);
    add_action('wp_footer','wp_enqueue_scripts',5);
    add_action('wp_footer','wp_print_head_scripts',5);
}
add_action( 'init', 'need_cars_init' );
function fields_comment($fields) {
	 unset($fields["url"],$fields["email"]);
	 return $fields;
}
add_action( 'comment_form_default_fields', 'fields_comment' );
/* function custom_validate_comment_author() {
    if( empty( $_POST['author'] ) || ( !preg_match( '/[^\s]/', $_POST['author'] ) ) )
        wp_die( __('Error: Please enter your name') );
}
add_action( 'pre_comment_on_post', 'custom_validate_comment_author' ); */
function reorder_comment_fields( $fields ){

	$new_fields = array(); 

	$myorder = array('author','comment'); 

	foreach( $myorder as $key ){
		$new_fields[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}

	if( $fields )
		foreach( $fields as $key => $val )
			$new_fields[ $key ] = $val;

	return $new_fields;
}
add_filter('comment_form_fields', 'reorder_comment_fields' );
add_action( 'admin_init', 'add_settings_init' );
function add_settings_init() {
	add_settings_field(
		'thelephone',
		'Телефон',
		'thelephone_setting_callback', // можно указать ''
		'general'
	);
	register_setting( 'misc', 'thelephone' );
}
function thelephone_setting_callback() {
	echo '<input 
		name="thelephone"  
		type="text" 
		value="' . get_option( 'thelephone' ) . '" 
		class="code2"
	 />';
}