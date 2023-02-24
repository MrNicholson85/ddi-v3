<?php

namespace DPS\App;

use DPS\App\Interfaces\WordPressHooks;

/**
 * Class Scripts
 *
 * @package DPS\App
 */
class Scripts implements WordPressHooks
{

    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueStyles']);
        add_action('ddi_enqueue_uikit_js', [$this, 'enqueueUIKitScripts']);
    }

    /**
     * Load scripts for the front end.
     */
    public function enqueueScripts()
    {
        wp_enqueue_script(
            'dps-theme',
            get_template_directory_uri() . "/build/scripts/theme-scripts.min.js",
            [],
            THEME_VERSION,
            true
        );

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    /**
     * Load scripts for the front end.
     */
    public function enqueueUIKitScripts()
    {
        wp_enqueue_script(
            'uiKit-scripts',
            get_template_directory_uri() . "/node_modules/uikit/dist/js/uikit.min.js",
            [],
            true
        );
    }

    /**
     * Load stylesheets for the front end.
     */
    public function enqueueStyles()
    {
        wp_enqueue_style(
            'dps-styles',
            get_template_directory_uri() . '/build/styles/theme-styles.min.css',
            [],
            THEME_VERSION
        );
    }
}
