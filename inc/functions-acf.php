<?php
/**
 * Portfolio: ACF
 *
 * @package WordPress
 * @subpackage Smaczegopl
 * 
 */


add_filter('acf/settings/save_json', 'chomikoo_acf_json_save_point');
 
function chomikoo_acf_json_save_point( $path ) {
      // update path
      $path = get_stylesheet_directory() .  '/acf-json';
      // return
      return $path;
}


add_filter('acf/settings/load_json', 'chomikoo_acf_json_load_point');

function chomikoo_acf_json_load_point( $paths ) {
      // append path
      $paths[] = get_stylesheet_directory() . '/acf-json';
      // return
      return $paths;
}


function awesome_acf_responsive_image($image_id,$image_size,$max_width){

      // check the image ID is not blank
      if($image_id != '') {

            // set the default src image size
            $image_src = wp_get_attachment_image_url( $image_id, $image_size );

            // set the srcset with various image sizes
            $image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

            // generate the markup for the responsive image
            echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';
      }
}


function awesome_acf_responsive_image_lazyload($image_id,$image_size,$max_width){

      if($image_id != '') {

            $image_src = wp_get_attachment_image_url( $image_id, $image_size );

            $image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

            $alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

            echo 'data-src="'.$img_src.'" data-srcset="'.$image_srcset.'" data-sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'" alt="'.$alt.'"' ;      
      }
}


