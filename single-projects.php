<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package DPS
 */

get_header(); ?>

<div id="primary" class="uk-width-1-1@s">

    <?php
    while (have_posts()) {
        the_post();
        // Loads the content/singular/page.php template.
        get_template_part('content/singular/' . get_post_type());
    }
    ?>
</div><!-- /#primary -->


<?php get_footer();
