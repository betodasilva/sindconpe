<?php
/**
 * The front page of your site
 *
 * @package sindcon
 */

 get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container custom-container">
            <div class="row gutters row--custom">
                <div class="col col-12">
                    <div class="vt-space-sm space-bottom">
                        <div class="banner border">
                            <a href="#">
                                <img src="<?php echo get_template_directory_uri() . '/dist/images/sorriso-para-todos.jpg'?>" alt="Sorriso Para Todos">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col col-8 col-posts">
                    <?php 
                        if ( get_query_var( 'paged') ) { 
                            $paged = get_query_var( 'paged' ); 
                        }
                        elseif  ( get_query_var( 'page') ) {
                            $paged = get_query_var( 'page' ); 
                        }
                        else {
                            $paged = '1';
                        }
                        
                        $args = array(
                            'post_type'         =>  'post',
                            'posts_per_page'    =>  '4',
                            'paged'             =>  $paged,
                            'nopaging'          => false
						 );
                        $the_query = new WP_Query( $args );
                        $temp_query = $wp_query;
                        $wp_query = NULL;
                        $wp_query = $the_query;
                        if ( $the_query->have_posts() ):  ?>
                            <div class="row gutters">
                                <?php
                                while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                    <div class="col col-6 post-container">
                                        <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
                                    </div>
								<?php endwhile;  ?>
                                
                            </div>
                    <?php 
						endif;
						
						wp_reset_postdata(); ?>
                                
						<div class="col col-12">
						<?php 
							the_posts_pagination( array(
								'mid_size' => 1,
								'prev_text' => __( 'Recente', 'sindconpe' ),
								'next_text' => __( 'Antigo', 'sindconpe' ),
								'screen_reader_text'	=>	__( 'Navegação de notícias' )
                            ) );
                            
                            $wp_query = NULL;
                            $wp_query = $temp_query;
							
						?>
						</div>

                </div>
                <div class="col col-4 col-sidebar">
                    <?php get_sidebar(); ?>
                </div>
                <div class="col col-12 col-footer-widget">
                    <?php 
                        $is_some_active = is_active_sidebar( 'ad-col-1' ) || is_active_sidebar( 'ad-col-2' ) || is_active_sidebar( 'ad-col-3' ) || is_active_sidebar( 'ad-col-full' );
                        if ( $is_some_active ) :  ?>
                            <div class="vt-space-sm">
                                <div class="row gutters">
                                <?php if ( is_active_sidebar( 'ad-col-full' ) ) echo '<div class="col col-12 text-center">'; dynamic_sidebar( 'ad-col-full' ); echo '</div>'; ?>
                                </div>
                            </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
get_footer();