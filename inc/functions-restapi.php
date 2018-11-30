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

function relatedRecipesResults() {
    $recipes = new WP_Query(array(
        'post_type' => 'recipes',
        // 's' => '168'
    ));

    $recipeResults = array();

    while($recipes->have_posts()) {
        $recipes->the_post();
        array_push($recipeResults, array(
            'id'    => get_the_ID(),
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'thumbnail' => get_the_post_thumbnail(),
            'acf'   => get_fields(),
            )
        );
    }

    return $recipeResults;
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
        foreach( $recipesPosts as $recipe) {
            $ingredientsArr = $recipe["acf"]["przepis"][0]["skladniki"];
            if( is_array($ingredientsArr) ) {

                foreach( $ingredientsArr as $ingredient )  {

                    if( $postID == $ingredient["skladnik"]["ID"] ) {
                        global $post; 
                        $post = get_post($recipe["id"]); 
                        setup_postdata($post);
                        get_template_part( 'template-parts/recipe-box' );
                        wp_reset_postdata();

                    }
                }

            }
        }
        
    }
}