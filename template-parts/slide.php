<li class="slider__element">
    <a href="<?php echo get_permalink( get_the_id()); ?>" class="slider__link thumbnail">

        <?php the_post_thumbnail(  ) ?>

        <div class="slider__content">

            <?php terms_list(get_the_id(), 'meal-type'); ?>
            
            <h2 class="subtitle">
                <?php echo get_the_title( get_the_id() ); ?>
            </h2>
            
            <div class="slider__info">
                <span class="slider__date"><?php echo get_the_date( 'Y-m-d' ); ?></span>
                <span class="far fa-clock"></span><span class="slider__time"><?php echo min_2_h( get_field('czas') ); ?></span>
                <span class="slider__kcal"><?php echo get_field('kcal'); ?>kcal</span>
            </div>

        </div>
    </a>
    
</li>