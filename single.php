<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sindcon
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main vt-space-sm">
			<div class="container">
				<div class="row gutters">
					<div class="col col-8 bg-white col-content">
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );

							// If comments are open or we have at least one comment, load up the comment template.
							

						endwhile; // End of the loop.
						/*the_post_navigation( array(
							'prev_text'		=>	__( 'Artigo anterior: %title' ),
							'next_text'		=> 	__( 'Próximo Artigo: %title' ),
							'in_same_term'	=>	true,
							'taxonomy'		=>	__( 'category' )
						)); */
						?>
					</div>
					<div class="col col-4">
						<?php get_sidebar(); ?>
					</div>
				</div>
				
			</div>		
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
