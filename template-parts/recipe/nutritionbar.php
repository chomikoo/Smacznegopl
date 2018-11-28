<?php 
    $portions = get_field('porcje');
    $portionWeight = get_field('waga_porcji');
    $kcal = get_field('kcal');
    $proteins = get_field('bialko');
    $carbs = get_field('weglowodany');
    $fats = get_field('tluszcze');
?>


<div class="nutrition container row">

    <div class="nutrition__box col-12 col-sm">
        <div class="nutrition__num">
            <span><?php echo $portionWeight; ?></span>g
        </div>
        <span class="nutrition__title"><?php echo __('Waga'); ?></span> 
    </div>

    <div class="nutrition__box col-12 col-sm">
        <div class="nutrition__num">
            <span><?php echo $kcal; ?></span>
        </div>
        <span class="nutrition__title"> <?php echo __('Kcal'); ?></span>
    </div>

    <div class="nutrition__box col-12 col-sm">
        <div class="nutrition__num">
            <span><?php echo $proteins; ?></span>g
        </div>
        <span class="nutrition__title"><?php echo __('Białko'); ?></span>
    </div>

    <div class="nutrition__box col-12 col-sm">
        <div class="nutrition__num">
            <span><?php echo $carbs; ?></span>g
        </div>
        <span class="nutrition__title"><?php echo __('Węglowodany'); ?></span>
    </div>

    <div class="nutrition__box col-12 col-sm">
        <div class="nutrition__num">
            <span><?php echo $fats; ?></span>g
        </div>
        <span class="nutrition__title"><?php echo __('Tłuszcze'); ?></span>
    </div>

</div>
<!-- nutrition" -->