<?php
/**
 * Portfolio: Custom Post kategoriees
 *
 * @package WordPress
 * @subpackage Smaczegopl
 * 
 */

	// Custom Post Types
	
    add_action('init', 'chomikoo_init_posttypes');
    
    function chomikoo_init_posttypes(){
        /*
         * Register Recipes Post Type
         */
        
        $labels =  array(
            'name'              => __('Przepisy'),
            'singular_name'     => __('Przepisy'),
            'all_items'         => __('Wszystkie przepisy'),
            'add_new'           => __('Dodaj nowy przepis'),
            'add_new_item'      => __('Dodaj nowy przepis'),
            'edit_item'         => __('Edytuj przepis'),
            'new_item'          => __('Nowy przepis'),
            'view_item'         => __('Zobacz przepis'),
            'search_items'      => __('Szukaj w przepisach'),
            'not_found'         =>  __('Nie znaleziono żadnych przepisów'),
            'not_found_in_trash' => __('Nie znaleziono żadnych przepisów w koszu'), 
        );
        
        $recipes_args = array(
            'labels' => $labels,
            'parent_item_colon' => '',
            'public'                    => true,
            'publicly_queryable'        => true,
            'show_ui'                   => true, 
            'query_var'                 => true,
            'rewrite'                   => true,
            'capability_type'           => 'post',
            'hierarchical'              => false,
            'menu_icon'                 => 'dashicons-media-text',
            'menu_position'             => 5,
            // 'show_in_rest'              => true,
            // 'rest_base'                 => 'recipes',
            // 'rest_controller_class'     => 'WP_REST_Posts_Controller',
            'rewrite'                   => array('slug' => 'przepisy'),
            'supports' => array(
                'title','editor','author','thumbnail','excerpt','comments','custom-fields'
            ),
            'has_archive' => true            
        );
        
        register_post_type('recipes', $recipes_args);
        /*
         * Register Product Post Type
         */
        $product_labels =  array(
            'name'              => __('Produkty'),
            'singular_name'     => __('Produkty'),
            'all_items'         => __('Wszystkie produkty'),
            'add_new'           => __('Dodaj nowy produkt'),
            'add_new_item'      => __('Dodaj nowy produkt'),
            'edit_item'         => __('Edytuj produkt'),
            'new_item'          => __('Nowy produkt'),
            'view_item'         => __('Zobacz produkt'),
            'search_items'      => __('Szukaj w produktach'),
            'not_found'         =>  __('Nie znaleziono żadnych produktów'),
            'not_found_in_trash' => __('Nie znaleziono żadnych produktów w koszu'), 
        );
        
        $product_args = array(
            'labels' => $product_labels,
            'parent_item_colon' => '',
            'public'                    => true,
            'publicly_queryable'        => true,
            'show_ui'                   => true, 
            'query_var'                 => true,
            'rewrite'                   => true,
            'capability_type'           => 'post',
            'hierarchical'              => false,
            'menu_icon'                 => 'dashicons-media-text',
            'menu_position'             => 6,
            // 'show_in_rest'              => true,
            // 'rest_base'                 => 'products',
            // 'rest_controller_class'     => 'WP_REST_Posts_Controller',
            'rewrite'                   => array('slug' => 'produkty'),
            'supports' => array(
                'title','editor','author','thumbnail','excerpt','comments','custom-fields'
            ),
            'has_archive' => true            
        );
        
        register_post_type('products', $product_args);
        
    }
    
    add_action('init', 'chomikoo_init_taxonomies');
    /* register taxonomy*/
    
    // INGREDIENTS TAXONOMY
    function chomikoo_init_taxonomies(){
    // MEAL TYPE TAXONOMY
        $type_taxonomy_labels = array(
            'name'              => __('Typ dania'),
            'singular_name'     => __('Typ dania'),
            'search_items'      => __('Wyszukaj typ'),
            'popular_items'     => __('Najpopularniejsze typy'),
            'all_items'         => __('Wszystkie typy'),
            'most_used_items'   => null,
            'parent_item'       => null,
            'parent_item_colon' => null,
            'edit_item'         => __('Edytuj typ') ,
            'update_item'       => __('Aktualizuj typ'),
            'add_new_item'      => __('Dodaj nowy typ'),
            'new_item_name'     => __('Nazwa nowego typ'),
            'separate_items_with_commas'    => __('Oddziel typy przecinkiem'),
            'add_or_remove_items'           => __('Dodaj lub usuń typy'),
            'choose_from_most_used'         => __('Wybierz spośród najczęścież używanych typów'),
            'menu_name'                     => __('Typy'),
        );
        // Type
        register_taxonomy(
            'meal-type',
            array('recipes'),
            array(
                'hierarchical' => true,
                'labels' => $type_taxonomy_labels,
                'show_admin_column' => true,
                'show_ui' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array('slug' => 'type' )
        ));
        /*
         * Product type Taxonomy
         */
        $product_type_taxonomy_labels = array(
            'name'              => __('Typ produktu'),
            'singular_name'     => __('Typ produktu'),
            'search_items'      => __('Wyszukaj typ'),
            'popular_items'     => __('Najpopularniejsze typy'),
            'all_items'         => __('Wszystkie typy'),
            'most_used_items'   => null,
            'parent_item'       => null,
            'parent_item_colon' => null,
            'edit_item'         => __('Edytuj typ') ,
            'update_item'       => __('Aktualizuj typ'),
            'add_new_item'      => __('Dodaj nowy typ'),    
            'new_item_name'     => __('Nazwa nowego typ'),
            'separate_items_with_commas'    => __('Oddziel typy przecinkiem'),
            'add_or_remove_items'           => __('Dodaj lub usuń typy'),
            'choose_from_most_used'         => __('Wybierz spośród najczęścież używanych typów'),
            'menu_name'                     => __('Typy'),
        );
        // Type
        register_taxonomy(
            'product-type',
            array('products'),
            array(
                'hierarchical' => true,
                'labels' => $product_type_taxonomy_labels,
                'show_admin_column' => true,
                'show_ui' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array('slug' => 'product' )
        ));
    }
