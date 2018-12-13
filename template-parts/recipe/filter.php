<?php ?>

<form id="recipe-filter" class="filter-form" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST">
    <div class="form-group">
    <?php 
        if( $terms = get_terms( 
            array(
                'taxonomy' => 'meal-type',
                'orderby' => 'name',
                'hide_empty' => false
                )) 
                ) : // to make it simple I use default categories
                echo '<select name="categoryfilter"><option>Wybierz typ</option>';
                foreach ( $terms as $term ) :
                    echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
                endforeach;
                echo '</select>';
            endif; 
            ?>
    </div>

    <div class="form-group">
        <input type="text" name="kcal_min" placeholder="Min kcal" />
        <input type="text" name="kcal_max" placeholder="Max kcal" />
    </div>

    <button class="btn">Apply filter</button>
	<input type="hidden" name="action" value="myfilter">

</form>

<div id="response"></div>