<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- skip to main content -->
    <a href="#primary" class="screen-reader-text"><?php _e('Skip to Main Content', 'dps-starter'); ?></a>

    <header id="masthead" class="header" role="banner">
        <div class="ddi_container">
            <div class="flex justify-between">
                <div class="logo">
                    <a class="uppercase font-bold text-xl" href="/">DarrylDidIt</a>
                </div>
                <nav>
                    <?php
                    // Loads the menu/primary.php template.
                    get_template_part('menu/primary');
                    ?>
                </nav>
            </div>
        </div>
    </header><!-- .header -->