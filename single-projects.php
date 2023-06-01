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

 get_header();
 ?>
<div class="mb-8">
    <?php
 // hook: App/Fields/Modules/outputFlexibleModules()
 do_action('dps/modules/output', get_the_ID());
 ?>
 </div>
 <?php
 get_footer();
