<?php
/**
 * The template for displaying Members, listed by Competence.
 *
 * @package cowork15
 */

get_header(); 

?>
<main id="site-content" role="main" class="archive-membres">

	<header class="archive-header has-text-align-center header-footer-group">

		<div class="archive-header-inner section-inner medium">
			

		<?php if ( have_posts() ) : ?>

				<h1 class="page-title">
					<?php
						
						$queried_object = get_queried_object();
						
						$tax_slug = $queried_object->taxonomy;
						$tax_info = get_taxonomy( $tax_slug );
						echo $tax_info->singular_label;
						echo ': ';
						single_term_title(); 
						
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
		<?php else : ?>

				<h1 class="page-title"><?php _e( 'Nothing Found', 'edin' ); ?></h1>

		<?php endif; ?>
		
		</div><!-- .archive-header-inner -->

	</header><!-- .archive-header -->

	<div class="content-wrapper clear">

		<div id="primary" class="content-area">
			<main id="main" class="site-main liste-fiches" role="main">

				<?php if ( have_posts() ) : ?>

					<?php
					
						if ( is_tax('cwn_competence') ) {
						
							?>
							<footer class="entry-footer">
							<p>Membres du réseau coworking ayant des compétences dans le domaine  “<?php  
							
							single_term_title(); 
							
							?>”:</p>
							</footer>
							<?php
						
						}
					
					 /* Start the Loop */ ?>
					 <div class="grid-fiches">
					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php
						
							get_template_part( 'content', 'cwn_fiche' );

						?>

					<?php endwhile; ?>
					 </div>
					

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>
				
				<h2 class="voir-tous"><a href="/membres/">Voir tous les membres &rarr;</a></h2>

</main><!-- #site-content -->


<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
