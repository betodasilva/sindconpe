<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package sindcon
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container custom-container">
				<div class="row gutters">
					<div class="col col-8 col-posts">
						<?php if ( have_posts() ) : ?>

							<header class="page-header">
								<h1 class="page-title">
									<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'sindcon' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h1>
							</header><!-- .page-header -->

						<div class="row gutters">
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post(); ?>

								<div class="col col-6">
									<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
								</div>
							<?php

							endwhile;?>
						</div>
						<?php
							else : ?>
								<div class="col col-12">
									<?php get_template_part( 'template-parts/content', 'none' ); ?>
								</div>
							<?php

							endif;
							?>
						
					</div><!-- .col-8  -->
					<div class="col col-4">
						<?php get_sidebar(); ?>
					</div>
				</div>
				
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
