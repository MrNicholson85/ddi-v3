<?php

/**
 * @package DPS
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    the_content();
    ?>
</div><!-- #post-## -->