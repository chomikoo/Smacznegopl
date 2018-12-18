<?php
/**
 * Portfolio: Custom Recipes Filter
 *
 * @package WordPress
 * @subpackage Smaczegopl
 * 
 */


 // Shortcode
/**
* chomikoo_ajax_filter
*/

add_shortcode( 'chomikoo_ajax_filter', 'chomikoo_ajax_filter_shortcode' );

function chomikoo_ajax_filter_shortcode() {

    chomikoo_ajax_filter_scripts();

    ob_start(); ?>

    <section class="container recipe-filter">
        
        <form id="recipe-filter" class="filter-form" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST">
            <div class="filter__group">
            <?php 
                if( $terms = get_terms( 
                    array(
                        'taxonomy' => 'meal-type',
                        'orderby' => 'name',
                        'hide_empty' => false
                        )) 
                        ) : // to make it simple I use default categories
                        $current_term = get_queried_object()->slug;
                        echo '<select id="category_filter" class="input-select" name="category_filter"><option value="">Wybierz typ</option>';
                        foreach ( $terms as $term ) :
                            echo '<option value="' . $term->slug  . '" ' . ($term->slug == $current_term ? "selected" : ""). '>' . $term->name . '</option>'; // ID of the category as the value of an option
                        endforeach;
                        echo '</select>';
                    endif; 
                    ?>

                    <select id="sort_terms" class="input-select">
                        <!-- <option value=""><?php _e('Sortuj'); ?></option> -->
                        <option value=""><?php _e('Data'); ?></option>
                        <option value="kcal"><?php _e('Kcal'); ?></option>
                        <option value="bialko"><?php _e('Białko'); ?></option>
                        <option value="weglowodany"><?php _e('Weglowodany'); ?></option>
                        <option value="tluszcze"><?php _e('Tłuszcze'); ?></option>
                        <option value="czas"><?php _e('Czas'); ?></option>
                    </select>
            </div>
            <div class="filter__group">
                <div class="input-text">
                    <input class="input-text__input" id="kcal_min" name="kcal_min" type="text" placeholder=" "/>
                    <label class="input-text__label" for="kcal_min">Min Kcal</label>
                </div>
                
                <div class="input-text">
                    <input class="input-text__input" id="kcal_max" name="kcal_max" type="text" placeholder=" "/>
                    <label class="input-text__label" for="kcal_max">Max Kcal</label>
                </div>
            </div>

            <div class="filter__group">            
                <div class="input-text">
                    <input class="input-text__input" id="time_min" name="time_min" type="text" placeholder=" "/>
                    <label class="input-text__label" for="time_min"><?php _e('Czas min [min]', 'Smacznegopl'); ?></label>
                </div>

                <div class="input-text">
                    <input class="input-text__input" id="time_max" name="time_max" type="text" placeholder=" "/>
                    <label class="input-text__label" for="time_max"><?php _e('Czas max [min]', 'Smacznegopl'); ?></label>
                </div>
            </div>
            <div class="row mx-auto">
                    <div class="filter__group input-checkbox col-12 col-md-3">
                        <input class="input-checkbox__input" id="checkbox_vege" type="checkbox" name="vege" />
                    <label class="input-checkbox__label" for="checkbox_vege"><?php _e('Vege', 'Smaczegopl'); ?></label>
                    <span class="input-checkbox__ico"></span>
                </div> 
                
                <div class="filter__group input-checkbox col-12 col-md-3">
                    <input class="input-checkbox__input" id="checkbox_meat" type="checkbox" name="meat" />
                    <label class="input-checkbox__label" for="checkbox_meat"><?php _e('Bez miesa', 'Smaczegopl'); ?></label>
                    <span class="input-checkbox__ico"></span>
                </div>
                
                <div class="filter__group input-checkbox col-12 col-md-3">
                    <input class="input-checkbox__input" id="checkbox_sugar" type="checkbox" name="sugar" />
                    <label class="input-checkbox__label" for="checkbox_sugar"><?php _e('Bez cukru', 'Smaczegopl'); ?></label>
                    <span class="input-checkbox__ico"></span>
                </div>
                
                <div class="filter__group input-checkbox col-12 col-md-3">
                    <input class="input-checkbox__input" id="checkbox_gluten" type="checkbox" name="gluten" />
                    <label class="input-checkbox__label" for="checkbox_gluten"><?php _e('Bez glutenu', 'Smaczegopl'); ?></label>
                    <span class="input-checkbox__ico"></span>
                </div>
            </div>

            <button class="btn btn--submit">Apply filter</button>
            <input type="hidden" name="action" value="myfilter">
            
        </form>
    </section>

    <?php 
    return ob_get_clean();
}


add_action('wp_ajax_chomikoo_ajax_filter_function', 'chomikoo_ajax_filter_function_callback');
add_action('wp_ajax_nopriv_chomikoo_ajax_filter_function', 'chomikoo_ajax_filter_function_callback');

function chomikoo_ajax_filter_function_callback() {

    $paged = $_POST['page'];

    $args = array(
        'post_type' => 'recipes',
        'paged' => $paged,
        'orderby' => 'meta_value_num',
        'meta_key' => $_POST['sort_terms'], 
        'order' => 'DESC'
    );


    if( !empty($_POST['category_filter']) ) {
        $args['tax_query'] = array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'meal-type',
                'field' => 'slug',
                'terms' => $_POST['category_filter'],
                'include_children' => false,
                'operator' => 'IN'
            ),

        );
    }

    if( !empty($_POST['recipe_assets']) ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'recipe-info',
                'field' => 'slug',
                'terms' => $_POST['recipe_assets'],
                'operator' => 'IN'
            )
        );
    }
    // ======= //
    //   KCAL
    // ======= //

    // create $args['meta_query'] array if one of the following fields is filled
	if( isset( $_POST['kcal_min'] ) && $_POST['kcal_min'] || isset( $_POST['kcal_max'] ) && $_POST['kcal_max'] ) {
        $args['meta_query'] = array( 'relation'=>'AND' ); 
    }

    // if both minimum kcal and maximum kcal are specified we will use BETWEEN comparison
    if( isset( $_POST['kcal_min'] ) && $_POST['kcal_min'] && isset( $_POST['kcal_max'] ) && $_POST['kcal_max'] ) {
        $args['meta_query'][] = array(
            'key' => 'kcal',
            'value' => array( $_POST['kcal_min'], $_POST['kcal_max'] ),
            'type' => 'numeric',
            'compare' => 'between'
        );
    } else {
        // if only min kcal is set
        if( isset( $_POST['kcal_min'] ) && $_POST['kcal_min'] )
            $args['meta_query'][] = array(
                'key' => 'kcal',
                'value' => $_POST['kcal_min'],
                'type' => 'numeric',
                'compare' => '>'
            );

        // if only max kcal is set
        if( isset( $_POST['kcal_max'] ) && $_POST['kcal_max'] )
            $args['meta_query'][] = array(
                'key' => 'kcal',
                'value' => $_POST['kcal_max'],
                'type' => 'numeric',
                'compare' => '<'
            );
    }
    
    // ======= //
    //   TIME
    // ======= //
    // create $args['meta_query'] array if one of the following fields is filled
	if( isset( $_POST['time_min'] ) && $_POST['time_min'] || isset( $_POST['time_max'] ) && $_POST['time_max'] ) {
        $args['meta_query'] = array( 'relation'=>'AND' ); 
    }

    // if both minimum kcal and maximum kcal are specified we will use BETWEEN comparison
    if( isset( $_POST['time_min'] ) && $_POST['time_min'] && isset( $_POST['time_max'] ) && $_POST['time_max'] ) {
        $args['meta_query'][] = array(
            'key' => 'czas',
            'value' => array( $_POST['time_min'], $_POST['time_max'] ),
            'type' => 'numeric',
            'compare' => 'between'
        );
    } else {
        // if only min kcal is set
        if( isset( $_POST['time_min'] ) && $_POST['time_min'] ) {
            $args['meta_query'][] = array(
                'key' => 'czas',
                'value' => $_POST['time_min'],
                'type' => 'numeric',
                'compare' => '>'
            );
        }

        // if only max kcal is set
        if( isset( $_POST['time_max'] ) && $_POST['time_max'] ) {
            $args['meta_query'][] = array(
                'key' => 'czas',
                'value' => $_POST['time_max'],
                'type' => 'numeric',
                'compare' => '<'
            );
        }
    }

	$query = new WP_Query( $args );
 
	if( $query->have_posts() ) {
        $result = array();
        
        echo '<div class="page-limit row" data-page="/page/' . $paged . '">';

		while( $query->have_posts() ){
             $query->the_post();
             
            get_template_part('template-parts/content-recipes');
            
        }
        wp_reset_postdata();
        
        echo '</div>';

    } else {
        echo 0;
    }
 
	die();

}



function chomikoo_check_paged( $num = null ){
    $output = '';

    if( is_paged() ){
        $output = 'page/' . get_query_var( 'paged' ); 
    }

    if( $num == 1){
        $paged = (get_query_var( 'paged' ) == 0 ? 1 : get_query_var( 'paged' ) );
        return $paged;
    } else {
        return $output;
    }

}