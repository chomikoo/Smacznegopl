<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Smaczegopl
 * @since 1.0
 */


 
add_action('rest_api_init', 'customRoute');

function customRoute() {
    register_rest_route('smacznego/v1', 'search', array(
        'methods'   =>  WP_REST_SERVER::READABLE,
        'callback'  =>  'relatedRecipesResults'
    ));
}

function relatedRecipesResults($data) {
    $search = new WP_Query(array(
        'post_type' => array('post','page','recipes','products'),
        's' => sanitize_text_field( $data['term'] )
    ));

    $searchResults = array(
        'generalInfo' => array(),
        'recipes' => array(),
        'products' => array(),
    );

    while($search->have_posts()) {
        $search->the_post();

        if(get_post_type() == 'post' || get_post_type() == 'page') {
            array_push($searchResults['generalInfo'], array(
                'id'    => get_the_ID(),
                'title' => get_the_title(),
                'permalink' => get_the_permalink()
                )
            );
        }

        if(get_post_type() == 'recipes') {
            array_push($searchResults['recipes'], array(
                'id'    => get_the_ID(),
                'title' => get_the_title(),
                'acf'   => get_fields(),
                'thumbnail' => get_the_post_thumbnail_url(0,'thumbnail'),
                'permalink' => get_the_permalink()
                )
            );
        }

        if(get_post_type() == 'products') {
            array_push($searchResults['products'], array(
                'id'    => get_the_ID(),
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'thumbnail' => get_the_post_thumbnail_url(0,'thumbnail'),
                'acf'   => get_fields()
                )
            );
        }
        
    }

    return $searchResults;
}



/// GET RELATED POSTS 2 INGREDIENTS FOR ARCHIVE 

function recipesWithSimilarIngredients( $postID ) {
    $urlApi = get_home_url() . '/wp-json/smacznego/v1/search';
    
    $response = wp_remote_get( 
        add_query_arg( 
            array(
                'per_page' => -1
        ), $urlApi) );

    if( !is_wp_error( $response ) && $response['response']['code'] == 200) {
        $recipesPosts = json_decode( $response['body'], true );
        // echo $recipesPosts['recipes'][0]['title'];
        foreach( $recipesPosts['recipes'] as $recipes) {
            // if( $recipes[posttype] == 'recipes' ) {

                // $ingredientsArr = $recipe["acf"]["przepis"][0]["skladniki"];
                $list_recipes = $recipes["acf"]["przepis"];
                foreach ($list_recipes as $recipe) {
                    $ingredientsArr = $recipe["skladniki"];
                    
                    if( is_array($ingredientsArr) ) {
                        
                        foreach( $ingredientsArr as $ingredient )  {
                            
                            if( $postID == $ingredient["skladnik"]["ID"] ) {
                                global $post; 
                                $post = get_post($recipes["id"]); 
                                setup_postdata($post);
                                get_template_part( 'template-parts/recipe-box' );
                                wp_reset_postdata();    
                            }

                        }

                    }
                }
            // }
        }
    }
}