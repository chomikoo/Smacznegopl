<?php
/**
 * Portfolio: Single Product
 *
 * @package WordPress
 * @subpackage Smaczegopl
 * 
 */


$kcal = get_field('kcal');

$fat = get_field('tluszcze');
$fat_saturated = get_field('tluszcze_nasycone');
$fat_trans = get_field('tluszcze_trans');
$fat_poly = get_field('tluszcze_wielonienasycone');
$fat_mono = get_field('tluszcze_jednonienasycone');

$cholesterol = get_field('cholesterol');

$carbs = get_field('weglowodany');
$sugar = get_field('cukier');
$fiber = get_field('blonnik');

$proteins = get_field('bialko');
$salt = get_field('sol');

?>
<div class="nutrition-facts__head">
    <div class="nutrition-facts__box">
        <?php echo __('Kcal', 'smaczegopl'); ?><br>
        <?php echo $kcal; ?>
    </div>
    <div class="nutrition-facts__box">
        <?php echo __('Białko', 'smaczegopl'); ?><br>
        <?php echo $proteins; ?>g
    </div>
    <div class="nutrition-facts__box">
        <?php echo __('Błonnik', 'smaczegopl'); ?><br>
        <?php echo ($fiber) ? $fiber . 'g' : 'bd'; ?>
    </div>
</div>

<table class="nutrition-facts__table">
    <tbody>
        <tr>
            <td colspan="3" class="nutrition-facts__serving">
                <?php echo __('W 100g', 'smaczegopl'); ?>
            </td>
        </tr>
        <tr>
            <th colspan="2" class="bold">
                    <?php echo __('Węglowodany', 'smaczegopl'); ?></th>
            <td>
                <?php echo $carbs; ?>g</td>
        </tr>
        <tr>
            <th colspan="2" class="bold">
                    <?php echo __('Białko', 'smaczegopl'); ?></th>
            <td>
                <?php echo $proteins; ?>g
            </td>
        </tr>
        <tr>
            <th colspan="2" class="bold">
                    <?php echo __('Tłuszcz', 'smaczegopl'); ?></th>
            <td>
            <?php echo $fat; ?>g</td>
        </tr>

        <?php if($fat_saturated) { ?>
        <tr>
            <td class="padd-cell"></td>
            <th>
                <?php echo __('Nasycone', 'smaczegopl'); ?>
            </th>
            <td>
            <?php echo $fat_saturated; ?>g</td>
        </tr>
        <?php } ?>

        <?php if($fat_trans) { ?>
        <tr>
            <td class="padd-cell"></td>
            <th>
                <?php echo __('Trans', 'smaczegopl'); ?>
            </th>
            <td>
                <?php echo $fat_trans; ?>g</td>
        </tr>
        <?php } ?>

        <?php if($fat_poly) { ?>
        <tr>
            <td class="padd-cell"></td>
            <th>
                <?php echo __('Wielonienasycone', 'smaczegopl'); ?>
            </th>
            <td>
                <?php echo $fat_poly; ?>g</td>
        </tr>
        <?php } ?>

        <?php if($fat_mono) { ?>
        <tr>
            <td class="padd-cell"></td>
            <th>
                <?php echo __('Jednonienasycone', 'smaczegopl'); ?>
                </td>
            <td>
                <?php echo $fat_mono; ?>g</th>
        </tr>
        <?php } ?>

        <?php if($cholesterol) { ?>
        <tr>
            <th colspan="2" class="bold">
                    <?php echo __('Cholesterol', 'smaczegopl'); ?></th>
            <td>
                <?php echo $cholesterol; ?>mg</td>
        </tr>
        <?php } ?>

        <tr>
            <th colspan="2" class="bold">
                    <?php echo __('Sod', 'smaczegopl'); ?></th>
            <td>
                <?php echo ($salt) ? $salt . 'g' : 'bd'; ?>            
            </td>
        </tr>
        <tr>
            <td class="padd-cell"></td>
            <th>
                <?php echo __('Błonnik', 'smaczegopl'); ?>
            </th>
            <td>
                <?php echo ($fiber) ? $fiber . 'g' : 'bd'; ?>
            </td>
        </tr>
        <tr>
            <td class="padd-cell"></td>
            <th>
                <?php echo __('Cukier', 'smaczegopl'); ?>
            </th>
            <td>
                <?php echo ($sugar) ? $sugar . 'g' : 'bd'; ?>
            </td>
        </tr>
    </tbody>
</table>
