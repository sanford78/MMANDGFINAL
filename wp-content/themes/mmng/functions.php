<?php
//Registering The Menus //
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'Navigation' ),
	'footer' => __( 'Footer Menu', 'Footer' )
) );

// Removing Filters //
remove_filter('the_content', 'wptexturize');
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt','wpautop');
remove_filter('the_excerpt','wptexturize');

// Registering Sidebar //
if (function_exists('register_sidebar')) {
	register_sidebar(array('name' => 'Main Page Sidebar'));
}

function fah_trim_excerpt($text) {
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text, '<p>');
		$excerpt_length = apply_filters('excerpt_length', 40);
		$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
		if ( count($words) > $excerpt_length ) {
			array_pop($words);
			$text = implode(' ', $words);
			$text = $text . $excerpt_more;
		} else {
			$text = implode(' ', $words);
		}
	}
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
add_filter( 'post_thumbnail_html', 'my_post_image_html', 380, 235 );
set_post_thumbnail_size( 380, 235, true );
function my_post_image_html( $html, $post_id, $post_image_id ) {

  $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
  return $html;

}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'fah_trim_excerpt');
function template_directory_sc(){
 	echo bloginfo('template_directory');
}
add_shortcode( 'template_directory', 'template_directory_sc' );
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 50, 50 );
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'slide',
		array(
			'labels' => array(
				'name' => __( 'Slides' ),
				'singular_name' => __( 'Slide' )
			),
		'public' => true,
		'has_archive' => false,
		'exclude_from_search' => true,
		'show_in_nav_menus' => false,
		'supports' => array('title', 'thumbnail')
		)
	);
}