<?php

namespace DPS\App;

use DPS\App\Interfaces\WordPressHooks;

/**
 * Class Setup
 *
 * @package DPS\App
 */
class Setup implements WordPressHooks
{

    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_action('init', [$this, 'registerMenus']);
        add_action('widgets_init', [$this, 'registerSidebars'], 5);
        add_action('upload_mimes', [$this, 'ccMimeTypes']);
        add_action('ddiBlock', [$this, 'register_acf_blocks']);
        add_action('initBlocks', [$this, 'loadBlocks'], 5);
        add_filter('loadAcf', [$this, 'loadAcfFieldGroup']);
        add_filter('blockCat', [$this, 'blockCategories']);
    }

    /**
     * Registers nav menu locations.
     */
    public function registerMenus()
    {
        register_nav_menu('primary', __('Primary', 'dps-starter'));
    }

    /**
     * Registers sidebars.
     */
    public function registerSidebars()
    {
        register_sidebar(
            [
                'id'            => 'primary',
                'name'          => __('Sidebar', 'dps-starter'),
                'description'   => __('Main sidebar area displayed on right side of page via trigger.', 'dps-starter'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
            ]
        );
    }

    /**
     * Add SVG to upload
     */
    public function ccMimeTypes($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
}
