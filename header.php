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
        <div uk-sticky="start: 200; animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light">

            <nav class="uk-navbar-container">
                <div class="uk-container uk-container-expand">
                    <div uk-navbar>

                        <?php
                        // Loads the menu/primary.php template.
                        get_template_part('menu/primary');
                        ?>

                    </div>
                </div>
            </nav>
        </div>
    </header><!-- .header -->