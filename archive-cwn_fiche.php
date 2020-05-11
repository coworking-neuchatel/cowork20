<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edin
 */

get_header(); 

?>

<main id="site-content" role="main" class="archive-membres">

		<header class="archive-header has-text-align-center header-footer-group">

			<div class="archive-header-inner section-inner medium">

					<h1 class="archive-title">Les membres</h1>

			</div><!-- .archive-header-inner -->

		</header><!-- .archive-header -->

		<?php
		
	 ?>

				
				<div class="grid-fiches">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php
						
							// Note: La Query est modifiée, pour obtenir un ordre aléatoire,
							// et modifier le nombre d'éléments, dans:
							// pre-get.php
							// $query->set( 'orderby', 'rand');
						
							// Page Membres:
														
							get_template_part( 'content', 'cwn_fiche' );
							
							// 1) On affiche 4 membres pris aléatoirement
							// la requête est modifiée avec pre_get
							
							// ajouter à la liste des IDs à exclure
							
							// 2) Afficher la liste de tous les autres profils (portraits)
							
							// 3) On liste les domaines de compétence
							// comme dans le modèle biblio
						
						endwhile; 
						else : 
						get_template_part( 'content', 'none' ); 
						endif; 
					
					?>
				</div><!-- .grid-fiches -->
				
				<div class="grid-fiches">
					<h2>Domaines de compétence</h2>
					<ul class="biblio-tag-cloud text clear">
					<?php 
					      		
					$args = array(
					    'show_option_all'    => '',
					    	'orderby'            => 'name',
					    	'order'              => 'ASC',
					    	'style'              => 'list',
					    	'show_count'         => 0,
					    	'hide_empty'         => 1,
					    	'use_desc_for_title' => 0,
					    	'exclude'            => '',
					    	'exclude_tree'       => '',
					    	'hierarchical'       => 0,
					    	'title_li'           => '',
					    	'number'             => null,
					    	'echo'               => 1,
					    	'depth'              => 0,
					    	'current_category'   => 0,
					    	'pad_counts'         => 0,
					    	'taxonomy'           => 'cwn_competence',
					    	'walker'             => null
					   ); 
					   
					wp_list_categories( $args );
								 
					?>
					</ul>
				</div><!-- .grid-fiches -->

		
	<?php get_template_part( 'template-parts/pagination' ); ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
