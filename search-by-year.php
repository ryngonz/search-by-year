<?php
/**
 * @package Search By Year
 * @version 1.0
 */
/*
Plugin Name: Search By Year
Plugin URI: http://www.mojobitz.com
Description: This plugin searches for posts based by year. Use the shortcode [sby] to show the form. You can use a parameter cat [sby cat=#] to specify the category.
Author: Ryan Gonzales
Version: 1.0
Author URI: http://www.mojobitz.com/
*/

add_action( 'init', 'register_shortcodes');

function search_year_function($atts){
   extract(shortcode_atts(array(
      'cat' => "",
   ), $atts));
   $return_string = '';
   $page_url = get_permalink( get_the_id() );
   $dir = plugin_dir_path( __FILE__ );
   include($dir . "templates/search.php");

   if(isset($_GET['y']) && $_GET['y'] != ""){
   	wp_reset_query();
   	$return_string .= '<hr>';
   	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
   	query_posts(array('orderby' => 'date', 'order' => 'DESC' , 'cat' => $cat, 'date_query' => array('year'  => $_GET['y']) , 'paged' => $paged));
   	include($dir . "templates/archive.php");
   }

   wp_reset_query();
   return $return_string;
}

function register_shortcodes(){
   add_shortcode('sby', 'search_year_function');
}

function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;
	$excerpt_min = "";
	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			$excerpt_min .= mb_substr( $subex, 0, $excut );
		} else {
			$excerpt_min .= $subex;
		}
		$excerpt_min .= '[...]';
	} else {
		$excerpt_min .= $excerpt;
	}

	return $excerpt_min;
}

?>
