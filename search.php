<?php
/**
 * Template Name: Search Results Page
 */
get_header();
?>
<main class="container">

      <?php if (have_posts()): ?>
      <header class="search__header">
        <h2><?php _e("Search Results"); ?> dla "<?php echo esc_html(get_search_query(false))?>"</h2>  
      </header>
      <div class="entry-content">
        <?php
         while (have_posts()): the_post();
                
               get_template_part('template-parts/content', get_post_type());
                
            endwhile;
          ?>
      </div>
      <?php endif; ?>

</main>
<?php
get_footer();