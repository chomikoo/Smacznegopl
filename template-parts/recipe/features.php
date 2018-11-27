<?php
    // vars	
    $infos = get_field('additional_info');
    // check
    if( $infos ) { ?>
    <ul class="features">
        <?php foreach( $infos as $info ): ?>
        <li class="features__single features--<?php echo $info['value']; ?>">
            <?php echo $info['label']; ?>
        </li>
        <?php endforeach; ?>
    </ul>
    }