<?php
/**
* Pre-Get Posts
* Change display of posts loop
* Number of posts in archive pages
*
* @package Cowork
 */

function cowork_page_membres( $query ) {

  if ( is_post_type_archive( 'cwn_fiche' ) && !is_admin() && $query->is_main_query() ) {

  	$query->set( 'orderby', 'rand');
  	$query->set( 'posts_per_page', -1);

  }
 
}
add_filter( 'pre_get_posts', 'cowork_page_membres' );


