<?php
/**
 * Portfolio: Other
 *
 * @package WordPress
 * @subpackage Smaczegopl
 * 
 */

	function responsive_thumbnail($post_id,$image_size,$max_width) {
		
		$img_id = get_post_thumbnail_id($post_id);

		$img_src = wp_get_attachment_image_url($img_id, $image_size);

		$image_srcset = wp_get_attachment_image_srcset( $img_id, $image_size );

		$alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

		echo 'src="'.$img_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'" alt="'.$alt.'"' ;
	}


	function lazy_load_thumbnail($post_id,$image_size,$max_width) {
		$img_id = get_post_thumbnail_id($post_id);

		$img_src = wp_get_attachment_image_url($img_id, $image_size);

		$image_srcset = wp_get_attachment_image_srcset( $img_id, $image_size );

		$alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

		echo 'data-src="'.$img_src.'" data-srcset="'.$image_srcset.'" data-sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'" alt="'.$alt.'"' ;
	}


	/////////////////////////////////////////////////
	//Set thumbnail on save post
	/////////////////////////////////////////////////

	// function set_featured_image_from_gallery() {
	//   $has_thumbnail = get_the_post_thumbnail($post->ID);

	//   if ( !$has_thumbnail ) {

	//     $images = get_field('gallery', false, false);
	//     $image_id = $images[0];

	//     if ( $image_id ) {
	//       set_post_thumbnail( $post->ID, $image_id );
	//     }
	//   }
	// }


	/*-----------------------------------------------------------------------
	Move the Yoast SEO Meta Box to the Bottom of the edit screen in WordPress
	------------------------------------------------------------------------*/
	function yoasttobottom() {
		return 'low';
	}
	add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

	/*-----------------------------------------------------------------------
	// Require a featured image before publish posts
	------------------------------------------------------------------------*/

	// add_action('save_post', 'chomikoo_check_thumbnail');
	// add_action('admin_notices', 'chomikoo_thumbnail_error');

	// function chomikoo_check_thumbnail( $post_id ) {
	// 	// change to any custom post type 
	// 	if( get_post_type($post_id) != 'products' )
	// 		return;

	// 	if ( ! has_post_thumbnail( $post_id ) ) {
	// 		// set a transient to show the users an admin message
	// 		set_transient( "has_post_thumbnail", "no" );
	// 		// unhook this function so it doesn't loop infinitely
	// 		remove_action('save_post', 'chomikoo_check_thumbnail');
	// 		// update the post set it to draft
	// 		wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'));

	// 		add_action('save_post', 'chomikoo_check_thumbnail');
		
	// 	} else {

	// 		delete_transient( "has_post_thumbnail" );
			
	// 	}

	// }

	function chomikoo_thumbnail_error() {
		// check if the transient is set, and display the error message
		if ( get_transient( "has_post_thumbnail" ) == "no" ) {
			echo "<div id='message' class='error'><p><strong>Musisz ustawić obraz dla postu przed publikacja. Twoj post został zapisany</strong></p></div>";
			delete_transient( "has_post_thumbnail" );
		}
	}


	// Dispaly thumbnail placeholder 
	// add_filter( 'post_thumbnail_html', 'chomikoo_default_thumb' );
	// function chomikoo_default_thumb( $html ) {
	// 	if ( '' !== $html ) {
	// 		return '<a href="' . get_permalink() . '">' . $html . '</a>';
	// 	}

	// 	return '<img src="' . THEME_PATH . 'dist/img/placeholder.jpg" />';    
	// }

	// Save first gallery image as thumbnail
	add_action( 'save_post', 'set_featured_image_from_gallery' );
	function set_featured_image_from_gallery() {
		$has_thumbnail = get_the_post_thumbnail($post->ID);

		if ( !$has_thumbnail ) {

			$images = get_field('galeria', false, false);
			$image_id = $images[0];

			if ( $image_id ) {
				set_post_thumbnail( $post->ID, $image_id );
			}
		}
	}


	function terms_list($id, $slug, $spacer='0') {
		$terms = get_the_terms($id, $slug);
		$terms_length = count($terms);
		$i = 0;
		$list = '<ul class="taxonomy-tag">';
		foreach($terms as $term){
			$list .= '<li class="taxonomy-tag__element"><a href="' . get_term_link($term) . '" class="taxonomy-tag__link">'.$term->name.'</a></li>';
			if( !($i == $terms_length - 1) && $spacer ) { $list .= '<span>' . $spacer . '</span>';}
			$i++;
		}
		$list .= '</ul>';

		return $list;
	}

	/////////////////////////////////////////////////
	// Convert Minutes to H & Min
	/////////////////////////////////////////////////
	function min_2_h( $time ) {
		$hours = floor(( $time / 60 ));
		$min = $time - ($hours * 60);
		$final = (( $hours > 0 ) ? $hours . 'h' : '') . ' ' . (( $min > 0 ) ?  $min . 'min' : ''); 
		return $final;
	}

	/////////////////////////////////////////////////
	// Kcal => Runnig time
	/////////////////////////////////////////////////
	function get_kcalDist( $kcal ) {
		$per_km = $kcal/90; 
		$final = round( $per_km, 1 );
		return $final ;
	}

	//////////////////
	// CUSTOM EXCERPT
	//////////////////

	function custom_field_excerpt($field, $excerpt_length = 30) {
		global $post;
		$text = get_field($field); 
		if ( '' != $text ) {
			$text = strip_shortcodes( $text );
			$text = apply_filters('the_content', $text);
			$text = str_replace(']]&gt;', ']]&gt;', $text);
			$excerpt_more = apply_filters('excerpt_more', '' . '&nbsp;...');
			$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
		}
		return apply_filters('the_excerpt', $text);
	}