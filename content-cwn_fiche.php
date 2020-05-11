<?php
/**
 * @package Cowork15
 */
?>

<?php 

$show_fiche = false;

$post_classes[] = "fiche";

$fiche_photo = get_field('fiche_photo');
$fiche_logo = get_field('fiche_logo');

if ($fiche_photo) {

	$post_classes[] = "has-photo";

} elseif ($fiche_logo) {
	
	$post_classes[] = "has-photo";
}


// Vérifier si option public est: OUI, sinon ne rien afficher du tout. = fiche_acceptation

// J'accepte que les réponses données aux questions entourées de "~" soient publiées sur le site web du Coworking Neuchâtel en accès public *

if ( get_field('fiche_acceptation') )
{
	if ( get_field('fiche_acceptation') == 'oui' )  {
		
		$show_fiche = true;
	
	} else {
	
		// Utilisateurs connectés uniquement!
		if ( is_user_logged_in() ) {
		  $show_fiche = true;
		}
	
	}
}

// Afficher le contenu de la fiche? 

if ( $show_fiche == true )  {

 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
		<?php 
		
		if (in_array( "has-photo", $post_classes)) {
			
			echo '<div class="fiche-photo">';
			
			// Photo perso = non-public
			
			if ( is_user_logged_in() ) {
			
				if ($fiche_photo) {
				
					echo '<div class="fiche-portrait">';
	
					echo wp_get_attachment_image( 
						$fiche_photo, 
						'medium' );
					echo '</div>';
		
				}
			}
			
			if ($fiche_logo) {
				
				echo '<div class="fiche-logo">';
			
				echo wp_get_attachment_image( 
								$fiche_logo, 
								'medium' );
				echo '</div>';
				
			}
			
			echo '</div>';
		
		} // in_array
				
		?>
	<div class="member-id">
			<?php 
			
			the_title( '<h1 class="entry-title">', '</h1>' ); 
			
			echo '<div class="member-properties">';
			
			if ( get_field('fiche_profession') ) {
				echo '<div>' . get_field('fiche_profession') . '</div>';
			}
			
			if ( get_field('fiche_entreprise') ) { 
			
				// Combiner avec URL?
				
				if ( get_field('fiche_url') )
				{
					echo '<div><a href="' . get_field('fiche_url') . '">' . get_field('fiche_entreprise') . '</a></div>';
				} else {
				
				echo '<div>' . get_field('fiche_entreprise') . '</div>';
				
				} // get_field('fiche_url')
				
			} else {
				// Pas d'entreprise, indépendant
				// Afficher URL si existant:
				
				if ( get_field('fiche_url') ) {
					
					$url = get_field('fiche_url');
					// construire forme courte, sans http...
					if (function_exists('ms_studio_pretty_url')) {
						$url = ms_studio_pretty_url( $url );
					}
					echo '<div><a href="' . get_field('fiche_url') . '">' . $url . '</a></div>';
				}
			} // get_field('fiche_entreprise') )

			if ( is_user_logged_in() ) {
			
				if ( get_field('fiche_anniv') )
				{
					echo '<div>Anniversaire: ' . get_field('fiche_anniv') . '</div>';
				}
			} // is_user_logged_in()
			
			$terms_competences = get_the_term_list( 
				$post->ID, 
				'cwn_competence', 
				'Compétences: ', ', ', '' 
			);
			
			if ( ($terms_competences) ) {
					
				echo '<div class="competences">';
				echo $terms_competences;
				echo '</div>';
			
			}
			
			
			if ( get_field('fiche_email') ) {
				
				$email = get_field('fiche_email');
				
				if (function_exists('ms_studio_protect_email')) {
				   $email = ms_studio_protect_email( $email );
				 }
				 
				echo '<div>' . $email . '</div>';
			}
						
			if ( is_user_logged_in() ) {
			
				if ( get_field('fiche_tel') ) {
					echo '<div>' . get_field('fiche_tel') . '</div>';
				}
			
			}
			
			echo '</div><!-- .member-properties -->';
			
			// Second Section
			// ***************
			
			// champ non-public!
			
			if ( is_user_logged_in() ) {
			
				if ( get_field('fiche_raison') )
				{
					echo '<h2 class="sub-title">Raison du choix:</h2>';
					
					echo '<div class="member-properties">';
					
					echo '<p> ' . get_field('fiche_raison') . '</p>';
					
					
					
					if ( get_field('fiche_citation') ) {
						echo '<div>Citation: ' . get_field('fiche_citation') . '</div>';
					}
					
					echo '</div><!-- .member-properties -->';
				}
			
			} // is_user_logged_in()
			
			edit_post_link( __( 'Edit', 'edin' ), '<div class="modify-linkx"><span class="edit">', '</span></div>' );
			
			?>
	</div><!-- .member-id -->

</article><!-- #post-## -->
<?php 

} // END test show_fiche

?>