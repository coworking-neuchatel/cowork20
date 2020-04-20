<?php

/*
 * Typekit : ajout de fonte Acumin Pro
 * ID de projet: ihy0uyu
 * URL: https://use.typekit.net/ihy0uyu.css
 * .tk-acumin-pro { font-family: "acumin-pro",sans-serif; }
*/

function cwn_typekit_styles() {
 
 		wp_enqueue_style( 
 				'typekit-style', 
 				'https://use.typekit.net/ihy0uyu.css',
 				false, // dependencies
 				'20181029' // version
 		); 
 
 } 
 add_action( 'wp_enqueue_scripts', 'cwn_typekit_styles', 20 );
 
 /*
 Les styles chargés:
 
 REGULAR: font-style:normal;font-weight:400;

 ITALIC: font-style:italic;font-weight:400;
 
 BOLD: font-style:normal;font-weight:700;
 
 LIGHT: font-style:normal;font-weight:200;
 
 */