<?php ?>

<form id="recipe-filter">

    <?php 
    if( $terms = get_terms( 'category', 'orderby=name' ) ) : // to make it simple I use default categories
        echo '<select name="categoryfilter"><option>Select category...</option>';
        foreach ( $terms as $term ) :
            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
        endforeach;
        echo '</select>';
    endif; ?>

</form>