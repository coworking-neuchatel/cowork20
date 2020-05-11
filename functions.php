<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
 
    wp_enqueue_style( 
    	$parent_style, 
    	get_template_directory_uri() . '/style.css' );
    	
    wp_enqueue_style( 
    	'membres', 
    	get_stylesheet_directory_uri() . '/css/style-membres.css' );

//    wp_enqueue_style( 'child-style',
//        get_stylesheet_directory_uri() . '/style.css',
//        array( $parent_style ),
//        wp_get_theme()->get('Version')
//    );

}

// La balise titre de la page d'accueil

add_filter( 'pre_get_document_title', 'coworking_custom_title', 20 );
function coworking_custom_title( $title ) {

    if( is_front_page() ) {
    
    	$title = "Coworking Neuchâtel – Bureaux équipés | Salle de réunion | Réseau d'entrepreneurs" . $title;;
    	return $title;
    }

}



require_once('functions/typekit.php');

require_once('functions/pre-get.php');