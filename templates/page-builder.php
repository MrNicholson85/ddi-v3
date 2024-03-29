<?php

/**
 * Template Name: Page Builder
 *
 * This template displays Advanced Custom Fields
 * flexible content fields in a user-defined order.
 *
 * @package DPS
 */

get_header();

// hook: App/Fields/Modules/outputFlexibleModules()
do_action('dps/modules/output', get_the_ID());

get_footer();
