<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package recantoalternativo
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function recantoalternativo_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'recantoalternativo_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function recantoalternativo_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'recantoalternativo_pingback_header' );

function custom_excerpt_length($length) {
	return 20;
}

add_filter('excerpt_length', 'custom_excerpt_length', 99);

function wpdocs_excerpt_more( $more ) {
    return sprintf( '<br><a class="read-more darkgray" href="%1$s">&#187; %2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Continuar Lendo', 'sindconpe' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

if (! function_exists( 'sindconpe_list_child_pages' ) ):

function sindconpe_list_child_pages() { 
 
	global $post; 
	 
	if ( is_page() ) : 
	
		$childpages_args = array (
			'post_type'		=>	'page',
			'post_parent'	=>	$post->ID,
		);
		$childpages = new WP_Query( $childpages_args );
		$childpages_list = $childpages->get_posts();
		
		$result = "<ul class='child-page-list row gutters'>";
		foreach( $childpages_list as $childpage ) {
			$url = get_permalink( $childpage->ID );
			$thumb = get_the_post_thumbnail( $childpage->ID, 'large' );
			$title = $childpage->post_title;
			$content = $childpage->post_content;
			$item = "<li class='child-page col col-12'>";
			$item .= "<a href='$url'><h3>$title</h3></a>";
			$item .= "<div>$content</div>";
			
			
			$item .= "</li>";

			$result .= $item;
		}
		$result .= "</ul>";

		return $result;
	endif;
	 
}
	 
add_shortcode('sindconpe_childpages', 'sindconpe_list_child_pages');
endif;
	
