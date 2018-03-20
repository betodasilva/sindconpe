<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package sindconpe
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function sindconpe_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'sindconpe_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'post-details'    => array(
			'stylesheet' => 'sindconpe-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
		'featured-images' => array(
			'archive'    => true,
			'post'       => true,
			'page'       => true,
		),
	) );

	add_theme_support( 'featured-content', array(
		'filter'	 =>	'sindconpe_get_featured_posts',
		'max_posts'	 =>	'4',
		'post_types' =>	array( 'post', 'page' )
	) );
}
add_action( 'after_setup_theme', 'sindconpe_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function sindconpe_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}


/**
 * Function to get featured posts
  */

  function sindconpe_get_featured_posts(){
	return apply_filters( 'sindconpe_get_featured_posts', array() );
}

function sindconpe_has_featured_posts( $minimum = 1 ) {
    if ( is_paged() )
        return false;
 
	$minimum = absint( $minimum );
	global $featured_posts;
    $featured_posts = apply_filters( 'sindconpe_get_featured_posts', array() );
 
    if ( ! is_array( $featured_posts ) )
        return false;
 
    if ( $minimum > count( $featured_posts ) )
        return false;
 
    return true;
}