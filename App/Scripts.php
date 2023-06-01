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
        add_action('ddi_enqueue_editor_styles', [$this, 'enqueueEditorStyles']);
        add_action('ddi_carousel_block_js', [$this, 'carouselBlockJs']);
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
     * Load scripts for the front end.
     */
    public function carouselBlockJs()
    {
        wp_enqueue_script(
            'carousel-scripts',
            get_template_directory_uri() . "/components/blocks/carousel/index.js",
            [],
            true
        );

        wp_enqueue_script( 'gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js', array(), false, true );
        // ScrollTrigger - with gsap.js passed as a dependency
        wp_enqueue_script( 'gsap-st', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js', array('gsap-js'), false, true );
          // Your animation code file - with gsap.js passed as a dependency
        wp_enqueue_script( 'gsap-js2', get_template_directory_uri() . '/assets/scripts/theme/app.js', array('gsap-js'), false, true );
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

        wp_enqueue_style(
            'dps-tailwindcss',
            get_template_directory_uri() . '/dist/output.css',
            [],
            THEME_VERSION
        );
    }

    /**
     * Load stylesheets for the Editor.
     */
    public function enqueueEditorStyles()
    {
        wp_enqueue_style(
            'dps-editor-styles',
            get_template_directory_uri() . '/build/styles/editor-styles.min.css',
            [],
            THEME_VERSION
        );
    }
}
