<?php 

    $portionWeight = get_field('waga_porcji');
    $kcal = get_field('kcal');
    $proteins = get_field('bialko');
    $carbs = get_field('weglowodany');
    $fats = get_field('tluszcze');

?>


<div class="nutrition container">

    <div class="nutrition__box col-12 col-sm">
        <span class="nutrition__num">
            <?php echo $portionWeight; ?>g
        </span>
        <span class="nutrition__title">
            <?php echo __('Waga'); ?></span>
        <!-- <span class="nutrition__unit">g</span> -->
    </div>

    <div class="nutrition__box col-12 col-sm">
        <span class="nutrition__num">
            <?php echo $kcal; ?>
        </span>
        <span class="nutrition__title">
            <?php echo __('Kcal'); ?></span>
        <!-- <span class="nutrition__unit">kcal</span> -->
    </div>

    <div class="nutrition__box col-12 col-sm">
        <span class="nutrition__num">
            <?php echo $proteins; ?>g
        </span>
        <span class="nutrition__title">
            <?php echo __('Białko'); ?></span>
        <!-- <span class="nutrition__unit">g</span> -->
    </div>

    <div class="nutrition__box col-12 col-sm">
        <span class="nutrition__num">
            <?php echo $carbs; ?>g
        </span>
        <span class="nutrition__title">
            <?php echo __('Węglowodany'); ?></span>
        <!-- <span class="nutrition__unit">g</span> -->
    </div>

    <div class="nutrition__box col-12 col-sm">
        <span class="nutrition__num">
            <?php echo $fats; ?>g
        </span>
        <span class="nutrition__title">
            <?php echo __('Tłuszcze'); ?></span>
        <!-- <span class="nutrition__unit">g</span> -->
    </div>

</div>
<!-- nutrition" -->