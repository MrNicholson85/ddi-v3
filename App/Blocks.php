<?php

namespace DPS\App;

use DPS\App\Interfaces\WordPressHooks;

/**
 * Class Blocks
 *
 * @package DPS\App
 */
class Blocks implements WordPressHooks
{
    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_action('init', [$this, 'loadBlocks'], 5);
        add_filter('loadAcf', [$this, 'loadAcfFieldGroup']);
        add_filter('blockCat', [$this, 'blockCategories']);
    }


    /**
     * Get Blocks
     */
    public function getBlocks()
    {
        $theme   = wp_get_theme();
        $blocks  = get_option('cwp_blocks');
        var_dump($blocks);
        $version = get_option('cwp_blocks_version');
        if (empty($blocks) || version_compare($theme->get('Version'), $version) || (function_exists('wp_get_environment_type') && 'production' !== wp_get_environment_type())) {
            $blocks = scandir(get_template_directory() . '/blocks/');
            $blocks = array_values(array_diff($blocks, array('..', '.', '.DS_Store', '_base-block')));

            update_option('cwp_blocks', $blocks);
            update_option('cwp_blocks_version', $theme->get('Version'));
        }
        return $blocks;
    }

    /**
     * Load Blocks
     */
    public function loadBlocks()
    {
        $theme  = wp_get_theme();
        $blocks = getBlocks();
        foreach ($blocks as $block) {
            if (file_exists(get_template_directory() . '/blocks/' . $block . '/block.json')) {
                register_block_type(get_template_directory() . '/blocks/' . $block . '/block.json');
                wp_register_style('block-' . $block, get_template_directory_uri() . '/blocks/' . $block . '/style.css', null, $theme->get('Version'));

                if (file_exists(get_template_directory() . '/blocks/' . $block . '/init.php')) {
                    include_once get_template_directory() . '/blocks/' . $block . '/init.php';
                }
            }
        }
    }

    /**
     * Load ACF field groups for blocks
     */
    public function loadAcfFieldGroup($paths)
    {
        $blocks = getBlocks();
        foreach ($blocks as $block) {
            $paths[] = get_template_directory() . '/blocks/' . $block;
        }
        return $paths;
    }

    /**
     * Block categories
     *
     * @since 1.0.0
     */
    public function blockCategories($categories)
    {

        // Check to see if we already have a CultivateWP category
        $include = true;
        foreach ($categories as $category) {
            if ('cultivatewp' === $category['slug']) {
                $include = false;
            }
        }

        if ($include) {
            $categories = array_merge(
                $categories,
                [
                    [
                        'slug'  => 'cultivatewp',
                        'title' => __('CultivateWP', 'cultivate_textdomain'),
                        'icon'  => \cwp_icon(['icon' => 'cultivatewp', 'group' => 'color', 'force' => true])
                    ]
                ]
            );
        }

        return $categories;
    }
}
