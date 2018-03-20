<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sindconpe
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

	<?php if ( is_single() ):
		sindconpe_post_thumbnail(); ?>
		<div class="post-meta">
			<?php sindconpe_posted_on(); ?>	
			<?php sindconpe_posted_by(); ?>
		</div>
	<?php
	else: ?>
		 
		<div class="post-custom-thumb">
			
			<?php sindconpe_post_thumbnail(); ?>
			<div class="post__header ph">
				<a href="<?php the_permalink(); ?>" class="read-more button outline small white">Leia Mais</a>
			</div>
			
		</div>

	<?php
	endif;?>

	<div class="post-content">
		<h1 class="pc__title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
		<?php
			if ( is_single() ): 
				the_content();
			else:
				the_excerpt();
			endif;
		?>
	</div>

	
</article><!-- #post-<?php the_ID(); ?> -->
