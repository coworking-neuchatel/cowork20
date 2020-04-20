<?php
/**
 * Template Name: Login Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */


get_header();
?>

<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
			
			if ( is_user_logged_in() ) {
				
						get_template_part( 'template-parts/content', get_post_type() );
					
					} else {
						
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="entry-content">
								<h1>Login requis</h1>
								<p>Veuillez <a href="<?php echo wp_login_url( get_permalink().'?version=10923482' ); ?>" title="Login">vous identifier</a> pour accéder à cette page.</p>
								<div class="clear"></div>
							</div><!-- .entry-content -->
						
						</article><!-- #post-## -->
						
						<?php
			
					}
			

		}
	}

	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
